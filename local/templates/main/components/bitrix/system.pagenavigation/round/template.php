<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

$this->setFrameMode(true);
//echo GetMessage("round_nav_back")
if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

$colorSchemes = array(
	"green" => "bx-green",
	"yellow" => "bx-yellow",
	"red" => "bx-red",
	"blue" => "bx-blue",
);
if(isset($colorSchemes[$arParams["TEMPLATE_THEME"]]))
{
	$colorScheme = $colorSchemes[$arParams["TEMPLATE_THEME"]];
}
else
{
	$colorScheme = "";
}
?>



 <!-- <div class="bx-pagination <? //$colorScheme ?>">
	<div class="bx-pagination-container"> -->
		<ul class="paginator__list">
<?if($arResult["bDescPageNumbering"] === true):?>

	<?if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		<?if($arResult["bSavePage"]):?>
			<li class="paginator__item"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><svg class="icon icon--chevron-right paginator__icon paginator__icon--prev" data-catalog-paginator-link="">
                        <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#chevron-right-usage"></use>
                    </svg></a></li>
			<li class=""><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><span class="link__text">1</span></a></li>
		<?else:?>
			<?if (($arResult["NavPageNomer"]+1) == $arResult["NavPageCount"]):?>
				<li class="paginator__item""><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><svg class="icon icon--chevron-right paginator__icon paginator__icon--prev" data-catalog-paginator-link="">
                        <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#chevron-right-usage"></use>
                    </svg></a></li>
			<?else:?>
				<li class="paginator__item"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><svg class="icon icon--chevron-right paginator__icon paginator__icon--prev" data-catalog-paginator-link="">
                            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#chevron-right-usage"></use>
                        </svg></a></li>
			<?endif?>
			<li class=""><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><span class="link__text">1</span></a></li>
		<?endif?>
	<?else:?>
			<li class="paginator__item"><svg class="icon icon--chevron-right paginator__icon paginator__icon--prev" data-catalog-paginator-link="">
                    <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/sprite.svg#chevron-right-usage"></use>
                </svg></a></li>
			<li class="paginator__item is-active"><span class="link__text">1</span></li>
	<?endif?>

	<?
	$arResult["nStartPage"]--;
	while($arResult["nStartPage"] >= $arResult["nEndPage"]+1):
	?>
		<?$NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;?>

		<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
			<li class="paginator__item is-active"><span><?=$NavRecordGroupPrint?></span></li>
		<?else:?>
			<li class=""><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><span><?=$NavRecordGroupPrint?></span></a></li>
		<?endif?>

		<?$arResult["nStartPage"]--?>
	<?endwhile?>

	<?if ($arResult["NavPageNomer"] > 1):?>
		<?if($arResult["NavPageCount"] > 1):?>
			<li class="paginator__item"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"><span class="link__text" ><?=$arResult["NavPageCount"]?></span></a></li>
		<?endif?>
			<li class="paginator__item"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><span><?echo GetMessage("round_nav_forward")?></span></a></li>
	<?else:?>
		<?if($arResult["NavPageCount"] > 1):?>
			<li class="paginator__item is-active"><span><?=$arResult["NavPageCount"]?></span></li>
		<?endif?>
			<li class="paginator__item"><span><?echo GetMessage("round_nav_forward")?></span></li>
	<?endif?>

<?else:?>

	<?if ($arResult["NavPageNomer"] > 1):?>
		<?if($arResult["bSavePage"]):?>
			<li class="paginator__item"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><span><?echo GetMessage("round_nav_back")?></span></a></li>
			<li class="paginator__item"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"><span>1</span></a></li>
		<?else:?>
			<?if ($arResult["NavPageNomer"] > 2):?>
				<li class="paginator__item"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><span><?echo GetMessage("round_nav_back")?></span></a></li>
			<?else:?>
				<li class="paginator__item"><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><span><?echo GetMessage("round_nav_back")?></span></a></li>
			<?endif?>
			<li class="paginator__item"><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><span>1</span></a></li>
		<?endif?>
	<?else:?>
			<li class="paginator__item"><span><?echo GetMessage("round_nav_back")?></span></li>
			<li class="paginator__item is-active"><span>1</span></li>
	<?endif?>

	<?
	$arResult["nStartPage"]++;
	while($arResult["nStartPage"] <= $arResult["nEndPage"]-1):
	?>
		<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
			<li class="paginator__item is-active"><span><?=$arResult["nStartPage"]?></span></li>
		<?else:?>
			<li class="paginator__item"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><span><?=$arResult["nStartPage"]?></span></a></li>
		<?endif?>
		<?$arResult["nStartPage"]++?>
	<?endwhile?>

	<?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		<?if($arResult["NavPageCount"] > 1):?>
			<li class=""><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><span><?=$arResult["NavPageCount"]?></span></a></li>
		<?endif?>
			<li class="bx-pag-next"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><span><?echo GetMessage("round_nav_forward")?></span></a></li>
	<?else:?>
		<?if($arResult["NavPageCount"] > 1):?>
			<li class="bx-active"><span><?=$arResult["NavPageCount"]?></span></li>
		<?endif?>
			<li class="bx-pag-next"><span><?echo GetMessage("round_nav_forward")?></span></li>
	<?endif?>
<?endif?>


		</ul>
		<div style="clear:both"></div>
	 <!-- </div>
</div> -->
