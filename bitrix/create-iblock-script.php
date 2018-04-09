<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>

<?
if (CModule::IncludeModule('iblock')) 
{
    $iblocktype = "partners";
   
    $obIBlockType =  new CIBlockType;
    $arFields = Array(
        "ID"=>$iblocktype,
        "SECTIONS"=>"Y",
        "LANG"=>Array(
                    "ru"=>Array(
                    "NAME"=>"Партнеры",               
                    ), 
                    "en"=>Array(
                    'NAME'=>'Partners',
                    )
        )
    );
    $res = $obIBlockType->Add($arFields);
    if(!$res)
    { 
        $error = $obIBlockType->LAST_ERROR;
    } 
    else 
    {
        $obIblock = new CIBlock;
        $arFields = Array(
            "NAME"=> "Партнеры",
            "ACTIVE" => "Y",
            "IBLOCK_TYPE_ID" => $iblocktype,
            "SITE_ID" => "s1"
        );
        $newIblockID = $obIblock->Add($arFields);
        

        $ibp = new CIBlockProperty;
        $ibp->Add(Array(
            "NAME" => "Описание",
            "ACTIVE" => "Y",
            "SORT" => "100",
            "CODE" => "DESCRIPTION",
            "PROPERTY_TYPE" => "S",
            "IBLOCK_ID" => $newIblockID
            )
        ); 
        $ibp->Add(Array(
            "NAME" => "Условия доставки",
            "ACTIVE" => "Y",
            "SORT" => "200",
            "CODE" => "CONDITIONS",
            "PROPERTY_TYPE" => "S",
            "IBLOCK_ID" => $newIblockID
            )
        ); 
        $ibp->Add(Array(
            "NAME" => "Оператор",
            "ACTIVE" => "Y",
            "SORT" => "300",
            "CODE" => "OPERATOR",
            "PROPERTY_TYPE" => 'S',
            "USER_TYPE" => 'UserID',
            "IBLOCK_ID" => $newIblockID
            )
        );         
           
   }
}
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>