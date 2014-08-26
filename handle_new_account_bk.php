<!DOCTYPE html>
<html>
<head>
  <title>Result of Adding New Account</title>
</head>
<body>
<?php
  //static var
  $DB_Server = 'localhost';
  $DB_User = 'root';
  $DB_Pw = '123';
  $DB_Name = 'L2W_DB';
  $DB_Table = 'account';

  //create short var name
  $user_email = $_POST['email'];
  $user_name = $_POST['username'];
  $pswd = $_POST['pswd'];
  $rep_pswd = $_POST['rep_pswd'];
  $user_gender = $_POST['sex'];
  $user_age = $_POST['age'];
  $user_address = $_POST['address'];

  if ($pswd !== $rep_pswd){
	  echo 'Password is not consistent, please re-input it. Return to account creation page in 5 secs...';
	  echo "<meta http-equiv=\"Refresh\" content=\"5; url=http://localhost/L2W/create_account.html\"> ";
	  exit();
  }

  $con = mysql_connect($DB_Server, $DB_User, $DB_Pw);
  if (!$con)
  {
	  die('Could not connect: ' . mysql_error());
  }
  mysql_select_db($DB_Name, $con);
  $sql = "insert into $DB_Table(user_email, user_name, pswd, user_gender, user_age, user_address) values(\"$user_email\", \"$user_name\", \"$pswd\", \"$user_gender\", \"$user_age\", \"$user_address\");";
  if (!mysql_query($sql,$con))
  {

	  die('Error: ' . mysql_error());
  }
  mysql_close($con);
  echo '<p>'.'Create New Account Successfully! Return to main page in 5 secs...'.'</p>';
  echo "<meta http-equiv=\"Refresh\" content=\"5; url=http://localhost/L2W/main_page.html\"> ";

?>
</body>
</html>
