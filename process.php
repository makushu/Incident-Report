<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'todolist') or die(mysqli_error($mysqli));

$update = false;
$id = 0;
$name = '';
$rank = '';
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $rank = $_POST['rank'];

    $mysqli->query("INSERT INTO item (name, rank) VALUES('$name','$rank')") or
            die($mysqli->error);

    $_SESSION['message'] = $name . " has been saved";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");
}


if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;

    $result = $mysqli->query("SELECT * FROM item WHERE id=$id") or
            die($mysqli->error);

    $row = $result->fetch_array();
    $name = $row['name'];
    $rank = $row['rank'];
}


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $rank = $_POST['rank'];

    $mysqli->query("UPDATE item SET name='$name', rank='$rank' WHERE id=$id") or
            die($mysqli->error);
    $_SESSION['message'] = $name . " has been updated";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $mysqli->query("DELETE FROM item WHERE id=$id") or
            die($mysqli->error);

    $_SESSION['message'] = "the delete was successful";
    $_SESSION['msg_type'] = "success";
    header("location: index.php");
}




