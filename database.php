<?php

try {
    $db = new PDO("mysql:host=$host", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->query("CREATE DATABASE IF NOT EXISTS `$dbname` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci"); // create database if not exists
    $db->query("use `$dbname`;"); // use database
    $db->query("SET NAMES 'utf8'");
} catch (PDOException $e) {
    die("DB ERROR: " . $e->getMessage());
}

/* run database.sql if first time */
try {
    $stmt = $db->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_NUM);
    $table_count = count($tables);
    /* if no tables found */
    if ($table_count == 0) {
        $sql = file_get_contents('database.sql');
        $db->exec($sql);
    }
} catch (PDOException $e) {
    die("DB ERROR: " . $e->getMessage());
}