<?php
namespace MwAdmin\View\Helper\DataTable\Column;

class Boolean extends StringCol
{

    /**
     *
     * @param mixed $value            
     * @return \DateTime
     */
    public function __invoke($value)
    {
        if($value) {
            return 'boolean.true';
        }
        return 'boolean.false';
    }
}
