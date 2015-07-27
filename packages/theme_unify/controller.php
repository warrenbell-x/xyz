<?php

namespace Concrete\Package\ThemeUnify;

use Concrete\Core\Package\Package;
use Concrete\Core\Page\Theme\Theme;
use Concrete\Core\Asset\AssetList;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends Package
{
    protected $pkgHandle = 'theme_unify';
    protected $appVersionRequired = '5.7.1';
    protected $pkgVersion = '1.0';

    public function getPackageDescription()
    {
        return t("Adds Unify Theme 2.");
    }

    public function getPackageName()
    {
        return t("Unify");
    }

    public function install()
    {
        $pkg = parent::install();
        Theme::add('unify', $pkg);
    }

    public function on_start()
    {
        $assetList = AssetList::getInstance();

        // Register js and css for the Revolution Slider and put it in a asset group
        $assetList->register(
            'javascript', 'revolution/init', 'themes/unify/js/plugins/revolution-slider.js',
            array('minify' => false, 'combine' => false),
            'theme_unify'
        );
        $assetList->register(
            'javascript', 'revolution/core', 'themes/unify/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js',
            array('minify' => false, 'combine' => false),
            'theme_unify'
        );
        $assetList->register(
            'javascript', 'revolution/tools', 'themes/unify/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js',
            array('minify' => false, 'combine' => false),
            'theme_unify'
        );
        $assetList->register(
            'css', 'revolution', 'themes/unify/plugins/revolution-slider/rs-plugin/css/settings.css',
            array('minify' => false, 'combine' => false),
            'theme_unify'
        );

        $assetList->registerGroup('revolution', array(
            array('javascript', 'revolution/tools'),
            array('javascript', 'revolution/core'),
            array('javascript', 'revolution/init'),
            array('css', 'revolution')
        ));
    }


}
