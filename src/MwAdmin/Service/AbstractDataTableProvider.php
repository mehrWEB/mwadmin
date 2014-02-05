<?php
namespace MwAdmin\Service;

use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Db\Sql\Select;
use Zend\Db\Adapter\AdapterInterface as DbAdapterInterface;
use Zend\Db\ResultSet\ResultSetInterface;
use Zend\Paginator\Paginator;

abstract class AbstractDataTableProvider implements DataTableProviderInterface
{

    /**
     * (non-PHPdoc)
     *
     * @see \MwAdmin\Service\DataTableProviderInterface::getDataTableHydrator()
     */
    public function getDataTableHydrator()
    {
        return new ClassMethods();
    }

    /**
     * (non-PHPdoc)
     *
     * @see \MwAdmin\Service\DataTableProviderInterface::getDataTableResultSet()
     */
    public function getDataTableResultSet()
    {
        $hydrator = $this->getDataTableHydrator();
        $prototype = $this->getDataTableEntityPrototype();
        return new HydratingResultSet($hydrator, $prototype);
    }

    /**
     * (non-PHPdoc)
     *
     * @see \MwAdmin\Service\DataTableProviderInterface::getDataTablePaginatorAdapter()
     */
    public function getDataTablePaginatorAdapter(Select $select, DbAdapterInterface $adapter, ResultSetInterface $resultSet)
    {
        return new DbSelect($select, $adapter, $resultSet);
    }

    /**
     * (non-PHPdoc)
     *
     * @see \MwAdmin\Service\DataTableProviderInterface::getDataTableSelect()
     */
    public function getDataTableSelect($page = 1, $perPage = 10)
    {
        $table = $this->getDataTableGateway();
        $sql = new Select($table->getTable());
        $sql->order($this->getDefaultSort());
        $sql->limit($perPage, $page * $perPage - $perPage);
        return $sql;
    }

    /**
     *
     * @return array
     */
    public function getDefaultSort()
    {
        return array(
            'id DESC'
        );
    }

    /**
     * (non-PHPdoc)
     * 
     * @see \MwAdmin\Service\DataTableProviderInterface::getDataTablePaginator()
     */
    public function getDataTablePaginator($page, $perPage)
    {
        $table = $this->getDataTableGateway();
        $sql = $this->getDataTableSelect($page, $perPage);
        
        $resultSet = $this->getDataTableResultSet();
        $adapter = $table->getAdapter();
        $paginatorAdapter = $this->getDataTablePaginatorAdapter($sql, $adapter, $resultSet);
        $paginator = new Paginator($paginatorAdapter);
        $paginator->setCurrentPageNumber($page);
        $paginator->setItemCountPerPage($perPage);
        return $paginator;
    }
}