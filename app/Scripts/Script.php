<?php
namespace WordpressBase\Scripts;

class Script
{
    public $tagName;
    public $src;
    public $deps;
    public $ver;
    public $cdn=false;
    public $in_footer=false;

    public function __construct($tagName, $src, $deps, $ver, $cdn, $in_footer='23')
    {
        $this->tagName = $tagName;
        $this->src = ($cdn ? $src : get_stylesheet_directory_uri() .$src);
        $this->deps = $deps;
        $this->ver = $ver;
        $this->in_footer = $in_footer;
        
        $this->in_footer = $in_footer?$in_footer:false;
    }
}
