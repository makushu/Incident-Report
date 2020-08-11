
<html>
    <head>
        <meta charset="UTF-8">
        <title>TO DO LIST</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="/style/style.css">
    </head>
    <body>
        <?php require_once 'process.php';
       
        
            if(isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            endif;  
        ?>
        </div>
        <?php
        
        $mysqli = new mysqli('localhost', 'root', '', 'todolist') or die (mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM item ORDER BY rank ASC") or die($mysql->error);

        ?>
    <center>
        <form action="process.php" method="POST" id="displayLists">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="text" name="name" placeholder="name" value="<?php echo $name; ?>">
            <input type="number" name="rank" placeholder="rank"  value="<?php echo $rank; ?>">      
            <?php
            if($update == true):
                ?>
            <button type="submit" name="update" class="btn btn-info">Edit</button>                
            <?php         else:      ?>
            <button type="submit" name="save" class="btn btn-primary">Save</button>
            <?php         endif; ?>
        </form>
        <table id="displayLists">
            <tr>
                <th>NAME</th>
                <th>RANK</th>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()):
                ?>
            <tr>
                 <td style="padding-right: 100px;"><?php echo $row['name']; ?></td>
                 <td style="padding-right: 100px"><?php echo $row['rank']; ?></td>
                 <td>
                     <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">EDIT</a>
                     <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">DELETE</a>
                 </td>
             </tr>

            <?php endwhile; ?>
             
        </table>
    </center>
        
    </body>
    
</html>
