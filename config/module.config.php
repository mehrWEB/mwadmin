<?php
$version = '3.0.3';
$settings = array(
    'css' => array(
        // for offline-usage: disable cdn and use local path instead
        'use_cdn' => true,
        
        // see above
        'cdn_version' => $version,
        
        // use protocol independent CSS embedding
        'cdn_url' => '//netdna.bootstrapcdn.com/bootstrap/' . $version . '/css/bootstrap.min.css',
        
        // will be passed to basePath()
        'local_url' => 'css/bootstrap.min.css',
    ),
    'js' => array(
        // for offline-usage: disable cdn and use local path instead
        'use_cdn' => true,
        
        // see above
        'cdn_version' => $version,
        
        // use protocol independent CSS embedding
        'cdn_url' => '//netdna.bootstrapcdn.com/bootstrap/' . $version . '/js/bootstrap.min.js',
        
        // will be passed to basePath()
        'local_url' => 'js/bootstrap.min.js',
    )
);

return array(
    'mwadmin' => $settings,
    'view_helpers' => array(
        'factories' => array(
            'bootstrapCss' => 'MwAdmin\View\Helper\BootstrapCssFactory',
            'bootstrapJs' => 'MwAdmin\View\Helper\BootstrapJsFactory',
            'mwAdminBrandName' => 'MwAdmin\View\Helper\BrandNameFactory',
        ),
        'invokables' => array(
            'bootstrapForm' => 'MwAdmin\View\Helper\BootstrapForm',
            'dataTable' => 'MwAdmin\View\Helper\DataTable',
            'valueFormat' => 'MwAdmin\View\Helper\DataTable\ValueFormatter',
        )
    ),
    'view_manager' => array(
        'template_map' => array(
            'layout/admin' => __DIR__ . '/../view/layout/bootstrap.phtml',
            'form/bootstrap' => __DIR__ . '/../view/form/bootstrap.phtml',
            'mwadmin/datatable' => __DIR__ . '/../view/mw-admin/datatable.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        ),
    )
);