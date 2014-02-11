<?php
namespace MwAdmin\View\Helper\DataTable;

interface ActionInterface
{

    /**
     *
     * @var string
     */
    const TARGET_SELF = '_self';

    /**
     *
     * @var string
     */
    const TARGET_BLANK = '_blank';

    /**
     *
     * @return string
     */
    public function getId();

    /**
     *
     * @return string
     */
    public function getRoute();

    /**
     *
     * @param mixed $row            
     * @return array
     */
    public function getRouteParams($row);

    /**
     *
     * @return string
     */
    public function getTarget();

    /**
     *
     * @return string
     */
    public function getLabel();
}