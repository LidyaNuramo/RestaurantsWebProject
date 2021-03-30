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
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Restaurants</title>
  </head>

  <body background="images/pattern 2.jpg">  
    <section style="font-size: 15pt;color:black;">
      <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
        <a class="navbar-brand" href="#" style="font-weight: bold;font-size: 21px;">Supreme Cuisine</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="home.php">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Restaurants
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="add.php">Add</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="view.php">View</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Account
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="profile.php">Change password</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="process.php?action=logout">Log Out</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0" action="search.php" method="POST">
            <font color="black" size="3">Keyword: </font>
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id='search' name="Keyword" required>
            <font color="black" size="3">Type: </font>
            <select class="form-control" id="exampleFormControlSelect1" name="type" required>
              <option value="Name" >Name</option>
              <option value="CityName" >City</option>
            </select>
            <input type="submit" class="btn btn-outline-primary" name="submit" value="Search">
          </form>
        </div>
      </nav>
    </section> 
    <div class="all">
      <div class="container" style="margin-top: 80px;margin-left:-100px;font-size: 200%;">