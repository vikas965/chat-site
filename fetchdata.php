

<?php 
           include "db.php";
           session_start();
           $u = $_SESSION['cuser'];
            $get_u = "SELECT * FROM chatusers where cusername='$u'";
            $ex = mysqli_query($con,$get_u);
            $udata = mysqli_fetch_assoc($ex);
            $u_id = $udata['unique_id'];
            $user_id=$_SESSION['user_id'];
            $get_user = "SELECT  * from chatusers where unique_id='$user_id'";
    
    $exe = mysqli_query($con,$get_user);
    $user_data = mysqli_fetch_assoc($exe);
    $user_name = $user_data['cusername'];
    $user_status = $user_data['cstatus'];
    $user_image = $user_data['cphoto'];
           $get_msgs = "SELECT * FROM messages where (in_msg_id='$user_id' and out_msg_id='$u_id') or (in_msg_id='$u_id' and out_msg_id='$user_id')";

           $msgs_exe = mysqli_query($con,$get_msgs);
           
           while($row=mysqli_fetch_assoc($msgs_exe))
           {

            if($row['out_msg_id']==$u_id)
            {
                echo "<div class='chat outgoing'>
                <div class='details'>
                    <p>
                    {$row['msg']}
                    </p>
                </div>
            </div>";
            }
            else{
                echo "<div class='chat incoming'>
                <img src='users/{$user_image}' >
                <div class='details'>
                    <p>{$row['msg']}</p>
                </div>
            </div>";
            }
           
           }
           ?>