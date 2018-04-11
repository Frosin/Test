<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class = "border__solid">
<?foreach($arResult["ITEMS"] as $arItem):?>
    <div style="border__dotted">
       
        <?$detailLink = $APPLICATION->GetCurPage()."?".$arParams["PARTNER_ID"]."=".$arParams["VARIABLES"]["PARTNER_ID"].
        "&".$arParams["ELEMENT_ID"]."=".$arItem["ID"]?>
        
        <a href="<?=$detailLink?>"><?=$arItem["NAME"]?></a>
        <span class="<?if($arItem["ACTIVE"]=="Y"):?>active">(Активен)</span>
        <?else:?>noactive">(Не активен)</span>
        <?endif;?>
        
        <?$activeKey = ($arItem["ACTIVE"]=="Y"?"N":"Y");?>
        <?$changeActiveString = $APPLICATION->GetCurPage()."?".$arParams["PARTNER_ID"]."=".$arParams["VARIABLES"]["PARTNER_ID"]."&change_active=$activeKey"."&product_id=".$arItem["ID"]?>
        
        <a href="<?=$changeActiveString?>">Изменить активность</a>
        <br>
        <p><?=$arItem["PREVIEW_TEXT"]?></p>
    </div>
<?endforeach;?>
<div> <?=$arResult["NAV_PRINT"]?></div>
</div>

