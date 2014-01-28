<?php
namespace MwAdmin\View\Helper\DataTable;

use Zend\View\Helper\AbstractHelper;

class ValueFormatter extends AbstractHelper
{

    /**
     *
     * @param mixed $value            
     * @return \DateTime
     */
    public function __invoke($value)
    {
        if ($value instanceof \DateTime) {
            return $value->format('d.m.Y H:i');
        }
        return $value;
    }
}