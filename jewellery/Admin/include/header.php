<?php
include "function.php";
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html.designstream.co.in/horizon/php/default/light-blue/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Aug 2023 04:32:01 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin</title>
    <link rel="icon" type="image/icon" href="images/icon/admin1.ico">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/waves.min.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="css/nanoscroller.css">
    <link href="css/menu-light.css" type="text/css" rel="stylesheet">
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <!-- Static navbar -->

    <nav class="navbar navbar-default yamm navbar-fixed-top">
        <div class="container-fluid">
            <button type="button" class="navbar-minimalize minimalize-styl-2  pull-left "><i
                    class="fa fa-bars"></i></button>
            <span class="search-icon"><i class="fa fa-search"></i></span>
            <div class="search" style="display: none;">
                <form role="form">
                    <input type="text" class="form-control" autocomplete="off"
                        placeholder="Write something and press enter">
                    <span class="search-close"><i class="fa fa-times"></i></span>
                </form>
            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Horizon-Admin</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle button-wave" data-toggle="dropdown" aria-expanded="true">Mega
                            Menu<span class="caret"></span></a>
                        <ul class="dropdown-menu mega-dropdown-menu" style="width: 900px;">
                            <li>
                                <div class="yamm-content">
                                    <div class="row ">
                                        <div class="col-sm-3 ">

                                            <h3 class="yamm-category">Layout</h3>
                                            <ul class="list-unstyled ">
                                                <li><a href="#">Admin style 1</a></li>
                                                <li><a href="#">Admin style 2</a></li>
                                                <li><a href="#">Admin style 3</a></li>
                                                <li><a href="#">Admin style 4</a></li>
                                            </ul>


                                        </div>
                                        <div class="col-sm-3">

                                            <h3 class="yamm-category">Ui Kit</h3>
                                            <ul class="list-unstyled ">
                                                <li><a href="#">Typography</a></li>
                                                <li><a href="#">Buttons</a></li>
                                                <li><a href="#">Font Awesome</a></li>
                                                <li><a href="#">Tabs & Alerts</a></li>
                                            </ul>


                                        </div>
                                        <div class="col-sm-3">

                                            <h3 class="yamm-category">Analytics</h3>
                                            <ul class="list-unstyled ">
                                                <li><a href="#">Flot</a></li>
                                                <li><a href="#">Sparklines</a></li>
                                                <li><a href="#">Morris</a></li>
                                                <li><a href="#">Chart Js</a></li>
                                            </ul>


                                        </div>
                                        <div class="col-sm-3">
                                            <h3 class="yamm-category">Architecto</h3>
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                                accusantium doloremque laudantium. totam rem aperiam eaque ipsa quae ab
                                                illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                                explicabo.</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle button-wave" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right navbar-top-drops">
                    <li class="dropdown"><a href="#" class="dropdown-toggle button-wave" data-toggle="dropdown"><i
                                class="fa fa-envelope"></i> <span class="badge badge-xs badge-info">6</span></a>

                        <ul class="dropdown-menu dropdown-lg">
                            <li class="notify-title">
                                3 New messages
                            </li>
                            <li class="clearfix">
                                <a href="#">
                                    <span class="pull-left">
                                        <img src="images/avtar-1.jpg" alt="" class="img-circle" width="30">
                                    </span>
                                    <span class="block">
                                        John Doe
                                    </span>
                                    <span class="media-body">
                                        Lorem ipsum dolor sit amet
                                        <em>28 minutes ago</em>
                                    </span>
                                </a>
                            </li>
                            <li class="clearfix">
                                <a href="#">
                                    <span class="pull-left">
                                        <img src="images/avtar-2.jpg" alt="" class="img-circle" width="30">
                                    </span>
                                    <span class="block">
                                        John Doe
                                    </span>
                                    <span class="media-body">
                                        Lorem ipsum dolor sit amet
                                        <em>28 minutes ago</em>
                                    </span>
                                </a>
                            </li>
                            <li class="clearfix">
                                <a href="#">
                                    <span class="pull-left">
                                        <img src="images/avtar-3.jpg" alt="" class="img-circle" width="30">
                                    </span>
                                    <span class="block">
                                        John Doe
                                    </span>
                                    <span class="media-body">
                                        Lorem ipsum dolor sit amet
                                        <em>28 minutes ago</em>
                                    </span>
                                </a>
                            </li>
                            <li class="read-more"><a href="#">View All Messages <i class="fa fa-angle-right"></i></a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle button-wave" data-toggle="dropdown"><i
                                class="fa fa-bell"></i> <span class="badge badge-xs badge-warning">6</span></a>

                        <ul class="dropdown-menu dropdown-lg">
                            <li class="notify-title">
                                3 New messages
                            </li>
                            <li class="clearfix">
                                <a href="#">
                                    <span class="pull-left">
                                        <i class="fa fa-envelope"></i>
                                    </span>

                                    <span class="media-body">
                                        15 New Messages
                                        <em>20 Minutes ago</em>
                                    </span>
                                </a>
                            </li>
                            <li class="clearfix">
                                <a href="#">
                                    <span class="pull-left">
                                        <i class="fa fa-twitter"></i>
                                    </span>

                                    <span class="media-body">
                                        13 New Followers
                                        <em>2 hours ago</em>
                                    </span>
                                </a>
                            </li>
                            <li class="clearfix">
                                <a href="#">
                                    <span class="pull-left">
                                        <i class="fa fa-download"></i>
                                    </span>

                                    <span class="media-body">
                                        Download complete
                                        <em>2 hours ago</em>
                                    </span>
                                </a>
                            </li>
                            <li class="read-more"><a href="#">View All Alerts <i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </li>

                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>
    <section class="page">
        <nav class="navbar-aside navbar-static-side" role="navigation">
            <div class="sidebar-collapse nano">
                <div class="nano-content">
                    <ul class="nav metismenu" id="side-menu">
                        <li class="nav-header">
                            <div class="dropdown side-profile text-left">
                                <?php
                                user();
                                ?>
                            </div>
                        </li>
                        <li class="active">
                            <a href="index.php"><!--<i class="fa fa-th-large"></i>--> <span class="nav-label">Dashboard </span><span
                                    class="fa arrow"></span></a>
                            <!-- <ul class="nav nav-second-level collapse">
                                <li><a href="index-2.php">Dashboard </a></li>
                            </ul> -->
                        </li>
                        <li>
                            <a href="mailbox.php"><i class="fa fa-envelope"></i> <span class="nav-label">Mailbox
                                </span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="mailbox.php">Inbox</a></li>
                                <li><a href="mail_detail.php">Email view</a></li>
                                <li><a href="mail_compose.php">Compose email</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart"></i> <span class="nav-label">Graphs</span><span
                                    class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="flot_charts.php">Flot charts</a></li>
                                <li><a href="morris_js.php">Morris.js</a></li>
                                <li><a href="chart_js.php">Chart.js</a></li>
                                <li><a href="chartist.php">Chartist</a></li>
                                <li><a href="chart_sparkline.php">Sparkline</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Forms</span><span
                                    class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="form_basic.php">Basic form</a></li>
                                <li><a href="form_advanced.php">Advanced form</a></li>
                                <li><a href="form_wizard.php">Wizard form</a></li>
                                <li><a href="form_file_upload.php">File upload</a></li>
                                <li><a href="form_text_editor.php">Text editor</a></li>
                                <li><a href="form_inline_edit.php">Inline edit</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span><span
                                    class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="lockscreen.php">Lockscreen</a></li>
                                <li><a href="login.php">Login</a></li>
                                <li><a href="register.php">Register</a></li>
                                <li><a href="404.php">404 Page</a></li>
                                <li><a href="empty_page.php">Empty page</a></li>
                                <li><a href="gallery.php">gallery</a></li>
                                <li><a href="price_tables.php">Price tables</a></li>
                                <li><a href="page_contact.php">Contact Page</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-shopping-cart"></i> <span
                                    class="nav-label">E-commerce</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                            <li><a href="ordermanagement.php">Order Management</a></li>
                                <li><a href="orders.php">orders</a></li>
                                <li><a href="order-view.php">order View</a></li>
                                <li><a href="allproducts.php">Products</a></li>
                                <li><a href="addproducts.php">Add Product</a></li>


                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">UI Elements</span><span
                                    class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="typography.php">Typography</a></li>
                                <li><a href="icons.php">Icons</a></li>
                                <li><a href="buttons.php">Buttons</a></li>
                                <li><a href="video.php">Video</a></li>
                                <li><a href="tabs_panels.php">Panels</a></li>
                                <li><a href="tabs.php">Tabs</a></li>
                                <li><a href="alert_notifications.php">Alert & notifications</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="grid_options.php"><i class="fa fa-laptop"></i> <span class="nav-label">Grid
                                    options</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Tables</span><span
                                    class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="table_basic.php">Static Tables</a></li>
                                <li><a href="table_data_tables.php">Data Tables</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Users</span><span
                                    class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="user_profile.php">profile</a></li>
                                <li><a href="user_list.php">User list</a></li>

                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-map-marker"></i> <span class="nav-label">maps</span><span
                                    class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="google_maps.php">Google maps</a></li>
                                <li><a href="vector_maps.php">Vector Maps</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pencil"></i> <span class="nav-label">Blog</span><span
                                    class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="blog_list.php">Blog list</a></li>
                                <li><a href="blog_post.php">Blog post</a></li>
                            </ul>
                        </li>
                        <li><a href="calendar.php"><i class="fa fa-calendar"></i> <span class="nav-label">Calendar
                                </span></a></li>

                        <li>
                            <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Menu Levels </span><span
                                    class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#">Second Level Item</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
</body>

</html>