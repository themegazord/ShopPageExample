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
    <div id="main-content-admin">
        <div id="aside-admin">
            Menu
            <ul id="aside-menu">
                <li id="menu-cadpro">Cadastro de produtos</li>
                <li id="menu-listpro">Listagem de produtos</li>
                <li id="menu-listven">Vendas realizadas</li>
            </ul>
        </div>
        <div id="main-admin">
            <div id="cadpro" class="hidden">
                <div class="content-cadpro">
                    <h1 class="title-admin">Cadastro de produtos</h1>
                    <form action="#" method="post" enctype="multipart/form-data" id="form-cadpro">
                        <input type="hidden" name="type" value="create">
                        <div class="left-side">
                            <div class="form-container">
                                <label for="name" class="label-product-name">Nome do Produto:</label>
                                <input name="name" id="name" type="text" class="input-product-name" required>
                            </div>
                            <div class="form-container price">
                                <label for="price" class="label-product-price">Preço do Produto:</label>
                                <input name="price" id="price" type="number" class="input-product-price" required step=".01" min="0">
                            </div>
                            <div class="form-container">
                                <label for="img" class="label-product-img">Imagem do Produto:</label>
                                <input name="img" id="img" type="file" class="input-product-img">
                            </div>
                            <div class="form-container">
                                <label for="print-img" class="label-product-print-img">Estampa do Produto:</label>
                                <input name="print-img" id="print-img" type="file" class="input-product-print-img">
                            </div>
                            <button type="submit" class="btn-cadpro">Cadastrar</button>
                        </div>
                        <div class="right-side">
                            <div class="form-container best-seller-status">
                                <div class="best-seller">
                                    <input type="checkbox" name="best-seller" id="best_seller">
                                    <label for="best_seller" class="label-product-best-seller">Mais vendido? </label>
                                </div>
                                <div class="status">
                                    <input type="checkbox" name="status" id="active">
                                    <label for="active" class="label-product-active" >Inativo? </label>
                                </div>
                            </div>
                            <div class="form-container">
                                <label for="bio" class="label-product-bio">Descrição do Produto:</label>
                                <textarea name="bio" id="bio" cols="40" rows="5" class="input-product-bio"></textarea>
                            </div>
                            <div class="form-container stock">
                                <label for="stock" class="label-product-stock">Estoque do Produto:</label>
                                <input name="stock" id="stock" type="number" class="input-product-stock">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="listpro" class="hidden">
                <h1 class="title-admin">Listagem dos produtos</h1>
            </div>
            <div id="listven" class="hidden">
                <h1 class="title-admin">Listagem das vendas</h1>
            </div>
        </div>
    </div>
</div>


<?php require_once ("templates/footer.php"); ?>
