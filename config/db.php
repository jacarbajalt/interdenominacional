<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=interdenominacional',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
     // Otras configuraciones de la base de datos aquí
     'enableSchemaCache' => false, // Desactivar la caché de esquemas para habilitar el registro de consultas
     'enableQueryCache' => false, // Desactivar la caché de consultas para habilitar el registro de consultas
     'enableLogging' => true, // Habilitar el registro de consultas

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
