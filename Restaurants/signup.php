<?php
include('process.php');
if(!empty($_GET['action']))
{
  switch($_GET['action'])
  {
    case 'no':
      echo '<script language="javascript">';
      echo 'alert("Email account already exists.")';
      echo '</script>';
      break;
  }
}
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

  <body background="images/signup.jpg" style="background-size: 100%100%;"> 

    <section style="font-size: 15pt;color:black;">
      <nav class="navbar navbar-expand-lg navbar-light bg-white" id="navbar">
        <a class="navbar-brand" href="#" style="font-weight: bold;font-size: 21px;">Supreme Cuisine</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: flex-end">
            <form class="form-inline my-2 my-lg-0" action="index.php">
              <label style="font-size: 14pt;color: black;margin-right: 20px;">Already have an account?</label><button class="btn btn-outline-primary" type="submit" >Sign in</button>
            </form>
          </div>
        </nav>
        
      </nav>
    </section> 

    <form action="process.php?action=signup" method="POST" onSubmit="return(check_pass())" style="background: rgba(192,192,192, 0.7);padding-top:30px;margin-top: 100px;padding-bottom:60px;height: 100%;width: 90%;margin-left: 5%;">
      <div class="form-row">
        <label style="font-size: 4vw;color: black;margin-left: 60px;font-weight: bold;" class="control-label">Fill out the form to create an account</label>
        <br>
        <br>
      </div>

      <div class="form-row" style="font-size: 14pt;margin-top: 30px;">
          <label for="name" style="font-size: 14pt;color: black;margin-left: 2%;margin-top: 5px;font-weight: bold;" class="col-sm-2 col-form-labels">First name:</label>
          <input type="name" class="form-control" id="InputName1" aria-describedby="nameHelp" placeholder="Enter First name" style="height: 40px;width: 350px;margin-left: 2%;" name="firstname" required>
          <label for="Lastname" style="font-size: 14pt;color: black;margin-left: 2%;margin-top: 5px;font-weight: bold;" class="col-sm-2 col-form-labels">Last name:</label>
          <input type="Lastname" class="form-control" id="InputLastname" aria-describedby="LastnameHelp" placeholder="Enter Last name" style="height: 40px;width: 350px;margin-left: 2%;" name="lastname" required>
      </div>

      <div class="form-row" style="font-size: 14pt;margin-top: 30px;">
        <label for="" style="font-size: 14pt;color: black;margin-left: 2%;margin-top: 5px;font-weight: bold;" class="col-sm-2 col-form-labels">Email address:</label>
        <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter email" style="height: 40px;width: 750px;margin-left: 2%;" name="email" required>
      </div>

      <div class="form-row" style="font-size: 14pt;margin-top: 30px;">
        <label for="InputPassword1" style="font-size: 14pt;color: black;margin-left: 2%;margin-top: 5px;font-weight: bold;" class="col-sm-2 col-form-labels">Password:</label>
        <input type="password" class="form-control" id="InputPassword1" placeholder="Password" style="height: 40px;width: 350px;margin-left: 2%;" name="password" required>
        <label for="InputPassword1" style="font-size: 14pt;color: black;margin-left: 2%;margin-top: 5px;font-weight: bold;" class="col-sm-2 col-form-labels">Confirm password:</label>
        <input type="password" class="form-control" id="InputPassword2" placeholder="Confirm password" style="height: 40px;width: 350px;margin-left: 2%;" required>
      </div>

      <div class="form-row">
        <button type="submit" class="btn btn-primary" style="position: right;margin-top: 40px;margin-left: 65%;width: 25%;height: 10%;font-size:2vw;font-weight: bold;" id="submit">Register account</button>
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
    <script src="js/scripts.js" type="text/javascript"></script>

  </body>

</html>
