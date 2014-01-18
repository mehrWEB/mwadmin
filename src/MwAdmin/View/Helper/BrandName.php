<?php
namespace MwAdmin\View\Helper;

use Zend\View\Helper\AbstractHelper;

class BrandName extends AbstractHelper
{

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @param string $brandName            
     * @return \MwAdmin\View\Helper\BrandName
     */
    public function setName($brandName)
    {
        $this->name = (string) $brandName;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *
     * @return string
     */
    public function __invoke()
    {
        $name = $this->getName();
        if (empty($name)) {
            return 'Brand name';
        }
        return $name;
    }
}