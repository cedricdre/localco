<?php
require_once __DIR__ . '/../helpers/Database.php';

class Type
{
    private ?int $id_type;
    private string $type_name;

    public function __construct(string $type_name = '', ?int $id_type = null)
    {
        $this->setTypeName($type_name);
        $this->setIdType($id_type);
    }

    // Methods SET GET
    public function setIdType(?int $id_type)
    {
        $this->id_type = $id_type;
    }

    public function getIdType(): ?int
    {
        return $this->id_type;
    }

    public function setTypeName(string $type_name)
    {
        $this->type_name = $type_name;
    }

    public function getTypeName(): string
    {
        return $this->type_name;
    }

    public static function get(int $id): object|false
    {
        $pdo = Database::connect();
        // Requête mysql pour sélectionner toutes les valeurs dans la table `categories`
        $sql = 'SELECT * FROM `types` WHERE `id_type` = :id_type';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_type', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_OBJ);
        if (!$result) {
            // Génération d'une exception renvoyant le message en paramètre au catch créé en amont et arrêt du traitement.
            throw new Exception('Erreur lors de la récupération du Type');
        } else {
            // Retourne la data dans le cas contraire (tout s'est bien passé)
            return $result;
        }
    }

    public static function getAll(): array
    {
        $pdo = Database::connect();
        // Requête mysql pour sélectionner toutes les valeurs dans la table `categories`
        $sql = 'SELECT * FROM `types` ORDER by `type_name`';
        $sth = $pdo->query($sql);
        // Retourne un tableau associatif de la table categories
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function insert(): bool
    {
        $pdo = Database::connect();
        $sql = 'INSERT INTO `types` (`type_name`) VALUES (:type_name)';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':type_name', $this->getTypeName());
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
        $sql = 'UPDATE `types` SET `type_name` = :type_name WHERE `id_type` = :id_type';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':type_name', $this->getTypeName());
        $sth->bindValue(':id_type', $this->getIdType(), PDO::PARAM_INT);
        $sth->execute();
        if ($sth->rowCount() <= 0) {
            // Génération d'une exception renvoyant le message en paramètre au catch créé en amont et arrêt du traitement.
            throw new Exception('Erreur lors de la mise à jour');
        } else {
            // Retourne true dans le cas contraire (tout s'est bien passé)
            return true;
        }
    }

    public static function delete($id): bool
    {
        $pdo = Database::connect();
        $sql = 'DELETE FROM `types` WHERE `id_type` = :id_type';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_type', $id, PDO::PARAM_INT);
        $sth->execute();
        if ($sth->rowCount() <= 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function isExist($type_name): bool
    {
        $pdo = Database::connect();
        $sql = 'SELECT COUNT(*) FROM `types` WHERE `type_name` = :type_name';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':type_name', $type_name);
        $sth->execute();
        // Récupérer le résultat de la requête (nombre de lignes correspondantes)
        $rowCount = $sth->fetchColumn();
        // Si le nombre de lignes correspondantes est supérieur à zéro, la valeur existe
        return $rowCount > 0;
    }
}
