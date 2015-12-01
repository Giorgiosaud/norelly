<?php 
namespace WordpressBase\ShortCodes;

abstract class ShortCodesBase
{
    protected $is_content_filtered;
    protected $shortcodes;
    public function __construct($is_content_filtered=false)
    {
        var_dump(get_class_methods($this));
        die();
        $this->is_content_filtered=$is_content_filtered;
        if ($this->is_content_filtered) {
            add_filter('the_content', array($this, 'pre_process_shortcode'), 7);
        } else {
        }
    }

    public function pre_process_shortcode($content)
    {
        global $shortcode_tags;

    // Backup current registered shortcodes and clear them all out
        $orig_shortcode_tags = $shortcode_tags;
        $shortcode_tags = array();

        add_shortcode('Galeria', array($this, 'Galeria'));

    // Do the shortcode (only the one above is registered)
        $content = do_shortcode($content);

    // Put the original shortcodes back
        $shortcode_tags = $orig_shortcode_tags;

        return $content;
    }
}
