<?php
namespace MwAdmin\View\Helper\DataTable\Column;

class DateColumn extends StringCol
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
        return parent::__invoke($value);
    }
}
