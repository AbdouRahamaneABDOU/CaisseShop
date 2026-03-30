<?php
$mysqlClient = new PDO(
  'mysql:host=localhost;dbname=caisseshop;charset=utf8', 
  'root', 
  ''
);

try
{
    $mysqlClient = new PDO('mysql:host=localhost;dbname=caisseshop;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
?>