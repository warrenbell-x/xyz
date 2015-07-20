<?php

namespace Concrete\Package\ThemeUnify\Theme\Unify;

use Concrete\Core\Page\Theme\Theme;

class PageTheme extends Theme {

    protected $pThemeGridFrameworkHandle = 'bootstrap3';

    public function registerAssets()
    {
        $this->providesAsset('javascript', 'bootstrap/*');
        $this->providesAsset('css', 'bootstrap/*');
        $this->providesAsset('css', 'core/frontend/*');
        $this->requireAsset('javascript', 'jquery');
        $this->providesAsset('javascript', 'blocks/image_slider');
        $this->providesAsset('css', 'blocks/image_slider');
        $this->requireAsset('css', 'font-awesome');
        // TODO Place this in image-slider block controller
        $this->requireAsset('revolution');
    }

    public function getThemeBlockClasses()
    {
        return array(
            'image' => array(
                'img-thumbnail'
            )
        );
    }

    public function getThemeDefaultBlockTemplates()
    {
        return array(
            'image_slider' => 'revolution_half_page.php'
        );
    }

}