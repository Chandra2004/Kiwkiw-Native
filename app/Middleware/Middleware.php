<?php

namespace {{NAMESPACE}}\Middleware;

require_once __DIR__ . '/../App/Config.php';

interface Middleware
{
    function before();
}
