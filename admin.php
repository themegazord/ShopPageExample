<?php
    require_once ("templates/header.php");

    $userDao = new UserDAO($conn, $BASE_URL);

    $token = $_SESSION["token"];
    if(empty($token)) {
        header("Location:" . $BASE_URL); // Manda para a ultima url acessada
    }
    $user = $userDao->findByToken($token);
    if($user->getIsAdmin() !== "S") {
        header("Location:" . $BASE_URL); // Manda para a ultima url acessada
    }
?>


<div id="main-container">
    <h1>Area de admin</h1>
</div>


<?php require_once ("templates/footer.php"); ?>
