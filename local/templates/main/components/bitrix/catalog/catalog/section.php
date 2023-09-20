<?php
//var_dump(22222222);
//pre($arResult);
//pre($arParams["LIST_PROPERTY_CODE"]);

if (isset($_GET["sort"]))
{
    if($_GET["sort"] == "article")
    {
        $arParams["ELEMENT_SORT_FIELD"] = "timestamp_x";
    }
    if ($_GET["sort"] == "article")
    {
        $arParams["ELEMENT_SORT_FIELD"] = "property_ARTICLE";
    }
    if($_GET["sort"] == "price")
    {
        $arParams["ELEMENT_SORT_FIELD"] = "catalog_PRICE_1";
    }
    if($_GET["sort"] == "newest")
    {
        $arParams["ELEMENT_SORT_FIELD"] = "property_NEW";
    }
    if($_GET["sort"] == "main")
    {
        $arParams["ELEMENT_SORT_FIELD"] = "property_BESTSELLER";
    }

}

if (isset($_GET["order"]))
{
    if ($_GET["order"] == "asc" || $_GET["order"] == "desc")
    {
        $arParams["ELEMENT_SORT_ORDER"] = $_GET["order"];
    }
}

?>


<div class="catalog" data-catalog>
    <section class="section">
        <div class="section__wrapper">
            <div class="catalog__wrapper">
                <?

                $APPLICATION->IncludeComponent("bitrix:catalog.smart.filter", "smart_filter", array(
                    "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                    "SECTION_ID" => $arCurSection['ID'],
                    "FILTER_NAME" => $arParams["FILTER_NAME"],
                    "PRICE_CODE" => $arParams["~PRICE_CODE"],
                    "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                    "CACHE_TIME" => $arParams["CACHE_TIME"],
                    "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                    "SAVE_IN_SESSION" => "N",
                    "FILTER_VIEW_MODE" => $arParams["FILTER_VIEW_MODE"],
                    "XML_EXPORT" => "N",
                    "SECTION_TITLE" => "NAME",
                    "SECTION_DESCRIPTION" => "DESCRIPTION",
                    'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
                    "TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],
                    'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
                    'CURRENCY_ID' => $arParams['CURRENCY_ID'],
                    "SEF_MODE" => $arParams["SEF_MODE"],
                    "SEF_RULE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["smart_filter"],
                    "SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
                    "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
                    "INSTANT_RELOAD" => $arParams["INSTANT_RELOAD"],
                    "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
                ),
                    $component,
                    array('HIDE_ICONS' => 'Y')
                );
                ?>

                <?

                $isAjaxRequest = 'N';
                $context = \Bitrix\Main\Application::getInstance()->getContext()->getCurrent()->getRequest();
                if($context->isAjaxRequest())
                {
                    $isAjaxRequest = 'Y';
                    $APPLICATION->RestartBuffer();
                }

                $APPLICATION->IncludeComponent(
                    "bitrix:catalog.section",
                    "catalog_section",
                    Array(
                        "ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
                        "ADD_PICT_PROP" => $arParams["ADD_PICT_PROP"],
                        "ADD_PROPERTIES_TO_BASKET" => $arParams["ADD_PROPERTIES_TO_BASKET"],
                        "ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
                        "ADD_TO_BASKET_ACTION" => $basketAction,
                        "IS_AJAX" => $isAjaxRequest,
                        "AJAX_MODE" => $arParams["AJAX_MODE"],
                        "AJAX_OPTION_ADDITIONAL" => $arParams["AJAX_OPTION_ADDITIONAL"],
                        "AJAX_OPTION_HISTORY" => $arParams["AJAX_OPTION_HISTORY"],
                        "AJAX_OPTION_JUMP" => $arParams["AJAX_OPTION_JUMP"],
                        "AJAX_OPTION_STYLE" => $arParams["AJAX_OPTION_STYLE"],
                        "BACKGROUND_IMAGE" => $arParams["SECTION_BACKGROUND_IMAGE"],
                        "BASKET_URL" => $arParams["BASKET_URL"],
                        "BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
                        "CACHE_FILTER" => $arParams["CACHE_FILTER"],
                        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                        "CACHE_TIME" => $arParams["CACHE_TIME"],
                        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                        "COMPATIBLE_MODE" => $arParams["COMPATIBLE_MODE"],
                        "CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
                        "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
                        "DISABLE_INIT_JS_IN_COMPONENT" => $arParams["DISABLE_INIT_JS_IN_COMPONENT"],
                        "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
                        "DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
                        "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
                        "ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
                        "ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
                        "ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
                        "ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
                        "ENLARGE_PRODUCT" => $arParams["LIST_ENLARGE_PRODUCT"],
                        "FILTER_NAME" => $arParams["FILTER_NAME"],
                        "HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
                        "HIDE_NOT_AVAILABLE_OFFERS" => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],
                        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                        "INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
                        "LABEL_PROP" => $arParams["LABEL_PROP"],
                        "LAZY_LOAD" => $arParams["LAZY_LOAD"],
                        "LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
                        "LOAD_ON_SCROLL" => $arParams["LOAD_ON_SCROLL"],
                        "MESSAGE_404" => $arParams["MESSAGE_404"],
                        "MESS_BTN_ADD_TO_BASKET" => $arParams["~MESS_BTN_ADD_TO_BASKET"],
                        "MESS_BTN_BUY" => $arParams["~MESS_BTN_BUY"],
                        "MESS_BTN_DETAIL" => $arParams["~MESS_BTN_DETAIL"],
                        "MESS_BTN_LAZY_LOAD" => $arParams["~MESS_BTN_LAZY_LOAD"],
                        "MESS_BTN_SUBSCRIBE" => $arParams["~MESS_BTN_SUBSCRIBE"],
                        "MESS_NOT_AVAILABLE" => $arParams["~MESS_NOT_AVAILABLE"],
                        "META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
                        "META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
                        "OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],
                        "PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
                        "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
                        "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
                        "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
                        "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
                        "PAGER_TITLE" => $arParams["PAGER_TITLE"],
                        "PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
                        "PARTIAL_PRODUCT_PROPERTIES" => $arParams["PARTIAL_PRODUCT_PROPERTIES"],
                        "PRICE_CODE" => $arParams["~PRICE_CODE"],
                        "PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
                        "PRODUCT_BLOCKS_ORDER" => $arParams["LIST_PRODUCT_BLOCKS_ORDER"],
                        "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
                        "PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
                        "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
                        "PRODUCT_ROW_VARIANTS" => $arParams["LIST_PRODUCT_ROW_VARIANTS"],
                        "PRODUCT_SUBSCRIPTION" => $arParams["PRODUCT_SUBSCRIPTION"],
                        "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
                        "PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
                        "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
                        "SECTION_CODE_PATH" => "",
                        "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
                        "SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
                        "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
                        "SECTION_USER_FIELDS" => array("UF_NEW"),
                        "SEF_MODE" => $arParams["SEF_MODE"],
                        "SEF_RULE" => "",
                        "SET_BROWSER_TITLE" => "Y",
                        "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
                        "SET_META_DESCRIPTION" => "Y",
                        "SET_META_KEYWORDS" => "Y",
                        "SET_STATUS_404" => $arParams["SET_STATUS_404"],
                        "SET_TITLE" => $arParams["SET_TITLE"],
                        "SHOW_404" => $arParams["SHOW_404"],
                        "SHOW_ALL_WO_SECTION" => "Y",
                        "SHOW_CLOSE_POPUP" => $arParams["COMMON_SHOW_CLOSE_POPUP"],
                        "SHOW_DISCOUNT_PERCENT" => $arParams["SHOW_DISCOUNT_PERCENT"],
                        "SHOW_FROM_SECTION" => "N",
                        "SHOW_MAX_QUANTITY" => $arParams["SHOW_MAX_QUANTITY"],
                        "SHOW_OLD_PRICE" => $arParams["SHOW_OLD_PRICE"],
                        "SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
                        "SHOW_SLIDER" => $arParams["LIST_SHOW_SLIDER"],
                        "SLIDER_INTERVAL" => $arParams["LIST_SLIDER_INTERVAL"],
                        "SLIDER_PROGRESS" => $arParams["LIST_SLIDER_PROGRESS"],
                        "TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],
                        "USE_ENHANCED_ECOMMERCE" => $arParams["USE_ENHANCED_ECOMMERCE"],
                        "USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
                        "USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
                        "USE_PRODUCT_QUANTITY" => $arParams["USE_PRODUCT_QUANTITY"],

                    ),
                    $component
                );
                ?>

            </div>
        </div>
    </section>