<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . "/shop_page/models/User.php");
require_once (realpath($_SERVER["DOCUMENT_ROOT"]) . "/shop_page/config/database.php");

class UserDAO implements UserInterface {

    private $conn;
    private $url;

    public function __construct(PDO $conn, $url)
    {
        $this->conn = $conn;
        $this->url = $url;
    }


    public function buildUser($data)
    {
        $user = new User();

        $user->setId($data["id_users"]);
        $user->setName($data["user_name"]);
        $user->setLastname($data["user_lastname"]);
        $user->setEmail($data["user_email"]);
        $user->setPassword($data["user_password"]);
        $user->setToken($data["user_token"]);

        return $user;
    }

    public function create(User $user, $authenticateUser = false)
    {
        $user_name = $user->getName();
        $user_lastname = $user->getLastname();
        $user_email = $user->getEmail();
        $user_password = $user->getPassword();
        $user_token = $user->getToken();

        $stmt = $this->conn->prepare("INSERT INTO users (user_name, user_lastname, user_email, user_password, user_token) VALUE (:user_name, :user_lastname, :user_email, :user_password, :user_token)");
        $stmt->bindParam(":user_name", $user_name);
        $stmt->bindParam(":user_lastname", $user_lastname);
        $stmt->bindParam(":user_email", $user_email);
        $stmt->bindParam(":user_password", $user_password);
        $stmt->bindParam(":user_token", $user_token);

        $stmt->execute();

        if($authenticateUser) {
            $this->setTokenToSession($user_token);
        }
    }

    public function update(User $user, $redirect = false)
    {
        $id = $user->getId();
        $user_name = $user->getName();
        $user_lastname = $user->getLastname();
        $user_email = $user->getEmail();
        $user_password = $user->getPassword();
        $user_token = $user->getToken();

        $stmt = $this->conn->prepare("UPDATE users SET 
                 user_name = :user_name, 
                 user_lastname = :user_lastname, 
                 user_email = :user_email, 
                 user_password = :user_password, 
                 user_token = :user_token 
                 WHERE id_users = :id_users");

        $stmt->bindParam(":user_name", $user_name);
        $stmt->bindParam(":user_lastname", $user_lastname);
        $stmt->bindParam(":user_email", $user_email);
        $stmt->bindParam(":user_password", $user_password);
        $stmt->bindParam(":user_token", $user_token);
        $stmt->bindParam(":id_users", $id);

        $stmt->execute();
    }

    public function verifyToken($protected = false)
    {
        if(!empty($_SESSION["token"])) {
            $token = $_SESSION["token"];

            $user = $this->findByToken($token);

            if(empty($user)) {
                return false;
            }
            return $user;
        }
    }

    public function setTokenToSession($token, $redirect = false)
    {
        $_SESSION["token"] = $token;
    }

    public function destroyToken()
    {
        $_SESSION["token"] = "";
    }

    public function findByToken($token)
    {
        if(empty($token)) {
            return false;
        }

        $stmt = $this->conn->prepare("SELECT * FROM users WHERE user_token = :user_token");
        $stmt->bindParam(":user_token", $token);
        $stmt->execute();

        if($stmt->rowCount() === 0) {
            return false;
        }

        $data = $stmt->fetch();
        return $this->buildUser($data);
    }

    public function changePassword(User $user)
    {
        // TODO: Implement changePassword() method.
    }

    public function findByEmail($email)
    {
        //Checar se o email está vazio
        if (empty($email)) {
            return false;
        }
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE user_email = :user_email");
        $stmt->bindParam(":user_email", $email);
        $stmt->execute();

        //Verifica se não houve retorno
        if($stmt->rowCount() == 0) {
            return false;
        }
        $data = $stmt->fetch();
        return $this->buildUser($data);

    }

    public function authenticateUser($email, $password)
    {
        $user = $this->findByEmail($email);
        // Verifica se o usuário não existe
        if(!$user){
            return false;
        }
        //Verifica se as senhas não batem
        if(!password_verify($password, $user->getPassword())) {
            return false;
        }

        $token = $user->generateToken();
        $user->setToken($token);
        $this->setTokenToSession($token, false);
        $this->update($user);

        return true;
    }
}