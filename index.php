<?php 
include "db.php";
session_start();
if(!isset($_SESSION['cuser']))
{
    header('Location:user_signin.php');
}
else{
    $user_name = $_SESSION['cuser'];
    $get_user = "SELECT  * from chatusers where cusername='$user_name'";
    $exe = mysqli_query($con,$get_user);
    $user_data = mysqli_fetch_assoc($exe);
    $user_status = $user_data['cstatus'];
    $user_image = $user_data['cphoto'];
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
    <title>Chatapp</title>
</head>
<body>
    <style>
        .containerss
        {
            width:100%;
            /* height:100vh; */
            padding-top: 30px;
            padding-bottom: 30px;
            display:flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(255, 255, 255, 0.399);
        }
        .wrappers{
            background: rgba(248, 248, 248, 0.447);
            width: 400px;
            /* border: solid 1px black; */
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            border-radius: 7px;
            /* background: rgba(11, 70, 198, 0.646); */

        }
        /* button{
            position: relative;
            right: 29px;
            cursor:pointer;
            border:none;
            background: none;
        } */

       
        .users{
            padding:25px 30px;
        }
        .users header,.users-list a{
            display: flex;
            align-items: center;
            padding-bottom: 9px;
            justify-content: space-between;
            border-bottom: 2px solid #e6e6e6e8;
            margin-bottom: 10px;
        }

        a{
            text-decoration: none;
            /* color: blue; */

        }

       
        .users header .content img,.users-list img{
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }
        .content{
            display: flex;
            column-gap: 12px;
        }
        .details {
           color: #000;
           

        }
        .details span{
            text-transform:capitalize;
        }
        header .logout{
            color: #fff;
            background: #333;
            padding: 4px 6px;
            cursor: pointer;
            font-size: 17px;
            border-radius: 5px;
            
        }
        header .logout i{
            margin-left: 3px;
            margin-right: 3px;
        }
        .search{
            display: flex;
            /* column-gap: 18px; */
            position: relative;
            margin: 20px 0;
            align-items: center;
            justify-content: space-between;
            

        }

        .users .search input{
            position: absolute;
            height: 40px;
            width: calc(100% - 46.5px);
            border: 1px solid #ccc;
            padding: 0 13px;
            font-size: 16px;
            /* border-radius: 5px; */
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            outline: none;
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s ease;
        }
        .users .search input.active{
            pointer-events: auto;
            opacity: 1;
        }
        .users .search button{
            width: 47px;
            height:40px;
            border: none;
            outline:none;
            color: #333;
            background: #fff;
            border-radius: 0 5px 5px 0;
            font-size: 17px;
            transition: all 0.2s ease;
        }

        .users .search button.active{
            color: #fff;
            background: #333;
        }
        .users .search button.active i::before{
            content: "\f00d";
        }
        .search span{
            margin-left: 10px;
        }
        .users-list{
            max-height: 350px;
            overflow-y: auto;

        }

        :is(.users-list)::-webkit-scrollbar{
            width: 0px;
        }
        .users-list a{
            margin-bottom: 15px;
            page-break-after: 10px;
            padding-right: 15px;
            border-bottom-color: #f1f1f1;

        }
        .users-list a:last-child{
            border: none;
            margin-bottom: 0px;
        }
        .users-list a .status-dot{
            font-size: 12px;
            color: #468869;
        }

        .users-list a .content p{
            color: #67676a;
        }
/* php offline class */
        .users-list a .status-dots{
            color: #ccc;
            font-size: 12px;
        }
/* php offline class */

@media screen and (max-width:480px) {


    .containerss
        {
            width:100%;
            height:100vh;
            padding-top: 40px;
            /* padding-bottom: 30px; */
            /* display:flex; */
            /* align-items: center; */
            /* justify-content: center; */
            /* justify-content: flex-start; */
            display: block;
            margin: 0;
            padding: 0;
            background-color: rgba(255, 255, 255, 0.399);
        }
        .wrappers{
            background: rgba(248, 248, 248, 0.447);
            width: 100%;
            /* height: 100vh; */
            /* border: solid 1px black; */
            box-shadow: none;
            border-radius: 7px;
            /* background: rgba(11, 70, 198, 0.646); */

        }
        .users-list{
            max-height:100%;
            overflow-y: auto;

        }

}
    </style>
    <div class="containerss">
    <div class="wrappers">
        <section class="users">
          <header>
            <div class="content">
                <img src="users/<?php echo $user_image?>" alt="" >
                <div class="details">
                    <span> <strong><?php echo $user_name?></strong></span>
                    <p><?php echo "$user_status"?></p>
                </div>
            </div>
            <a href="logout.php" class="logout">Logout<i class="fa-solid fa-arrow-right-from-bracket"></i></a>
          </header>
          <div class="search">
            <span class="text"> Select an user to chat...</span>
           
            <input type="text" placeholder="Enter name to search..." id="search">
            
           <button><i class="fas fa-search"></i></button>
          </div>


          <div class="users-list">

          <?php 
        //   include "search.php";
          $get_users = "SELECT * FROM chatusers where cusername!='$user_name'";
          $users_exe = mysqli_query($con,$get_users);
          if(mysqli_num_rows($users_exe)==1)
          {
            echo "<h3>No users available for chat</h3>";
          }else{
          while($row= mysqli_fetch_assoc($users_exe))
          {
            echo"<a href='chatarea.php?user_id={$row['unique_id']}'>
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
          ?>
            <!-- <a href="#">
                <div class="content">
                    <img src="users/me.jpg" alt="">
                
                <div class="details">
                    <span>User name</span>
                    <p>This is test message</p>
                </div>
            </div>
            <div class="status-dot"><i class="fas fa-circle"></i></div>
            </a>
            <a href="#">
                <div class="content">
                    <img src="users/me.jpg" alt="">
                
                <div class="details">
                    <span>User name</span>
                    <p>This is test message</p>
                </div>
            </div>
            <div class="status-dot"><i class="fas fa-circle"></i></div>
            </a>
            <a href="#">
                <div class="content">
                    <img src="users/me.jpg" alt="">
                
                <div class="details">
                    <span>User name</span>
                    <p>This is test message</p>
                </div>
            </div>
            <div class="status-dot"><i class="fas fa-circle"></i></div>
            </a>
            <a href="#">
                <div class="content">
                    <img src="users/me.jpg" alt="">
                
                <div class="details">
                    <span>User name</span>
                    <p>This is test message</p>
                </div>
            </div>
            <div class="status-dot"><i class="fas fa-circle"></i></div>
            </a>
            <a href="#">
                <div class="content">
                    <img src="users/me.jpg" alt="">
                
                <div class="details">
                    <span>User name</span>
                    <p>This is test message</p>
                </div>
            </div>
            <div class="status-dot"><i class="fas fa-circle"></i></div>
            </a>
            <a href="#">
                <div class="content">
                    <img src="users/me.jpg" alt="">
                
                <div class="details">
                    <span>User name</span>
                    <p>This is test message</p>
                </div>
            </div>
            <div class="status-dot"><i class="fas fa-circle"></i></div>
            </a>
            <a href="#">
                <div class="content">
                    <img src="users/me.jpg" alt="">
                
                <div class="details">
                    <span>User name</span>
                    <p>This is test message</p>
                </div>
            </div>
            <div class="status-dot"><i class="fas fa-circle"></i></div>
            </a> -->
          </div>
        </section>
    </div>
</div>
<script>
    const searchbar = document.querySelector("#search"),
    searchbtn = document.querySelector(".users .search button");

    searchbtn.onclick = ()=>{
        searchbar.classList.toggle("active");
        searchbar.focus();
        searchbtn.classList.toggle("active");
    }

    searchbar.onkeyup = ()=>{
        const searchbar = document.querySelector("#search")
        let searchTerm = searchbar.value;
        if(searchTerm!="")
        {
            // Ajax 
            let xhr = new XMLHttpRequest();
            xhr.open("POST","search.php",true);
            xhr.onload = ()=>{
                if(xhr.readyState === XMLHttpRequest.DONE)
                {
                    if(xhr.status === 200)
                    {
                        let data = xhr.response;
                        usersList.innerHtml=data;
                        
                    }
                }
            }
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded")
            xhr.send("searchTerm=" + searchTerm);

        }

    }

</script>
</body>
</html>