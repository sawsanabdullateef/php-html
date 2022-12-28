<?php
require "conn.php";

if(isset($_POST['save'])){
	$user_name= $_POST['uname'];
	$password= $_POST['psw'];

	 $sql= "insert into users( user_name, user_password) values (?,?)";
  //$sql= " INSERT INTO `users`( `user_name`, `user_password`) VALUES (?,?)";
	$result= $conn->prepare($sql);
	$result->bind_param("ss",$user_name,$password);
	$result->execute();
	$record= $result->get_result();
	

	/* if ($rows['num_rows'] > 0){
		echo "<script> location.href='home.php';</script>";
	}
	else{
		echo "user name or password is wrong!!";
	} */
}
?>

<!DOCTYPE html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="description" content="Free Web page">
        <meta name="keywords" content="HTML, welcome, hi">
        <meta name="author" content="Sawsan">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
             home page
        </title>
      
       <link rel="stylesheet"  href="css/style1.css"> 
      <style>
        body {
          margin: 0;
          font-family: Arial, Helvetica, sans-serif;
        }
        .topnav {
    overflow: hidden;
    background-color: #333;
  }
  
  .topnav a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
  }
  
  .topnav a:hover {
    background-color: #97cff0;
    color: black;
  }
  
  .topnav a.active {
    background-color: #42b3f5;
    color: white;
  }

  
        
        </style>
   </head>
    <body>
        <P>
            
                <p>&nbsp&nbsp&nbsp</p><p>&nbsp&nbsp&nbsp</p>
                <h3 style="color:rgb(13, 132, 141);" dir="ltr"> LOGIN SCREEN
                </h3>
                
               
                <form action="">
                    <div class="topnav">
                        <a class="active" href="#add">add user</a>
                        <a href="#update">update user</a>
                        <a href="#delete">delete user</a>
                        <a href="#about">About</a>
                      </div> 

                     
                      
            </form>
<center>
            <form method="post" action="home.php">
              <h2> add user </h2>
                      <div class="container">
                            <label><b>Username</b></label>
                            <input type="text" placeholder="Enter Username" name="uname" required>
                              <br>
                            <label><b>Password</b></label>
                            <input type="text" placeholder="Enter Password" name="psw" required>
                            <br>
                            
                            <button type="submit" name ="save" id ="save">save</button>
                    </div>
</form>
</center>
            
        </P>
        
       


    </body>
</html>



