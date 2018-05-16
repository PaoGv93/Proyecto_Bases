<?php
 $connect = mysqli_connect("localhost", "usuario3", "E3gRJeE0IH", "usuario3");
 // Check connection
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

 session_start();
 if(isset($_SESSION["username"])){
      header("location:intro.php");
 }
 if(isset($_POST["register"])){
      if(empty($_POST["username"]) && empty($_POST["password"])){
           echo '<script>alert("Both Fields are required")</script>';
      }
      else{
           $username = mysqli_real_escape_string($connect, $_POST["username"]);
           $password = mysqli_real_escape_string($connect, $_POST["password"]);
           $password = md5($password);
           $query = "INSERT INTO users (username, password) VALUES('$username', '$password')";
           if(mysqli_query($connect, $query)){
                echo '<script>alert("Registration Done")</script>';
           }
      }
 }
 if(isset($_POST["login"])){
      if(empty($_POST["username"]) && empty($_POST["password"])){
           echo '<script>alert("Both Fields are required")</script>';
      }
      else{
           $username = mysqli_real_escape_string($connect, $_POST["username"]);
           $password = mysqli_real_escape_string($connect, $_POST["password"]);
           $password = md5($password);
           $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
           $result = mysqli_query($connect, $query);
           if(mysqli_num_rows($result) > 0){
                $_SESSION['username'] = $username;
                header("location:intro.php");
           }
           else{
                echo '<script>alert("Wrong User Details")</script>';
           }
      }
 }
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Login</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">

           <style>
           @import url(https://fonts.googleapis.com/css?family=Roboto:300);

           .login-page {
             width: 360px;
             padding: 8% 0 0;
             margin: auto;
           }
           .form {
             position: relative;
             z-index: 1;
             background: #FFFFFF;
             max-width: 360px;
             margin: 0 auto 100px;
             padding: 45px;
             text-align: center;
             box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
           }
           .form input {
             font-family: "Roboto", sans-serif;
             outline: 0;
             background: #f2f2f2;
             width: 100%;
             border: 0;
             margin: 0 0 15px;
             padding: 15px;
             box-sizing: border-box;
             font-size: 14px;
           }
           .form button {
             font-family: "Roboto", sans-serif;
             text-transform: uppercase;
             outline: 0;
             background: #FF0000;
             width: 100%;
             border: 0;
             padding: 15px;
             color: #FFFFFF;
             font-size: 14px;
             -webkit-transition: all 0.3 ease;
             transition: all 0.3 ease;
             cursor: pointer;
           }
           .form button:hover,.form button:active,.form button:focus {
             background: #FF0000;
           }
           .form .message {
             margin: 15px 0 0;
             color: #b3b3b3;
             font-size: 12px;
           }
           .form .message a {
             color: #4CAF50;
             text-decoration: none;
           }
           .form .register-form {
             display: none;
           }
           .container {
             position: relative;
             z-index: 1;
             max-width: 300px;
             margin: 0 auto;
           }
           .container:before, .container:after {
             content: "";
             display: block;
             clear: both;
           }
           .container .info {
             margin: 50px auto;
             text-align: center;
           }
           .container .info h1 {
             margin: 0 0 15px;
             padding: 0;
             font-size: 36px;
             font-weight: 300;
             color: #1a1a1a;
           }
           .container .info span {
             color: #4d4d4d;
             font-size: 12px;
           }
           .container .info span a {
             color: #000000;
             text-decoration: none;
           }
           .container .info span .fa {
             color: #EF3B3A;
           }
           body {
             background: #A9D0F5; /* fallback for old browsers */
           }
           </style>
      </head>
      <body>
           <br/><br/>
           <div class="login-page">
             <div class="form">

                <br/>
                <?php
                if(isset($_GET["action"]) == "login"){
                ?>
                <h3 align="center">Login</h3>
                <br/>

                <form method="post">
                     <input type="text" name="username" class="form-control" placeholder="username"/>
                     <br/>
                     <input type="password" name="password" class="form-control" placeholder="password" />
                     <br/>
                     <input type="submit" name="login" value="Login" class="btn btn-primary" align="center"/>
                     <br/>
                     <p align="center">Not registered? <a href="login.php">Register</a></p>
                </form>
                <?php
                }
                else
                {
                ?>
                <h3 align="center">Register</h3>
                <br />
                <form method="post">
                     <input type="text" name="username" class="form-control" placeholder="username"/>
                     <br />
                     <input type="password" name="password" class="form-control" placeholder="password"/>
                     <br />
                     <input type="submit" name="register" value="Register" class="btn btn-primary" />
                     <br />
                     <p align="center">Already registered? <a href="login.php?action=login">Sign in</a></p>
                </form>
                <?php
                }
                ?>
         </div>
       </div>
      </body>
 </html>
