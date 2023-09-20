<?php
//Получить метка поля
function getparams($name)
{
    $get_fields = CIBlockSection::GetList(
        array(),
        array(
            'IBLOCK_ID' => 4,
            'NAME' => $name,
        ),
        false,
        array(
            'UF_*'
        )
    );
    if($get_fields_item = $get_fields->GetNext()) {

        $my_fields_1 = $get_fields_item['UF_DOP_PAR'];
        //var_dump($my_fields_1);
        return $my_fields_1;
    }
}

// конец операции
$parent=array();
foreach ($arResult as $sectionI)
{
    if($sectionI["IS_PARENT"]==1 && $sectionI["DEPTH_LEVEL"]==1)
    {
        array_push($parent,$sectionI["TEXT"]);
    }
}
$sect= array();
$t=0;
for($i= 0; $i< count($arResult); $i++)
{
    if($arResult[$i]["IS_PARENT"]==1 && $arResult[$i]["DEPTH_LEVEL"]==1)
    {
        $a=array();
        $newI= $i+1;
        $ind=0;
        while($arResult[$newI]["DEPTH_LEVEL"]==2)
        {
            $len1=count($a);
            if($arResult[$newI]["IS_PARENT"]==1)
            {
                $b= array();
                $ind = $newI;
                while ($arResult[$ind+1]["DEPTH_LEVEL"]==3)
                {
                    $len=count($b);
                    $param = getparams($arResult[$ind+1]["TEXT"]);
                    $b[$len]["NAME"]= $arResult[$ind+1]["TEXT"];
                    $b[$len]["LINK"]= $arResult[$ind+1]["LINK"];
                    $b[$len]["PARAM"]= $param;
                    $ind = $ind+1;
                }

                $param1= getparams($arResult[$newI]["TEXT"]);
                $a[$len1]["NAME"]= $arResult[$newI]["TEXT"];
                $a[$len1]["LINK"]= $arResult[$newI]["LINK"];
                $a[$len1]["PARAM"]= $param1;
                $a[$len1]["CHILD"]= $b;
                $newI = $ind+1;
            }
            else{
                $param1= getparams($arResult[$newI]["TEXT"]);
                $a[$len1]["NAME"]= $arResult[$newI]["TEXT"];
                $a[$len1]["LINK"]= $arResult[$newI]["LINK"];
                $a[$len1]["PARAM"]= $param1;
                $a[$len1]["CHILD"]= array();
                $newI = $newI+1;
            }

        }

        $sect[$t] = $a;
        $t++;
    }
}

//pre($sect);
//die();
?>


<div class="header__main">
    <div class="header-main" data-header>
        <section class="section">
            <div class="section__wrapper">
                <div class="header-main__wrapper"><a class="header-main__logo" href="/"><img class="img-responsive" src="<?=SITE_TEMPLATE_PATH?>/img/logo.svg" alt=""></a>
                    <div class="header-main__menu"><a class="button button--color--red header-main__menu-btn" href="#" data-menu-toggle><span class="button__wrapper"><span class="burger"><span class="burger__line"></span><span class="burger__line"></span><span class="burger__line"></span></span><span class="button__text">Каталог товаров</span></span></a>
                    </div>
                    <div class="header-main__search">
                        <div class="header-search input-form" data-header-search>
                            <form class="input-form__wrapper">
                                <div class="header-search__select-container custom-select" data-custom-select><a class="button header-search__button button--color--orange-light button--weight--regular" href="#" data-custom-select-button="">
                                        <div class="button__wrapper">
                                            <div class="button__text" data-custom-select-button-text>Везде</div>
                                            <svg class="icon icon--triangle button__icon">
                                                <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#triangle-usage"></use>
                                            </svg>
                                        </div></a>
                                    <select class="custom-select__select" name="SEARCH_TYPE" data-custom-select-select>
                                        <option value="1">Везде</option>
                                        <option value="2">По артикулу</option>
                                        <option value="3">По названию</option>
                                        <option value="4">По названию и арикулу</option>
                                    </select>
                                    <div class="custom-select__list header-search__custom-select-list" data-custom-select-list>
                                        <ul class="custom-select__options">
                                            <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--medium custom-select__option-link is-selected" href="javascript;;" data-custom-select-value="1"><span class="link__text">Везде</span></a>
                                            </li>
                                            <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--medium custom-select__option-link" href="javascript;;" data-custom-select-value="2"><span class="link__text">По артикулу</span></a>
                                            </li>
                                            <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--medium custom-select__option-link" href="javascript;;" data-custom-select-value="3"><span class="link__text">По названию</span></a>
                                            </li>
                                            <li class="custom-select__option"><a class="link link--color--black t-base t-base--size--medium custom-select__option-link" href="javascript;;" data-custom-select-value="4"><span class="link__text">По названию и арикулу</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="input-form__input">
                                    <input name="search" type="text" placeholder="Искать">
                                </div>
                                <div class="input-form__submit">
                                    <button class="button input-form__button button--color--red" type="submit"><span class="button__wrapper">
                                                      <svg class="icon icon--loupe button__icon ">
                                                        <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#loupe-usage"></use>
                                                      </svg></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="header-main__controls">
                        <div class="header-main__control header-main__personal"><a class="circle-button circle-button--icon-fill" href="#" data-tooltip="personal-section">
                                <div class="circle-button__wrapper">
                                    <div class="circle-button__icon">
                                        <svg class="icon icon--person">
                                            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#person-usage"></use>
                                        </svg>
                                    </div>
                                </div></a>
                            <div class="is-hidden" data-tooltip-content="personal-section">
                                <div class="tooltip-content">
                                    <div class="tooltip-content__body">
                                        <div class="v-ident v-ident--red"><a class="link link--color--black t-base t-base--size--medium" href="#"><span class="link__text">Личный кабинет</span></a>
                                        </div>
                                        <div class="v-ident v-ident--red"><a class="link link--color--black t-base t-base--size--medium" href="#"><span class="link__text">История заказов</span></a>
                                        </div>
                                        <div class="v-ident v-ident--red"><a class="link link--color--black t-base t-base--size--medium" href="#"><span class="link__text">Подписки</span></a>
                                        </div>
                                    </div>
                                    <div class="tooltip-content__footer">
                                        <div class="v-ident v-ident--red"><a class="link link--color--black link--color--monochrome-medium t-base t-base--size--medium" href="#">
                                                <svg class="icon icon--edit link__icon link__icon--left">
                                                    <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#edit-usage"></use>
                                                </svg><span class="link__text">Настройки профиля</span></a>
                                        </div>
                                        <div class="v-ident v-ident--red"><a class="link link--color--black link--color--monochrome-medium t-base t-base--size--medium" href="#">
                                                <svg class="icon icon--logout link__icon link__icon--left">
                                                    <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#logout-usage"></use>
                                                </svg><span class="link__text">Выйти</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="header-main__control header-main__favorite"><a class="circle-button circle-button--icon-fill" href="#" data-wish-indicator>
                                <div class="circle-button__wrapper">
                                    <div class="circle-button__icon">
                                        <svg class="icon icon--heart-stroked" viewBox="0 0 19 18" xmlns="http://www.w3.org/2000/svg">
                                            <mask id="path-1-inside-1" fill="white">
                                                <path d="M19 6.49991C19 1.49987 13 -0.700182 9.5 2.29987C6 -0.700182 0 1.49987 0 6.49991C0 10.8548 3.27784 13.8048 8.9272 17.7972C9.27044 18.0397 9.72956 18.0397 10.0728 17.7972C15.7222 13.8048 19 10.8548 19 6.49991Z"/>
                                            </mask>
                                            <path d="M9.5 2.29987L8.58888 3.36282L9.5 4.14379L10.4111 3.36282L9.5 2.29987ZM10.0728 17.7972L10.8808 18.9405L10.8808 18.9405L10.0728 17.7972ZM8.9272 17.7972L8.11923 18.9405L8.11923 18.9405L8.9272 17.7972ZM10.4111 3.36282C11.7143 2.24581 13.5178 2.07022 15.0282 2.69388C16.5087 3.30519 17.6 4.63576 17.6 6.49991H20.4C20.4 3.36402 18.4913 1.09454 16.0968 0.105827C13.7322 -0.870533 10.7857 -0.646129 8.58888 1.23691L10.4111 3.36282ZM17.6 6.49991C17.6 8.26823 16.9544 9.78297 15.5917 11.3737C14.1905 13.0093 12.0887 14.6583 9.26483 16.6538L10.8808 18.9405C13.7063 16.9437 16.068 15.1215 17.7181 13.1953C19.4067 11.2242 20.4 9.08647 20.4 6.49991H17.6ZM9.73517 16.6538C6.91133 14.6583 4.80948 13.0093 3.4083 11.3737C2.04561 9.78297 1.4 8.26823 1.4 6.49991H-1.4C-1.4 9.08647 -0.406687 11.2242 1.28187 13.1953C2.93195 15.1215 5.2937 16.9437 8.11923 18.9405L9.73517 16.6538ZM1.4 6.49991C1.4 4.63576 2.49132 3.30519 3.97182 2.69388C5.48223 2.07022 7.28573 2.24581 8.58888 3.36282L10.4111 1.23691C8.21427 -0.646129 5.26777 -0.870533 2.90318 0.105827C0.508681 1.09454 -1.4 3.36402 -1.4 6.49991H1.4ZM9.26484 16.6538C9.40588 16.5542 9.59412 16.5542 9.73516 16.6538L8.11923 18.9405C8.94675 19.5253 10.0532 19.5253 10.8808 18.9405L9.26484 16.6538Z" mask="url(#path-1-inside-1)"/>
                                        </svg>

                                        <div class="circle-button__indicator" data-wish-indicator-count>2</div>
                                    </div>
                                </div></a>
                        </div>
                        <div class="header-main__control header-main__cart"><a class="circle-button circle-button--icon-stroke circle-button--cart" href="#" data-cart-indicator>
                                <div class="circle-button__wrapper">
                                    <div class="circle-button__row">
                                        <div class="circle-button__col circle-button__col--1">
                                            <div class="circle-button__icon">
                                                <svg class="icon icon--cart">
                                                    <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#cart-usage"></use>
                                                </svg>
                                                <div class="circle-button__indicator" data-cart-indicator-count></div>
                                            </div>
                                        </div>
                                        <div class="circle-button__col circle-button__col--2">
                                            <div class="circle-button__text"><span data-cart-indicator-price></span><span class="rouble-sign"> ₽</span></div>
                                        </div>
                                    </div>
                                </div></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="header__menu">
        <div class="menu" data-menu>
            <section class="section">
                <div class="section__wrapper">
                    <div class="menu__wrapper">
                        <ul class="menu__list">
                            <?php foreach ($parent as  $key => $section):
                            if($key == 0):?>
                                <li class="menu__list-item is-selected" data-category-link="<?=$key?>">
                                    <div class="menu__category-link"><a class="link link--color--black link--weight--bold menu__link menu__text" href="#"><span class="link__text"><?=$section ?></span></a>
                                    </div>
                                </li>
                            <?php else: ?>
                            <li class="menu__list-item" data-category-link="<?=$key?>"><a class="link link--color--black link--weight--bold menu__link menu__text" href="#"><span class="link__text"><?=$section; ?></span></a>
                            </li>
                            <?php
                            endif;
                            endforeach;
                            ?>

                        </ul>
                        <div class="menu__categories">
                            <?foreach ($sect as $key => $section_s):?>
                            <div class="menu-category <?php if($key==0) echo 'is-selected';?>" data-category-id="<?=$key;?>">
                                <div class="menu-category__wrapper">
                                    <div class="menu-category__grid">
                                        <?foreach ($section_s as $item):?>
                                        <div class="menu-category__item">
                                            <div class="menu-category__title"><a class="link link--color--black link--weight--bold menu-category__link menu-category__text" href="<?=$item["LINK"]?>"><span class="link__text"><?=$item["NAME"]?></span></a>
                                                <? if ($item["PARAM"]=="new"):?>
                                                <span class="text-labels"><span class="text-labels__label text-labels__label--color--green">new</span></span> <? endif;?>
                                            </div>
                                            <?if(!empty($item["CHILD"])):?>
                                            <ul class="menu-category__list">
                                                <?foreach ($item["CHILD"] as $children):?>
                                                <li class="menu-category__list-item"><a class="link link--color--monochrome-medium menu-category__link menu-category__text" href="<?=$children["LINK"]?>"><span class="link__text"><?=$children["NAME"]?></span></a>
                                                    <? if ($children["PARAM"]=="new"):?>
                                                    <span class="text-labels"><span class="text-labels__label text-labels__label--color--green">new</span></span><? endif;?>
                                                </li>
                                                <?endforeach;?>
                                            </ul>
                                            <? endif;?>

                                        </div>
                                        <? endforeach;?>

                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

