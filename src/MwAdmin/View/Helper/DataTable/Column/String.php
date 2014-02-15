<?php
namespace MwAdmin\View\Helper\DataTable\Column;

use Zend\View\Helper\EscapeHtml;

class String implements ColumnInterface
{

    /**
     *
     * @var string
     */
    protected $label;

    /**
     *
     * @var string
     */
    protected $index;

    /**
     *
     * @param string $index            
     * @param string $label
     *            OPTIONAL
     */
    public function __construct($index, $label = null)
    {
        $this->setIndex($index);
        if (! empty($label)) {
            $this->setLabel($label);
        }
    }

    /**
     * (non-PHPdoc)
     *
     * @see \MwAdmin\View\Helper\DataTable\Column\ColumnInterface::setLabel()
     */
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \MwAdmin\View\Helper\DataTable\Column\ColumnInterface::getIndex()
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * (non-PHPdoc)
     * 
     * @see \MwAdmin\View\Helper\DataTable\Column\ColumnInterface::__invoke()
     */
    public function __invoke($value)
    {
        $escapeHtml = new EscapeHtml();
        return $escapeHtml($value);
    }

    /**
     * (non-PHPdoc)
     *
     * @see \MwAdmin\View\Helper\DataTable\Column\ColumnInterface::setIndex()
     */
    public function setIndex($index)
    {
        $this->index = (string) $index;
        return $this;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \MwAdmin\View\Helper\DataTable\Column\ColumnInterface::getLabel()
     */
    public function getLabel()
    {
        return $this->label;
    }
}