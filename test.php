<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?php
$uploadDir = $_SERVER["DOCUMENT_ROOT"]."/upload/";
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
        } else {
            echo json_encode(['status'=>'error', 'msg'=>'Ошибка загрузки файла']);
        }
        if (move_uploaded_file($_FILES['offers']['tmp_name'], $uploadDir . $_FILES['offers']['name'])) {
            echo json_encode(['status'=>'ok', 'msg'=>'Файл загружен в директорию ' . $uploadDir]);
        } else {
            echo json_encode(['status'=>'error', 'msg'=>'Ошибка загрузки файла']);
        }
    }
    echo '<pre>';
    print_r($_FILES);
    echo '</pre>';
}