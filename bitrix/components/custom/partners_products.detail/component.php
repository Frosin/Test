<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$idPartner = $arParams["VARIABLES"]["PARTNER_ID"];
$idElement = $arParams["VARIABLES"]["ELEMENT_ID"];

if(!CModule::includeModule("iblock"))
{
	$this->abortResultCache();
	ShowError("Модуля инфоблока нету :(");
	return;
}

$arFilter = Array( 
    'IBLOCK_ID' => $arParams["IBLOCK_ID"],
    'PROPERTY_PARTNER.ID'=> $idPartner,
    'ID' => $idElement
);
$arGroupBy = false;
$arNavStartParams = Array();
$arSelectFields = Array(
    "ID",
    "NAME",
    "DETAIL_TEXT",
    "PROPERTY_PARTNER.NAME",
    "PROPERTY_PARTNER.PROPERTY_DESCRIPTION",
    "PROPERTY_PARTNER.PROPERTY_CONDITIONS",
    
);

$res = CIBlockElement::GetList(
    array(), 
    $arFilter,
    $arGroupBy,
    $arNavStartParams,
    $arSelectFields
);

$arResult = $res->GetNextElement()->GetFields();

$this->IncludeComponentTemplate();
?>






