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
        if ($this->getConfig('use_cdn')) {
            $cdnUrl = $this->getConfig('cdn_url');
            return $this->getView()
                ->headLink()
                ->prependStylesheet($cdnUrl);
        }
        $localUrl = $this->getConfig('local_url');
        $view = $this->getView();
        return $view->headLink()->prependStylesheet($view->basepath($localUrl));
    }
}