
<?php
header("Refresh: 4");

?>


<?php 
include "db.php";
session_start();
if(!isset($_SESSION['cuser']))
{
    header('Location:user_signin.php');
}
$u = $_SESSION['cuser'];
$get_u = "SELECT * FROM chatusers where cusername='$u'";
$ex = mysqli_query($con,$get_u);
$udata = mysqli_fetch_assoc($ex);
$u_id = $udata['unique_id'];


    if(isset($_GET['user_id']))
    {

    $user_id =$_GET['user_id'];
    // echo $user_id;
    
    $get_user = "SELECT  * from chatusers where unique_id='$user_id'";
    
    $exe = mysqli_query($con,$get_user);
    $user_data = mysqli_fetch_assoc($exe);
    $user_name = $user_data['cusername'];
    $user_status = $user_data['cstatus'];
    $user_image = $user_data['cphoto'];
    }

    if(isset($_POST['submit']))
    {
        $msg = $_POST['msg'];
        $sender_id = $u_id;
        $reciever_id = $user_id;
        $insert_msg = "INSERT INTO messages(in_msg_id,out_msg_id,msg) VALUES('$reciever_id','$sender_id','$msg')";
        $msg_sent = mysqli_query($con,$insert_msg);
        if($msg_sent)
        {
            // echo "<script>alert('Message Sent')</script>";
            header('Location'.$_SERVER['PHP_SELF']);
           
        }
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>Document</title>
</head>
<body>
    <style>
        .containerss
        {
            width:100%;
            /* height:100vh; */
            padding-top: 20px;
            /* padding-bottom: 30px; */
            display:flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(255, 255, 255, 0.399);
        }
        .wrappers{
            background: rgba(248, 248, 248, 0.447);
            width: 340px;
            /* border: solid 1px black; */
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            border-radius: 7px;
            /* background: rgba(11, 70, 198, 0.646); */

        }

        .chat-area header{
            display: flex;
            align-items: center;
            /* justify-content: center;
             */

             padding: 18px 30px;
        }

        .chat-area header .back-icon{
            font-size: 18px;
            color: #333;
        }

        .chat-area header img{
            width: 45px;
            height: 45px;
            border-radius: 50%;
            margin: 0 15px;
        }

        .chat-area header span{
            font-size: 17px;
            font-weight: 500;
        }
        header{
            position: relative;
            background: white;
        }
        .chat-area header .details{
            position: absolute;
            /* right: 50px; */
            left:124px;
            top: 15px;
        }


        .chat-box{
            height: 400px;
            overflow-y: auto;
            overflow:scroll;
            background: #f7f7f7;
            padding: 19px 30px 20px 30px;
            box-shadow: inset 0 32px 32px -32px rgb(0 0 0 /5%),inset 0 32px 32px -32px rgb(0 0 0 /5%) ;
        }
        .chat-box .chat{
            margin: 15px 0 ;
        }
        .chat-box .chat p{
            word-wrap: break-word;
            padding: 8px 16px;
            box-shadow: 0 0 32px rgb(0 0 0 /8%),0 16px 16px -16px rgb(0 0 0 / 10%);
        }
        .chat-box .outgoing{
            display: flex;
            text-align: start;
            /* text-align: justify; */
            /* text-justify: auto; */
            
        }

        :is(.chat-box)::-webkit-scrollbar{
            width: 0px;
        }
        .outgoing .details p{
            background: #333;
            color: #fff;
            border-radius: 19px 19px 0 19px;
            font-size: small;
        }
        .outgoing .details{
            margin-left: auto;
            max-width: calc(100% - 100px);
        }
        .chat-box .incoming {
            display: flex;
            align-items: flex-end;
            /* justify-content: center; */
        }
        .chat-box .incoming img{
            width: 37px;
            height: 37px;
            border-radius: 50%;
        }
         
        .incoming .details{
            margin-left: 6px;
        }
        .incoming .details p{
            color: #333;
            background:#fff;
            border-radius: 17px 17px 17px 0px;
        }

        .chat-area .typing-area{
            padding: 18px 30px;
            display: flex;
            justify-content: space-between;
        }

        .typing-area{
            box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;
        }
        .typing-area input{
            height: 45px;
            width: calc(100% - 53px);
            font-size: 17px;
            border:1px solid #ccc;
            padding:0 13px;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            outline: none;
        }


        .typing-area button{
            width: 55px;
            border: none;
            outline:none;
            background: #333;
            color: #fff;
            font-size: 19px;
           
            border-radius: 0px 5px 5px 0px;
        }

        .details span{
            text-transform:capitalize;
        }
        @media screen and (max-width:480px) {

            .containerss
        {
            width:100%;
            height:100vh;
            /* padding-top: 30px; */
            padding-bottom: 30px;
            display: block;
            /* display:flex; */
            /* align-items: center; */
            /* justify-content: center; */
            background-color: rgba(255, 255, 255, 0.399);
        }
        .wrappers{
            background: rgba(248, 248, 248, 0.447);
            width: 100%;
            /* border: solid 1px black; */
            box-shadow: none;
            border-radius: 7px;
            /* background: rgba(11, 70, 198, 0.646); */

        }
        .chat-area header{
            display: flex;
            align-items: center;
            /* justify-content: center;
             */
            padding-top: 7px;
            
        }
        .chat-area header .details{
            position: absolute;
            /* right: 50px; */
            left:124px;
            top: 4px;
        }
        .chat-box{
            height:calc(100vh - 170px);
            overflow-y: auto;
            background: #f7f7f7;
            padding: 19px 30px 20px 30px;
            box-shadow: inset 0 32px 32px -32px rgb(0 0 0 /5%),inset 0 32px 32px -32px rgb(0 0 0 /5%) ;
        }
        }
    </style>
    <div class="containerss">
    <div class="wrappers">
        <section class="chat-area">
           <header>
            <a href="index.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
            <img src="users/<?php echo $user_image?>" alt="">
            <div class="details">
                <span><?php echo $user_name?></span>
                <p><?php echo $user_status?></p>
            </div>
           
           </header>
           <!-- <hr> -->
           <div class="chat-box">

           <?php 
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
            
           </div>

           <form action="" class="typing-area" method="post">
            <!-- <input type="submit" name="incoming_id" hidden>
            <input type="submit" name="outgoing_id" hidden> -->
            <input name="msg" type="text" placeholder="Type a message here..."  required>
            <button name="submit" type="submit"><i class="fa-solid fa-paper-plane"></i></button>
           </form>
        </section>
    </div>
</div>

<script>
    if(window.history.replaceState)
    {
        window.history.replaceState(null,null,window.location.href);
    }

    const chatBox = document.querySelector('.chat-box');
   
    chatBox.scrollTop = chatBox.scrollHeight;
   
</script>
</body>
</html>