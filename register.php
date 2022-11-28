<?php require_once("templates/header.php"); ?>

<div id="main-container">
<div id="content-register">
    <form action="#" method="post" id="form-register">
        <input type="hidden" name="type" value="register">
        <div class="form-container">
            <label for="name" class="label-name">Nome:</label>
            <input type="text" name="name" id="name" class="input-name" placeholder="Insira seu nome...">
        </div>
        <div class="form-container">
            <label for="lastname" class="label-lastname">Sobrenome:</label>
            <input type="text" name="lastname" id="lastname" class="input-lastname" placeholder="Insira seu sobrenome...">
        </div>
        <div class="form-container">
            <label for="email" class="label-email">Email:</label>
            <input type="email" name="email" id="email" class="input-email" placeholder="Insira seu email...">
        </div>
        <div class="form-container">
            <label for="password" class="label-password-register">Senha:</label>
            <input type="password" name="password" id="password" class="input-password-register" placeholder="Insira sua senha...">
        </div>
        <div class="form-container">
            <label for="password-confirm" class="label-password-confirm">Confirme sua senha:</label>
            <input type="password" name="password-confirm" id="password-confirm" class="input-password-confirm" placeholder="Confirme sua senha...">
        </div>
        <button type="submit" class="btn-register">Cadastrar</button>
    </form>
</div>
</div>

<?php require_once ("templates/footer.php"); ?>
