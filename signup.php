<?php
include("database.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up</title>
    <link rel="stylesheet" href="signupstyle.css">
</head>
<body>
    <div class="signup">
    <form action="signup.php" method="post">
    <h2 style="margin-left:29px;
                    padding-left:29px;">Sign up page</h2>
        <label>Enter your email-id</label><br>
        <input type="email" name="email" placeholder="Enter your mail-id" class="abc"><br><br><br>
        <label>Enter your username</label><br>
        <input type="type" name="username" placeholder="Enter your username" class="abc"><br><br><br>
        <label>Enter the password</label><br>
        <input type="password" name="password" class="def"><br>
        <input type="submit" name="SignUp" value="SignUp" class="butt">
</form>
    </div>
</body>
</html>
<script>
    if(window.history.replaceState){
        window.history.replaceState(null,null,window.location.href);
    }
</script>
<?php
    if(isset($_POST["SignUp"])){
        $email=$_POST["email"];
        $password=$_POST["password"];
        $username=$_POST['username'];
        if(empty($email) || empty($password)){
            echo "<p class='errormsg'>Password or email-id missing</p>";
        }
        else{
        $sql="INSERT INTO users(email,username,password) VALUES('$email','$username','$password')";
        mysqli_query($conn, $sql);
        $_SESSION["LOGIN"]=1;
        header("location:index.php");
   }
}
?>

