<?php

namespace {{NAMESPACE}}

use {{NAMESPACE}}\App\Database;

abstract class Migration
{
    protected Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    abstract public function up();

    abstract public function down();
}
?>
