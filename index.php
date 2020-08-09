<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php require_once 'process.php';
        // put your code here
       
        ?>
        
        <?php  
            if(isset($_SESSION['message'])): 
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            endif;  
        ?>
        
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
                     <a href="index.php?edit=<?php echo $row['id']; ?>">EDIT</a>
                     <a href="process.php?delete=<?php echo $row['id']; ?>">DELETE</a>
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
            <button type="submit" name="update">Edit</button>                
            <?php         else:      ?>
            <button type="submit" name="save">Save</button>
            <?php         endif; ?>
        </form>
    </body>
    
</html>
