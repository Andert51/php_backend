<?php
 require_once 'app/interfaces/userInterface.php';
 require_once 'config/database.php';

 class userRepository implements userInterface {
    private $db;

    public function __construct() {
        $config = require 'config/database.php';
        $this->db = new PDO(
            "mysql:host={$config['host']};dbname={$config['database']}",
            $config['username'],
            $config['password']
        );
    }


 public function create(User $user) {
    $insert = $this->db->prepare("INSERT INTO users(name, apasurn, amasurn, direction, phone, city, user, password, rol ) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
    return $insert->execute([
        $user->name,
        $user->apasurn,
        $user->amasurn,
        $user->direction,
        $user->phone,
        $user->city,
        $user->user,
        $user->password,
        $user->rol
    ]);
 }

}
?>