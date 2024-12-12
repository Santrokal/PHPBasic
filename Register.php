
<?php


session_start();
 
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con, "phpmysql");

$_SESSION['readonly'] = "false";


$i = 0;
$option = "";
$query = "";
$email = "";
$firstname = "";
$secondname =  "";
$age = "";
$gender = "";
$qualification = "";
$qualification_text = "";
$username = "";
$password = "";					
$country = "";
$address = "";
$image = "";




if(isset($_POST['accept']))
{
	/*
	foreach ($_POST['qualification'] as $v) {
		$qualification = $qualification . $v .",";
	}
	
        */
	$qualification = implode(",", $_POST['qualification']);


	
	$image=$_FILES["file"]["name"];
	
	move_uploaded_file($_FILES["file"]["tmp_name"],"images/" . $_FILES["file"]["name"]);
	
	$query = "select * from phpmysql.register where email = '".$_POST['email']."'";
		$result = mysqli_query($con,$query);
		if (mysqli_num_rows($result)) {
			$query = "update phpmysql.register set firstname = '".$_POST['firstname']."', secondname = '".$_POST['secondname']."', 
			age = ".$_POST['age'].", gender = ".$_POST['gender'].", qualification = '".$qualification."', 
			username = '".$_POST['username']."',password = '".md5($_POST['password'])."', country = '".$_POST['country']."',
			address = '".$_POST['address']."',image = '".$image."' where email = '".$_POST['email']."'";			
			mysqli_query($con,$query);
		}else{
			mysqli_query($con,"INSERT INTO phpmysql.register (firstname, secondname, age, gender,qualification,username, password, email, country,address,image)
			VALUES ('".$_POST['firstname']."','".$_POST['secondname']."',".$_POST['age'].",".$_POST['gender'].",'".$qualification."',
			'".$_POST['username']."','".md5($_POST['password'])."','".$_POST['email']."','".$_POST['country']."','".$_POST['address']."','".$image."')");
		}
		$_SESSION['readonly'] = "false";
		clearValues();

//mysql_close($con);

//header("location:view.php");

}

if(isset($_GET['option']))
{
	if($_GET['option'] == 'view' || $_GET['option'] == 'edit'){
		$_SESSION['readonly'] = "true";
		$email = $_GET['email'];
		$query = "select * from phpmysql.register where email = '".$email."'";
		$result = mysqli_query($con,$query);
		if (mysqli_num_rows($result)) {
			if($row = mysqli_fetch_array($result))
				  {
					$firstname = $row['firstname'];
					$secondname =  $row['secondname'];
					$age = $row['age'];
					$gender = $row['gender'];
					$qualification = $row['qualification'];
					$username = $row['username'];
					$password = $row['password'];
					$email = $row['email'];
					$country = $row['country'];
					$address = $row['address'];
					$image = $row['image'];
					  
				  }
				  
		}
	}
	if($_GET['option'] == 'delete'){
		$_SESSION['readonly'] = "true";
		$email = $_GET['email'];
		$query = "select * from phpmysql.register where email = '".$email."'";
		$result = mysqli_query($con,$query);
		if (mysqli_num_rows($result)) {
			if($row = mysqli_fetch_array($result))
				  {
					  $image = $row['image'];
				}
				  
		}
		$query = "delete from phpmysql.register where email = '".$email."'";
		mysqli_query($con,$query);
		unlink("images/".$image);

	}		
}

function clearValues(){
					$firstname = "";
					$secondname =  "";
					$age = "";
					$gender = "";
					$qualification = "";
					$qualification_text = "";
					$username = "";
					$password = "";					
					$country = "";
					$address = "";
					$image = "";
					$email = "";
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP with database</title>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script>
            function readURL1(input) {                
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image')
                                .attr('src', e.target.result)
                                .width(200)
                                .height(150);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>

</head>

<body>
		<form action="" enctype="multipart/form-data" method="post">
        <table>
        	<tr>
            	<td>First Name: </td>  	
            
            	<td>
                	<input type="text" name="firstname" value="<?php echo $firstname;?>"/>                </td>
        	</tr>
            
            <tr>
            	<td>
                	Second Name:                </td>  	
            
            	<td>
                	<input type="text" name="secondname" value="<?php echo $secondname;?>"/>                </td>
        	</tr>
        	
            <tr>
            	<td>
                	Age:                </td>  	
            
            	<td>
                	<input type="text" name="age" value="<?php echo $age;?>"/>                </td>
        	</tr>
        
        	<tr>
            	<td>
                	Gender:                </td>  	
            
            	<td>
				
					<?php
					if($gender == 1){
						?>
					<input type="radio" name="gender" value="1" checked /> Male &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="gender" value="2"/>Female&nbsp;&nbsp;&nbsp;
					<?php
					}else if ($gender == 2){
					?>
					<input type="radio" name="gender" value="1"  /> Male &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="gender" value="2" checked />Female&nbsp;&nbsp;&nbsp;
					<?php
					}
                	else{
					?>
					<input type="radio" name="gender" value="1" /> Male &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="gender" value="2" />Female&nbsp;&nbsp;&nbsp;
					<?php
						
					}
					?>
                	                </td>
        	</tr>
			<tr>
            	<td>
                	Qualifications:                </td>  	
            
            	<td>
				
					<?php
						
							$qtext=array("UG","PG","M.Phil","Ph.D","Diploma","Certicate Course");
							if($qualification != ''){								
								$qualification_text = explode("," ,$qualification );
							}
							else{
								$qualification_text = array(" ");
							}
							foreach($qtext as $value)
							{ 
							  if(in_array($value,$qualification_text))
								{
								 ?>
								 <input type="checkbox" name="qualification[]" value="<?php echo $value;?>" checked>
									<?php echo $value;?> &nbsp;&nbsp;&nbsp;
								 <?php
								}
							   else
								 {
								?>
								  <input type="checkbox" name="qualification[]" value="<?php echo $value;?>">
									<?php echo $value;?> &nbsp;&nbsp;&nbsp;
								<?php
								 }
							}
						
						
							
					?>
					
					
                </td>
        	</tr>
            
             <tr>
            	<td>
                	User Name:                </td>  	
            
            	<td>
                	<input type="text" name="username" value="<?php echo $username;?>"/>                </td>
        	</tr>
            
            <tr>
            	<td>
                	Pass Word:                </td>  	
            
            	<td>
                	<input type="password" name="password" value=""/>                </td>
        	</tr>
            
            <tr>
            	<td>
                	Confirm - Pass Word:                </td>  	
            
            	<td>
                	<input type="password" name="cpassword" value=""/>                </td>
        	</tr>
            
            <tr>
            	<td>
                	Email Id:                </td>  	
            
            	<td>
					<?php
					if($_SESSION['readonly'] == "true"){
						?>
					<input type="text" name="email" value="<?php echo $email;?>" readonly = "true"/>
					<?php
					}else{
					?>
					<input type="text" name="email" value="<?php echo $email;?>"/>
					<?php
                	
					}
					?>
					
				</td>
        	</tr>
            <tr>
            	<td>
                	Country:                </td>  	
            
            	<td>
					<select name="country">
						<option value=" " >--- Select --- </option>
						<?php
						
							$ctext=array("India","Japan","Australlia","China");
							
							foreach($ctext as $value)
							{ 
								
							  if($value == $country)
								{
								 ?>
								  <option value="<?php echo $value; ?>" selected ><?php echo $value; ?> </option>
								<?php
								} 
							   else
								 {
								?>
								   <option value="<?php echo $value; ?>" ><?php echo $value; ?> </option>
									
								<?php
								 }
							}
						
						?>
					</select>
				</td>
        	</tr>
			<tr>
            	<td>
                	Address:                
				</td>
			<td>
				<textarea name ="address" rows="3" cols="30"><?php echo $address;?></textarea>
			</td>
			</tr>
			<tr>
            	<td>
                	Upload Your Photo:                
				</td>
			<td>
			<input type="file" name="file" id="file" onchange="readURL1(this);" />
			
			<img id="image" src="#" alt="" />
			
			</td>
			</tr>
            
             <tr>
             	<td colspan="2" align="center">
                <input type="submit" name="accept" value ="Save"/>
				 <input type="reset" name="accept" value ="Clear"/>
                </td>
             </tr>
        </table>
        </form>
		
		
		<?php
		
		$result = mysqli_query($con,"SELECT * FROM phpmysql.register");
		echo "<table border='1'>";
				
		if (mysqli_num_rows($result)) {
				echo "<table border='1'>
				<tr>
					<th>S.No</th>
					<th>First Name</th>
					<th>Second Name</th>
					<th>Age</th>
					<th>Gender</th>
					<th>Qualifications</th>
					<th>User Name</th>
					<th>PassWord</th>				
					<th>Email Id</th>
					<th>Country</th>
					<th>Address</th>
					<th>Image</th>
					<th>Options</th>
				</tr>";
				while($row = mysqli_fetch_array($result))
				  {
					$i ++;
					  echo "<tr>";
					  echo "<td>$i</td>";
					  echo "<td>" . $row['firstname'] . "</td>";
					  echo "<td>" . $row['secondname'] . "</td>";
					  echo "<td>" . $row['age'] . "</td>";
					  if($row['gender'] == 1)
						echo "<td>Male</td>";
					  if($row['gender'] == 2)
						echo "<td>Female</td>"; 
					  echo "<td>" . $row['qualification'] . "</td>";
					  echo "<td>" . $row['username'] . "</td>";
					  echo "<td>" . $row['password'] . "</td>";					
					  echo "<td>" . $row['email'] . "</td>";
					  echo "<td>" . $row['country'] . "</td>";
					  echo "<td>" . $row['address'] . "</td>";
					  echo "<td><img src='images/".$row['image']."' width='50' height='50' /></td>";
					  echo "<td><a href='Register.php?email=".$row['email']."&&option=view'>View</a>&nbsp;
								<a href='Register.php?email=".$row['email']."&&option=edit'>Edit</a>&nbsp;
								<a href='Register.php?email=".$row['email']."&&option=delete'>Delete</a>&nbsp;
								</td>";
					  echo "</tr>";
				  }
		 }else{
			 echo "<tr><th>No Record(s) is/are found</th></tr>";
		 }
		echo "</table>";
		
		?>
		
		
</body>


</html>
