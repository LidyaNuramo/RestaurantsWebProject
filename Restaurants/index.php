<?php
include('process.php');
?>

<!doctype html>

<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="images/Logo.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <title>Restaurants</title>
  </head>

  <body background="images/login.jpg" style="background-size: 100%100%;">  

    <section style="font-size: 15pt;color:black;">
      <nav class="navbar navbar-expand-lg navbar-light bg-white" id="navbar">
        <a class="navbar-brand" href="#" style="font-weight: bold;font-size: 21px;">Supreme Cuisine</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: flex-end">
          <form class="form-inline my-2 my-lg-0" action="signup.php" >
            <label style="font-size: 14pt;color: black;margin-right: 20px;">Don't have an account?</label>
            <button class="btn btn-outline-primary" type="submit" >Create an account</button>
          </form>
        </div>
      </nav>
    </section> 

    <form action="process.php?action=login" method="POST" autocomplete="off" style="background: rgba(192,192,192, 0.7);padding-top:30px;margin-top: 160px;padding-bottom:40px;height: 100%;width: 75%;margin-left: 11%;">
      <div class="form-group row">
        <label style="font-size:4vw;margin-left: 50px;color: black;font-weight: bold;" class="control-label">Sign in to search for Restaurants</label>
        <br>
        <br>
      </div>

      <?php
      if(!empty($_GET['action']))
      {
        switch($_GET['action'])
        {
          case 'yes':?>
            <div class="form-group row">
              <label style="font-size:1.5vw;margin-left: 50px;color: green;font-weight: bold;" class="control-label">Account successfully created. Please log in.</label>
              <br>
              <br>
            </div>
      <?php
            break;
          case 'no':
          ?>

            <div class="form-group row">
              <label style="font-size:1.5vw;margin-left: 50px;color: red;font-weight: bold;" class="control-label">Incorrect email or password. Please try again.</label>
              <br>
              <br>
            </div>
            <?php
            break;
          case 'noaccount':
          ?>

            <div class="form-group row">
              <label style="font-size:1.5vw;margin-left: 50px;color: red;font-weight: bold;" class="control-label">Please log in first as you are currently not logged in.</label>
              <br>
              <br>
            </div>
            <?php
            break;
        }
      }
      ?>
      
      <div class="form-group row" style="margin-top: 30px;">
        <label for="InputEmail1" style="font-size: 14pt;color: black;margin-left: 90px;margin-top: 5px;font-weight: bold;"class="col-sm-2 col-form-labels">Email address:</label>
        <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter email" style="height: 40px;width: 57.5%;margin-left: 90px;" name="email" required>
      </div>

      <div class="form-group row" style="margin-top: 30px;">
        <label for="InputPassword1" style="font-size: 14pt;color: black;margin-left: 90px;margin-top: 5px;font-weight: bold;" class="col-sm-2 col-form-label">Password:</label>
        <input type="password" class="form-control" id="InputPassword1" placeholder="Password" style="height: 40px;width: 57.5%;margin-left: 90px;" name="password" required>
      </div>

      <div class="form-group row">
        <button type="submit" class="btn btn-primary" style="position: right;margin-top: 20px;margin-left: 75%;width: 12%;height: 5%;font-weight: bold;font-size:2.2vw;">Sign in</button>
      </div>
    </form>

    <div class="Footer" id="Footer">
        <p align="right" style="margin-right: 10px;margin-top: 50px;color: white;"> © 2019, Supreme Cuisine </p>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script src="js/index.js" type="text/javascript"></script>

  </body>

</html>
