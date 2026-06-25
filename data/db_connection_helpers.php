<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'db_credentials.php';

function connect() {
    $dbc = new mysqli(DB_HOST, DB_USER, DB_PW, DB_NAME);
    if ($dbc->connect_error) die('Connect Error: ' . $dbc->connect_error);
    $dbc->set_charset('utf8');
    return $dbc;
}

function disconnect($dbc, $result = null) {
    if ($result) mysqli_free_result($result);
    mysqli_close($dbc);
}

// Safe SELECT — returns multiple rows
// Usage: getDataFromDB("SELECT * FROM movies WHERE genre = ?", "s", [$genre])
function getDataFromDB($query, $types = '', $params = []) {
    $dbc  = connect();
    $stmt = $dbc->prepare($query);
    if ($params) $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $rows = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    disconnect($dbc);
    return $rows;
}

// Safe SELECT — returns one row
function getOneFromDB($query, $types = '', $params = []) {
    $dbc  = connect();
    $stmt = $dbc->prepare($query);
    if ($params) $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();
    disconnect($dbc);
    return $row;
}

// Safe INSERT
function insertIntoDB($query, $types, $params) {
    $dbc  = connect();
    $stmt = $dbc->prepare($query);
    $stmt->bind_param($types, ...$params);
    $result = $stmt->execute();
    disconnect($dbc);
    return $result;
}

// Safe DELETE (or any query with params)
function deleteElementDB($query, $types, $params) {
    $dbc  = connect();
    $stmt = $dbc->prepare($query);
    $stmt->bind_param($types, ...$params);
    $result = $stmt->execute();
    $error  = $dbc->error;
    disconnect($dbc);
    return $result ?: $error;
}

// Safe INSERT — returns the new row's ID
function insertAndGetID($query, $types, $params) {
    $dbc  = connect();
    $stmt = $dbc->prepare($query);
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $id = $dbc->insert_id;
    disconnect($dbc);
    return $id;
}
?>