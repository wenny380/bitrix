<?php
//pre($arResult);
?>

<div class="top-menu__col top-menu__col--3">
                                        <div class="top-menu__contacts">
                                            <div class="top-menu__contact top-menu__contact--phone"><a class="link link--color--black link--weight--bold t-base t-base--size--small modal-inited" href="./modals/contacts.html" data-modal=""><span class="link__text">8 800 200-28-09</span>
                                                    <svg class="icon icon--triangle link__icon">
                                                        <use xlink:href="./img/sprite.svg#triangle-usage"></use>
                                                    </svg></a>
                                            </div>
                                            <div class="top-menu__contact top-menu__contact--callback"><a class="link top-menu__callback-link link--color--black link--weight--bold t-base t-base--size--small modal-inited" href="./modals/callback.html" data-modal="">
                                                    <svg class="icon icon--handset link__icon link__icon--left">
                                                        <use xlink:href="./img/sprite.svg#handset-usage"></use>
                                                    </svg><span class="link__text">Обратный звонок</span></a>
                                            </div>
                                            <div class="top-menu__contact top-menu__contact--old-site">
                                                <div class="top-menu-nav">
                                                    <div class="top-menu-nav__wrapper">
                                                        <div class="top-menu-nav__menu">
                                                            <ul class="top-menu-nav__menu-list">
                                                                <?php foreach ($arResult as $menu):?>
                                                                <li class="top-menu-nav__menu-item"><span class="link link--no-link link--color--blue-main link--weight--bold t-base t-base--size--small top-menu-nav__menu-link top-menu-nav__menu-link--nested">
                                                                        <svg class="icon icon--ball link__icon link__icon--left">
                                                                        <use xlink:href="./img/sprite.svg#ball-usage"></use>
                                                                      </svg><span class="link__text"><?=$menu["TEXT"]?></span>
                                                                      <svg class="icon icon--triangle link__icon">
                                                                        <use xlink:href="./img/sprite.svg#triangle-usage"></use>
                                                                      </svg></span>
                                                                    <?php  if(!empty($menu["PARAMS"]["CHILD"])):?>
                                                                    <div class="top-menu-nav__nested-menu">
                                                                        <ul class="top-menu-nav__nested-menu-list">
                                                                            <?php  foreach ($menu['PARAMS']['CHILD'] as $childMenu):?>
                                                                            <li class="top-menu-nav__nested-menu-item"><a class="link link--color--black top-menu-nav__nested-menu-link" href="<?= $childMenu["LINK"]?>"><span class="link__text"><?= $childMenu["NAME"]?></span></a>
                                                                            </li>
                                                                            <?endforeach;?>
                                                                        </ul>
                                                                    </div>
                                                                    <?endif;?>
                                                                </li>
                                                                <?endforeach;?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
