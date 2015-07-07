<?php
$version = '3.3.5';
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
        
        // add custom css
        'custom_theme' => 'css/mwadmin.css'
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
    'translator' => array(
        'locale' => 'de_DE',
        'translation_file_patterns' => array(
            array(
                'type' => 'phparray',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.php'
            )
        )
    ),
    'view_helpers' => array(
        'factories' => array(
            'bootstrapCss' => 'MwAdmin\View\Helper\BootstrapCssFactory',
            'bootstrapJs' => 'MwAdmin\View\Helper\BootstrapJsFactory',
            'mwAdminBrandName' => 'MwAdmin\View\Helper\BrandNameFactory',
        ),
        'invokables' => array(
            'bootstrapForm' => 'MwAdmin\View\Helper\BootstrapForm',
            'dataTable' => 'MwAdmin\View\Helper\DataTable'
        )
    ),
    'view_manager' => array(
        'template_map' => array(
            'layout/admin' => __DIR__ . '/../view/layout/bootstrap.phtml',
            'form/bootstrap' => __DIR__ . '/../view/form/bootstrap.phtml',
            'mwadmin/datatable' => __DIR__ . '/../view/mw-admin/datatable.phtml',
            'mwadmin/pagination' => __DIR__ . '/../view/mw-admin/paginator.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        ),
    )
);
