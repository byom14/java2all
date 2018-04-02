<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- bootstrap links provided by atom package -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- the styles...internal style sheet-->
<style>
    #showhide{
        width: 500px;
        height: 300px;
        border:1px solid;
        margin-left: 380px;
        padding: 10px;

                }
    .answer{
      height: 40px;
      width: 200px;
      margin-left: 380px;
      margin-top: 10px;
      font-family: cursive;
    }

</style>
  </head>
  <body>
    <!-- CDNs for jquery and bootstrap -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- boot strap navigation bar -->
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Byomokesh</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Navigation<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">about</a></li>
            <li><a href="#">career</a></li>
            <li><a href="#">contact</a></li>
          </ul>
        </li>
        <li><a href="#">others</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#" onclick="disappear()" ><span class="glyphicon glyphicon-log-in" onclick="disappear()"></span> Login</a></li>
      </ul>
    </div>
  </nav>


    <div id="showhide">
      <form action="homepage.php" method="post">
          <h2>Login:</h2>
          <div class="form-group">
              <label for="usr">Name:</label>
              <input type="text" class="form-control" id="usr" name="username">
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" name="password">
            </div>
            <button type="submit" class="btn btn-success" name="submit">Submit</button>
            <button type="button" class="btn btn-danger" onclick="disappear()">Cancel</button>

      </form>
    </div>
    <div class="answer">
<!-- php code-->
      <?php
      include("connection.php");

      if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "select username and password from logintable where username = '$username' and password = '$password'";
        $result = mysqli_query($conn,$query);
        $rows = mysqli_num_rows($result);

              if($rows == 1){
                ?>
                <div class="alert alert-success" id="successalert">
                <strong>Success!</strong>u have logged in successfully
                </div>
      <?php

          }
          else {?>

              <div class="alert alert-danger">
                <strong>Failure</strong> incorrect username or password.
              </div>


      <?php    }
  }

   ?>

 </div>
    <script>
    function disappear(){
var x = document.getElementById("showhide");
  if(x.style.display === "none"){
    x.style.display = "block";
  }
      else {

        x.style.display = "none";
      }
    }

    </script>
  </body>
</html>
