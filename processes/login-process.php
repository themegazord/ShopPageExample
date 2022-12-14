<?php
require_once ("../DAO/UserDAO.php");
require_once ("../config/database.php");
require_once ("../config/globals.php");
require_once ("../VerificationClasses/Email.php");
$userDao = new UserDAO($conn, $BASE_URL);

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$type = $data["type"];
$email = $data["email"];
$password = $data["password"];

if($type === "login") {
    $validateEmail = new Email($email);
    if(!$validateEmail->isValid()) {
        $response = ["error" => true, "msg" => "Email não é valido, tente outro"];
        echo json_encode($response);
        return;
    }

    if(!$userDao->findByEmail($email)) {
        $response = ["error" => true, "msg" => "Email não cadastrado no sistema, por favor cadastre-se."];
        echo json_encode($response);
        return;
    }

    if(!$userDao->authenticateUser($email, $password)) {
        $response = ["error" => true, "msg" => "Email e senha inválidos"];
        echo json_encode($response);
        return;
    }

    if($userDao->authenticateUser($email, $password)) {
        $response = ["error" => false, "msg" => "Usuário logado com sucesso"];
        echo json_encode($response);
        return;
    }
}

if($type === "logoff") {
    $userDao->destroyToken();
    $response = ["error" => false, "msg" => "Usuário deslogado com sucesso"];
}

