<?php
namespace WordpressBase\Styles;

class Styles
{
    private $Styles=array();
    private $transformedStyles=array();
    public function __construct(array $Styles)
    {
        $this->transformedStyles=array();
        foreach ($Styles as $index=>$Style) {
            $transformedStyle=new Style($Style['tagName'], $Style['src'],$Style['deps'],$Style['ver'],$Style['cdn'],$Style['media']);
            array_push($this->transformedStyles,$transformedStyle);
        }
        add_action( 'wp_enqueue_scripts', array($this,'executeStyles') );
    }
    public function executeStyles(){
        foreach ($this->transformedStyles as $style) {
            wp_deregister_style($style->tagName);
            wp_register_style( $style->tagName, $style->src, $style->deps, $style->ver, $style->in_footer );
            wp_enqueue_style($style->tagName);
        }
    }

}
