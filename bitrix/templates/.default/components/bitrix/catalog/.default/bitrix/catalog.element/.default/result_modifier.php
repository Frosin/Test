<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
// hack
if (!is_array($arResult['SECTION']))
{
	$dbRes = CIBlock::GetByID($arResult['IBLOCK_ID']);
	if ($arIBlock = $dbRes->GetNext())
	{
		$arIBlock["~LIST_PAGE_URL"] = str_replace(
			array("#SERVER_NAME#", "#SITE_DIR#", "#IBLOCK_TYPE_ID#", "#IBLOCK_ID#", "#IBLOCK_CODE#", "#IBLOCK_EXTERNAL_ID#", "#CODE#"),
			array(SITE_SERVER_NAME, SITE_DIR, $arIBlock["IBLOCK_TYPE_ID"], $arIBlock["ID"], $arIBlock["CODE"], $arIBlock["EXTERNAL_ID"], $arIBlock["CODE"]),
			strlen($arParams["IBLOCK_URL"])? trim($arParams["~IBLOCK_URL"]): $arIBlock["~LIST_PAGE_URL"]
		);
		$arIBlock["~LIST_PAGE_URL"] = preg_replace("'/+'s", "/", $arIBlock["~LIST_PAGE_URL"]);
		$arIBlock["LIST_PAGE_URL"] = htmlspecialcharsbx($arIBlock["~LIST_PAGE_URL"]);
		
		$arResult['IBLOCK'] = $arIBlock;
	}
}

$arResult['PRICES']['PRICE']['PRINT_VALUE'] = number_format($arResult['PROPERTIES']['PRICE']['VALUE'], 0, '.', ' ');
$arResult['PRICES']['PRICE']['PRINT_VALUE'] .= ' '.$arResult['PROPERTIES']['PRICECURRENCY']['VALUE_ENUM'];
?>


<?
// Добавление в вывод в детальной описания и условий доставки, при наличии заполненного свойства "Партнеры"
$arFilter = Array( 
    'IBLOCK_ID' => $arResult["ORIGINAL_PARAMETERS"]["IBLOCK_ID"],
    'ID' => $arResult["ORIGINAL_PARAMETERS"]['ELEMENT_ID'],
);
$arGroupBy = false;
$arNavStartParams = Array();
$arSelectFields = Array(
    "PROPERTY_PARTNER.NAME",
    "PROPERTY_PARTNER.PROPERTY_DESCRIPTION",
    "PROPERTY_PARTNER.PROPERTY_CONDITIONS",
    
);

$result = CIBlockElement::GetList(
    array(), 
    $arFilter,
    $arGroupBy,
    $arNavStartParams,
    $arSelectFields
);

$arItem = $result->GetNextElement()->GetFields();

// Добавляем в вывод наши свойства
if ( !is_null($arItem["PROPERTY_PARTNER_NAME"]) )
{
	// Условия доставки
	$arResult["DISPLAY_PROPERTIES"]['CONDITIONS']["NAME"] = "Условия доставки";
	$arResult["DISPLAY_PROPERTIES"]['CONDITIONS']["DISPLAY_VALUE"] = $arItem["PROPERTY_PARTNER_PROPERTY_CONDITIONS_VALUE"];
	$arResult["DISPLAY_PROPERTIES"]['CONDITIONS']["VALUE"] = $arItem["PROPERTY_PARTNER_PROPERTY_CONDITIONS_VALUE_ID"];
	// Описание
	$arResult["DISPLAY_PROPERTIES"]['DESCRIPTION']["NAME"] = "Описание";
	$arResult["DISPLAY_PROPERTIES"]['DESCRIPTION']["DISPLAY_VALUE"] = $arItem["PROPERTY_PARTNER_PROPERTY_DESCRIPTION_VALUE"];
	$arResult["DISPLAY_PROPERTIES"]['DESCRIPTION']["VALUE"] = $arItem["PROPERTY_PARTNER_PROPERTY_DESCRIPTION_VALUE_ID"];
}

?>

