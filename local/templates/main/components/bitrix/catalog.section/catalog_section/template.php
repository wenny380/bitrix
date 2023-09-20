<?php
//pre($arResult);
//echo "IS_AJAX: ".$arResult["ORIGINAL_PARAMETERS"]["IS_AJAX"];
//echo "THE PARAMETERS:<br>";
//$arParams["IS_AJAX"]
//echo $arResult['NAV_STRING'];
$generalParams = array(
    'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
    'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
    'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
    'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
    'MESS_SHOW_MAX_QUANTITY' => $arParams['~MESS_SHOW_MAX_QUANTITY'],
    'MESS_RELATIVE_QUANTITY_MANY' => $arParams['~MESS_RELATIVE_QUANTITY_MANY'],
    'MESS_RELATIVE_QUANTITY_FEW' => $arParams['~MESS_RELATIVE_QUANTITY_FEW'],
    'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
    'USE_PRODUCT_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
    'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
    'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
    'ADD_PROPERTIES_TO_BASKET' => $arParams['ADD_PROPERTIES_TO_BASKET'],
    'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
    'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'],
    'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
    'COMPARE_PATH' => $arParams['COMPARE_PATH'],
    'COMPARE_NAME' => $arParams['COMPARE_NAME'],
    'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
    'PRODUCT_BLOCKS_ORDER' => $arParams['PRODUCT_BLOCKS_ORDER'],
    'LABEL_POSITION_CLASS' => $labelPositionClass,
    'DISCOUNT_POSITION_CLASS' => $discountPositionClass,
    'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
    'SLIDER_PROGRESS' => $arParams['SLIDER_PROGRESS'],
    '~BASKET_URL' => $arParams['~BASKET_URL'],
    '~ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
    '~BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE'],
    '~COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
    '~COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
    'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
    'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
    'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
    'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY'],
    'MESS_BTN_BUY' => $arParams['~MESS_BTN_BUY'],
    'MESS_BTN_DETAIL' => $arParams['~MESS_BTN_DETAIL'],
    'MESS_BTN_COMPARE' => $arParams['~MESS_BTN_COMPARE'],
    'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
    'MESS_BTN_ADD_TO_BASKET' => $arParams['~MESS_BTN_ADD_TO_BASKET'],
    'MESS_NOT_AVAILABLE' => $arParams['~MESS_NOT_AVAILABLE']
);

//$arResult['NAV_STRING'] внутри его есть сверстка пагинации

?>

<? if($arParams["IS_AJAX"] == "Y"): ob_start(); endif; ?>
<div class="catalog__main">
    <div class="catalog__head">
        <div class="catalog__chips" data-chips v-if="filterSelectedItems.length" v-cloak>
            <div class="chips">
                <div class="chips__chip" v-for="(item, index) in filterSelectedItems">
                    <div class="chips__chip-wrapper">
                        <div class="chips__text">
                            <template v-if="item.RANGE_TYPE === 'MIN'">от</template>
                            <template v-if="item.RANGE_TYPE === 'MAX'">до</template>{{ item.RANGE_TYPE ? item.HTML_VALUE : item.VALUE }}
                            <template v-if="item.IS_PRICE"><span class="rouble-sign">₽</span></template>
                        </div>
                        <div class="chips__btn" @click.prevent="resetFilterOption($event, [item])">
                            <svg class="icon icon--cross chips__icon">
                                <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#cross-usage"></use>
                            </svg>
                        </div>
                    </div>
                </div><a class="link t-base t-base--size--small chips__link" href="#" @click.prevent="resetFilterOption($event, filterSelectedItems)"><span class="link__text">Очистить фильтр</span></a>
            </div>
        </div>
        <div class="catalog__controls" data-catalog-sorting>
            <? if($arParams["IS_AJAX"] == "Y"): ob_clean(); endif; ?>
            <div class="catalog__sortings">
                <div class="catalog__sorting">
                    <div class="catalog-sorting">
                        <div class="catalog-sorting__label">Сортировать</div>
                        <div class="catalog-sorting__select">
                            <div class="custom-select custom-select--theme--blue" data-custom-select>
                                <div class="catalog-sorting__select-btn" data-custom-select-button>
                                    <div class="catalog-sorting__select-btn-text" data-custom-select-button-text>По умолчанию</div>
                                    <div class="catalog-sorting__select-btn-icon">
                                        <svg class="icon icon--triangle">
                                            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#triangle-usage"></use>
                                        </svg>
                                    </div>
                                </div>
                                <select class="custom-select__select" name="sorting" data-custom-select-select data-catalog-sort>
                                    <option value="<?=$arResult["SECTION_PAGE_URL"]?>?sort=default">По умолчанию</option>
                                    <option value="<?=$arResult["SECTION_PAGE_URL"]?>?sort=article&amp;order=asc">Артикул по возрастанию</option>
                                    <option value="<?=$arResult["SECTION_PAGE_URL"]?>?sort=article&amp;order=desc">Артикул по убыванию</option>
                                    <option value="<?=$arResult["SECTION_PAGE_URL"]?>?sort=price&amp;order=asc">Сначала подешевле</option>
                                    <option value="<?=$arResult["SECTION_PAGE_URL"]?>?sort=price&amp;order=desc">Сначала подороже</option>
                                    <option value="<?=$arResult["SECTION_PAGE_URL"]?>?sort=newest">Сначала новинки</option>
                                    <option value="<?=$arResult["SECTION_PAGE_URL"]?>?sort=main">Сначала основной ассортимент</option>
                                </select>
                                <div class="custom-select__list catalog-sorting__select-list" data-custom-select-list>
                                    <ul class="custom-select__options">
                                        <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--small custom-select__option-link is-selected" href="javascript;;" data-custom-select-value="<?=$arResult["SECTION_PAGE_URL"]?>?sort=default"><span class="link__text">По умолчанию</span></a>
                                        </li>
                                        <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--small custom-select__option-link" href="javascript;;" data-custom-select-value="<?=$arResult["SECTION_PAGE_URL"]?>?sort=article&amp;order=asc"><span class="link__text">Артикул по возрастанию</span></a>
                                        </li>
                                        <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--small custom-select__option-link" href="javascript;;" data-custom-select-value="<?=$arResult["SECTION_PAGE_URL"]?>?sort=article&amp;order=desc"><span class="link__text">Артикул по убыванию</span></a>
                                        </li>
                                        <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--small custom-select__option-link" href="javascript;;" data-custom-select-value="<?=$arResult["SECTION_PAGE_URL"]?>?sort=price&amp;order=asc"><span class="link__text">Сначала подешевле</span></a>
                                        </li>
                                        <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--small custom-select__option-link" href="javascript;;" data-custom-select-value="<?=$arResult["SECTION_PAGE_URL"]?>?sort=price&amp;order=desc"><span class="link__text">Сначала подороже</span></a>
                                        </li>
                                        <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--small custom-select__option-link" href="javascript;;" data-custom-select-value="<?=$arResult["SECTION_PAGE_URL"]?>?sort=newest"><span class="link__text">Сначала новинки</span></a>
                                        </li>
                                        <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--small custom-select__option-link" href="javascript;;" data-custom-select-value="<?=$arResult["SECTION_PAGE_URL"]?>?sort=main"><span class="link__text">Сначала основной ассортимент</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="catalog__sorting">
                    <div class="catalog-sorting">
                        <div class="catalog-sorting__label">Показать</div>
                        <div class="catalog-sorting__select">
                            <div class="custom-select custom-select--theme--blue" data-custom-select>
                                <div class="catalog-sorting__select-btn" data-custom-select-button>
                                    <div class="catalog-sorting__select-btn-text" data-custom-select-button-text>По 30</div>
                                    <div class="catalog-sorting__select-btn-icon">
                                        <svg class="icon icon--triangle">
                                            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#triangle-usage"></use>
                                        </svg>
                                    </div>
                                </div>
                                <select class="custom-select__select" name="sorting" data-custom-select-select data-catalog-sort>
                                    <option value="<?=$arResult["SECTION_PAGE_URL"]?>?amount=30">По 30</option>
                                    <option value="<?=$arResult["SECTION_PAGE_URL"]?>?amount=90">По 90</option>
                                    <option value="<?=$arResult["SECTION_PAGE_URL"]?>?amount=all">Все</option>
                                </select>
                                <div class="custom-select__list catalog-sorting__select-list" data-custom-select-list>
                                    <ul class="custom-select__options">
                                        <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--small custom-select__option-link is-selected" href="javascript;;" data-custom-select-value="<?=$arResult["SECTION_PAGE_URL"]?>?amount=30"><span class="link__text">По&nbsp;30</span></a>
                                        </li>
                                        <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--small custom-select__option-link" href="javascript;;" data-custom-select-value="<?=$arResult["SECTION_PAGE_URL"]?>?amount=90"><span class="link__text">По&nbsp;90</span></a>
                                        </li>
                                        <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--small custom-select__option-link" href="javascript;;" data-custom-select-value="<?=$arResult["SECTION_PAGE_URL"]?>?amount=all"><span class="link__text">Все</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="catalog__view-mods">
                <div class="catalog-sorting">
                    <div class="catalog-sorting__label">Вид</div>
                    <div class="catalog-sorting__view-modes"><a class="catalog-sorting__view-mode catalog-sorting__view-mode--list is-active" href="<?=$arResult["SECTION_PAGE_URL"]?>?sort=default&amp;amount=30&amp;display=list" data-catalog-view-mode>
                            <svg class="icon icon--view-list">
                                <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#view-list-usage"></use>
                            </svg></a><a class="catalog-sorting__view-mode catalog-sorting__view-mode--block" href="<?=$arResult["SECTION_PAGE_URL"]?>?sort=default&amp;amount=30&amp;display=block" data-catalog-view-mode>
                            <svg class="icon icon--view-block">
                                <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#view-block-usage"></use>
                            </svg></a></div>
                </div>
            </div>
        </div>
    </div>
    <? if($arParams["IS_AJAX"] == "Y"): $sort_block = ob_get_contents();
        ob_clean();
    endif; ?>
    <div class="catalog__body" data-catalog-content>
        <div class="catalog__body-wrapper">
            <div class="catalog__products" data-catalog-products>
                <div class="products-grid" data-catalog-products-grid="list">

                    <?
                    if (!empty($arResult['ITEMS']))
                    {
                        //foreach ($arResult["ITEMS"] as $item){
                        $item = $arResult["ITEMS"];
                        $APPLICATION->IncludeComponent(
                            'bitrix:catalog.item',
                            'catalog_item',
                            array(
                                'RESULT' => array(
                                    'ITEM' => $item,
                                    'BIG_LABEL' => 'N',
                                    'BIG_DISCOUNT_PERCENT' => 'N',
                                    'BIG_BUTTONS' => 'N',
                                    'SCALABLE' => 'N'
                                ),
                                'PARAMS' => $generalParams
                                    + array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
                            ),
                            $component,
                            array('HIDE_ICONS' => 'Y')
                        );
                        //}
                    }

                    ?>

                </div>
            </div>
            <? if($arParams["IS_AJAX"] == "Y"): $content_block = ob_get_contents();
                ob_clean();
            endif; ?>
            <div class="catalog__paginator" data-catalog-paginator>
                <div class="paginator" data-catalog-paginator>
                    <div class="paginator__wrapper">
                        <div class="paginator__button"><a class="button button--color--monochrome-thin" href="<?=$arResult["SECTION_PAGE_URL"]?>?sort=main&amp;amount=all&amp;display=block&amp;page=2" data-catalog-paginator-more><span class="button__wrapper"><span class="button__text">Показать ещё</span></span></a>
                        </div>
                        <div class="paginator__controls">
                            <?= $arResult['NAV_STRING']; ?>
                            <ul class="paginator__list">
                                <li class="paginator__item"><a class="paginator__link" href="<?=$arResult["SECTION_PAGE_URL"]?>?sort=main&amp;amount=all&amp;display=bloc">
                                        <svg class="icon icon--chevron-right paginator__icon paginator__icon--prev" data-catalog-paginator-link>
                                            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#chevron-right-usage"></use>
                                        </svg></a></li>
                                <li class="paginator__item"><a class="link paginator__link link--color--black" href="<?=$arResult["SECTION_PAGE_URL"]?>?sort=main&amp;amount=all&amp;display=block" data-catalog-paginator-link><span class="link__text">1</span></a>
                                </li>
                                <li class="paginator__item is-active"><a class="link paginator__link link--color--black" href="<?=$arResult["SECTION_PAGE_URL"]?>?sort=main&amp;amount=all&amp;display=block" data-catalog-paginator-link><span class="link__text">2</span></a>
                                </li>
                                <li class="paginator__item"><a class="link paginator__link link--color--black" href="<?=$arResult["SECTION_PAGE_URL"]?>?sort=main&amp;amount=all&amp;display=block" data-catalog-paginator-link><span class="link__text">3</span></a>
                                </li>
                                <li class="paginator__item"><a class="link paginator__link link--color--black" href="<?=$arResult["SECTION_PAGE_URL"]?>?sort=main&amp;amount=all&amp;display=block" data-catalog-paginator-link><span class="link__text">...</span></a>
                                </li>
                                <li class="paginator__item"><a class="link paginator__link link--color--black" href="<?=$arResult["SECTION_PAGE_URL"]?>?sort=main&amp;amount=all&amp;display=block" data-catalog-paginator-link><span class="link__text">31</span></a>
                                </li>
                                <li class="paginator__item"><a class="link paginator__link link--color--black" href="<?=$arResult["SECTION_PAGE_URL"]?>?sort=main&amp;amount=all&amp;display=block" data-catalog-paginator-link><span class="link__text">32</span></a>
                                </li>
                                <li class="paginator__item"><a class="link paginator__link link--color--black" href="<?=$arResult["SECTION_PAGE_URL"]?>?sort=main&amp;amount=all&amp;display=block" data-catalog-paginator-link><span class="link__text">33</span></a>
                                </li>
                                <li class="paginator__item"><a class="paginator__link" href="<?=$arResult["SECTION_PAGE_URL"]?>?sort=main&amp;amount=all&amp;display=bloc">
                                        <svg class="icon icon--chevron-right paginator__icon paginator__icon--next" data-catalog-paginator-link>
                                            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#chevron-right-usage"></use>
                                        </svg></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <? if($arParams["IS_AJAX"] == "Y"): $pagination_block = ob_get_contents();
            $blockArr = array("sort_block"=>$sort_block, "pagination"=>$pagination_block, "content"=>$content_block);
            $APPLICATION->RestartBuffer();
            echo json_encode($blockArr);
            die();
        endif; ?>
        <div class="catalog__loader">
            <div class="catalog__loader-wrapper">
                <div class="v-ident v-ident--orange">
                    <div class="catalog__loader-img"><img class="img-responsive" src="<?=SITE_TEMPLATE_PATH?>/img/don-head.svg" alt=""></div>
                </div>
                <div class="catalog__loader-text"><b>Шары на подлёте...</b></div>
            </div>
        </div>
    </div>
</div>