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
                    $results3=$database->getRows("Image","*",$where);
                    $results4=$database->getRows("Review","*",$where);
                  ?>
                  <thead class='thead-dark'><tr><th colspan='3'><h1 style='text-align: left;font-weight: bold;'><?php echo $results1['Name']?> Restaurant</h1></th></tr></thead>
                  <tr>
                    <tr>
                      <td colspan='2'></td><td><a href="edit.php?id=<?php echo $id;?>" style="color: blue;"> <i class='fas fa-edit' style='font-size:24px'></i> Edit Restaurant</a></td>
                    </tr>
                    <tr style='font-size:15pt;'>
                      <td><font style="font-weight: bold;">Rating:</font>
                        <?php 
                        $rate=$results1['Rating'];
                        $where2['RateID']= '='.$rate;
                        $results5=$database->getRow("Rating","*",$where2);
                        switch($rate){
                          case "5":
                            echo "<font style='font-weight: bold;color:darkgreen;'>★★★★★   ";
                            echo $results5['Rating']."</font>";
                            break;
                          case "4":
                            echo "<font style='font-weight: bold;color:rgb(50,205,50)'>★★★★☆   ";
                            echo $results5['Rating']."</font>";
                            break;
                          case "3":
                            echo "<font style='font-weight: bold;color:rgb(255,255,51);'>★★★☆☆   ";
                            echo $results5['Rating']."</font>";
                            break;
                          case "2":
                            echo "<font style='font-weight: bold;color:rgb(255,69,0);'>★★☆☆☆   ";
                            echo $results5['Rating']."</font>";
                            break;
                          case "1":
                            echo "<font style='font-weight: bold;color:red;'>★☆☆☆☆   ";
                            echo $results5['Rating']."</font>";
                            break;
                        }
                        ?>
                      </td>
                      <td colspan='2'><font style="font-weight: bold;">Address: </font><?php echo $results1['Address'] ?>, <?php echo $results1['CityName']?></td>
                    </tr>
                    <tr style='font-size:15pt;'>
                      <td><font style="font-weight: bold;"> Contact number: </font><?php echo $results1['ContactNum']?></td>
                      <td><font style="font-weight: bold;"> Email: </font><a href='mailto:<?php echo $results1['Email']?>' target='_blank'><?php echo $results1['Email']?></a></td>
                      <td><font style="font-weight: bold;"> Website:  </font><a href='<?php echo $results1['Website']?>' target='_blank'><?php echo $results1['Website']?></a></td>
                    </tr>
                    <tr style='font-size:12pt;'><td colspan='3'><p style='font-size:15pt;font-weight: bold;'>Description:</p><textarea class='form-control' name='Description' rows='8'style="width: 1300px;height: 300px;" name="desc" required disabled="true"><?php echo $results1['Description']?></textarea></td></tr><tr>
                    <?php
                    $num=0;
                    foreach($results3 as $result){
                      if ($num==0)
                      {?>
                      <td><img src='<?php echo $result['Image']?>' class='rounded mx-auto d-block' style='width:400px;height:300px;'>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#image1">
                          View
                        </button>
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
                    <td colspan='3' style='font-size:15pt;'>Reviews:</td>
                    <tr>
                    <?php 
                    $rr="";
                    foreach($results4 as $result){
                      $rr=$rr."<td style='font-size:13pt; text-align:right;'>".$result['ReviewerName'].": </td>";
                      $rr=$rr."<td colspan='2' style='font-size:11pt;'>".$result['Comment']."</td></tr><tr>";
                    }
                    $rr=$rr."</tr>";
                    echo $rr;
                    ?>
                    <tr>
                      </tr><tr><td colspan='3' style='font-size:13pt;'>
                        <form id='form' method='POST' action='process.php?action=addcomment&id=<?php echo $id?>'>
                          <div class='form-group'>
                            <label for='formGroupExampleInput'>Reviewer's Name: </label>
                            <input type='text' class='form-control' id='ReviewerName' placeholder='<?php echo $_SESSION['username']." ".$_SESSION['lastname'];?>' value='<?php echo $_SESSION['username']." ".$_SESSION['lastname'];?> ' name="RevName" readonly="true" required>
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <input type="checkbox" aria-label="Checkbox for following text input" id="myCheck" onclick="check_comm()"> 
                              </div>
                            </div>
                            <label class="form-control" aria-label="ccount name.">Use a different name to leave a comment.
                          </div>
                        <div class='form-group'>
                          <label for='formGroupExampleInput2'>Comment</label>
                          <textarea class='form-control' name='Comment' rows='5' required></textarea></div><button type='submit' class='btn btn-primary'>Post</button>
                        </form>
                      </td>
                    </tr>
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