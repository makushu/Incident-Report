<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>INCIDENT REPORTER</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    </head>
    <body>
        <?php require_once 'process.php';
        // put your code here
       
        ?>
        
        <?php  
            if(isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            endif;  
        ?>
        </div>
        <?php
        
        $mysqli = new mysqli('localhost', 'root', '', 'one') or die (mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM data") or die($mysql->error);
        
        ?>
        <table>
            <?php
            while ($row = $result->fetch_assoc()):
                ?>
             <tr>
                 <td><?php echo $row['name']; ?></td>
                 <td><?php echo $row['surname']; ?></td>
                 <td>
                     <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">EDIT</a>
                     <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">DELETE</a>
                 </td>
             </tr>

            <?php endwhile; ?>
            
            <tr><td>Actions</td></tr>
        </table>
      
        <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="text" name="name" placeholder="name" value="<?php echo $name; ?>">
            <input type="text" name="surname" placeholder="surname"
                   value="<?php echo $surname; ?>">      
            <?php
            if($update == true):
                ?>
            <button type="submit" name="update" class="btn btn-info">Edit</button>                
            <?php         else:      ?>
            <button type="submit" name="save" class="btn btn-primary">Save</button>
            <?php         endif; ?>
        </form>
    </body>
    
</html>
