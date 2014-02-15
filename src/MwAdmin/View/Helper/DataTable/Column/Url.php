<?php
namespace MwAdmin\View\Helper\DataTable\Column;

class Url extends String
{

    /**
     *
     * @param mixed $value            
     * @return \DateTime
     */
    public function __invoke($value)
    {
        return '<a target="_blank" href="' . $value . '">' . $value . '</a>';
    }
}