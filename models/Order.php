<?php
require_once __DIR__ . '/../helpers/Database.php';

class Order
{
    private ?int $id_order;
    private ?int $status;
    private ?string $withdrawDate;
    private ?string $created_at;
    private ?int $id_user;
    private ?int $id_pickup;

    public function __construct(
        ?int $id_order = null,
        ?int $status = null,
        ?string $withdrawDate = null,
        ?string $created_at = null,
        ?int $id_user = null,
        ?int $id_pickup = null
    ) {
        $this->setIdOrder($id_order);
        $this->setStatus($status);
        $this->setWithdrawDate($withdrawDate);
        $this->setCreatedAt($created_at);
        $this->setIdUser($id_user);
        $this->setIdPickup($id_pickup);
    }

    // Methods SET GET
    public function setIdOrder(?int $id_order)
    {
        $this->id_order = $id_order;
    }
    
    public function getIdOrder(): ?int
    {
        return $this->id_order;
    }

    public function setStatus(?int $status)
    {
        $this->status = $status;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setWithdrawDate(?string $withdrawDate)
    {
        $this->withdrawDate = $withdrawDate;
    }

    public function getWithdrawDate(): ?string
    {
        return $this->withdrawDate;
    }

    public function setCreatedAt(?string $created_at)
    {
        $this->created_at = $created_at;
    }

    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    public function setIdUser(?int $id_user)
    {
        $this->id_user = $id_user;
    }

    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    public function setIdPickup(?int $id_pickup)
    {
        $this->id_pickup = $id_pickup;
    }

    public function getIdPickup(): ?int
    {
        return $this->id_pickup;
    }

    public function insert(): bool
    {
        $pdo = Database::connect();
        $sql = 'INSERT INTO `orders` (`status`,`withdrawDate`,`id_user`,`id_pickup`) VALUES (:status, :withdrawDate, :id_user, :id_pickup)';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':status', $this->getStatus(), PDO::PARAM_INT);
        $sth->bindValue(':withdrawDate', $this->getWithdrawDate());
        $sth->bindValue(':id_user', $this->getIdUser(), PDO::PARAM_INT);
        $sth->bindValue(':id_pickup', $this->getIdPickup(), PDO::PARAM_INT);
        $sth->execute();
        if ($sth->rowCount() <= 0) {
            throw new Exception('Erreur lors de l\'enregistrement');
        } else {
            return true;
        }
    }

    public static function getAll(int $id): array
    {
        $pdo = Database::connect();
        $sql = 'SELECT * FROM `orders`
                WHERE 1 = 1';

        if ($id) {
            $sql .= ' AND `orders`.`id_user` = :id_user';
        }

        $sql .= ' ORDER by `id_order` DESC';

        $sth = $pdo->prepare($sql);
        if (!is_null($id)) {
            $sth->bindValue(':id_user', $id, PDO::PARAM_INT);
        }
        $sth->execute();
        // Retourne un tableau associatif de la table categories
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public static function getAllProcessing(int $status): array
    {
        $pdo = Database::connect();
        $sql = 'SELECT
                `orders`.`id_order`,
                `orders`.`status`,
                `orders`.`withdrawDate`,
                `orders`.`created_at`,
                `orders`.`id_user`,
                `orders`.`id_pickup`,
                `pickups`.`pickup_name`,
                `users`.`firstname`, 
                `users`.`lastname` 
                FROM `orders`
                INNER JOIN `users` ON `users`.`id_user` = `orders`.`id_user`
                INNER JOIN `pickups` ON `pickups`.`id_pickup` = `orders`.`id_pickup`
                WHERE 1 = 1';

        if ($status === 1) {
            $sql .= ' AND `orders`.`status` = 1';
        } 
        if ($status === 2) {
            $sql .= ' AND `orders`.`status` = 2';
        }
        if ($status === 3) {
            $sql .= ' AND `orders`.`status` = 3';
        }

        $sql .= ' ORDER by `id_order` DESC';

        $sth = $pdo->query($sql);
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public static function validPrepare(int $id): int|false
    {
        $pdo = Database::connect();
        // Requête mysql pour sélectionner toutes les valeurs dans la table `vehicles`
        $sql = 'UPDATE `orders` SET `status` = 2 WHERE `id_order` = :id_order';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_order', $id, PDO::PARAM_INT);
        $sth->execute();
        if ($sth->rowCount() <= 0) {
            // Génération d'une exception renvoyant le message en paramètre au catch créé en amont et arrêt du traitement.
            throw new Exception('Erreur lors de la validation');
        } else {
            // Retourne true dans le cas contraire (tout s'est bien passé)
            return true;
        }
    }

    public static function validReady(int $id): int|false
    {
        $pdo = Database::connect();
        // Requête mysql pour sélectionner toutes les valeurs dans la table `vehicles`
        $sql = 'UPDATE `orders` SET `status` = 3 WHERE `id_order` = :id_order';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_order', $id, PDO::PARAM_INT);
        $sth->execute();
        if ($sth->rowCount() <= 0) {
            // Génération d'une exception renvoyant le message en paramètre au catch créé en amont et arrêt du traitement.
            throw new Exception('Erreur lors de la validation');
        } else {
            // Retourne true dans le cas contraire (tout s'est bien passé)
            return true;
        }
    }

}
