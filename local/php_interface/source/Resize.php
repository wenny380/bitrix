<?php
namespace App\Image;
use Intervention\Image\ImageManager;

class Resize{
    public $picLink;
    function __construct($link) {
        $this->picLink = $link;

    }
    public function getLink()
    {
        return $this->picLink;
    }
    public function RenderSize($width, $height, $name)
    {
        $manager = new ImageManager(['driver' => 'imagick']);
        $link1 = "/upload/img/".$name[0]."_1x.".$name[1];
        $link2 = "/upload/img/".$name[0]."_2x.".$name[1];
      if(!file_exists($link1))
          {
              $img = $manager->make($this->picLink);
              $img->resize($width, $height);
              $img->save($_SERVER["DOCUMENT_ROOT"] .$link1);
          }
      if (!file_exists($link2))
      {
          $img = $manager->make($this->picLink);
          $img->resize($width*2, $height*2);
          $img->save($_SERVER["DOCUMENT_ROOT"] .$link2);
      }
     $renderImg= array(
         "s" =>$link1,
         "l"=>$link2
     );
      return $renderImg;
    }

}