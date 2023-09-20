<?php
// arParams
//pre($arParams);
//pre($arResult);
?>
<div class="footer-accordion" data-footer-accordion>
    <div class="footer-accordion__heading" data-accordion-heading>
        <div class="footer-accordion__title"><?=$arParams["TITLE"] ?></div>
    </div>
    <div class="footer-accordion__body" data-accordion-body>
        <ul class="footer-accordion__list">
            <?php foreach ($arResult as $menu):?>
            <li class="footer-accordion__list-item">
                <a class="link footer-accordion__list-link link--color--monochrome-medium t-base t-base--size--small" href="<?= $menu["LINK"]?>">
                <span class="link__text"><?= $menu["TEXT"];?></span></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>