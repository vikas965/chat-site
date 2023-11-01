<?php

include "db.php";
// session_start();

if(isset($_POST['submit'])){
            
    $uname = $_POST['username'];
    $email = $_POST['email'];
    $password =  md5($_POST['password']);
    $cpassword =  md5($_POST['cpassword']);
    $cimage = $_FILES['pic']['name'];
    $tmp_name = $_FILES['pic']['tmp_name']; 
    $pic_upload_path = 'users/'.$cimage;

    $get_user = "SELECT  * from chatusers where cemail='$email'";
    $exe = mysqli_query($con,$get_user);
    $result = mysqli_num_rows($exe);
    if($result>0)
    {
        echo "<script>alert('Email already exists')</script>";
    }
    else{
   if($password == $cpassword)
   {

    
    $unique_id = rand(time(),10000000);
    $sql = "INSERT INTO chatusers(unique_id,cusername,cemail,cpass,cphoto) VALUES('$unique_id','$uname','$email','$password','$cimage')";
    $result = mysqli_query($con,$sql);
    if($result)
    {
      move_uploaded_file( $tmp_name,$pic_upload_path);
      echo "<script>alert('Registered Succesfully')</script>";
      header("Location:user_signin.php");
    }
    else{
       die(mysqli_error($con));
    }
   }
   else{
    echo "<script>alert('Passwords doesn't match')</script>";
   }
    
}
    
}

?>


<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script defer src="../JS/admin.js"></script>
    </head>

    <body>
       
        <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            width: 100%;
            height: 100vh;
            background-image: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%);
            display: flex;
            align-items: center;
            justify-content: center;

        }

        .form-container {
            width: 340px;
            height: 530px;
          
          
            position: relative;
            border-radius: 2%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family: cursive;
            border: solid 1px lightslategray;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        .heading {
            padding-top: 10px;
            padding-left: 100px;
            font-family: 'Arial Narrow Bold', sans-serif;
        }

        input {
            margin-bottom: 2px;
            border: none;
            border-bottom: solid 1px black;
            outline: none;
            background:none;
            width: 270px;
            padding-bottom: 7px;
            padding-left: 6px;
            font-size: 19px;
            font-family: cursive;
            border-radius: 3px;
          

        }

        .line1 {
            width: 280px;
            height: 1.5px;
            background-color: rgba(0, 0, 0, 0.537);
            border-radius: 6%;
            margin-top: 9px;
            color:black;
        }

        .line {
            width: 240px;
            height: 1.2px;
            background-color: grey;
            border-radius: 6%;
            margin-top: 3px;
            color:black;

        }

        .details {
            margin-top: 20px;
            margin-left: 15px;
        }

        .inputs {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .button {
            margin-left: 35px;
            margin-top: 10px;
            color: whitesmoke;

        }

        .button input {
            background: black;
            color:#fff;
            width: 140px;
            height: 30px;
            border: none;
            border-radius: 20px;
            outline: none;
            cursor: pointer;
            transition: ease-in 1.2s;
        }

       

        .matter {
            color: rgba(0, 0, 0, 0.702);
            margin-left: 45px;
            margin-top: 20px;
        }
        label{
            color: rgba(0, 0, 0, 0.623);
            margin-left: 7px;
        }
        h5{
            color:blue;
        }


        @media screen and (max-width:480px) {


            .form-container{
                width: 100vw;
                background:transparent ;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: flex-start;
                row-gap: 4px;
                border: none;
                box-shadow: none;
            }

            .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            row-gap: 40px;

        }
        }
        .matter h5{
            color:black;

        }

        #file{
            background: transparent;
        }
        </style>
        <div class="container">
            <div class="form-container">
                <form id="form" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="heading">
                        <h2>Register</h2>
                    </div>
                    

                    <div class="details">

                        <div class="inputs">
                            <input id="username" name="username" placeholder="Enter Username" type="text" required>
                            

                        </div>
                        <div class="inputs">
                            <input  name="email" placeholder="Enter your email" type="email" required>
                            

                        </div>
                        <label for="" >Upload  Picture</label>
                        <div class="inputs">
                            
                            <input id="file" name="pic" type="file"  required>
                            

                        </div>

                        <!-- <div class="inputs">
                            <label for="image"></label>
                            <input id="image" type="file" name="image" >
                        </div> -->

                        <div class="inputs">
                            <input id="password" name="password" placeholder="Set Your Password" type="password"
                                required>
                            

                        </div>
                        <div class="inputs">
                            <input id="cpassword" name="cpassword" placeholder="Confirm Your Password" type="password"
                                required>
                            

                        </div>

                    </div>
                    <div class="button">
                        <input name="submit" type="submit" class="button" value="Signup">
                    </div>
                    <div class="matter">
                        <h5>Already signed up! <a href="user_signin.php">   >>Login here</a></h5>
                    </div>
                </form>
            </div>
        </div>

        <?php
       

        
        
        
        ?>
    </body>

</html>
