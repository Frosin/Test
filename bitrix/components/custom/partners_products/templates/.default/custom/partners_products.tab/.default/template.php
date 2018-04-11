<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class = "border__solid">
    <?foreach($arResult["ITEMS"] as $arKey => $arItem):?>
        <a href="<?=$APPLICATION->GetCurPage()."?".$arParams["PARTNER_ID"]."=".$arKey?>"><?=$arItem?></a>
    <?endforeach;?>
</div>

