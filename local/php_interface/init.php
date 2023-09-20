<?php
function pre($ar)
{

    echo '<pre>';
    print_r($ar);
    echo '</pre>';
}

require_once '/srv/www/vensheness.school.783630.ru/htdocs/local/vendor/autoload.php';

Bitrix\Main\Loader::registerAutoLoadClasses(null, [
    'App\Image\Resize' => '/local/php_interface/source/Resize.php'
]);

#use App\Image\Resize;
#$imgOb = new Resize($link);
#$img = $imgOb->RenderSize(110,110,$fileName);



