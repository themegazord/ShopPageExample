<?php

require_once ("../config/database.php");
require_once ("../config/globals.php");
require_once ("../VerificationClasses/Email.php");
require_once ("../models/User.php");
require_once ("../DAO/UserDAO.php");

$userDao = new UserDAO($conn, $BASE_URL);
$user = new User();


$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$type = $data["type"];
$name = $data["name"];
$lastname = $data["lastname"];
$email = $data["email"];
$password = $data["password"];
$password_confirm = $data["password-confirm"];

$validationEmail = new Email($email);

//Verifica se algum campo está vazio
if(empty($type) || empty($name) || empty($lastname) || empty($email) || empty($password) || empty($password_confirm)) {
    $msg = ["error" => true, "msg" => "Alguns campos não foram preenchidos"];
    echo json_encode($msg);
    return;
}

//Verifica se a senha e a confirmação são iguais
if($password !== $password_confirm) {
    $msg = ["error" => true, "msg" => "A senha e a confirmação de senha devem ser iguais"];
    echo json_encode($msg);
    return;
}

//Verifica se o email não é valido
if(!$validationEmail->validateEmail()) {
    $msg = ["error" => true, "msg" => "E-mail não foi validado com sucesso, por favor, verifique seu e-mail e tente novamente."];
    echo json_encode($msg);
    return;
}

//Verifica se já existe o email cadastrado
if($userDao->findByEmail($email)) {
    $msg = ["error"=>true, "msg" => "E-mail já vinculado a outra conta, por favor, faça seu login"];
    echo json_encode($msg);
    return;
}


$generatedToken = $user->generateToken();
$passwordHash = $user->generatePassword($password);

$user->setName($name);
$user->setLastname($lastname);
$user->setEmail($email);
$user->setPassword($passwordHash);
$user->setToken($generatedToken);

$userDao->create($user, true);

$msg = ["error"=>false, "msg"=>"Usuário criado com sucesso"];
echo json_encode($msg);