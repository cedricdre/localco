<?php
require_once __DIR__ . '/../helpers/Database.php';

class Pickup
{
    private ?int $id_pickup;
    private string $pickup_name;
    private string $adress;
    private string $zip;
    private string $city;
    private string $opening_hours;
    private ?string $created_at;
    private ?string $updated_at;
    private ?string $deleted_at;

    public function __construct(string $pickup_name = '', string $adress = '', string $zip = '', string $city = '', string $opening_hours = '', ?string $created_at = null, ?string $updated_at = null, ?string $deleted_at = null, ?int $id_pickup = null)
    {
        $this->setPickupName($pickup_name);
        $this->setAdress($adress);
        $this->setZip($zip);
        $this->setCity($city);
        $this->setOpeningHours($opening_hours);
        $this->setCreatedAt($created_at);
        $this->setUpdatedAt($updated_at);
        $this->setDeletedAt($deleted_at);
        $this->setIdPickup($id_pickup);
    }

    // Methods SET GET
    public function setIdPickup(?int $id_pickup)
    {
        $this->id_pickup = $id_pickup;
    }

    public function getIdPickup(): ?int
    {
        return $this->id_pickup;
    }

    public function setPickupName(string $pickup_name)
    {
        $this->pickup_name = $pickup_name;
    }

    public function getPickupName(): string
    {
        return $this->pickup_name;
    }

    public function setAdress(string $adress)
    {
        $this->adress = $adress;
    }

    public function getAdress(): string
    {
        return $this->adress;
    }

    public function setZip(string $zip)
    {
        $this->zip = $zip;
    }

    public function getZip(): string
    {
        return $this->zip;
    }

    public function setCity(string $city)
    {
        $this->city = $city;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setOpeningHours(string $opening_hours)
    {
        $this->opening_hours = $opening_hours;
    }

    public function getOpeningHours(): string
    {
        return $this->opening_hours;
    }

    public function setCreatedAt(?string $created_at) {
        $this->created_at = $created_at;
    }
    public function getCreatedAt() :?string {
        return $this->created_at;
    }

    public function setUpdatedAt(?string $updated_at) {
        $this->updated_at = $updated_at;
    }
    public function getUpdatedAt() :?string {
        return $this->updated_at;
    }

    public function setDeletedAt(?string $deleted_at) {
        $this->deleted_at = $deleted_at;
    }
    public function getDeletedAt() :?string {
        return $this->deleted_at;
    }

    public static function get(int $id): object|false
    {
        $pdo = Database::connect();
        // Requête mysql pour sélectionner toutes les valeurs dans la table `categories`
        $sql = 'SELECT * FROM `pickups` WHERE `id_pickup` = :id_pickup';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_pickup', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_OBJ);
        if (!$result) {
            // Génération d'une exception renvoyant le message en paramètre au catch créé en amont et arrêt du traitement.
            throw new Exception('Erreur lors de la récupération du Lieu de retrait');
        } else {
            // Retourne la data dans le cas contraire (tout s'est bien passé)
            return $result;
        }
    }

    public static function getAll(bool $archive = false): array
    {
        $pdo = Database::connect();
        // Requête mysql pour sélectionner toutes les valeurs dans la table `categories`
        $sql = 'SELECT * FROM `pickups`';

        if ($archive === true) {
            $sql .= ' WHERE `deleted_at` IS NOT NULL';
        } else {
            $sql .= ' WHERE `deleted_at` IS NULL';
        }
        
        $sql .= ' ORDER by `pickup_name`';

        $sth = $pdo->query($sql);
        // Retourne un tableau associatif de la table categories
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function insert(): bool
    {
        $pdo = Database::connect();
        $sql = 'INSERT INTO `pickups` (`pickup_name`,`address`,`zip`,`city`,`opening_hours`) VALUES (:pickup_name, :address, :zip, :city, :opening_hours)';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':pickup_name', $this->getPickupName());
        $sth->bindValue(':address', $this->getAdress());
        $sth->bindValue(':zip', $this->getZip());
        $sth->bindValue(':city', $this->getCity());
        $sth->bindValue(':opening_hours', $this->getOpeningHours());
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

    public function update()
    {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Requête mysql pour insérer des données
        $sql = 'UPDATE `pickups` SET `pickup_name` = :pickup_name, `address` = :address, `zip` = :zip, `city` = :city, `opening_hours` = :opening_hours WHERE `id_pickup` = :id_pickup';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':pickup_name', $this->getPickupName());
        $sth->bindValue(':address', $this->getAdress());
        $sth->bindValue(':zip', $this->getZip());
        $sth->bindValue(':city', $this->getCity());
        $sth->bindValue(':opening_hours', $this->getOpeningHours());
        $sth->bindValue(':id_pickup', $this->getIdPickup(), PDO::PARAM_INT);
        $sth->execute();
        if ($sth->rowCount() <= 0) {
            // Génération d'une exception renvoyant le message en paramètre au catch créé en amont et arrêt du traitement.
            throw new Exception('Erreur lors de la mise à jour');
        } else {
            // Retourne true dans le cas contraire (tout s'est bien passé)
            return true;
        }
    }

    public static function archive(int $id): int|false {
        $pdo = Database::connect();
        // Requête mysql pour sélectionner toutes les valeurs dans la table `vehicles`
        $sql = 'UPDATE `pickups` SET `deleted_at` = NOW() WHERE `id_pickup` = :id_pickup';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_pickup', $id, PDO::PARAM_INT);
        $sth->execute();
        if ($sth->rowCount() <= 0) {
            // Génération d'une exception renvoyant le message en paramètre au catch créé en amont et arrêt du traitement.
            throw new Exception('Erreur lors de l\'archivage');
        } else {
            // Retourne true dans le cas contraire (tout s'est bien passé)
            return true;
        }
    }

    public static function unarchive(int $id): int|false {
        $pdo = Database::connect();
        // Requête mysql pour sélectionner toutes les valeurs dans la table `vehicles`
        $sql = 'UPDATE `pickups` SET `deleted_at` = null WHERE `id_pickup` = :id_pickup';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_pickup', $id, PDO::PARAM_INT);
        $sth->execute();
        if ($sth->rowCount() <= 0) {
            // Génération d'une exception renvoyant le message en paramètre au catch créé en amont et arrêt du traitement.
            throw new Exception('Erreur lors de l\'archivage');
        } else {
            // Retourne true dans le cas contraire (tout s'est bien passé)
            return true;
        }
    }

    public static function delete($id): bool
    {
        $pdo = Database::connect();
        $sql = 'DELETE FROM `pickups` WHERE `id_pickup` = :id_pickup';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_pickup', $id, PDO::PARAM_INT);
        $sth->execute();
        if ($sth->rowCount() <= 0) {
            // Génération d'une exception renvoyant le message en paramètre au catch créé en amont et arrêt du traitement.
            throw new Exception('Erreur lors de la suppression');
        } else {
            return true;
        }
    }

    public static function isExist($pickup_name): bool
    {
        $pdo = Database::connect();
        $sql = 'SELECT COUNT(*) FROM `pickups` WHERE `pickup_name` = :pickup_name';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':pickup_name', $pickup_name);
        $sth->execute();
        // Récupérer le résultat de la requête (nombre de lignes correspondantes)
        $rowCount = $sth->fetchColumn();
        // Si le nombre de lignes correspondantes est supérieur à zéro, la valeur existe
        return $rowCount > 0;
    }
}
