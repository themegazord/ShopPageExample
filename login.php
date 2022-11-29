<?php require_once("templates/header.php") ?>

<div id="main-container">
    <div id="content-login">
        <form action="<?= $BASE_URL ?>processes/login-process.php" method="post" id="form-login">
            <div class="email-login">
                <input type="hidden" name="type" value="login">
                <label for="email" class="label-login">Insira seu email:</label>
                <input type="email" name="email" id="email" class="input-login" placeholder="Insira aqui seu email...">
            </div>
            <div class="password-login">
                <label for="password" class="label-password">Insira sua senha:</label>
                <input type="password" name="password" id="password" class="input-password" placeholder="Insira sua senha...">
            </div>
            <button type="submit" class="login-button">Entrar</button>
            <div class="footer-login">
                <span class="register">Não tem uma conta? <a href="<?= $BASE_URL ?>register.php">Registre-se</a></span>
                <span class="forget-password">Esqueceu a senha? <a href="#">Clique aqui.</a></span>
            </div>
        </form>
    </div>
</div>

<?php require_once("templates/footer.php") ?>
