<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<br>
<?$APPLICATION->IncludeComponent(
	"custom:partners_products.detail",
	"",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "VARIABLES" => $arResult["VARIABLES"],
        "PARTNER_ID" => $arParams["PARTNER_ID"],
        "ELEMENT_ID" => $arParams["ELEMENT_ID"],
        "PARTNER_ID" => $arParams["PARTNER_ID"],
	),
	$component
);
?>
