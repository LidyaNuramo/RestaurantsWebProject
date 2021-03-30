<?php
  include('header.php');
  session_start();
  if(isset($_SESSION['username'])){
    if(!empty($_GET['action'])){
      switch($_GET['action'])
          {
            case 'yes':?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert" style="margin-left:10%; width: 110%; padding-left: 8%;">
              <strong style="margin-left: 3%;">  Password successfully reset. </strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php
              break;
            case 'no1':?>
              <div class="alert alert-primary alert-dismissible fade show" role="alert" style="margin-left:10%; width: 110%; padding-left: 8%;">
              <strong style="margin-left: 3%;">  Old Password is incorrect. </strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php
              break;
            case 'no2':?>
              <div class="alert alert-primary alert-dismissible fade show" role="alert" style="margin-left:10%; width: 110%; padding-left: 8%;">
              <strong style="margin-left: 3%;">  Old Password and new password are the same. </strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php
              break;
          }
      }
          ?>
?>
        <form action="process.php?action=changePass" method="POST" onSubmit="return(check_pass())" style="background: rgba(192,192,192, 0.7);padding-bottom:60px;height: 100%;width: 120%;margin-left: 90px;">
        <div class="form-row">
          <label style="font-size: 3vw;color: black;margin-left: 60px;font-weight: bold;" class="control-label">Change password</label>
          <br>
          <br>
        </div>

        <div class="form-row" style="font-size: 14pt;margin-top: 30px;">
            <label for="InputPassword1" style="font-size: 14pt;color: black;margin-left: 2%;margin-top: 5px;font-weight: bold;" class="col-sm-2 col-form-labels">Old Password:</label>
            <input type="password" class="form-control" id="InputPassword" placeholder="Password" style="height: 40px;width: 350px;margin-left: 2%;" name="password1" required="false">
        </div>

        <div class="form-row" style="font-size: 14pt;margin-top: 30px;">
          <label for="InputPassword1" style="font-size: 14pt;color: black;margin-left: 2%;margin-top: 5px;font-weight: bold;" class="col-sm-2 col-form-labels">New Password:</label>
          <input type="password" class="form-control" id="InputPassword1" placeholder="Password" style="height: 40px;width: 350px;margin-left: 2%;" name="password" required="false">
        </div>

        <div class="form-row" style="font-size: 14pt;margin-top: 30px;">
          
          <label for="InputPassword1" style="font-size: 14pt;color: black;margin-left: 2%;margin-top: 5px;font-weight: bold;" class="col-sm-2 col-form-labels">Confirm  new password:</label>
          <input type="password" class="form-control" id="InputPassword2" placeholder="Confirm password" style="height: 40px;width: 350px;margin-left: 2%;" required="fasle">
        </div>

        <div class="form-row">
          <button type="submit" class="btn btn-primary" style="position: right;margin-top: 40px;margin-left: 65%;width: 25%;height: 10%;font-size:2vw;font-weight: bold;" id="submit">Save changes</button>
        </div>
    </form>
<?php
include('footer.php');
}
else{
    header("Location: index.php?action=noaccount");
}

?>