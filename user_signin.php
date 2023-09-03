
<?php 
include "db.php";
session_start();
if(isset($_SESSION['cuser']))
{
    // header('Location:index.php');
}
else{
if(isset($_POST['submit'])){
            
   
    $email = $_POST['email'];
    $password =  md5($_POST['password']);
    $get_user = "SELECT  * from chatusers where cemail='$email' and cpass='$password'";
    $exe = mysqli_query($con,$get_user);
    $user_data = mysqli_fetch_assoc($exe);
    $user_name = $user_data['cusername'];
    $result = mysqli_num_rows($exe);
    if($result>0)
    {
        $update_status = "UPDATE chatusers set cstatus='Active now' where  cemail='$email' ";
        $update = mysqli_query($con,$update_status);
        $_SESSION['cuser']=$user_name;
        echo "<script>alert('Login Succesful')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
    else{
        echo "<script>alert('Invalid credentials')</script>";
        echo "<script>window.open('user_signin.php','_self')</script>";
    }
    
    
    
}
}
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            width: 280px;
            height: 250px;
            /* padding:25px; */
            background-color: rgba(255, 255, 255, 0.92);
            background-image: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%);
            background:white;
            position: relative;
            /* top: 25%;
            left: 40%;
            right: 25%;
            bottom: 25%; */

            border-radius: 4%;
            box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
        }

        .heading {
            padding-top: 10px;
            padding-left: 100px;
            font-family: 'Arial Narrow Bold', sans-serif;
        }

        input {
            margin-left: 7px;
            margin-bottom: 2px;
            border: none;
            outline: none;
            background:none;

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
            color: #fff;

        }

        .button input {
            background: black;
            width: 140px;
            height: 30px;
            border: none;
            border-radius: 20px;
            outline: none;
            cursor: pointer;
            transition: ease-in 0.3s;
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
        
       

        i{
            color:#ccc;
            position:absolute;
            right:50px;
            cursor:pointer;
        }
        i.active::before {
            color: white;
            content: "\f070";

        }
        </style>
        <div class="container">
            <div class="form-container">
                <form id="form" method="post" autocomplete="off">
                    <div class="heading">
                        <h2>Sign In</h2>
                    </div>
                    <div class="line1"></div>

                    <div class="details">

                    <div class="inputs">
                            <input  name="email" placeholder="Enter your email" type="email" required>
                            <div class="line"></div>

                        </div>
                       

                        <!-- <div class="inputs">
                            <label for="image"></label>
                            <input id="image" type="file" name="image" >
                        </div> -->

                        <div class="inputs">
                            <input id="password" name="password" placeholder="Set Your Password" type="password"
                                required>
                            <i class="fas fa-eye"></i>
                            <div class="line"></div>

                        </div>
                        

                    </div>
                    <div class="button">
                        <input name="submit" type="submit" class="button" value="Signin">
                    </div>
                    <div class="matter">
                        <h5>Not yet signed up!! <a href="user_signup.php">  >>Signup here</a></h5>
                    </div>
                </form>
            </div>
        </div>
<script>
    const pswrdfield = document.querySelector(".form-container .inputs input[type='password']"),
    toggle_button = document.querySelector(".form-container .inputs i");
    toggle_button.onclick = ()=>{
        if(pswrdfield.type=="password")
        {
            pswrdfield.type="text";
            toggle_button.classList.add("active");
           
        }
        else{
            pswrdfield.type="password";
            toggle_button.classList.remove("active");
        }
    }

</script>

    </body>

</html>



<?php



?>