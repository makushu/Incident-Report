<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
        session_start();

$mysqli = new mysqli('localhost', 'root', '', 'one') or die (mysqli_error($mysqli));

$update = false;
$id=0;
$name = '';
$surname = '';
if(isset($_POST['save'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    
    $mysqli->query("INSERT INTO data (name, surname) VALUES('$name','$surname')") or 
            die($mysqli->error);    
    $_SESSION['message'] = "Record has been saved";
    $_SESSION['msg_type'] = "success";
    
    header("location: index.php");
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    
    $mysqli->query("DELETE FROM data WHERE id=$id") or 
            die($mysqli->error);    
    
    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg_type'] = "success";
        header("location: index.php");
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    
    $result =$mysqli->query("SELECT * FROM data WHERE id=$id") or 
            die($mysqli->error);    
    
        $row = $result->fetch_array();
       $name = $row['name'];
        $surname = $row['surname'];
}


if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    
    $mysqli->query("UPDATE data SET name='$name', surname='$surname' WHERE id=$id") or 
            die($mysqli->error);    
    $_SESSION['message'] = "Record has been updated";
    $_SESSION['msg_type'] = "success";
    
    header("location: index.php");
}



