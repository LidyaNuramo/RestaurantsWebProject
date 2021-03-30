<?php
  include('header.php');
  session_start();
  if(isset($_SESSION['username'])){
?>
        <div class="row">
            <div class="col-sm-12" style="margin-left: 90px;">
              <table class="table table-bordered table-secondary" style="width: 1330px;">
                <tbody>
                  <?php
                    $id=$_GET['id'];
                    $where['RestID']= '='.$id;
                    $database=new Database();
                    $results1=$database->getRow("Restaurants","*",$where);
                    $results2=$database->getRow("Restaurant","*",$where);
                    $results3=$database->getRows("Image","*",$where);
                    $results4=$database->getRows("Review","*",$where);
                  ?>
                  <form method="POST" action="process.php?action=editRest&id=<?php echo $id;?>">
                  <thead class='thead-dark'><tr><th colspan='3'><h1 style='text-align: left;font-weight: bold;'> <input type="text" class="form-control" placeholder="Restaurant Name" name='restName' value="<?php echo $results1['Name']?>" style="height: 50px;" required> </h1></th></tr></thead>
                  <tr>
                    <tr>
                      <tr>
                      <td colspan='2'></td><td><i class="fa fa-save"></i>  <input type="submit" name="submit" value="Save Changes" class='btn btn-primary'></td>
                    </tr>
                    </tr>
                    <tr style='font-size:15pt;'>
                      <td>
                        <font style="font-weight: bold;">Rating:</font>
                        <select class="custom-select my-1 mr-sm-2" name="rate" style="width: 250px;" required>
                          <?php
                          $rate=$results2['Rating'];
                          $database=new Database();
                          $results5=$database->getRows("rating","*");
                          $rr="";
                          foreach($results5 as $result){
                            if ($rate==$result['RateID']){
                              switch($result['RateID']){
                                case "5":
                                  $rr=$rr."<option selected value=".$result['RateID'].">★★★★★ ".$result['Rating']."</option>";
                                  break;
                                case "4":
                                  $rr=$rr."<option selected value=".$result['RateID'].">★★★★☆ ".$result['Rating']."</option>";
                                  break;
                                case "3":
                                  $rr=$rr."<option selected value=".$result['RateID'].">★★★☆☆ ".$result['Rating']."</option>";
                                  break;
                                case "2":
                                  $rr=$rr."<option selected value=".$result['RateID'].">★★☆☆☆ ".$result['Rating']."</option>";
                                  break;
                                case "1":
                                  $rr=$rr."<option selected value=".$result['RateID'].">★☆☆☆☆ ".$result['Rating']."</option>";
                                  break;
                              }
                            }
                            else{
                              switch($result['RateID']){
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
                          }
                        echo $rr;
                          ?>
                        </select>
                        <?php 
                        
                        ?>
                      </td>
                      <td>
                        <font style="font-weight: bold;" for="Address">Address: </font><br>
                        <textarea class='form-control' name='Address' rows='3' style="width:65%;margin-left:90px;margin-top: -28px;" required><?php echo $results1['Address']; ?></textarea></div>
                      </td>
                      <td>
                        <font style="font-weight: bold;">City: </font>
                        <select class="custom-select my-1 mr-sm-2" name="city" style="width: 80%;" required>
                            <?php
                              $database=new Database();
                              $results=$database->getRows("City","*");
                              $rr="";
                              foreach($results as $result){
                                if ($result['Name']==$results1['CityName']){
                                  $rr=$rr."<option selected value=".$results2['CityID'].">".$results1['CityName']."</option>";
                                }
                                else{
                                  $rr=$rr."<option value=".$result['CityID'].">".$result['Name']."</option>";
                                }
                              }
                              echo $rr;
                             ?>
                        </select>
                    </tr>
                    <tr style='font-size:15pt;'>
                      <td><font style="font-weight: bold;"> Contact number: </font>
                        <input type="text" class="form-control" placeholder="Contact number" style="width: 170px;" name='contact' value="<?php echo $results1['ContactNum']?>" required></td>
                      <td><font style="font-weight: bold;"> Email: </font><input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" style="width: 350px;" name='email' value="<?php echo $results1['Email']?>" required></td>
                      <td><font style="font-weight: bold;"> Website:  </font><input type="text" class="form-control" placeholder="Website" style="width: 350px;" name='website' value="<?php echo $results1['Website']?>" required></td>
                    </tr>
                    <tr style='font-size:12pt;'><td colspan='3'><p style='font-size:15pt;font-weight: bold;'>Description:</p>
                      <textarea class='form-control' name='Description' rows='8'style="width: 1300px;height: 300px;" required><?php echo $results1['Description']?></textarea></td></tr><tr>
                    </form>
                    <?php
                    $num=0;
                    foreach($results3 as $result){
                      if ($num==0)
                      {?>
                      <td><img src='<?php echo $result['Image']?>' class='rounded mx-auto d-block' style='width:400px;height:300px;'>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#image1">
                          View
                        </button>
                        <a href='process.php?action=deleteImage&id=<?php echo $id?>&id2=<?php echo $result['ImageID'] ?>' class='btn btn-danger' style='width:70px;'>Delete</a>
                        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="image1">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?php echo $result['FileName'] ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <img src='<?php echo $result['Image']?>' class='rounded mx-auto d-block' style='width:800px;height:600px;'>
                              </div>
                              <div class="modal-footer">
                                  <h6 class="modal-title" id="exampleModalLabel"><?php echo $result['Description'] ?></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                        </td>
                      <?php 
                        $num++;}
                      else if ($num==1){?>
                        <td><img src='<?php echo $result['Image']?>' class='rounded mx-auto d-block'style='width:400px;height:300px;'>
                          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#image2">
                          View
                        </button>
                        <a href='process.php?action=deleteImage&id=<?php echo $id?>&id2=<?php echo $result['ImageID'] ?>' class='btn btn-danger' style='width:70px;'>Delete</a>
                        <div id="image2" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?php echo $result['FileName'] ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <img src='<?php echo $result['Image']?>' class='rounded mx-auto d-block' style='width:800px;height:600px;'>
                              </div>
                              <div class="modal-footer">
                                  <h6 class="modal-title" id="exampleModalLabel"><?php echo $result['Description'] ?></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                        </td>
                        <?php 
                        $num++;
                      }
                      else if ($num==2){?>
                        <td><img src='<?php echo $result['Image']?>' class='rounded mx-auto d-block' style='width:400px;height:300px;'>
                          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#image3">
                          View
                        </button>
                        <a href='process.php?action=deleteImage&id=<?php echo $id?>&id2=<?php echo $result['ImageID'] ?>' class='btn btn-danger' style='width:70px;'>Delete</a>
                        <div id="image3" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?php echo $result['FileName'] ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <img src='<?php echo $result['Image']?>' class='rounded mx-auto d-block' style='width:800px;height:600px;'>
                              </div>
                              <div class="modal-footer">
                                  <h6 class="modal-title" id="exampleModalLabel"><?php echo $result['Description'] ?></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                        </td>
                      </tr>
                      <tr>
                        <?php
                        $num=0;
                      }
                    }
                    ?>
                    </tr>
                    <tr style='font-size:13pt;'>
                      <td colspan='3'>
                          <div class='form-group'></div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#images">
                          Upload more pictures
                        </button>


                        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="images">
                          <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                              <form method="POST" action="process.php?action=addImages&id=<?php echo $id; ?>" enctype="multipart/form-data">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Choose images to upload</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Upload Image name as: <input type="text" class="form-control" name='imageName' required>
                                Image description: <textarea class='form-control' name='Description' rows='3' required></textarea>
                                <input type="file" name="files[]" multiple>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" name="submit" value="Upload images" class='btn btn-primary'>
                              </div>
                            </form>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    
                    <td colspan='3' style='font-size:15pt;'>Reviews:</td>
                    <tr>
                    <?php 
                    $rr="";
                    foreach($results4 as $result)
                    {
                      $rr=$rr."<td style='font-size:13pt; text-align:right;width:20%;'>".$result['ReviewerName'].": </td>";
                      $rr=$rr."<td colspan='1' style='font-size:11pt;'>".$result['Comment']."</td><td style='width:5%;'>";
                      $rr=$rr."<a href='process.php?action=deleteComm&id=".$id."&id2=".$result['RevID']."' class='btn btn-danger' style='width:70px;'>Delete</a></td></tr><tr>";
                    }
                    $rr=$rr."</tr>";
                    echo $rr;
                    ?>
                </tbody>
              </table>

            </div>
        </div>
<?php
include('footer.php');
}
else{
    header("Location: index.php?action=noaccount");
}

?>