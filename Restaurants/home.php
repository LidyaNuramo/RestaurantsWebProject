<?php 
  include('header.php');
  session_start();
  if(isset($_SESSION['username'])){
?>

        <div class="alert alert-primary alert-dismissible fade show" role="alert" style="margin-left:10%; width: 110%; padding-left: 8%;">
            <strong style="margin-left: 3%;">  <?php echo "Welcome, ".$_SESSION['username']."!"; ?> </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top:70px;width:100%;margin-left:15%;" >
          <ol class="carousel-indicators" >
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" >
            <div class="carousel-item active" data-interval="3000" style="margin-left:5%;">
              <img class="d-block w-100" src="images/one.jpg" alt="First slide" style="height: 50%;width: 800px;">
              <div class="carousel-caption d-none d-md-block">
                <h5></h5>
                <p style="font-size: 40.0pt; color: lightblue;">Browse Restaurants</p>
              </div>
            </div>
            <div class="carousel-item" data-interval="3000" style="margin-left:5%;">
              <img class="d-block w-100" src="images/two.jpg" alt="Second slide" style="height: 50%;">
              <div class="carousel-caption d-none d-md-block">
              <h5></h5>
              <p style="font-size: 40.0pt; color: lightblue;">Select a Restaurant</p>
            </div>
            </div>
            <div class="carousel-item" data-interval="3000" style="margin-left:5%;">
              <img class="d-block w-100" src="images/three.jpg" alt="Third slide" style="height: 50%;">
              <div class="carousel-caption d-none d-md-block">
                <h5></h5>
                <p style="font-size: 40.0pt; color: lightblue;">Enjoy your meal</p>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
<?php
include('footer.php');
}
else{
    header("Location: index.php?action=noaccount");
}
?>