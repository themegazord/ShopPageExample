<?php require_once("templates/header.php");
require_once("DAO/ProductDAO.php");
$productDao = new ProductDAO($conn, $BASE_URL);

$allProducts = $productDao->getAllProduct();

?>
    <div id="main-container">
        <?php if (count($allProducts) > 0): ?>
            <ul id="products-list">
                <?php foreach ($allProducts as $product): ?>
                    <?php if ($product->getActive() !== "N"): ?>
                        <li class="product">
                            <?php require("templates/card-product.php") ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>

        <?php endif; ?>
    </div>
    <div class="separator-main"></div>
    <div class="others-informations-main">
        <div class="other-information">
            <i class="fa-solid fa-truck-fast"></i>
            <div class="desc-other-information">
                <span class="desc-title-other-info">Frete Grátis</span>
                <span class="sub-desc-other-info">Confira Condições</span>
            </div>
        </div>
        <div class="other-information">
            <i class="fa-solid fa-map-location-dot"></i>
            <div class="desc-other-information">
                <span class="desc-title-other-info">Enviamos</span>
                <span class="sub-desc-other-info">para todo Brasil</span>
            </div>
        </div>
        <div class="other-information">
            <i class="fa-solid fa-credit-card"></i>
            <div class="desc-other-information">
                <span class="desc-title-other-info">Até 12x sem juros</span>
                <span class="sub-desc-other-info">10% Off no Boleto</span>
            </div>
        </div>
        <div class="other-information">
            <i class="fa-solid fa-lock"></i>
            <div class="desc-other-information">
                <span class="desc-title-other-info">100% Seguro</span>
                <span class="sub-desc-other-info">Certificado SSL</span>
            </div>
        </div>
    </div>

    <div id="about-section">
        <h2 class="title-about">Sobre</h2>
        <span class="about">A Tuti foi criada em 2010 com o intuito de ajudar o planeta criando sacolas retornáveis com diversas estampas. Sacolas estas que fazemos com muito amor e carinho e disponibilizamos com o valor mais acessivel do mercado.</span>
    </div>

    <div id="sub-footer">
        <div id="sub-footer-shop">
            <span class="span-shop">Loja</span>
            <ul id="sub-footer-shop-links">
                <li class="sub-footer-shop-link"><a href="#">Sobre</a></li>
                <li class="sub-footer-shop-link"><a href="#">FAQ</a></li>
                <li class="sub-footer-shop-link"><a href="#">Contato</a></li>
                <li class="sub-footer-shop-link"><a href="#">Envio e Devoluções</a></li>
                <li class="sub-footer-shop-link"><a href="#">Politica da Loja</a></li>
                <li class="sub-footer-shop-link"><a href="#">Metodos de Pagamento</a></li>
            </ul>
        </div>
        <div id="sub-footer-security">
            <span class="span-security">Segurança</span>
            <div class="security-env">
                <i class="fa-solid fa-shield-halved"></i>
                <span>Ambiente 100% Seguro. Sua informação é Protegida Pela Criptografia SSL 256-Bit.</span>
            </div>
            <div class="sub-footer-payments-methods">
                <span>Métodos de pagamento aceitos</span>
                <img src="https://i.ibb.co/hfhymqd/payments.png" alt="payments">
            </div>
        </div>
        <div id="sub-footer-send-email">
            <span>Junte-se à lista de emails e não perca as novidades</span>

            <form action="#" method="post" class="send-email">
                <input type="hidden" name="type" value="list-email">
                <label for="email" id="list-email-label">Insira o seu email aqui*</label>
                <input type="email" name="email" id="email" class="list-email-input">
                <button type="submit" id="list-email-btn">Assine Já</button>
            </form>
        </div>
    </div>
<?php require_once("templates/footer.php") ?>