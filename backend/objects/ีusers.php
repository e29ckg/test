<?php

class User {
    private $conn;
    private $table_name = "users";

    public $id;
    public $username;
    public $password;
    public $created;

    public function __construct($db) {
        $this->conn = $db;
    }

    // ฟังก์ชันสำหรับตรวจสอบความถูกต้องของ Token
    function validateToken($jwt) {
        // Include authentication token
        include_once '../auth/authentication.php';

        // Validate token
        $auth = new Authentication();
        $decoded = $auth->validateToken($jwt);

        // Check if token is valid
        if ($decoded) {
            // If token is valid, check user's permission
            $user_id = $decoded->data->id;

            // Query to get user's data
            $query = "SELECT id, username, created FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $user_id);
            $stmt->execute();
            $num = $stmt->rowCount();

            // Check if user exists
            if ($num > 0) {
                // Fetch user data
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                // Assign fetched data to object properties
                $this->id = $row['id'];
                $this->username = $row['username'];
                $this->created = $row['created'];

                return true; // Return true if user exists and token is valid
            } else {
                return false; // Return false if user does not exist
            }
        } else {
            return false; // Return false if token is invalid
        }
    }
}

?>
