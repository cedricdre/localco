<?php
require_once __DIR__ . '/../../config/init.php';
require_once __DIR__ . '/../../models/Product.php';
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../models/Order.php';
require_once __DIR__ . '/../../models/OrderLine.php';

try {
    $title = 'Panier';

    if (!empty($_SESSION['user'])) {
        $id_user = $_SESSION['user']->id_user;
        $pickup = User::getUserPickup($id_user);
    }

    $total = 0;

    if (isset($_COOKIE['basket'])) {
        $datas = json_decode($_COOKIE['basket']);

        foreach ($datas as $item) {
            $id = $item->productId;
            $quantity = $item->quantity;
            $products = Product::getBasket($id);
            $productID[$id] = [
                'product' => $products,
                'quantity' => $quantity,
            ];
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $error = [];

        // Nettoyage et récupération des datas 
        // Status
        $status = 1; // 1 = Commande en préparation

        // withdrawDate
        $withdrawDate = filter_input(INPUT_POST, 'withdrawDate', FILTER_SANITIZE_NUMBER_INT);
        if (empty($withdrawDate)) {
            $error['withdrawDate'] = 'La date de retrait n\'est pas renseignée';
        } else {
            $withdrawDateObj = new DateTime($withdrawDate);
            $withdrawDate = $withdrawDateObj->format('Y-m-d');
        }

        // dd($pickup->id_pickup);

        if (empty($error)) {
            try {
                $pdo = Database::connect();
                $pdo->beginTransaction();
                
                $order = new Order();
                $order->setStatus($status);
                $order->setWithdrawDate($withdrawDate);
                $order->setIdUser($id_user);
                $order->setIdPickup($pickup->id_pickup);
    
                $isOrder = $order->insert();
                if(!$isOrder){
                    throw new Exception("Échec de l'opération d'insertion dans la base de données !");
                }
                $id_order = $pdo->lastInsertId();

                // dd($id_order);
                $orderLine = new OrderLine();

                foreach ($productID as $productData) {
                    $product = $productData['product'][0];
                    $quantity = $productData['quantity'];
                    $prix_ttc = CalculatePrice::TVA($product);
                    $prix_ttc = str_replace(',', '.', $prix_ttc);

                    $orderLine->setLineName($product->product_name);
                    $orderLine->setLinePrice($prix_ttc);
                    $orderLine->setQuantity($quantity);
                    $orderLine->setIdOrder($id_order);

                    $isOrderLine = $orderLine->insert();
                }

                if(!$isOrderLine){
                    throw new Exception("Échec de l'opération d'insertion dans la base de données !");
                }
                $pdo->commit();

                // vérifier si la requête d'insertion a réussi
                if ($isOrder == true && $isOrderLine  == true) {
                    unset($_COOKIE['basket']);
                    setcookie('basket', '', time() - 86400, "/");
                }

            } catch (\Throwable $th) {
                $pdo->rollBack();
                $error['bd'] = $th->getMessage();
            }
        }

    }

} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__.'/../../views/templates/header.php';
    include __DIR__.'/../../views/dashboard/templates/error.php';
    include __DIR__.'/../../views/templates/footer.php';
    die;
}

include __DIR__.'/../../views/templates/header.php';
include __DIR__.'/../../views/baskets/baskets.php';
include __DIR__.'/../../views/templates/shop-hover.php';
include __DIR__.'/../../views/templates/footer.php';