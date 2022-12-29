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
	

	 if ($result){
		echo "<script> alert(' scussesfull !!!!');</script>";
	}
	else{
		echo "<script> alert(' ERROR !!!!');</script>";
	} 
}

// RETRIVE DATA ......

if(!empty($_GET['user_id'])){
    $user_id = $_GET['user_id'];
   
  
     $sql= "SELECT * FROM USERS WHERE ID=?";
    $result= $conn->prepare($sql);
    $result->bind_param("i",$user_id);
    $result->execute();
    $record= $result->get_result();
    $rowss = $record->fetch_assoc();
    
}
if(isset($_GET['edit'])){
if(!empty($_GET['user_id'])){
  $user_id = $_GET['user_id'];

   $sql= "UPDATE USERS SET user_name =? , user_password=? WHERE ID=?";
  $result= $conn->prepare($sql);
  $result->bind_param("ssi",$user_id);
  $result->execute();
  $record= $result->get_result();
  if ( $result->execute()){
		echo "<script> alert(' Update scussesfull !!!!');</script>";
	}
	else{
		echo "<script> alert(' ERROR !!!!');</script>";
	} 
  
}
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
        <P></p>
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
            <input type="hidden" name="uid" name="uid">
              <h2> add user </h2>
                      <div class="container">
                            <label><b>Username</b></label>
                            <input type="text" placeholder="Enter Username" name="uname" value="<?php echo $rowss['user_name'];?>" required >
</br>
                            <label><b>Password</b></label>
                            <input type="text" placeholder="Enter Password" name="psw" value= "<?php echo $rowss['user_password'];?>" required>
</br>
                            
                            <button type="submit" name ="save" id ="save">save</button>
                            <button type="submit" name ="edit" id ="edit">Edit</button>
                            <button type="submit" name ="delete" id ="delete">Delete</button>
                    </div>

                    <div class="container">
                            
                            <?php
                            $sql="SELECT * FROM `users`";
                            $result= $conn->prepare($sql);
                            $result->execute();
                            $record= $result->get_result();
                           while($rows = $record->fetch_assoc()){
                            ?>
                     <table>
                   
                    <tr >
                        <td><label><b>Username</label> </td>
                        <td><label><b></label> </td>
                        <td><label><b>password</label> </td>
                        <td><label><b></label> </td>
                        <td><label><b>Edit</label> </td>
                        <td><label><b></label> </td>
                        <td><label><b>Delete</label> </td>
                        
                    </tr>
                    <tr>
                        <td><?php echo $rows['user_name'];?></td>
                        <td><label><b></label> </td>
                        <td><?php echo $rows['user_password'];?></td>
                        <td><label><b></label> </td>
                        <td> <a href="home.php?user_id=<?php echo $rows['id'];?>">Edit</a> 
                        <td><label><b></label> </td>
                        <td> <a href="home.php"?duser_id=<?php echo $rows['id'];?>">Delete</a> </td> 
                    </tr>
                   
                       
                </table>
                         <!--    <label><b>Username</b></label>
                            <input type="text"  name="r_uname" values = "<?php echo $rows['user_name'];?>" disabled>
                              <br>
                            <label><b>Password</b></label>
                            <input type="text"  name="r_psw" values = "<?php echo $rows['user_password'];?>" disabled>
                            <br> -->
                            <?php
                           }
                           ?>

                    </div>
</form>
</center>
            
        </P>
        
       


    </body>
</html>



