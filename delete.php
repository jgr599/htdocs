<?php
if ( isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myshop";

    //create connection
    $connection = new mysqli($servername, $username, $password, $dbname, 3308);

    $sql = "DELETE FROM clients WHERE id = $id";
    $connection->query($sql);
}

    header("Location: /MYSOP/index.php");
?>