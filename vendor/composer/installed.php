<?php return array(
    'root' => array(
        'name' => '__root__',
        'pretty_version' => '1.0.0+no-version-set',
        'version' => '1.0.0.0',
        'reference' => NULL,
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        '__root__' => array(
            'pretty_version' => '1.0.0+no-version-set',
            'version' => '1.0.0.0',
            'reference' => NULL,
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'its/php-smpp' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'reference' => '5e68a5ee531f99b1793d0c666646c361909390e9',
            'type' => 'library',
            'install_path' => __DIR__ . '/../its/php-smpp',
            'aliases' => array(
                0 => '1.0.0.x-dev',
            ),
            'dev_requirement' => false,
        ),
    ),
);
