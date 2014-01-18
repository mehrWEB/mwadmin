<?php
namespace MwAdmin\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\Form\Form;

class BootstrapForm extends AbstractHelper
{
    /**
     * 
     * @return string
     */
    protected function getViewModel()
    {
        return 'form/bootstrap';
    }

    /**
     *
     * @param Form $form            
     * @return string
     */
    public function __invoke(Form $form)
    {
        return $this->view->render($this->getViewModel(), array(
            'form' => $form
        ));
    }
}