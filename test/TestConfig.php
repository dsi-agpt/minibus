<?php
return array (
		'modules' => array (
				'ZfcBase',
				'ZfcUser',
				'ZfcUserLdap',
				'CdmFr',
				'Application',
				'DoctrineModule',
				'DoctrineORMModule' 
		),
		'module_listener_options' => array (
				'config_glob_paths' => array (
						'../../../config/autoload/{,*.}{global,local}.php' 
				),
				'module_paths' => array (
						'module',
						'vendor' 
				) 
		) 
);