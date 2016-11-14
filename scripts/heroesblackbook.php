<?php
class heroesdatabase {
    public function __construct () {
        $dsn = 'mysql:host=localhost;port=3306;dbname=heroesblackbook';
        $this->db = new PDO($dsn, 'root', 'root');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
  
    public function createaccount($username, $password) {
        $query = $this->db->prepare("
          INSERT INTO users (username, password)
          VALUES (:id, :password)");
        $query->execute([':id' => $username, ':password' => $password]);
    }
}

?>