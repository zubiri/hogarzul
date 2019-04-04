<?php

/**
 * Configuration para base de datos connection
 *
 */

$host       = "localhost";
$username   = "us87123";
$password   = "0912Ej1238u3";
$dbname     = "bd_meteo10";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );
             
/**
 * Configuration para base de datos por defecto
 *
 */
/*
$host       = "localhost";
$username   = "root";
$password   = "";
$dbname     = "bd_meteo10";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );
*/              