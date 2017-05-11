<?php
require 'core.inc.php';
require 'connect.inc.php';

$page = basename($current_file, '.'.pathinfo($current_file)['extension']);

echo $page;

?>