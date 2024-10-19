
<link rel="stylesheet" type="text/css" href="includes/features.css"/>
<div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">

                    <marquee direction="left" scrollamount="3" behavior="alternate" width="350px"><img src="assets/img/logo.png" /></marquee>
                  
                    <img style="border-radius:50px;"src="assets/img/my.jpg" align="right" width="70px" height="70px"/><b>&copy; <?php echo date('Y');?> Made By Renish Limbasiya<b>
                </a>

            </div>
<?php if($_SESSION['login'])
{
?> 

            <div class="right-div">
                <a href="logout.php" class="btn btn-danger pull-right">LOG ME OUT</a>
            </div>
            <?php }?>
        </div>
    </div>
    <!-- LOGO HEADER END-->
<?php if($_SESSION['login'])
{
?>    
<section class="menu-section">
        <div class="container">
            
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="dashboard.php" class="menu-top-active" class="text-shadow-1">DASHBOARD</a></li>
                            <li><a href="issue.php"class="text-shadow-1">Issued Books</a></li>
                             <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"  class="text-shadow-1"> Account <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="my-profile.php" class="text-shadow-1">My Profile</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="changepass.php" class="text-shadow-1">Change Password</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php } else { ?>
        <section class="menu-section" >
        <div class="container" >
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">                        
                          
      <li><a href="index.php" class="text-shadow-1">Home</a></li>
      <li><a href="index.php#ulogin" class="text-shadow-1">User Login</a></li>
                            <li><a href="signup.php"class="text-shadow-1">User Signup</a></li>
                         
                            <li><a href="adminlogin.php"class="text-shadow-1">Admin Login</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php } ?>