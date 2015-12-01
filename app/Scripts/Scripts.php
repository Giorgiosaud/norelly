<?php
namespace WordpressBase\Scripts;

class Scripts
{
    private $scripts=array();
    private $transformedScripts=array();
    public function __construct(array $scripts)
    {
        $this->transformedScripts=array();
        foreach ($scripts as $index=>$script) {
            $transformedScript=new Script($script['tagName'], $script['src'],$script['deps'],$script['ver'],$script['cdn'],$script['in_footer']);
            array_push($this->transformedScripts,$transformedScript);
        }
        add_action( 'wp_enqueue_scripts', array($this,'executeScripts') );
    }
    public function executeScripts(){
        foreach ($this->transformedScripts as $script) {
            wp_deregister_script($script->tagName);
            wp_register_script( $script->tagName, $script->src, $script->deps, $script->ver, $script->in_footer );
            wp_localize_script( $script->tagName, 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
            wp_enqueue_script($script->tagName);
        }
    }

}
