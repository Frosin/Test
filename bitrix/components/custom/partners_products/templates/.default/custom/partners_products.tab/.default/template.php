<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div style = "border: 1px solid black;">
    <?foreach($arResult["ITEMS"] as $arKey => $arItem):?>
        <a href="<?=$APPLICATION->GetCurPage()."?".$arParams["PARTNER_ID"]."=".$arKey?>"><?=$arItem?></a>
    <?endforeach;?>
</div>

