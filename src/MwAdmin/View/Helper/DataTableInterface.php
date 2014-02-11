<?php
namespace MwAdmin\View\Helper;

interface DataTableInterface
{

    /**
     *
     * @return array
     */
    public function getColumns();

    /**
     *
     * @return boolean
     */
    public function hasActionColumn();
    
    /**
     * @return array
     */
    public function getCustomActions();

    /**
     *
     * @return boolean
     */
    public function hasDeleteLink();

    /**
     *
     * @return boolean
     */
    public function hasEditLink();

    /**
     *
     * @return boolean
     */
    public function hasReadLink();

    /**
     *
     * @return string
     */
    public function getRoute();
}