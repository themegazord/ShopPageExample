<?php

if(empty($product->getImage())) {
    $product->setImage("produto_sem_imagem.jpg");
}


if(empty($product->getPrint())) {
    $product->setPrint("produto_sem_imagem.jpg");
}

?>


<div class="data-product">
    <div class="product-img-container">
        <div id="print">
            <img src="<?= $BASE_URL ?>src/img/products/<?= $product->getPrint() ?>" alt="estampa do produto" class="product-print hidden">
            <button id="quick-view" class="">Visualização rápida</button>
        </div>
            <img src="<?= $BASE_URL ?>src/img/products/<?= $product->getImage() ?>" alt="imagem do produto" class="product-img">
    </div>
    <div class="product-info">
        <span class="product-name"><?= $product->getName() ?></span>
        <div class="separator"></div>
        <span class="product-price">R$ <?= str_replace(".", ",", $product->getPrice()) ?></span>
    </div>
</div>