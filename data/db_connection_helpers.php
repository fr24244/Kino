<?php


ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'db_credentials.php';

function connect()
{
    $dbc = new mysqli(DB_HOST, DB_USER, DB_PW, DB_NAME);

    if ($dbc->connect_error) {
        die('Connect Error: ' . $dbc->connect_error);
    }

    $dbc->set_charset('utf8');

    return $dbc;
}

function disconnect($dbc, $result = null)
{
    if ($result) mysqli_free_result($result);
    mysqli_close($dbc);
}

function getDataFromDB($query)
{
    $dbc = connect();

    $result = mysqli_query($dbc, $query);

    if (!$result) {
        die('Query Error: ' . mysqli_error($dbc));
    }

    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    disconnect($dbc, $result);

    return $rows;
}

function getOneFromDB($query)
{
    $dbc = connect();

    $result = mysqli_query($dbc, $query);

    if (!$result) {
        die('Query Error: ' . mysqli_error($dbc));
    }

    $row = mysqli_fetch_assoc($result);

    disconnect($dbc, $result);

    return $row;
}

function insertIntoDB($sql)
{
    $dbc = connect();

    $result = mysqli_query($dbc, $sql);

    disconnect($dbc);

    return $result;
}

function deleteElementDB($sql)
{
    $dbc = connect();

    $result = mysqli_query($dbc, $sql);

    $error = mysqli_error($dbc);

    disconnect($dbc);

    return $result ?: $error;
}

function insertAndGetID($sql)
{
    $dbc = connect();

    mysqli_query($dbc, $sql);

    $id = mysqli_insert_id($dbc);

    disconnect($dbc);

    return $id;
}


require_once 'db_connection_helpers.php';

$dbc = connect();

echo "Connection successful!";

disconnect($dbc);


?>