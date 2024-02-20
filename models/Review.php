<?php
require_once __DIR__ . '/../helpers/Database.php';

class Review
{
    private ?int $id_review;
    private ?string $created_at;
    private ?string $comment;
    private ?int $rating;
    private ?int $id_user;
    private ?int $id_product;

    public function __construct(?string $comment = null, ?int $rating = null, ?int $id_user = null, ?int $id_product = null, ?string $created_at = null, ?int $id_review = null)
    {
        $this->setComment($comment);
        $this->setRating($rating);
        $this->setIdUser($id_user);
        $this->setIdProduct($id_product);
        $this->setCreatedAt($created_at);
        $this->setIdReview($id_review);
    }

    // Methods SET GET
    public function setIdReview(?int $id_review)
    {
        $this->id_review = $id_review;
    }

    public function getIdReview(): ?int
    {
        return $this->id_review;
    }

    public function setCreatedAt(?string $created_at)
    {
        $this->created_at = $created_at;
    }

    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    public function setComment(?string $comment)
    {
        $this->comment = $comment;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setRating(?int $rating)
    {
        $this->rating = $rating;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

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

    public function insert(): bool
    {
        $pdo = Database::connect();
        $sql = 'INSERT INTO `reviews` (`comment`, `rating`, `id_user`, `id_product`) VALUES (:comment, :rating, :id_user, :id_product)';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':comment', $this->getComment());
        $sth->bindValue(':rating', $this->getRating());
        $sth->bindValue(':id_user', $this->getIdUser());
        $sth->bindValue(':id_product', $this->getIdProduct());
        $sth->execute();

        if ($sth->rowCount() <= 0) {
            throw new Exception('Erreur lors de l\'enregistrement');
        } else {
            return true;
        }
    }

    public static function getAllByProduct(int $idProduct): array
    {
        $pdo = Database::connect();
        // Requête mysql pour sélectionner toutes les valeurs dans la table `categories`
        $sql = 'SELECT
                `reviews`.`comment`,
                `reviews`.`rating`,
                `users`.`firstname`,
                `products`.`id_product`
                FROM `reviews`
                INNER JOIN `users` ON `reviews`.`id_user` = `users`.`id_user`
                INNER JOIN `products` ON `reviews`.`id_product` = `products`.`id_product`
                WHERE `reviews`.`id_product` = :id_product
                ORDER BY `reviews`.`id_review` DESC;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_product', $idProduct, PDO::PARAM_INT);
        $sth->execute();
        // Retourne un tableau associatif de la table categories
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public static function getbyAverageRating(int $idProduct): array
    {
        $pdo = Database::connect();
        // Requête mysql pour sélectionner toutes les valeurs dans la table `categories`
        $sql = 'SELECT `id_product`, AVG(rating) AS average_rating
                FROM `reviews`
                WHERE `id_product` = :id_product
                GROUP BY `id_product`;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_product', $idProduct, PDO::PARAM_INT);
        $sth->execute();
        // Retourne un tableau associatif de la table categories
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}
?>
