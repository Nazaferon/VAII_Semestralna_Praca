<?php

class DB
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=selling', 'root', 'dtb456');
    }

    /**
     * @return Item[]
     */

    public function getAllItems() {
        $stm = $this->pdo->query( "SELECT * FROM items");
        return $stm->fetchAll(PDO::FETCH_CLASS, Item::class);
    }

    public function storeItem(Item $item){
        $sql = "INSERT INTO  items (title, category, price, amount, iamge) VALUES (?,?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$item->title, $item->category, $item->price, $item->amount, $item->image]);
    }
}