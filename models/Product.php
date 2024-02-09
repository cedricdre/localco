<?php
require_once __DIR__ . '/../helpers/Database.php';

class Product
{
    private ?int $id_product;
    private string $product_name;
    private string $description;
    private int $bio_production;
    private ?string $certification;
    private float $weight;
    private string $weight_unit;
    private ?string $product_price;
    private ?string $product_tva;
    private ?string $picture;
    private int $online;
    private ?string $created_at;
    private ?string $updated_at;
    private ?string $deleted_at;
    private ?string $valid_at;
    private ?int $id_user;
    private ?int $id_type;

    // __Constructeur
    public function __construct(
        string $product_name = '',
        string $description = '',
        int $bio_production = 0,
        float $weight = 0,
        string $weight_unit = '',
        ?string $product_price = '',
        ?string $product_tva = '',
        ?string $picture = null,
        int $online = 0,
        ?string $created_at = null,
        ?string $updated_at = null,
        ?string $deleted_at = null,
        ?string $valid_at = null,
        ?int $id_product = null,
        ?int $id_user = null,
        ?int $id_type = null
    ) {
        $this->setProductName($product_name);
        $this->setDescription($description);
        $this->setBioProduction($bio_production);
        $this->setWeight($weight);
        $this->setWeightUnit($weight_unit);
        $this->setProductPrice($product_price);
        $this->setProductTva($product_tva);
        $this->setPicture($picture);
        $this->setOnline($online);
        $this->setCreatedAt($created_at);
        $this->setUpdatedAt($updated_at);
        $this->setDeletedAt($deleted_at);
        $this->setValidAt($valid_at);
        $this->setIdProduct($id_product);
        $this->setIdUser($id_user);
        $this->setIdType($id_type);
    }

    // Methods SET GET
    // id_product
    public function setIdProduct(?int $id_product)
    {
        $this->id_product = $id_product;
    }

    public function getIdProduct(): ?int
    {
        return $this->id_product;
    }

    // product_name
    public function setProductName(string $product_name)
    {
        $this->product_name = $product_name;
    }

    public function getProductName(): string
    {
        return $this->product_name;
    }

    // description
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    // bio_production
    public function setBioProduction(int $bio_production)
    {
        $this->bio_production = $bio_production;
    }

    public function getBioProduction(): int
    {
        return $this->bio_production;
    }

    // certification
    public function setCertification(?string $certification)
    {
        $this->certification = $certification;
    }

    public function getCertification(): ?string
    {
        return $this->certification;
    }

    // weight
    public function setWeight(float $weight)
    {
        $this->weight = $weight;
    }

    public function getWeight(): float
    {
        return $this->weight;
    }

    // weight_unit
    public function setWeightUnit(string $weight_unit)
    {
        $this->weight_unit = $weight_unit;
    }

    public function getWeightUnit(): string
    {
        return $this->weight_unit;
    }

    // product_price
    public function setProductPrice(?string $product_price)
    {
        $this->product_price = $product_price;
    }

    public function getProductPrice(): ?string
    {
        return $this->product_price;
    }

    // product_tva
    public function setProductTva(?string $product_tva)
    {
        $this->product_tva = $product_tva;
    }

    public function getProductTva(): ?string
    {
        return $this->product_tva;
    }

    // picture
    public function setPicture(?string $picture)
    {
        $this->picture = $picture;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    // online
    public function setOnline(int $online)
    {
        $this->online = $online;
    }

    public function getOnline(): int
    {
        return $this->online;
    }

    // created_at
    public function setCreatedAt(?string $created_at)
    {
        $this->created_at = $created_at;
    }

    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    // updated_at
    public function setUpdatedAt(?string $updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updated_at;
    }

    // deleted_at
    public function setDeletedAt(?string $deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }

    public function getDeletedAt(): ?string
    {
        return $this->deleted_at;
    }

    // valid_at
    public function setValidAt(?string $valid_at)
    {
        $this->valid_at = $valid_at;
    }

    public function getValidAt(): ?string
    {
        return $this->valid_at;
    }

    // id_user
    public function setIdUser(?int $id_user)
    {
        $this->id_user = $id_user;
    }

    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    // id_type
    public function setIdType(?int $id_type)
    {
        $this->id_type = $id_type;
    }

    public function getIdType(): ?int
    {
        return $this->id_type;
    }

    public function insert(): bool
    {
    $pdo = Database::connect();
    $sql = 'INSERT INTO `products` (
        `product_name`,
        `description`,
        `bio_production`,
        `certification`,
        `weight`,
        `weight_unit`,
        `product_price`,
        `product_tva`,
        `picture`,
        `online`,
        `id_user`,
        `id_type`)
        VALUES (
        :product_name,
        :description,
        :bio_production,
        :certification,
        :weight,
        :weight_unit,
        :product_price,
        :product_tva,
        :picture,
        :online,
        :id_user,
        :id_type
    )';
    $sth = $pdo->prepare($sql);
    $sth->bindValue(':product_name', $this->getProductName());
    $sth->bindValue(':description', $this->getDescription());
    $sth->bindValue(':bio_production', $this->getBioProduction(), PDO::PARAM_INT);
    $sth->bindValue(':certification', $this->getCertification());
    $sth->bindValue(':weight', $this->getWeight());
    $sth->bindValue(':weight_unit', $this->getWeightUnit());
    $sth->bindValue(':product_price', $this->getProductPrice());
    $sth->bindValue(':product_tva', $this->getProductTva());
    $sth->bindValue(':picture', $this->getPicture());
    $sth->bindValue(':online', $this->getOnline(), PDO::PARAM_INT);
    $sth->bindValue(':id_user', $this->getIdUser(), PDO::PARAM_INT);
    $sth->bindValue(':id_type', $this->getIdType(), PDO::PARAM_INT);
    $sth->execute();
    // Appel à la méthode rowCount permettant de savoir combien d'enregistrements ont été affectés
    if ($sth->rowCount() <= 0) {
        // Génération d'une exception renvoyant le message en paramètre au catch créé en amont et arrêt du traitement.
        throw new Exception('Erreur lors de l\'enregistrement');
    } else {
        return true;
    }
    
    }

    public static function getAll(bool $order = false, bool $archive = false): array
    {
        $pdo = Database::connect();
        // Requête mysql pour sélectionner toutes les valeurs dans la table `categories`
        $sql = 'SELECT * FROM `products` WHERE 1 = 1';

        if ($archive === true) {
            $sql .= ' AND `deleted_at` IS NOT NULL';
        } else {
            $sql .= ' AND `deleted_at` IS NULL';
        }
        // if ($order === true) {
        //     $sql .= ' ORDER by `company_name`';
        // } else {
        //     $sql .= ' ORDER by `lastname`';
        // }
        $sth = $pdo->query($sql);
        // Retourne un tableau associatif de la table categories
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }


}




