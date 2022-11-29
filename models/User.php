<?php


class User
{
    private $id;
    private $name;
    private $lastname;
    private $email;
    private $password;
    private $token;
    private $is_admin;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getIsAdmin() {
        return $this->is_admin;
    }

    public function setIsAdmin($is_admin) {
        $this->is_admin = $is_admin;
    }

    public function generateToken() {
        return bin2hex(random_bytes(50));
    }

    public function generatePassword($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}

interface UserInterface {
    public function buildUser($data);
    public function create(User $user, $authenticateUser = false);
    public function update(User $user, $redirect = false);
    public function verifyToken($protected = false);
    public function setTokenToSession($token, $redirect = false);
    public function destroyToken();
    public function findByToken($token);
    public function changePassword(User $user);
    public function findByEmail($email);
    public function authenticateUser($email, $password);
}