<?php
require_once __DIR__ . '/../helpers/Database.php';

class OrderLine
{
    private ?int $id_order_line;
    private ?string $line_name;
    private ?float $line_price;
    private ?int $quantity;
    private ?int $id_order;

    public function __construct(
        ?int $id_order_line = null,
        ?string $line_name = null,
        ?float $line_price = null,
        ?int $quantity = null,
        ?int $id_order = null
    ) {
        $this->setIdOrderLine($id_order_line);
        $this->setLineName($line_name);
        $this->setLinePrice($line_price);
        $this->setQuantity($quantity);
        $this->setIdOrder($id_order);
    }

    // Methods SET GET
    public function setIdOrderLine(?int $id_order_line)
    {
        $this->id_order_line = $id_order_line;
    }

    public function getIdOrderLine(): ?int
    {
        return $this->id_order_line;
    }

    public function setLineName(?string $line_name)
    {
        $this->line_name = $line_name;
    }

    public function getLineName(): ?string
    {
        return $this->line_name;
    }

    public function setLinePrice(?float $line_price)
    {
        $this->line_price = $line_price;
    }

    public function getLinePrice(): ?float
    {
        return $this->line_price;
    }

    public function setQuantity(?int $quantity)
    {
        $this->quantity = $quantity;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setIdOrder(?int $id_order)
    {
        $this->id_order = $id_order;
    }

    public function getIdOrder(): ?int
    {
        return $this->id_order;
    }

    public function insert(): bool
    {
        $pdo = Database::connect();
        $sql = 'INSERT INTO `orders_line` (
            `line_name`,
            `line_price`,
            `quantity`,
            `id_order`
        ) VALUES (
            :line_name,
            :line_price,
            :quantity,
            :id_order
        )';
        
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':line_name', $this->getLineName());
        $sth->bindValue(':line_price', $this->getLinePrice());
        $sth->bindValue(':quantity', $this->getQuantity(), PDO::PARAM_INT);
        $sth->bindValue(':id_order', $this->getIdOrder(), PDO::PARAM_INT);
        
        $sth->execute();
        if ($sth->rowCount() <= 0) {
            throw new Exception('Erreur lors de l\'enregistrement');
        } else {
            return true;
        }
    }

}
?>
