<?php

namespace {{NAMESPACE}}\Models;

use {{NAMESPACE}}\App\Database;

class DashboardModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
}
