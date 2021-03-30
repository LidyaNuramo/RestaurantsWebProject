<?php
  include('header.php');
  session_start();
  if(isset($_SESSION['username'])){
?>
  <div style="margin-left:100px;color:white;">
    <p style="text-align: center;">
		<h1>About site</h1> 
		</p>
		<div class="FAQ" id="FAQ">
      <div>
        <h2> FAQ </h2>
      </div>
      <p>If you have questions about our service, you can contact us by our email or our phone number.</p>
    </div>
    <div class="Contacts" id="Contacts">
      <div>
        <h2> Our information </h2>
        <p><img src="images/contact us 3.jpg" width="240" height="110"></p>
      </div>
		<div>Phone number(1):	+48123456789</div>
    <div>Phone number(2):	+48987654321</div>
    <div>Email:	info@supreme.com</div>
  </div>
<?php
include('footer.php');
}
else{
    header("Location: index.php?action=noaccount");
}
?>