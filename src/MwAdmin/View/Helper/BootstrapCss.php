<?php
namespace MwAdmin\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Helper\HeadLink;

class BootstrapCss extends AbstractHelper
{

    /**
     *
     * @var array
     */
    protected $config;

    /**
     *
     * @param array $config            
     */
    public function __construct(array $config)
    {
        $this->setConfig($config);
    }

    /**
     *
     * @param array $config            
     * @return \MwAdmin\View\Helper\BootstrapCss
     */
    public function setConfig(array $config)
    {
        $this->config = $config;
        return $this;
    }

    /**
     *
     * @param string $key            
     * @return array
     */
    public function getConfig($key = null)
    {
        if (empty($key)) {
            return $this->config;
        }
        return $this->config[(string) $key];
    }

    /**
     *
     * @return HeadLink
     */
    public function __invoke()
    {
        $view = $this->getView();
        
        if ($this->getConfig('use_cdn')) {
            $bootstrapUrl = $this->getConfig('cdn_url');
        } else {
            $bootstrapUrl = $view->basepath($this->getConfig('local_url'));
        }
        
        if($this->getConfig('custom_theme')) {
            $themeUrl = $view->basepath($this->getConfig('custom_theme'));
            $view->headLink()->prependStylesheet($themeUrl);
        }
        
        return $view->headLink()->prependStylesheet($bootstrapUrl);
    }
}