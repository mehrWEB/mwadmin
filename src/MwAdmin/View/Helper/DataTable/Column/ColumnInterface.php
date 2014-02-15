<?php
namespace MwAdmin\View\Helper\DataTable\Column;

use Zend\View\Helper\AbstractHelper;

interface ColumnInterface
{

    /**
     *
     * @param string $value            
     * @return string
     */
    public function __invoke($value);

    /**
     *
     * @return string
     */
    public function getIndex();

    /**
     *
     * @param string $index            
     * @return ColumnInterface
     */
    public function setIndex($index);

    /**
     *
     * @return string
     */
    public function getLabel();

    /**
     *
     * @param string $label            
     * @return ColumnInterface
     */
    public function setLabel($label);
}