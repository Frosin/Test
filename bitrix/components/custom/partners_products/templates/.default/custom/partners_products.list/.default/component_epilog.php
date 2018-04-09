<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if (isset($_REQUEST["change_active"]) && 
    isset($_REQUEST["product_id"]) )
{
   if(!CModule::includeModule("iblock"))
	{
		$this->abortResultCache();
		ShowError("Модуля инфоблока нету :(");
		return;
	} 
     
    $activeKey = $_REQUEST["change_active"];
    $productId = $_REQUEST["product_id"];
    $arModify = Array(
      "ACTIVE"  => $activeKey, 
      );
    $el = new CIBlockElement;
    $res = $el->Update($productId, $arModify);
    $redirectAdress = $APPLICATION->GetCurPageParam(
        "",
        array("change_active", "product_id"),
        false
    );
    if ($res)
        LocalRedirect($redirectAdress); 
}
?>