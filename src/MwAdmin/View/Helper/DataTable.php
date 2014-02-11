<?php
namespace MwAdmin\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\Db\ResultSet\ResultSetInterface;
use Zend\View\Model\ViewModel;
use MwAdmin\View\Helper\DataTable\ActionInterface;

abstract class DataTable extends AbstractHelper implements DataTableInterface
{

    /**
     *
     * @param \Countable $resultSet            
     * @return \MwAdmin\View\Helper\DataTable
     *         string
     */
    public function __invoke(\Countable $resultSet = null)
    {
        if (empty($resultSet)) {
            return $this;
        }
        $view = $this->getViewModel();
        $view->setVariable('rows', $resultSet);
        return $this->getView()->render($view);
        ;
    }

    /**
     *
     * @return \Zend\View\Model\ViewModel
     */
    protected function getViewModel()
    {
        $model = new ViewModel(array(
            'dataHelper' => $this
        ));
        $model->setTemplate('mwadmin/datatable');
        return $model;
    }

    /**
     * (non-PHPdoc)
     * 
     * @see \MwAdmin\View\Helper\DataTableInterface::getColumns()
     */
    public function getColumns()
    {
        return array(
            'id' => 'ID'
        );
    }

    /**
     * (non-PHPdoc)
     *
     * @see \MwAdmin\View\Helper\DataTableInterface::hasActionColumn()
     */
    public function hasActionColumn()
    {
        return true;
    }
    
    /**
     *
     * @param ActionInterface $action
     * @param mixed $row
     */
    public function getCustomLink(ActionInterface $action, $row)
    {
        return $this->getView()->url($action->getRoute(), $action->getRouteParams($row));
    }

    /**
     * (non-PHPdoc)
     *
     * @see \MwAdmin\View\Helper\DataTableInterface::hasDeleteLink()
     */
    public function hasDeleteLink()
    {
        return true;
    }

    /**
     *
     * @param mixed $row            
     * @param string $idParam            
     */
    public function getDeleteLink($row, $idParam = 'id')
    {
        return $this->getView()->url($this->getRoute(), array(
            'action' => 'delete',
            $idParam => $row->getId()
        ));
    }

    /**
     * (non-PHPdoc)
     *
     * @see \MwAdmin\View\Helper\DataTableInterface::hasEditLink()
     */
    public function hasEditLink()
    {
        return true;
    }

    /**
     *
     * @param mixed $row            
     * @param string $idParam            
     */
    public function getEditLink($row, $idParam = 'id')
    {
        return $this->getView()->url($this->getRoute(), array(
            'action' => 'edit',
            $idParam => $row->getId()
        ));
    }

    /**
     * (non-PHPdoc)
     * 
     * @see \MwAdmin\View\Helper\DataTableInterface::hasReadLink()
     */
    public function hasReadLink()
    {
        return true;
    }

    /**
     *
     * @param mixed $row            
     * @param string $idParam            
     */
    public function getReadLink($row, $idParam = 'id')
    {
        return $this->getView()->url($this->getRoute(), array(
            'action' => 'view',
            $idParam => $row->getId()
        ));
    }

    /**
     *
     * @return string
     */
    public function getReadTarget()
    {
        return '_self';
    }
}