<?php
namespace MwAdmin\Service;

use Zend\Stdlib\Hydrator\AbstractHydrator;
use Zend\Db\ResultSet\AbstractResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Adapter\AdapterInterface as DbAdapterInterface;
use Zend\Db\ResultSet\ResultSetInterface;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;

interface DataTableProviderInterface
{

    /**
     *
     * @return object
     */
    public function getDataTableEntityPrototype();

    /**
     *
     * @return AbstractHydrator
     */
    public function getDataTableHydrator();

    /**
     *
     * @return AbstractResultSet
     */
    public function getDataTableResultSet();

    /**
     *
     * @return TableGateway
     */
    public function getDataTableGateway();

    /**
     *
     * @param integer $page            
     * @param integer $perPage            
     * @return Paginator
     */
    public function getDataTablePaginator($page, $perPage);

    /**
     *
     * @param Select $select            
     * @param DbAdapterInterface $adapter            
     * @param ResultSetInterface $resultSet            
     * @return DbSelect
     */
    public function getDataTablePaginatorAdapter(Select $select, DbAdapterInterface $adapter, ResultSetInterface $resultSet);

    /**
     *
     * @param integer $page
     *            OPTIONAL
     * @param integer $perPage
     *            OPTIONAL
     * @return Select
     */
    public function getDataTableSelect($page = 1, $perPage = 10);
}