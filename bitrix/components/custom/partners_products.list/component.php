<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$idPartner = $arParams["VARIABLES"]["PARTNER_ID"];

$arFilter = Array(
    'IBLOCK_ID' => $arParams["IBLOCK_ID"],
    'PROPERTY_PARTNER.ID'=> $idPartner,
);
$arGroupBy = false;
$arNavStartParams = Array();
$arSelectFields = Array(
    "ID",
    "NAME",
    "PREVIEW_TEXT",
    "ACTIVE",
);

if(!CModule::includeModule("iblock"))
{
    $this->abortResultCache();
    ShowError("Модуля инфоблока нету :(");
    return;
}

$res = CIBlockElement::GetList(
    array(), 
    $arFilter,
    $arGroupBy,
    $arNavStartParams,
    $arSelectFields
);

$res->NavStart($arParams["ELEMENTS_COUNT"]);

$arItems = array();
while ($ob = $res->GetNextElement())
{
	$arItem = $ob->GetFields();
    $arItems[] = $arItem;
}

$arResult["ITEMS"] = $arItems;
$arResult["NAV_PRINT"] = $res->NavPrint("Элементы");

$this->IncludeComponentTemplate();
?>