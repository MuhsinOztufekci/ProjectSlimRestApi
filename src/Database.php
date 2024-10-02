<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class Database {
    public function __construct() {
        $capsule = new Capsule;

        $config = require __DIR__ . '/../config/database.php';
        $capsule->addConnection($config);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}
