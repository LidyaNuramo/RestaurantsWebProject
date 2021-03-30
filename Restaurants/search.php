<?php
  include('header.php');
  session_start();
  if(isset($_SESSION['username'])){
?>
        <div class="row">
            <div class="col-sm-12" style="margin-left:10%;">
                <h1 style='text-align: center;font-weight: bold;color: white;'><u>Search Results</u></h1>
                <table class="table table-striped" border="5">
                <thead>
                    <tr class="thead-dark" style="font-size: 20pt;max-width:70%;white-space:nowrap;">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Rating</th>
                        <th scope="col">City</th>
                        <th scope="col">Contact No.</th>
                        <th scope="col">Email</th>
                        <th scope="col">Website</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody style="font-size: 12pt;color: black;font-weight: bold;background: rgba(192,192,192, 0.7)">
                    <?php
                    $name=$_POST['Keyword'];
                    $type=$_POST['type'];
                    $database=new Database();
                    $where[$type]="LIKE '%".$name."%'";
                    $results=$database->getRows("Restaurants","*",$where);
                    $rr="";
                    $num=1;
                    foreach($results as $result){?>
                    <tr>
                        <td><?php echo $num;?></td>
                        <td><?php echo $result['Name'];?></td>
                        <td><font style='font-weight: bold;'><?php $rate=$result['Rating'];
                        $where2['RateID']= '='.$rate;
                        $results5=$database->getRow("Rating","*",$where2);
                        switch($rate){
                          case "5":
                            echo "★★★★★";
                            break;
                          case "4":
                            echo "★★★★☆";
                            break;
                          case "3":
                            echo "★★★☆☆";
                            break;
                          case "2":
                            echo "★★☆☆☆";
                            break;
                          case "1":
                            echo "★☆☆☆☆";
                            break;
                        }
                        ?></font></td>
                        <td><?php echo $result['CityName']?></td>
                        <td><?php echo $result['ContactNum']?></td>
                        <td><span style='display: block;text-overflow: ellipsis;word-wrap: break-word;overflow: hidden;max-height: 5.4em;line-height: 1.8em;width:100%;'><a href='mailto:<?php echo $result['Email']?>' target='_blank'><?php echo $result['Email']?></a></td>
                        <td><a href='<?php echo $result['Website']?> ' target='_blank' style="color: darkblue;"><?php echo $result['Website']?></a></td>
                        <td><form method='POST'><a href='restaurant.php?id=<?php echo $result['RestID']?>' class='btn btn-info' style='width:70px;' id='rest_ID'>View</a><a href='edit.php?id=<?php echo $result['RestID']?>' class='btn btn-warning' style='width:70px;'>Edit</a><a href='process.php?action=deleteRest&id=<?php echo $result['RestID']?>' class='btn btn-danger' style='width:70px;'>Delete</a></form></td>
                    </tr>
                    <?php $num=$num+1;
                    }
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