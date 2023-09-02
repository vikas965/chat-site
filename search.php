<?php 

include_once "db.php";
$searchTerm = mysqli_real_escape_string($con,$_POST['searchTerm']);
$output = "";
$sql = mysqli_query($con,"SELECT * FROM  chatusers WHERE cusername LIKE '%{$searchTerm}%'");
if(mysqli_num_rows($sql)>0){

          

          while($row= mysqli_fetch_assoc($sql))
          {
            echo"<a href='#'>
            <div class='content'>
                <img src='users/{$row['cphoto']}'>
            
            <div class='details'>
                <span>{$row['cusername']}</span>
                <p>This is test message</p>
            </div>
        </div>";
        
        if($row['cstatus']=='Active'){
        echo "
        <div class='status-dot'><i class='fas fa-circle'></i></div>
        </a>";}
        else{
            echo "
        <div class='status-dots'><i class='fas fa-circle'></i></div>
        </a>";
        }
          }
        }

    else{
        echo "No users";
    }
          





?>