<html>
 <head>
   <title>Form validation</title>
    <style>
           .visible{
			   color:red;
		   }
    </style
 
 </head>
 <body>
    <?php 
	     $nameErr=$emailErr=$mobileErr=$genderErr=$agreeErr="";
	     if($_SERVER['REQUEST_METHOD']=="POST"){
			 if(empty($_POST['name'])){
				 $nameErr="Name is required";
			 }
			 else{
				 $name=input_data($_POST['name']);
				 if(!preg_match("/^[a-zA-Z ]*$/",$name)){ //particular format
					 $nameErr="Only alphabet and white space allowed";
				 }
			 }
			 if(empty($_POST['email'])){
				 $emailErr="Email is required";
			 }
			 else{
				$email=input_data($_POST['email']);
				if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
					$emailErr="Invalid format";
				}
			 }
			 if(empty($_POST['mobile'])){
			     $mobileErr="Mobile Number Requiresd";
			 }
			 else{
				$mobile=input_data($_POST['mobile']);
				if(!preg_match("/^[0-9]*$/",$mobile)){
					$mobileErr="Mobile number must be contain number";
				}
				if(strlen($mobile)<10){
					$mobileErr="Mobile contain must contain 10 digits";
				}
			 }
		  if(empty($_POST['gender'])){
				 $genderErr="Gender is required";
			 } else{
				$gender=input_data($_POST['gender']);
			 }
		  if(empty($_POST['agree'])){
				 $agreeErr="Terms is required";

			 }
			else{
				$agree=input_data($_POST['agree']);
			 }
			 
		 }
	     function input_data($data){
			 $data=trim($data);
			 $data=stripslashes($data);
			 $data=htmlspecialchars($data);
			 return $data;
		 }
	
	?>
    <h2>Register</h2>
	<span class="visible">*Required Field</span>
	<br><br>
	<form  method="post" action="">
	  Name:
	  <input type="text" name="name">
	  <span class="visible">* <?php echo $nameErr;?></span>
	  <br><br>
	  E-mail
	  <input type="text" name="email">
	  <span class="visible">*<?php echo $emailErr;?></span>
	  <br><br>
	  Mobile No:
	  <input type="text" name="mobile">
	  <span class="visible">*<?php echo $mobileErr;?></span>
	  <br><br>
	  Gender:
	  <input type="radio" name="gender">Male
	  <input type="radio" name="gender">Female
	  <input type="radio" name="gender">Others
	  <span class="visible">*<?php echo $genderErr;?></span>
	  
	  <br><br>
	  Agree to terms of use:
	  <input type="checkbox" name="agree">
	  <span class="visible">*<?php echo $agreeErr;?></span>
	  <br><br>
	  <input type="submit" name="submit" value="Submit">
	</form>
	<?php
        if(isset($_POST['submit'])){
           if($nameErr == "" && $emailErr == "" && $mobileErr == "" && $genderErr == "" && $agreeErr == "")
		  {
            echo "<h3 color=#FF001> <b>You have successfully registered</b></h3>";
            echo "<h2>Your  as follows</h2>";
			echo "Name:".$name;
			echo "<br>";
			echo "Email:".$email;
			echo "<br>";
			echo "Mobile No:".$mobile;
			echo "<br>";
			echo "Gender:".$gender;
			
           }else{
			echo "<h2>Your form is incorrect</h2>";
		}

    }
?>
 </body>
</html
