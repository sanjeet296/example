<?php
$db = mysqli_connect('localhost', 'phpmyadmin', 'java@123', 'registration');
if(isset($_GET['edit_id'])){
    $sql = "SELECT * FROM employee WHERE id =" .$_GET['edit_id'];
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
   }
   if(isset($_POST['btn-update'])){
   

    
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $age = $_POST['age'];
    $group = $_POST['group'];
    echo $_POST['fname'];
    
   
    // $update = "UPDATE employee SET firstname=' $firstname',lastname=' $lastname',	age='$age',group=' $group' WHERE id=". $_GET['edit_id'];
    $update = "UPDATE `employee` SET `firstname`= '$firstname',`lastname`='$lastname',`age`=$age,`group`='$group' WHERE id=". $_GET['edit_id'];
    $up = mysqli_query($db, $update);
    if(!isset($sql)){
    die ("Error $sql" .mysqli_connect_error());
    }
    else
    {
    header("location: index.php");
    }
   }
   ?>

   <?Php
   $db = mysqli_connect('localhost', 'phpmyadmin', 'java@123', 'registration');
   if(isset($_GET['edit_id']))
      {
       $sql = "SELECT * FROM employee WHERE id =" .$_GET['edit_id'];
       $result = mysqli_query($db, $sql);
       $row = mysqli_fetch_array($result);
      }
      if(isset($_POST['btn_update'])){
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $age = $_POST['age'];
        $group = $_POST['group'];
        $delete = "DELETE FROM employee WHERE id=". $_GET['edit_id']; 
        $run= mysqli_query($db,$delete);
      }
     
  ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php" name="vform">

  	<div class="input-group">
  	  <label>First name</label>
  	  <input type="text" name="fname" placeholder="first name">
  	</div>
  	<div class="input-group">
  	  <label>Last name</label>
  	  <input type="test" name="lname" placeholder="last name">
  	</div>
  	<div class="input-group">
  	  <label>Age</label>
  	  <input type="text" name="age">
  	</div>
      <div class="input-group">
      <label>Group</label>
      <select name="group"> 
      <option value="Fresher">Fresher </option>
      <option value="Junior">Junior  </option>
      <option value="Senior">Senior</option>
      </select>
  	    </div>
      <div class="input-group">
      <input type="checkbox" name="checkbox">Accept terms and conditions<br>
      </div>
     <div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
    
  
  </form>
  <div align="center">
  <?php

$db = mysqli_connect('localhost', 'phpmyadmin', 'java@123', 'registration');


/* */
$isEditMode = false;
$isDeleteMode = false;
if( isset($_GET['edit_id']) ){
 $isEditMode = $_GET['edit_id'];
 
}


   $query="select * from employee";
 
   $run = mysqli_query($db,$query);

   if($run==true)
   {
      ?>
      <table border="1">
      <tr bgcolor="red">
      <td>firstname</td>
      <td>lastname</td>
      <td>age</td>
      <td>group</td>
      <td>Edit</td>
      
      </tr>
      <?php
      while($data=mysqli_fetch_assoc($run)){

        if( $isEditMode != $data['id']){

         ?>
         <form method="post">
         <tr>
         <td><?php echo $data['firstname']; ?><br/><br/></td>
         <td><?php echo $data['lastname']; ?><br/><br/></td>
         <td><?php echo $data['age']; ?><br/><br/></td>
         <td><?php echo $data['group']; ?><br/><br/></td>
         <td><a href="index.php?edit_id=<?php echo $data['id'];?>">edit</a></td>
        
         </tr>
         </form>
         <?php
        } else {
          ?>


        <form method="post">
         <tr>
         <td><input type="text" name="fname"  value="<?php echo $row['firstname']; ?>"><br/><br/></td>
         <td><input type="text" name="lname"  value="<?php echo $row['lastname']; ?>"><br/><br/></td>
         <td><input type="number" name="age"  value="<?php echo $row['age']; ?>"><br/><br/></td>
         <td><input type="text" name="group"  value="<?php echo $row['group']; ?>"><br/><br/></td>
        
         <td>
         <button type="submit" name="btn-update" ><strong>Update</strong></button>
         <button type="submit" name="btn_update" ><strong>delete</strong></button>
          </td>
          
         </tr>
         </form>

          <?php
        }
        
      }
      ?>
      
      </table>
      <?php
   }
   else{

         echo"error";


      }
   


?>
  </div>
  
  
</body>
</html>