<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><? $APPLICATION->ShowTitle(); ?></title>
    <meta name="theme-color" content="#fff">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="preload" as="font" type="font/woff2" href="./fonts/montserrat-v14-latin_cyrillic-regular.woff2" crossorigin="">
    <link rel="preload" as="font" type="font/woff2" href="./fonts/montserrat-v14-latin_cyrillic-600.woff2" crossorigin="">
    <style>/*Critical CSS*/</style>
    <link rel="preload" href="<?=SITE_TEMPLATE_PATH?>/styles/main.css" as="style">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/styles/main.css">
      <?$APPLICATION->ShowHead(); ?>
      <?$APPLICATION->ShowPanel();?>
  </head>
  <body class="body">
    <div class="body__wrapper" id="app"><img class="visually-hidden" src="<?=SITE_TEMPLATE_PATH?>/img/loader.gif" alt=""/>
      <script id="preloader-tpl" type="text/template">
        <div class="preloader">
        <img src="<?=SITE_TEMPLATE_PATH?>/img/loader.gif" alt=""/>
        </div>
      </script>
        <header class="header">
            <div class="header__top-menu">
                <div class="top-menu">
                    <section class="section section--bg--monochrome-thin">
                        <div class="section__wrapper">
                            <div class="top-menu__wrapper">
                                <div class="top-menu__row">
                                    <?php

                                    $APPLICATION->IncludeComponent("bitrix:menu","top_menu",Array(
                                            "ROOT_MENU_TYPE" => "top",
                                            "MAX_LEVEL" => "1",
                                            "CHILD_MENU_TYPE" => "top",
                                            "USE_EXT" => "N",
                                            "DELAY" => "N",
                                            "ALLOW_MULTI_SELECT" => "Y",
                                            "MENU_CACHE_TYPE" => "N",
                                            "MENU_CACHE_TIME" => "3600",
                                            "MENU_CACHE_USE_GROUPS" => "Y",
                                            "MENU_CACHE_GET_VARS" => ""
                                        )
                                    );
                                    ?>
                                    <div class="top-menu__col top-menu__col--2">
                                        <div class="top-menu-socials">
                                            <div class="top-menu-socials__social"><a class="top-menu-socials__link" href="#">
                                                    <svg class="icon icon--instagram top-menu-socials__icon">
                                                        <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#instagram-usage"></use>
                                                    </svg></a></div>
                                            <div class="top-menu-socials__social"><a class="top-menu-socials__link" href="#">
                                                    <svg class="icon icon--vk top-menu-socials__icon">
                                                        <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#vk-usage"></use>
                                                    </svg></a></div>
                                            <div class="top-menu-socials__social"><a class="top-menu-socials__link" href="#">
                                                    <svg class="icon icon--youtube top-menu-socials__icon">
                                                        <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#youtube-usage"></use>
                                                    </svg></a></div>
                                            <div class="top-menu-socials__social"><a class="top-menu-socials__link" href="#">
                                                    <svg class="icon icon--telegram top-menu-socials__icon">
                                                        <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#telegram-usage"></use>
                                                    </svg></a></div>
                                            <div class="top-menu-socials__social"><a class="top-menu-socials__link" href="#">
                                                    <svg class="icon icon--facebook top-menu-socials__icon">
                                                        <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#facebook-usage"></use>
                                                    </svg></a></div>
                                            <div class="top-menu-socials__social"><a class="top-menu-socials__link" href="#">
                                                    <svg class="icon icon--odnoklassniki top-menu-socials__icon">
                                                        <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#odnoklassniki-usage"></use>
                                                    </svg></a></div>
                                        </div>
                                    </div>

                                    <?php

                                    $APPLICATION->IncludeComponent("bitrix:menu","top_menu_right",Array(
                                            "ROOT_MENU_TYPE" => "top1",
                                            "MAX_LEVEL" => "1",
                                            "CHILD_MENU_TYPE" => "top",
                                            "USE_EXT" => "N",
                                            "DELAY" => "N",
                                            "ALLOW_MULTI_SELECT" => "Y",
                                            "MENU_CACHE_TYPE" => "N",
                                            "MENU_CACHE_TIME" => "3600",
                                            "MENU_CACHE_USE_GROUPS" => "Y",
                                            "MENU_CACHE_GET_VARS" => ""
                                        )
                                    );
                                    ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <?php

            $APPLICATION->IncludeComponent("bitrix:menu","catalog_menu",Array(
                    "ROOT_MENU_TYPE" => "left",
                    "MAX_LEVEL" => "1",
                    "CHILD_MENU_TYPE" => "top",
                    "USE_EXT" => "Y",
                    "DELAY" => "N",
                    "ALLOW_MULTI_SELECT" => "Y",
                    "MENU_CACHE_TYPE" => "N",
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "MENU_CACHE_GET_VARS" => ""
                )
            );
            ?>
        </header>
      <main>

          <div class="heading">
              <section class="section">
                  <div class="section__wrapper">
                      <div class="heading__wrapper">
                          <?php
                           if ($APPLICATION->GetCurPage(false) != SITE_DIR):
                               $page = $APPLICATION->GetCurPage();
                               $APPLICATION->IncludeComponent("bitrix:breadcrumb","",Array(
                               "START_FROM" => "0",
                               "PATH" => "",
                               "SITE_ID" => "s1"
                               )
                               );
                              ?>

                              <h1 class="heading__title"><?= $APPLICATION->ShowTitle(); ?></h1>
                         <?php endif;
                          ?>
                      </div>
                  </div>
              </section>
          </div>