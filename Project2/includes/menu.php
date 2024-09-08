
<style type="text/css">
  .login, .menu {
    list-style: none;
    display: flex;
  }
  .loginli {
    display: inline-block;
    padding-right: 10px;
  }
  a {
    text-decoration: none;
    font-size: 14px;
  }
  .menu {
    display: flex;
    justify-content: center;
    width: 100%; /* Set width to 100% to take the full width of the container */
    overflow: hidden;
    margin: 0;
    height: 50px;
    padding-top: 2%;

  }
  .menu a {
    color: black;
    font-size:12pt;
    text-align:center;
  }
  a:hover {
    background-color: blue;
  }
  .login-container {
    position: fixed;
    top: -50px;
    right: 0;
    margin: 50px;
    height: 30px;
    text-align: center;
  }
  .login {
    width: auto;
    overflow: hidden;
    text-align: center;
    line-height: 20px;
    margin-top: -15px;
  }
  .login a {
    margin-right: 10px;
  }
  .board {
    text-align: center;
    width: auto;
  }
  .idyesno {
    text-align: center;
  }
  .loginli{
    
  }
</style>

<?php
if(isset($_SESSION["userName"])){
  if($_SESSION["userName"] == ""){
  ?>
  <div class="login-container">
  <p class = "idyesno">Please Log in!</p>
    <ul class="login">
      <li class = "loginli"><a href="login.php">Register</a></li>
      <li class = "loginli"><a href="loginindex.php">Login</a></li>
    </ul>
  </div>
  <ul class="menu">
        <li class = "loginli"><a href="readMe.php">ReadMe</a></li>
        <li class = "loginli"> Log in to see full Page! </li>
      </ul>

  <?php 
  } 
  else{
  ?>

      <div class="login-container">
      <p class= "idyesno"> Hello, <?php echo($_SESSION["userName"]);?></p>
      <ul class="login">
        <li class = "loginli"><a href="logout.php">logout</a></li>
      </ul>
      </div>

      <ul class="menu">
        <li class = "loginli"><a href="index.php">Home</a></li>
        <li class = "loginli"><a href="shipping.php?id=<?php echo($_SESSION["userName"]);?>">Shipping</a></li>
        <li class = "loginli"><a href="billing.php?id=<?php echo($_SESSION["userName"]);?>">Billing</a></li>
        <li class = "loginli"><a href="accountInformation.php?id=<?php echo($_SESSION["userName"]);?>">Account Information</a></li>
        <li class = "loginli"><a href="readMe.php">ReadMe</a></li>
      </ul>
  <?php 
  }
}
else{
?>
  <div class="login-container">
  <p class = "idyesno">Please Log in!</p>
    <ul class="login">
      <li class = "loginli"><a href="loginindex.php">Register</a></li>
      <li class = "loginli"><a href="loginindex.php">Login</a></li>
    </ul>
  </div>
  <ul class="menu">
        <li class = "loginli"><a href="readMe.php">ReadMe</a></li>
        <li class = "loginli"> Log in to see full Page! </li>
      </ul>
  <?php 
  } 
  ?>

