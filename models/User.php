<?php
require_once __DIR__ . '/../helpers/Database.php';

class User
{
    private ?int $id_user;
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $password;
    private ?int $producer;
    private string $company_name;
    private int $siret;
    private string $description;
    private ?string $company_picture;
    private ?string $phone;
    private string $adress;
    private string $zip;
    private string $city;
    private ?string $created_at;
    private ?string $updated_at;
    private ?string $deleted_at;
    private ?string $confirmed_at;
    private ?int $id_pickup;


    // Mettre les valeurs à NULL par default !!!!!!!!!!!!!!!!!!
    // Mettre les valeurs à NULL par default !!!!!!!!!!!!!!!!!!
    // Mettre les valeurs à NULL par default !!!!!!!!!!!!!!!!!!
    public function __construct(?int $id_user = null, string $firstname = '', string $lastname = '', string $email = '', string $password = '', int $producer = 0, string $company_name = '', int $siret = 00000000000000, string $description = '', ?string $company_picture = NULL, ?string $phone = '', string $adress = '', string $zip = '', string $city = '', ?string $created_at = null, ?string $updated_at = null, ?string $deleted_at = null, ?string $confirmed_at = null, ?int $id_pickup = null)
    {
        $this->setIdUser($id_user);
        $this->setFirstname($firstname);
        $this->setLastname($lastname);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setProducer($producer);
        $this->setCompanyName($company_name);
        $this->setSiret($siret);
        $this->setDescription($description);
        $this->setCompanyPicture($company_picture);
        $this->setPhone($phone);
        $this->setAdress($adress);
        $this->setZip($zip);
        $this->setCity($city);
        $this->setCreatedAt($created_at);
        $this->setUpdatedAt($updated_at);
        $this->setDeletedAt($deleted_at);
        $this->setComfirmedAt($confirmed_at);
        $this->setIdPickup($id_pickup);
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

    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setProducer(?int $producer)
    {
        $this->producer = $producer;
    }

    public function getProducer(): ?int
    {
        return $this->producer;
    }

    public function setCompanyName(string $company_name)
    {
        $this->company_name = $company_name;
    }

    public function getCompanyName(): string
    {
        return $this->company_name;
    }

    public function setSiret(?int $siret)
    {
        $this->siret = $siret;
    }

    public function getSiret(): ?int
    {
        return $this->siret;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setCompanyPicture(?string $company_picture)
    {
        $this->company_picture = $company_picture;
    }

    public function getCompanyPicture(): ?string
    {
        return $this->company_picture;
    }

    public function setPhone(?string $phone)
    {
        $this->phone = $phone;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
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

    public function setCreatedAt(?string $created_at)
    {
        $this->created_at = $created_at;
    }
    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    public function setUpdatedAt(?string $updated_at)
    {
        $this->updated_at = $updated_at;
    }
    public function getUpdatedAt(): ?string
    {
        return $this->updated_at;
    }

    public function setDeletedAt(?string $deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }
    public function getDeletedAt(): ?string
    {
        return $this->deleted_at;
    }

    public function setComfirmedAt(?string $confirmed_at)
    {
        $this->confirmed_at = $confirmed_at;
    }
    public function getComfirmedAt(): ?string
    {
        return $this->confirmed_at;
    }

    public function setIdPickup(?int $id_pickup)
    {
        $this->id_pickup = $id_pickup;
    }

    public function getIdPickup(): ?int
    {
        return $this->id_pickup;
    }

    public static function get(int $id): object|false
    {
        $pdo = Database::connect();
        // Requête mysql pour sélectionner toutes les valeurs dans la table `categories`
        $sql = 'SELECT * FROM `users` WHERE `id_user` = :id_user';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_user', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_OBJ);
        if (!$result) {
            // Génération d'une exception renvoyant le message en paramètre au catch créé en amont et arrêt du traitement.
            throw new Exception('Erreur lors de la récupération de User');
        } else {
            // Retourne la data dans le cas contraire (tout s'est bien passé)
            return $result;
        }
    }

    public static function getAll(bool $order = false, bool $archive = false, bool $producer = false): array
    {
        $pdo = Database::connect();
        // Requête mysql pour sélectionner toutes les valeurs dans la table `categories`
        $sql = 'SELECT * FROM `users` WHERE 1 = 1';

        if ($producer === true) {
            $sql .= ' AND `producer` = 1';
        } else {
            $sql .= ' AND `producer` = 0';
        }

        if ($archive === true) {
            $sql .= ' AND `deleted_at` IS NOT NULL';
        } else {
            $sql .= ' AND `deleted_at` IS NULL';
        }
        if ($order === true) {
            $sql .= ' ORDER by `company_name`';
        } else {
            $sql .= ' ORDER by `lastname`';
        }

        $sth = $pdo->query($sql);
        // Retourne un tableau associatif de la table categories
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function insert(): bool
    {
        $pdo = Database::connect();
        $sql = 'INSERT INTO `users` (
            `firstname`,
            `lastname`,
            `email`,
            `password`,
            `producer`,
            `id_pickup`,
            `company_name`,
            `siret`,
            `description`,
            `company_picture`,
            `phone`,
            `address`,
            `zip`,
            `city`)
            VALUES (:firstname, :lastname, :email, :password, :producer, :id_pickup, :company_name, :siret, :description, :company_picture, :phone, :address, :zip, :city)';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':firstname', $this->getFirstname());
        $sth->bindValue(':lastname', $this->getLastname());
        $sth->bindValue(':email', $this->getEmail());
        $sth->bindValue(':password', $this->getPassword());
        $sth->bindValue(':producer', $this->getProducer());
        $sth->bindValue(':id_pickup', $this->getIdPickup(), PDO::PARAM_INT);
        $sth->bindValue(':company_name', $this->getCompanyName());
        $sth->bindValue(':siret', $this->getSiret(), PDO::PARAM_INT);
        $sth->bindValue(':description', $this->getDescription());
        $sth->bindValue(':company_picture', $this->getCompanyPicture());
        $sth->bindValue(':phone', $this->getPhone());
        $sth->bindValue(':address', $this->getAdress());
        $sth->bindValue(':zip', $this->getZip());
        $sth->bindValue(':city', $this->getCity());
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
        $sql = 'UPDATE `users`
                SET
                `firstname` = :firstname,
                `lastname` = :lastname,                
                `id_pickup` = :id_pickup
                WHERE `id_user` = :id_user';        
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':firstname', $this->getFirstname());
        $sth->bindValue(':lastname', $this->getLastname());
        $sth->bindValue(':id_pickup', $this->getIdPickup(), PDO::PARAM_INT);
        $sth->bindValue(':id_user', $this->getIdUser(), PDO::PARAM_INT);
        $sth->execute();
        if ($sth->rowCount() <= 0) {
            // Génération d'une exception renvoyant le message en paramètre au catch créé en amont et arrêt du traitement.
            throw new Exception('Erreur lors de la mise à jour');
        } else {
            // Retourne true dans le cas contraire (tout s'est bien passé)
            return true;
        }
    }

        public function updateProducer()
    {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Requête mysql pour insérer des données
        $sql = 'UPDATE `users`
                SET
                `firstname` = :firstname,
                `lastname` = :lastname,
                `company_name` = :company_name,
                `siret` = :siret,
                `description` = :description,
                `company_picture` = :company_picture,
                `phone` = :phone,
                `address` = :address,
                `zip` = :zip,
                `city` = :city
                WHERE `id_user` = :id_user';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':firstname', $this->getFirstname());
        $sth->bindValue(':lastname', $this->getLastname());
        $sth->bindValue(':company_name', $this->getCompanyName());
        $sth->bindValue(':siret', $this->getSiret(), PDO::PARAM_INT);
        $sth->bindValue(':description', $this->getDescription());
        $sth->bindValue(':company_picture', $this->getCompanyPicture());
        $sth->bindValue(':phone', $this->getPhone());        
        $sth->bindValue(':address', $this->getAdress());
        $sth->bindValue(':zip', $this->getZip());
        $sth->bindValue(':city', $this->getCity());
        $sth->bindValue(':id_user', $this->getIdUser(), PDO::PARAM_INT);
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
        $sql = 'UPDATE `users` SET `deleted_at` = NOW() WHERE `id_user` = :id_user';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_user', $id, PDO::PARAM_INT);
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
        $sql = 'UPDATE `users` SET `deleted_at` = null WHERE `id_user` = :id_user';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_user', $id, PDO::PARAM_INT);
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
        $sql = 'DELETE FROM `users` WHERE `id_user` = :id_user';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_user', $id, PDO::PARAM_INT);
        $sth->execute();
        if ($sth->rowCount() <= 0) {
            // Génération d'une exception renvoyant le message en paramètre au catch créé en amont et arrêt du traitement.
            throw new Exception('Erreur lors de la suppression');
        } else {
            return true;
        }
    }

    public static function isExist($email): bool
    {
        $pdo = Database::connect();
        $sql = 'SELECT COUNT(*) FROM `users` WHERE `email` = :email';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':email', $email);
        $sth->execute();
        // Récupérer le résultat de la requête (nombre de lignes correspondantes)
        $rowCount = $sth->fetchColumn();
        // Si le nombre de lignes correspondantes est supérieur à zéro, la valeur existe
        return $rowCount > 0;
    }

    public static function getByMail(string $email): object|false
    {
        $pdo = Database::connect();
        $sql = 'SELECT * FROM `users` WHERE `email` = :email';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':email', $email);
        $sth->execute();
        return $sth->fetch(PDO::FETCH_OBJ);
    }

    public static function getAllbyProducer(): array
    {
        $pdo = Database::connect();
        // Requête mysql pour sélectionner toutes les valeurs dans la table `categories`
        $sql = 'SELECT
                `users`.`id_user`,
                `users`.`company_name`,
                `users`.`firstname`,
                `users`.`lastname`,
                `users`.`description`,
                `users`.`company_picture`
                FROM `users`
                WHERE (`producer` = 1) AND `deleted_at` IS NULL';

        $sql .= ' ORDER by `company_name`';
        $sth = $pdo->query($sql);
        // Retourne un tableau associatif de la table categories
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public static function deletePicture(int $id): int | FALSE {
        $pdo = Database::connect();
        $product = self::get($id);
        $sql = 'UPDATE `users` SET `company_picture` = null WHERE `id_user` = :id_user';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_user', $id, PDO::PARAM_INT);
        $result = $sth->execute();
        if ($product) {
            $fileInfo = $product->picture;
            $filePath = '../../../public/uploads/producers/' . $fileInfo;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        return $result;
    }


    // public static function confirmMail(?string $email): bool
    // {
    //     $pdo = Database::connect();
    //     $sql = 'UPDATE `users` SET `confirmed_at` = null WHERE `email` = :email';
    //     $sth = $pdo->prepare($sql);
    //     $sth->bindValue(':email', $email);
    //     $sth->execute();
    //     if ($sth->rowCount() <= 0) {
    //         throw new Exception('Erreur lors de la confirmation');
    //     } else {
    //         return true;
    //     }
    // }

    public static function getUserPickup(int $id): object|false
    {
        $pdo = Database::connect();
        $sql = 'SELECT
                `pickups`.`pickup_name`,
                `users`.`id_pickup`
                FROM `users`
                INNER JOIN `pickups` ON `users`.`id_pickup` = `pickups`.`id_pickup`
                WHERE `id_user` = :id_user';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_user', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_OBJ);
        if (!$result) {
            throw new Exception('Erreur lors de la récupération du point de retrait');
        } else {
            return $result;
        }
    }
    


}
