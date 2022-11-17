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

    public function getItem($id) : Item
    {
        $stm = $this->pdo->prepare( "SELECT * FROM items WHERE id = ?");
        $stm->execute([$id]);
        /** @var Item result */
        return $stm->fetchAll(PDO::FETCH_CLASS, Item::class)[0];
    }

    public function storeItem(Item $item){
        $sql = "INSERT INTO  items (brand, model, category, price, image, amount, description) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$item->brand, $item->model, $item->category, $item->price, $item->image, $item->amount, $item->description]);
    }

    public function removeItem($id)
    {
        $result = $this->getItem($id);
        if ($result->image) {
            unlink($result->image);
        }
        $sql = "DELETE FROM items WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    /**
     * @return User[]
     */

    public function getAllUsers() {
        $stm = $this->pdo->query( "SELECT * FROM users");
        return $stm->fetchAll(PDO::FETCH_CLASS, User::class);
    }

    public function getUser($id) : User
    {
        $stm = $this->pdo->prepare( "SELECT * FROM users WHERE id = ?");
        $stm->execute([$id]);
        return $stm->fetchAll(PDO::FETCH_CLASS, User::class)[0];
    }

    public function storeUser(User $user){
        if ($user->id) {
            $sql = "UPDATE users SET firstName = ?, secondName = ?, email = ?, password = ? WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$user->firstName, $user->secondName, $user->email, $user->password, $user->id]);
        } else {
            $sql = "INSERT INTO users (firstName, secondName, email, password) VALUES (?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$user->firstName, $user->secondName, $user->email, $user->password]);
        }
    }

    public function removeUser($id)
    {
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }
}