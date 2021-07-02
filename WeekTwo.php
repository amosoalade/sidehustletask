<?php
session_start();

if(empty($_SESSION))
{
    $_SESSION['rstatus'] = false;
    $_SESSION['lstatus'] = false;

}
//a basic authentication program that uses session to store user’s data
// can be able to register
// can be able to login


//Function to clean supplied Data

function CleanData($field) {
    $cleanField = trim($field);
    $cleanField = stripslashes($cleanField);
    $cleanField = htmlspecialchars($cleanField);
    return $cleanField;
  }


// Logout action
 if(isset($_GET['logout']))
 {
    unset($_SESSION);
	  session_destroy();
    header("Location:WeekTwo.php");
 }

// Setting all variable empty
$nameErr = $emailErr = $sexErr = $pwdErr = $pwdErr2 =$username=$password=$msg="";
$name = $email = $sex = $pwd = $pwd2 = $usernameErr=$passwordErr="";


//is the Register button clicked?
if (isset($_POST['submit']) and $_POST['submit'] == "Register") {

    //Clean the date supplied and also prevent malicious inputs
    $name = CleanData($_POST["uname"]);
    $email = CleanData($_POST["uemail"]);
    $sex = CleanData($_POST["ugender"]);
    $pwd = CleanData($_POST["pwd"]);
    $pwd2 = CleanData($_POST["pwd2"]);  
    
   //Validating the data supplied 

  if (empty($_POST["uname"])) {
    $nameErr = "Name is required";
  } 
  elseif (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["uname"])) {
    $nameErr = "Only letters and white space allowed";
  }
  elseif (empty($_POST["uemail"])) {

    $emailErr = "Email is required";
  }
  elseif (!filter_var($_POST["uemail"], FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
  } 
  elseif (empty($_POST["ugender"])) {
    $genderErr = "Gender is required";
  } 
  elseif (empty($_POST["pwd"])) {
    $pwdErr = "Password is required";
  } 
  elseif (empty($_POST["pwd2"]) or $_POST['pwd2']!= $_POST["pwd"]) {
    $pwdErr2 = "Confirm password is either empty or not same as the first password supplied";
  } else {

    //Set Data supplied by the user to session variable

    $_SESSION['name'] = $name;
    $_SESSION['mail'] = $email;
    $_SESSION['sex'] = $sex;
    $_SESSION['pwd'] = $pwd;


    //User registered!

    $_SESSION['rstatus'] = true;

    // Setting used variable empty again
    $nameErr = $emailErr = $sexErr = $pwdErr = $pwdErr2 ="";
    $name = $email = $sex = $pwd = $pwd2 = "";
    
  }
}


// Is Login button clicked?

if (isset($_POST['submit']) and $_POST['submit'] == "Login") {


    //Clean the date supplied and also prevent malicious inputs
    $username = CleanData($_POST["username"]);
    $password = CleanData($_POST["password"]);

    if(empty($username)) {

        $usernameErr = "Username is required for login";
      }
      elseif (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $usernameErr = "Invalid email format";
      } 

    if($username == $_SESSION['mail'] and $password == $_SESSION['pwd'])
    {
        //User authentication was successful!
        $_SESSION['lstatus'] = true;
    }
    else{
        $msg = "Authentication Failed!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week Two:Form Handling and Session</title>

    <style>
        span{
            color:red;
        }

        em{
            color:green;
        }
    </style>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<?php if($_SESSION['rstatus'] == false and $_SESSION['lstatus'] == false){ ?>
<h3>User Registration</h3>
Name: <input type="text" name="uname" value="<?php echo $name;?>"> 
<span class="error">* <?php echo $nameErr;?></span>
<br><br>
E-mail:
<input type="text" name="uemail" value="<?php echo $email;?>">
<span class="error">* <?php echo $emailErr;?></span>
<br><br>
Gender:
<input type="radio" name="ugender" value="female" <?php if (isset($sex) && $sex=="female") echo "checked";if (isset($sex) && $sex!="female" && $sex!="male") echo "checked";?>>Female
<input type="radio" name="ugender" value="male" <?php if (isset($sex) && $sex=="male") echo "checked";?>>Male
<span class="error">* <?php echo $sexErr;?></span>
<br><br>
password:
<input type="password" name="pwd" value="<?php echo $pwd;?>">
<span class="error">* <?php echo $pwdErr;?></span>
<br><br>
Confirm Password: 
<input type="password" name="pwd2" value="<?php echo $pwd2;?>">
<span class="error">* <?php echo $pwdErr2;?></span>
<br><br>
<input type="submit" name="submit" value="Register">
<?php } elseif($_SESSION['rstatus'] == true and $_SESSION['lstatus'] == false){?>

<h3>User Login</h3>
<em>Your Registration was successful! You can login</em><br><br>
<span><?php echo $msg;?></span><br><br>
Username: <input type="text" name="username" value="<?php echo $username;?>" placeholder="Supply valid registered e-mail"> 
<span class="error">* <?php echo $usernameErr;?></span>
<br><br>      

password:
<input type="password" name="password">
<span class="error">* <?php echo $passwordErr;?></span>
<br><br>
<input type="submit" name="submit" value="Login">

<?php }else{?>
<h2>You Are Welcome <em><?php echo $_SESSION['name'];?></em></h2>
<span>Email:<?php echo $_SESSION['mail'];?></span><br>
<span>Sex:<?php echo $_SESSION['sex'];?></span><br>
<span><a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?logout";?>">Logout</a></span>
<?php }?>
</form>
</body>
</html>