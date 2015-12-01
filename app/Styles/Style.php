<?php
namespace WordpressBase\Styles;

class Style
{
    public $tagName;
    public $src;
    public $deps;
    public $ver;
    public $cdn=false;
    public $media=null;

    public function __construct($tagName, $src, $deps, $ver,$cdn=false,$media=null)
    {
        $this->tagName = $tagName;
        $this->src = ($cdn ? $src : get_stylesheet_directory_uri() .$src);
        $this->deps = $deps;
        $this->ver = $ver;
        $this->media = $media;
    }
}
