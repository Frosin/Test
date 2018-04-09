<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(!CModule::includeModule("iblock"))
{
    $this->abortResultCache();
    ShowError("Модуля инфоблока нету :(");
    return;
}

$arOrder = Array(
    'PROPERTY_PARTNER.NAME' => "ASC", // Упорядочить партнеров по имени
);
$arFilter = Array( // Производим отбор товаров у которых имеется по факту партнер
    'IBLOCK_ID' => $arParams["IBLOCK_ID"],
    'PROPERTY_PARTNER' => $arParams["CUR_USER_PARTNERS"], // Выборка по допустимым партнерам для текущего пользователя
);
$arGroupBy = false;
$arNavStartParams = Array();
$arSelectFields = Array(
    'PROPERTY_PARTNER.ID',
	'PROPERTY_PARTNER.NAME', // Выбираем название и id партнера
    'PROPERTY_PARTNER.PROPERTY_OPERATOR'
);

$res = CIBlockElement::GetList(
    $arOrder, 
    $arFilter,
    $arGroupBy,
    $arNavStartParams,
    $arSelectFields
);

$arItems = array();
while ($ob = $res->GetNextElement())
{
	$arItem = $ob->GetFields();
    $arItems[$arItem["PROPERTY_PARTNER_ID"]] = $arItem["PROPERTY_PARTNER_NAME"];    //Формируем массив ID Партнера => Имя партнера
}

$arResult["ITEMS"] = $arItems;

$this->IncludeComponentTemplate();
?>




