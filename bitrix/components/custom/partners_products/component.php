<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<?
if(!CModule::includeModule("iblock"))
{
    $this->abortResultCache();
    ShowError("Модуля инфоблока нету :(");
    return;
}

if (!CUser::IsAuthorized())
{
    ShowError("Для доступа необходимо пройти авторизацию!");
    return;
}

// Проводим выборку допустимых для показа партнеров для текущего пользователя
$result = CIBlockElement::GetList(
        array(), 
        array(
            "IBLOCK_ID" =>  $arParams["PARTNERS_IBLOCK_ID"], // Ищем в инфоблоке партнеров
            "PROPERTY_OPERATOR" => CUser::GetID()  // с id оператора совпадающим с id текущего пользователя
        ),
        false,
        array(),
        array("ID")
);
$curUserPartners = array(); // Массив с допустимыми id партнеров для текущего пользователя
while ($rs = $result->GetNextElement()) // заполенние массива
{
    $arPartner = $rs->GetFields();
    $curUserPartners[] = $arPartner["ID"];
}
// Закончили выборку

$arComponentVariables = array(//Массив переменных
    "PARTNER_ID",
    "ELEMENT_ID"
);

$arVariableAliases = array(// Массив псевдонимов переменных
    "PARTNER_ID" => $arParams["PARTNER_ID"],
    "ELEMENT_ID" => $arParams["ELEMENT_ID"]
);

$arVariables = array(); // Массив для извлеченных из HTTP переменных
CComponentEngine::InitComponentVariables(false, $arComponentVariables, $arVariableAliases, $arVariables); // Заполняем массив
    
if ( (count($curUserPartners)==0) || // Если нет товаров с привязкой Партнер -> текущий пользователь
     (isset($arVariables["PARTNER_ID"]) && !in_array($arVariables["PARTNER_ID"], $curUserPartners))  ) { // или в url введен id недопустимого партнера
    ShowError("Доступ запрещен!");
    return;
}   

$componentPage = "";

if(isset($arVariables["PARTNER_ID"]) && isset($arVariables["ELEMENT_ID"]))
    $componentPage = "detail";
elseif(isset($arVariables["PARTNER_ID"]))
    $componentPage = "list";
else
    $componentPage = "tab";

	$arResult = array(
		"VARIABLES" => $arVariables, // передаем в результ HTTP переменные
        "CUR_USER_PARTNERS" => $curUserPartners // и id допустимых партнеров текущего пользователя
	);  

$this->IncludeComponentTemplate($componentPage); 
?>



