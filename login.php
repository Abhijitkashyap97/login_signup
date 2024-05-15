<?php
include("database.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="signupstyle.css">
</head>
<body>
<div class='signup'>
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method='post'>
<h2 style='margin-left:29px;
                padding-left:29px;'>Login page</h2>
    <label>Enter your email-id</label><br>
    <input type='email' name='email' placeholder='Enter your mail-id' class='abc'><br><br><br>
    <label>Enter the password</label><br>
    <input type='password' placeholder='Enter your password' name='password' class='def'><br>
    <input type='submit' name='Login' value='Login' class='butt'><br>
    <hr>
    <h3 style='margin-left:55px; padding-left:55px;'>OR</h3>
    <hr>
    <a href='signup.php' style='text-decoration:none;padding-left:88px;font-size:24px;
    color:black; cursor:ponter;'>SignUp</a>
</div>
</body>
</html>
<script>
    if(window.history.replaceState){
        window.history.replaceState(null,null,window.location.href);
    }
</script>
<?php
$_SESSION['LOGIN']=0;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $email=$_POST["email"];
        $password=$_POST["password"];
        if(empty($email) || empty($password)){
            echo "<p class='errormsg'>Password or email-id missing</p>";
        }
        else{
        $sql="SELECT *FROM users WHERE email='$email' AND password='$password'";
       $result= mysqli_query($conn, $sql);
        try{
            if(mysqli_num_rows($result)>0){
                $_SESSION['LOGIN']=1;
                $_SESSION['Username']=$email;
        header("location:index.php");
    }
  else{
    echo "<p>Wrong id or password🤦‍♂️</p>";
}}
    catch(mysqli_sql_exception){
        echo"Duplicate entries not allowed";
    }
   }
}
?>

