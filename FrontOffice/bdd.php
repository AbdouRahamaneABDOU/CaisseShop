<?php
$mysqlClient = new PDO(
  'mysql:host=localhost;dbname=caisse_shop;charset=utf8', 
  'root', 
  ''
);

try
{
    $mysqlClient = new PDO('mysql:host=localhost;dbname=caisse_shop;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
?>