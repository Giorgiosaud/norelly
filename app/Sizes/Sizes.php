<?php 
namespace WordpressBase\Sizes;

class Sizes
{
    private $Sizes=array();
    private $transformedSizes=array();
    public function __construct(array $Sizes)
    {
        $this->transformedSizes=array();
        foreach ($Sizes as $Size) {
            $transformedSize=new Size($Size['name'], $Size['XWidth'], $Size['YWidth'], $Size['crop']);
            array_push($this->transformedSizes, $transformedSize);
        }
        
        add_action('after_setup_theme', array($this, 'executeSizes'));
    }
    public function executeSizes()
    {
        foreach ($this->transformedSizes as $Size) {
            add_image_size($Size->name, $Size->XWidth, $Size->YWidth, $Size->crop);
        }
    }
}
