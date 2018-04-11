<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if (!CModule::IncludeModule("iblock"))
	return;

$arComponentParameters = array(
	"GROUPS" => array(
	),
	"PARAMETERS" => array(
        "AJAX_MODE" => array(),
    	"IBLOCK_TYPE" => array(
			"PARENT" => "BASE",
			"NAME" => "Тип инфоблока с товарами",
			"TYPE" => "STRING",
			"REFRESH" => "N",
            "DEFAULT" => "products", 
		),
		"IBLOCK_ID" => array(
			"PARENT" => "BASE",
			"NAME" => "ID инфоблока c товарами",
			"TYPE" => "STRING",
            "DEFAULT" => "2", 
			"REFRESH" => "N",
		),
        "PARTNERS_IBLOCK_ID" => array(
			"PARENT" => "BASE",
			"NAME" => "ID инфоблока c партнерами",
			"TYPE" => "STRING",
            "DEFAULT" => "5", 
			"REFRESH" => "N",
		),
        "PARTNER_ID" => array(
            "PARENT" => "BASE",
			"NAME" => "ID партнера для вывода в адресной строке",
			"TYPE" => "STRING",
            "DEFAULT" => "PARTNER_ID", 
			"REFRESH" => "N",
        ),
        "ELEMENT_ID" => array(
            "PARENT" => "BASE",
			"NAME" => "ID товара для вывода в адресной строке",
			"TYPE" => "STRING",
            "DEFAULT" => "ELEMENT_ID", 
			"REFRESH" => "N",
        ),        
        "ELEMENTS_COUNT" => Array(
			"PARENT" => "BASE",
			"NAME" => "Количество элементов на странице",
			"TYPE" => "STRING",
			"DEFAULT" => "2",
		),
        
	),
);
