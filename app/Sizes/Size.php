<?php 
namespace WordpressBase\Sizes;

class Size
{
    public $name;
    public $XWidth;
    public $YWidth;
    public $crop=false;

    public function __construct($name, $XWidth, $YWidth, $crop)
    {
        $this->name = $name;
        $this->XWidth = $XWidth;
        $this->YWidth = $YWidth;
        $this->crop = $crop;
    }
}
