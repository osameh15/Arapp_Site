<?php

var_dump(dirname(__FILE__));
$servername = "localhost";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$servername;dbname=project1", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['id']))
{
    try
    {
        $sql = "DELETE FROM advertise WHERE id=" . $_POST['id'];
        $conn->exec($sql);
        echo 1;

    }
    catch (PDOException $exception)
    {
        echo 0;
    }
}
