<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('iblock');
function csvToArray($csvFile){
    $file_to_read = fopen($csvFile, 'r');
    while (!feof($file_to_read) ) {
        $lines[] = fgetcsv($file_to_read, 1000, ';');
    }
    fclose($file_to_read);
    return $lines;
}

function getSectionID($name)
{
    $idSec=0;
    $res = CIBlockSection::GetList (
        Array("ID" => "ASC"),
        Array("IBLOCK_ID" => 4 , "ACTIVE" => "Y", "NAME" => $name),
        false,
        Array('ID', 'NAME', 'SECTION_PAGE_URL', 'CODE')
    );

    while ($arItem = $res->GetNext()) {
        //print_r($arItem);
        //echo $arItem['ID'];
        $idSec= $arItem['ID'];
    }
    return $idSec;
}

//Загрузка файлов через форму
$uploadDir = $_SERVER["DOCUMENT_ROOT"]."/upload/";
$fileArt = '';
$fileCat = '';
echo $uploadDir;
if (isset($_FILES['sections']) && isset($_FILES['offers'])) {
    $sections = $_FILES['sections'];
    $offers = $_FILES['offers'];
    // Получаем нужные элементы массива "user_avatar"
    $tmpFileNameSection = $_FILES['sections']['tmp_name'];
    $uploadErrorCodeSection = $_FILES['sections']['error'];
    $tmpFileNameOffers = $_FILES['offers']['tmp_name'];
    $uploadErrorCodeOffers = $_FILES['offers']['error'];

    if ($uploadErrorCodeSection !== UPLOAD_ERR_OK || !is_uploaded_file($tmpFileNameSection)) {
        //Выводим соответствующее $errorCode сообщение об ошибка или "ошибка неизвестна"
        $message = isset($uploadErrorMessages[$uploadErrorCodeSection]) ? $uploadErrorMessages[$uploadErrorCodeSection] : 'При загрузке файла произошла неизвестная ошибка.';
        //Завершаем работу скрипта, выводим сообщение об ошибке
        echo json_encode(['status'=>'error', 'msg'=>$message]);
    }
    elseif ($uploadErrorCodeOffers !== UPLOAD_ERR_OK || !is_uploaded_file($tmpFileNameOffers)){
        //Выводим соответствующее $errorCode сообщение об ошибка или "ошибка неизвестна"
        $message = isset($uploadErrorMessages[$uploadErrorCodeOffers]) ? $uploadErrorMessages[$uploadErrorCodeOffers] : 'При загрузке файла произошла неизвестная ошибка.';
        //Завершаем работу скрипта, выводим сообщение об ошибке
        echo json_encode(['status'=>'error', 'msg'=>$message]);
    }
    else {
        //Если всё ок, выполняем манипуляции с файлом
        if (move_uploaded_file($_FILES['sections']['tmp_name'], $uploadDir . $_FILES['sections']['name'])) {
            echo json_encode(['status'=>'ok', 'msg'=>'Файл загружен в директорию ' . $uploadDir]);
            $fileCat = $uploadDir . $_FILES['sections']['name'];
        } else {
            echo json_encode(['status'=>'error', 'msg'=>'Ошибка загрузки файла']);
        }
        if (move_uploaded_file($_FILES['offers']['tmp_name'], $uploadDir . $_FILES['offers']['name'])) {
            echo json_encode(['status'=>'ok', 'msg'=>'Файл загружен в директорию ' . $uploadDir]);
            $fileArt =$uploadDir . $_FILES['offers']['name'];
        } else {
            echo json_encode(['status'=>'error', 'msg'=>'Ошибка загрузки файла']);
        }
    }
    //echo '<pre>';
    //print_r($_FILES);
    //echo '</pre>';
}

// конец разработки
//read the csv file into an array
$csv_art = csvToArray($fileArt);
$csv_cat = csvToArray($fileCat);

// transliteration
$params = Array(
    "max_len" => "100", // обрезает символьный код до 100 символов
    "change_case" => "L", // буквы преобразуются к нижнему регистру
    "replace_space" => "_", // меняем пробелы на нижнее подчеркивание
    "replace_other" => "_", // меняем левые символы на нижнее подчеркивание
    "delete_repeat_replace" => "true", // удаляем повторяющиеся нижние подчеркивания
    "use_google" => "false", // отключаем использование google
);
$idSectArr = array();
$len_cat= count($csv_cat);

//Add section
for( $i = 1; $i < $len_cat; $i++)
{
    if(!empty($csv_cat[$i][1]))
    {
        $parentCat = getSectionID([$csv_cat[$i][1]]);
    }
    else
        $parentCat = false;

    $bs = new CIBlockSection;

    $arFields = Array(
        "ACTIVE" => 'Y',
        "IBLOCK_SECTION_ID" => $parentCat,
        "IBLOCK_ID" => 4, // id ифоблока в котором будет создать раздел
        "NAME" => $csv_cat[$i][0],
        "CODE" =>CUtil::translit($csv_cat[$i][0], "ru" , $params),
    );
    $ID = $bs->Add($arFields);
    $res = ($ID>0);


}


// add element
$len_elem= count($csv_art);

for ($i = 1; $i < $len_elem-1; $i++)
{
    $idSect= getSectionID($csv_art[$i][5]);
    $el = new CIBlockElement;

    $PROP = array();
    $PROP[25] = $csv_art[$i][0];  // свойству (артикул) с id 25 задаём значение
    $PROP[26] = $csv_art[$i][3];  //старая цена
    $PROP[27] = $csv_art[$i][4];  //процент скидки
    $PROP[28] = $csv_art[$i][6];  //производитель
    $PROP[29] = $csv_art[$i][7];  //материал
    $PROP[30] = $csv_art[$i][8];  //страна
    $PROP[31] = $csv_art[$i][9];   //размер
    $PROP[32] = $csv_art[$i][10];   //единиц в упаковке
    $PROP[33] = $csv_art[$i][11];   //вес
    $PROP[34] = $csv_art[$i][12];   //новинка
    $PROP[35] = $csv_art[$i][13];   //акция
    $PROP[36] = $csv_art[$i][14];   //хит продаж
    //$PROP[37] = ;   //файл
    // get all pictures of the element
    $t = 1;
    $pictArr=array();
    $DETAIL_PICTURE="";
    $singlePic="";
    do
    {
        ///
        $newname= $csv_art[$i][0] . "-" .$t. ".jpg";
        $_filesname = iconv("UTF-8", "windows-1251",$newname);
        $singlePic = CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"] . "/upload/images/" . $_filesname);
        if(empty($singlePic))
        {
            $newname= $csv_art[$i][0] . "-" .$t. ".png";
            $_filesname = iconv("UTF-8", "windows-1251",$newname);
            $singlePic = CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"] . "/upload/images/" . $_filesname);
        }
        echo '<pre>';
        // print_r($singlePic);
        echo '<pre>';
        if(!empty($singlePic))
            $pictArr[]= $singlePic;
        $t++;
    }while(!empty($singlePic));

    if(!empty($pictArr))
    {
        $DETAIL_PICTURE = array_shift($pictArr);
        if(!empty($pictArr))
        {
            $PROP[37] = $pictArr;
        }
    }
    $NAME = $csv_art[$i][1];

    $arLoadProductArray = Array(
        "IBLOCK_SECTION_ID" => $idSect,          // id раздела где лежит элемент
        "IBLOCK_ID"      => 4,
        "PROPERTY_VALUES"=> $PROP,
        "NAME"           =>  $NAME,
        "ACTIVE"         => "Y",            // активен
        "CODE"           => CUtil::translit( $NAME, "ru" , $params),
        "DETAIL_PICTURE" => $DETAIL_PICTURE,
    );

    if($PRODUCT_ID = $el->Add($arLoadProductArray)){
        //echo "New ID: ".$PRODUCT_ID;
        $arFields = array(
            "ID" => $PRODUCT_ID,
            "VAT_ID" => 1, //выставляем тип ндс (задается в админке)
            "VAT_INCLUDED" => "Y", //НДС входит в стоимость
            "TYPE"  => \Bitrix\Catalog\ProductTable::TYPE_PRODUCT
        );
        if(CCatalogProduct::Add($arFields))
        {
            echo "Добавили параметры товара к элементу каталога ".$PRODUCT_ID.'<br>';
            $price= intval(str_replace(' ', '', $csv_art[$i][2]));

            $PRICE_TYPE_ID = 1;
            $arFields = Array(
                "PRODUCT_ID" => $PRODUCT_ID,
                "CATALOG_GROUP_ID" => $PRICE_TYPE_ID,
                "PRICE" => $price,
                "CURRENCY" => "RUB",
            );
            CPrice::Add($arFields);
        }
        else
            echo 'Ошибка добавления параметров<br>';

    }
    else
        echo "Error: ".$el->LAST_ERROR;
}







