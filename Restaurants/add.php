<?php
include('header.php');
  session_start();
  if(isset($_SESSION['username'])){
?>
<form action="process.php?action=addRest" method="POST" style="margin-left: 150px;margin-top: 30px;font-size: 16pt;" autocomplete="off">
		<h1 style="text-align: center;color: lightblue;font-weight: bold;">Register a new Restuarant</h1>
	<table class="table table-bordered" style="color:white;">
	  <tbody>
	    <tr>
	      <td>Restaurant Name <input type="text" class="form-control" placeholder="Restaurant Name" name='restName' required></td>
	      <td>Contact number <input type="text" class="form-control" placeholder="Contact number" style="width: 400px;" name='contact' required></td>
	    </tr>
	    <tr>
	      <td>Website <input type="text" class="form-control" placeholder="Website" style="width: 400px;" name='website' required></td>
	      <td>Email address: <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" style="width: 400px;" name='email' required></td>
	    </tr>
	    <tr>
	      <td colspan="2">Address <input type="text" class="form-control" name="inputAddress" placeholder="1234 Main St" id='address' style="width: 850px;" required></td>
	    </tr>
	    <tr>
	    	<td>City
		      <select class="custom-select my-1 mr-sm-2" name="city" required>
		      	<option selected value="">Choose...</option>
		      	<?php
			    	$database=new Database();
					$where['CityID']="";
					$results=$database->getRows("City","*",$where,"AND","Name asc");
					$rr="";
					foreach($results as $result){
						$rr=$rr."<option value=".$result['CityID'].">".$result['Name']."</option>";
					}
					echo $rr;
			    ?>
			  </select>
			</td>
			<td>Rating
				<select class="custom-select my-1 mr-sm-2" name="rate" required>
                  <?php
                  $database=new Database();
				  $results=$database->getRows("rating","*");
				  $rr="";
				  $rr=$rr."<option selected value=''>Choose...</option>";
                  foreach($results as $result){
	                  switch($result['RateID'])
	                  {
	                    case "5":
	                      $rr=$rr."<option value=".$result['RateID'].">★★★★★ ".$result['Rating']."</option>";
	                      break;
	                    case "4":
	                      $rr=$rr."<option value=".$result['RateID'].">★★★★☆ ".$result['Rating']."</option>";
	                      break;
	                    case "3":
	                      $rr=$rr."<option value=".$result['RateID'].">★★★☆☆ ".$result['Rating']."</option>";
	                      break;
	                    case "2":
	                      $rr=$rr."<option value=".$result['RateID'].">★★☆☆☆ ".$result['Rating']."</option>";
	                      break;
	                    case "1":
	                      $rr=$rr."<option value=".$result['RateID'].">★☆☆☆☆ ".$result['Rating']."</option>";
	                      break;
	                  }
                  }
                  echo $rr;
                  ?>
                </select>
			</td>
	    </tr>
	    <tr>
	    	<td colspan="2">Description <textarea class='form-control' name='Comment' rows='8'style="width: 800px;height: 300px;" name="desc" required></textarea></td>
	    </tr>
	    <tr>
	    	<td></td>
	    	<td><input type="submit" name="submit" value="Submit" class='btn btn-primary' style="float:right"></td>
	    </tr>
	  </tbody>
	</table>
</form>
<?php
include('footer.php');
}
else{
    header("Location: index.php?action=noaccount");
}
?>