<?php

?>

<tr>
    <td class="line-product"><?= $product->getId() ?></td>
    <td class="line-product"><?= $product->getName() ?></td>
    <td class="line-product"><?= $product->getPrice() ?></td>
    <td class="line-product"><?= $product->getStock() ?></td>
    <td class="actions">
        <form action="#" method="post">
            <input type="hidden" name="id" value="<?= $product->getId() ?>">
            <button type="submit" class="btn-listpro-edit"><i class="fa-solid fa-pen-to-square"></i> Editar</button>
        </form>
    </td>
</tr>