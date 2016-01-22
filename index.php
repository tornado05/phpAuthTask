<?php
require_once __DIR__ . '/DSL/Core.php';
$core = Core::getInstance();
echo $core->executeRequest();