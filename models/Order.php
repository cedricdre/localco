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
        $sql = 'INSERT INTO `orders` (
            `status`,
            `withdrawDate`,
            `id_user`,
            `id_pickup`
        ) VALUES (
            :status,
            :withdrawDate,
            :created_at,
            :id_user,
            :id_pickup
        )';
        
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':status', $this->getStatus());
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


}
