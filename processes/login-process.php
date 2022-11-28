<?php
require_once ("../DAO/UserDAO.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$type = $dados["type"];
$email = $dados["email"];
$password = $dados["password"];

$response = ["msg" => "testando chegou"];

echo json_encode();