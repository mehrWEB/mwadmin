<?php
namespace MwAdmin\View\Helper\DataTable\Column;

use Zend\I18n\View\Helper\CurrencyFormat;

class Currency extends String
{

    /**
     *
     * @param mixed $value            
     * @return \DateTime
     */
    public function __invoke($value)
    {
        $currency = new CurrencyFormat();
        $currency->setLocale('de_DE');
        $currency->setCurrencyCode('EUR');
        return $currency($value);
    }
}