<style type="text/css">
  .navbar-inverse{background-color: midnightblue;
    border: none;}
    #myNavbar ul li a {color: white;}
</style>

<!-- Menu bar start  -->
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a style="color: white;" class="navbar-brand" href="#">
        Welcome <?php echo $_SESSION['name']; ?>
      </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">

        <li class=""><a href="home.php">
        <span class="glyphicon glyphicon-home"></span> 
      Home</a></li>

        <li><a href="profile.php">
          <span class="glyphicon glyphicon-leaf"></span>
        Profile</a></li>

        <li><a href="history.php">
          <span class="glyphicon glyphicon-list"></span>
        History</a></li>

        <li><a href="search.php">
          <span class="glyphicon glyphicon-search"></span>
        Search</a></li>

        <li><a href="logout.php">
          <span class="glyphicon glyphicon-off"></span>
        Logout</a></li>

      </ul>
      <!-- <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul> -->
    </div>
  </div>
</nav>
	<!-- Menu bar end -->