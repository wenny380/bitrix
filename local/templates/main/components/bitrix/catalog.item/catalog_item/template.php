<?php
//pre($arResult["ITEM"]);
//echo $arResult["ITEM"]["PROPERTIES"]["NEW"]["VALUE"];
//echo (count($arResult["ITEM"]));
use App\Image\Resize;


foreach ($arResult["ITEM"] as $element):
    $link = CFile::GetPath($element["DETAIL_PICTURE"]["ID"]);
    //echo "This is the link: ".$link;
    //echo "<br>";
    if(empty($link))
    {
        $link = "/upload/no-image-icon.png";
        $fileName = "no-image-icon.png";
    }
    else
        $fileName = $element["DETAIL_PICTURE"]["FILE_NAME"];

    #echo $link;
    $fileName = explode(".",$fileName);
    //pre($fileName);
    $link = $_SERVER["DOCUMENT_ROOT"].$link;
    $imgOb = new Resize($link);
    $img = $imgOb->RenderSize(110, 110, $fileName);

?>
<div class="products-grid__col">
    <div class="products-grid__item">
        <div class="product-card products-grid__card is-active is-inited" data-product="222222">
            <div class="product-card__wrapper">
                <div class="product-card__labels">
                    <div class="labels">
                        <?if($element["PROPERTIES"]["PROMOTION"]["VALUE"]=="Да"):?>
                        <div class="labels__label labels__label--color--blue">
                            <div class="labels__text">эксклюзив</div>
                        </div>
                        <?endif;?>
                        <?if($element["PROPERTIES"]["NEW"]["VALUE"]=="Да"):?>
                        <div class="labels__label labels__label--color--green">
                            <div class="labels__text">new</div>
                        </div>
                        <?endif;?>
                        <?if($element["PROPERTIES"]["BESTSELLER"]["VALUE"]=="Да"):?>
                        <div class="labels__label labels__label--color--orange">
                            <div class="labels__text">хит</div>
                        </div>
                        <?endif;?>
                    </div>
                </div>
                <div class="product-card__favorite"><a class="product-card__favorite-btn" href="./static/fakedata/addToCart.json" data-add-to-wish="222222">
                        <svg class="icon icon--heart-filled">
                            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#heart-filled-usage"></use>
                        </svg></a></div>
                <div class="product-card__img"><a class="product-card__img-wrapper" href="#">
                        <div class="product-card__img-container"><img class="img-responsive lazy loaded" src="<?=$img["s"];?>" alt="" data-src="<?=$img["s"];?>" data-srcset="<?=$img["l"];?>" srcset="<?=$img["l"];?>" data-ll-status="loaded"></div></a>
                    <div class="product-card__quick-view"><a class="button button--color--transparent" href="./modals/fastview.html" data-fast-view=""><span class="button__wrapper"><span class="button__text">Быстрый просмотр</span></span></a>
                    </div>
                </div>
                <div class="product-card__body">
                    <div class="product-card__prices">
                        <div class="product-card__discount">
                            <?if(!empty($element["PROPERTIES"]["OLDPRICE"]["VALUE"])):?>
                            <div class="product-card__old-price"><?=$element["PROPERTIES"]["OLDPRICE"]["VALUE"];?> <span class="rouble-sign">₽</span></div>
                            <div class="labels">
                                <div class="labels__label labels__label--color--red">
                                    <div class="labels__text"><?=$element["PROPERTIES"]["DISCOUNT_PERCENTAGE"]["VALUE"];?>%</div>
                                </div>
                            </div>
                            <?else:?>
                            <div class="t-base t-base--size--xsmall t-base--color--red-main">Скидки нет</div>
                            <?endif;?>
                        </div>
                        <div class="product-card__price">
                            <div class="product-card__price-value"><?=$element["PRICES"]["BASE"]["VALUE"];?> <span class="rouble-sign">₽</span></div>
                        </div>
                    </div>
                    <div class="product-card__info">
                        <div class="product-card__article">
                            <div class="product-card__article-value"><?=$element["PROPERTIES"]["ARTICLE"]["VALUE"];?></div>
                        </div>
                        <div class="product-card__name"><a class="link link--color--black t-base t-base--size--small" href="#"><span class="link__text"><?=$element["NAME"];?>.</span></a>
                        </div>
                        <div class="product-card__vendor"><a class="link link--color--monochrome-medium t-base t-base--size--small" href="#"><span class="link__text"><?=$element["PROPERTIES"]["BRAND"]["VALUE"];?>, <?=$element["PROPERTIES"]["COUNTRY"]["VALUE"];?></span></a>
                        </div>
                    </div>
                    <div class="product-card__cart">
                        <div class="add-to-cart is-active" data-add-to-cart="222222">
                            <div class="add-to-cart__count-control">
                                <div class="count-control" data-count-control="" data-count-control-inited="true">
                                    <div class="count-control__info is-active" data-count-control-info="">кратно 2</div>
                                    <div class="count-control__btn count-control__btn--dec" data-count-control-control="dec"></div>
                                    <input class="count-control__input" type="text" value="2" data-max="10" data-count-control-input="" data-count-control-step="2" inputmode="text">
                                    <div class="count-control__btn count-control__btn--inc" data-count-control-control="inc"></div><a class="link link--display--inline count-control__cart-info is-active" href="#" target="_blank" data-count-control-cart-info=""><span class="link__text">в корзине 6</span></a>
                                </div>
                            </div>
                            <div class="add-to-cart__button"><a class="button" href="./static/fakedata/addToCart.json" data-add-to-cart-btn=""><span class="button__wrapper">
                                                                                                  <svg class="icon icon--to-cart button__icon ">
                                                                                                    <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#to-cart-usage"></use>
                                                                                                  </svg></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-card__deleted">
                <div class="info-label">Товар удалён</div>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>