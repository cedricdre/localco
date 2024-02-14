<?php
require_once __DIR__ . '/../helpers/Database.php';

class Basket
{
    private ?int $id_user;
    private ?int $id_product;
    private ?int $quantity;

    public function __construct(?int $quantity = null, ?int $id_user = null, ?int $id_product = null)
    {
        $this->setIdUser($id_user);
        $this->setIdProduct($id_product);
        $this->setIdUser($quantity);
    }

    // Methods SET GET
    public function setIdUser(?int $id_user)
    {
        $this->id_user = $id_user;
    }
    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    public function setIdProduct(?int $id_product)
    {
        $this->id_product = $id_product;
    }
    public function getIdProduct(): ?int
    {
        return $this->id_product;
    }

    public function setQuantity(?int $quantity)
    {
        $this->quantity = $quantity;
    }
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function insert(): bool
    {
        $pdo = Database::connect();
        $sql = 'INSERT INTO `baskets` (`id_user`,`id_product`,`quantity`) VALUES (:id_user, :id_product, :quantity)';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_user', $this->getIdUser(), PDO::PARAM_INT);
        $sth->bindValue(':id_product', $this->getIdProduct(), PDO::PARAM_INT);
        $sth->bindValue(':quantity', $this->getQuantity(), PDO::PARAM_INT);
        $sth->execute();
        // Appel à la méthode rowCount permettant de savoir combien d'enregistrements ont été affectés
        // par la dernière requête (fonctionnel uniquement sur insert, update, ou delete. PAS SUR SELECT!!)
        if ($sth->rowCount() <= 0) {
            // Génération d'une exception renvoyant le message en paramètre au catch créé en amont et arrêt du traitement.
            throw new Exception('Erreur lors de l\'enregistrement');
        } else {
            // Retourne true dans le cas contraire (tout s'est bien passé)
            return true;
        }
    }

    public static function getAllbyBasket(int $id): object|false
    {
        $pdo = Database::connect();
        // Requête mysql pour sélectionner toutes les valeurs dans la table `categories`
        $sql = 'SELECT 
                `baskets`.`id_user`,
                `baskets`.`id_product`,
                `baskets`.`quantity`,
                `products`.`product_name`,
                `products`.`product_price`,
                `products`.`product_tva`,
                `users`.`firstname`
                FROM `baskets`
                INNER JOIN `products` ON `baskets`.`id_product` = `products`.`id_product`
                INNER JOIN `users` ON `baskets`.`id_user` = `users`.`id_user`
                WHERE `baskets`.`id_user` = :id_user ;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_user', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_OBJ);
        if (!$result) {
            // Génération d'une exception renvoyant le message en paramètre au catch créé en amont et arrêt du traitement.
            throw new Exception('Erreur lors de la récupération du panier');
        } else {
            // Retourne la data dans le cas contraire (tout s'est bien passé)
            return $result;
        }    
    }

}