<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Партнерский кабинет");
?><?$APPLICATION->IncludeComponent(
	"custom:partners_products",
	"",
	Array(
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"ELEMENTS_COUNT" => "2",
		"ELEMENT_ID" => "ELEMENT_ID",
		"IBLOCK_ID" => "2",
		"IBLOCK_TYPE" => "products",
		"PARTNERS_IBLOCK_ID" => "5",
		"PARTNER_ID" => "PARTNER_ID"
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
