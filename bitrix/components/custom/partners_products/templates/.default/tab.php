<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<br />
<?$APPLICATION->IncludeComponent(
	"custom:partners_products.tab",
	"",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "VARIABLES" => $arResult["VARIABLES"],
        "PARTNER_ID" => $arParams["PARTNER_ID"],
        "ELEMENT_ID" => $arParams["ELEMENT_ID"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CUR_USER_PARTNERS" => $arResult["CUR_USER_PARTNERS"]
	),
	$component
);
?>