<?php
//pre($arResult);
//echo count($arResult);
for ($i =0; $i < count($arResult); $i++)
{
 //  print_r($arResult[$i]["TEXT"]);
  // echo count($arResult[$i]["PARAMS"]["CHILD"]);
  // echo '<br>';
   if(!empty($arResult[$i]["PARAMS"]["CHILD"]))
   {
       //echo count($arResult[$i][CHILD]);
       for ($j=0 ; $j<count($arResult[$i]["PARAMS"]["CHILD"]); $j++)
           {

             //  pre($arResult[$i]["PARAMS"]["CHILD"][$j]["NAME"]);

           }
   }

}
?>
<div class="top-menu__col top-menu__col--1">
    <div class="top-menu__menu">
        <div class="top-menu-nav">
            <div class="top-menu-nav__wrapper">
                <div class="top-menu-nav__menu">
                    <ul class="top-menu-nav__menu-list">

                        <?php foreach ($arResult as $parentMenu):?>
                        <li class="top-menu-nav__menu-item">
                            <span class="link link--no-link link--color--black top-menu-nav__menu-link top-menu-nav__menu-link--nested">
                                <span class="link__text"> <?= $parentMenu["TEXT"];?></span>
                                    <svg class="icon icon--triangle link__icon">
                                        <use xlink:href="./img/sprite.svg#triangle-usage"></use>
                                                                          </svg></span>

                                    <?php  if(!empty($parentMenu["PARAMS"]["CHILD"])):?>
                                   <div class="top-menu-nav__nested-menu">
                                  <ul class="top-menu-nav__nested-menu-list">
                                  <?php  foreach ($parentMenu['PARAMS']['CHILD'] as $childMenu):?>

                                    <li class="top-menu-nav__nested-menu-item">
                                        <a class="link link--color--black top-menu-nav__nested-menu-link" href="<?= $childMenu["LINK"]?>">
                                            <span class="link__text"><?= $childMenu["NAME"]?></span></a>
                                    </li>

                                  <?php endforeach; ?>

                           </ul>
                            </div>

                            <?php endif;?>
                            </li>
                         <?php endforeach;
                          ?>