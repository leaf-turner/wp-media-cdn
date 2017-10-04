<?php
//HTTP_Host: returns the header from current request of the clientexample
//SERVER_NAME: returns the server name defined in tour host configuration
$serverName = $_SERVER['HTTP_HOST']?$_SERVER['HTTP_HOST']: $_SERVER["SERVER_NAME"];
$id           = str_replace('.','-',$server_name);
$project_name = trim(substr($id, 0, 30), '-');
$project_id   = trim(substr($id, 0, 23), '-') . "-" . rand(100000, 999999);
$bucket_id    = trim("stateless-" . substr($id, 0, 20), '-');
?>
