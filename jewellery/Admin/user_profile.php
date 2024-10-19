<?php 
include "include/header.php";
include "include/config.php";
//include "include/function.php";
if ($_SESSION['AdminId'] == "") {
    ?>
    <script type="text/javascript">
        alert("Login Crediential Required");
        document.location = "login.php";
    </script>
    <?php
}
?>
            <div id="wrapper">
                <div class="content-wrapper container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title">
                                <h1>My Profile <small></small></h1>
                                <ol class="breadcrumb">
                                    <li><a href="#"><i class="fa fa-home"></i></a></li>
                                    <li class="active">User Profile</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- end .page title-->


                    <div class="col-md-4 margin-b-30">
                        <div class="profile-overview">
                           <?php
                           $id=$_SESSION['AdminId'];
                        $sql="select * from user_master where user_email='$id'";
 $done=mysqli_execute_query($conn,$sql);
 $result=mysqli_fetch_array($done);
 echo '
 <div class="avtar text-center">

     <img src="images/'.$result['user_img'].'" alt="" class="img-thumbnail">
     <h3>'.$result['user_name'].'</h3>
     <hr>
     <ul class="socials list-inline">
         <li><a href="#"><i class="fa fa-facebook"></i></a></li>
         <li><a href="#"><i class="fa fa-twitter"></i></a></li>
         <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
         <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
         <li><a href="#"><i class="fa fa-github"></i></a></li>
     </ul>
     <hr>                               
 </div>
 <table class="table profile-detail table-condensed table-hover">
     <thead>
         <tr>
             <th colspan="3">Contact Information</th>
         </tr>
     </thead>
     <tbody>
     
  
     <tr>
         <td>Contact</td>
         <td>
             <a href="#">
             '.$result['user_contact'].'
             </a></td>
         <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
     </tr>
     <tr>
         <td>email:</td>
         <td>
             <a href="#">
             '.$result['user_email'].'
             </a></td>
         <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
     </tr>
     <tr>
         <td>User Roll</td>
         <td>'.$result['user_roll'].'</td>
         <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
     </tr>
     <tr>
         <td>User Register Time</td>
         <td>
             <a href="#">
             '.$result['user_signup_time'].'
             </a></td>
         <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
     </tr>
     </tbody>
 </table>
';

?>
                        </div>
                    </div>
                    <div class="col-md-5 margin-b-30">
                        <div class="profile-edit">
                            <?php
                        updateadmindetail($_SESSION['AdminId']);
                        ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="profile-states">
                            <h3>Sales States</h3>
                            <div class="sale-state-box">
                                <h3>654</h3>
                                <span>Lorem ipsum</span>
                            </div>
                            <div class="sale-state-box">
                                <h3>$9,45,5665.00</h3>
                                <span>Palem isuro</span>
                            </div>
                            <div class="sale-state-box">
                                <h3>16</h3>
                                <span>Adict asro</span>
                            </div>
                        </div>
                        <div class="recent-activities">
                            <h3>Recent Activities</h3>
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" src="images/avtar-1.jpg" alt="...">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"> Adict pasans loria</h4>
                                    Lorem ipsum dolor sit
                                </div>
                            </div><!--media-->
                              <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" src="images/avtar-2.jpg" alt="...">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"> Adict pasans loria</h4>
                                    Lorem ipsum dolor sit
                                </div>
                            </div><!--media-->
                              <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" src="images/avtar-3.jpg" alt="...">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"> Adict pasans loria</h4>
                                    Lorem ipsum dolor sit
                                </div>
                            </div><!--media-->
                        </div>
                    </div>
                </div> 
            </div>
        </section>

        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/metisMenu.min.js"></script><script src="js/jquery.nanoscroller.min.js"></script>
        <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/waves.min.js"></script>
        <script src="js/jquery-jvectormap-world-mill-en.js"></script>
        <!--        <script src="js/jquery.nanoscroller.min.js"></script>-->
        <script type="text/javascript" src="js/custom.js"></script>
        <!-- Google Analytics:  -->
        <script>
            (function (i, s, o, g, r, a, m)
            {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function ()
                {
                    (i[r].q = i[r].q || []).push(arguments);
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '../../../../../www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-3560057-28', 'auto');
            ga('send', 'pageview');
        </script>
    </body>

<!-- Mirrored from html.designstream.co.in/horizon/php/default/light-blue/user_profile.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Aug 2023 04:35:07 GMT -->
</html>
<?php 
function updateadmindetail($aid)
{
    include "include/config.php";
    $sql="select user_name,user_contact,user_img from user_master where user_email='$aid' and user_roll='Admin'";
    $done=mysqli_execute_query($conn,$sql);
    $result=mysqli_fetch_array($done);
    
    echo' 
     <form class="form-horizontal" method="post"  enctype="multipart/form-data" action="updateadmindetail.php">
    <h4 class="mb-xlg">Personal Information</h4>
    <fieldset>
    <input type="hidden" value="'.$result['user_img'].'" name="img"/>
    <div class="form-group">
    <label class="col-md-3 control-label" for="profileFirstName">Choose Profile Img : </label>
    <div class="col-md-8">
        <input type="file" name="imgname" class="form-control" id="profileFirstName" required>
    </div>
</div>
        <div class="form-group">
            <label class="col-md-3 control-label" for="profileFirstName">Full Name: </label>
            <div class="col-md-8">
                <input type="text" value="'.$result['user_name'].'" name="name" class="form-control" id="profileFirstName">
            </div>
        </div>
        <!-- <div class="form-group">
            <label class="col-md-3 control-label" for="profileLastName">Last Name</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="profileLastName">
            </div>
        </div> -->
        <div class="form-group">
            <label class="col-md-3 control-label" for="profileAddress">Email Id: </label>
            <div class="col-md-8">
                <input type="text" value="'.$aid.'" name="email"  class="form-control" id="profileAddress">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label" for="profileCompany">Contact</label>
            <div class="col-md-8">
                <input type="text" value="'.$result['user_contact'].'" name="contact"  class="form-control" id="profileCompany">
               
            </div>
        </div>

        <div class="panel-footer">
        <div class="row">
            <div class="col-md-9 col-md-offset-3">
                <button type="submit" name="update" class="btn btn-primary">Update</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </div>
        </div>
    </div>
    </form>
   
    </fieldset>

    <hr class="dotted tall">
    <!-- <h4 class="mb-xlg">About Yourself</h4>
    <fieldset>
        <div class="form-group">
            <label class="col-md-3 control-label" for="profileBio">Biographical Info</label>
            <div class="col-md-8">
                <textarea class="form-control" rows="3" id="profileBio"></textarea>
            </div>
        </div>

    </fieldset> -->
    <form action="updateadminpassword.php" method="post">
    <h4 class="mb-xlg">Change Password</h4>
    <fieldset class="mb-xl">
        <div class="form-group">
            <label class="col-md-3 control-label" for="profileNewPassword">New Password</label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="password" id="profileNewPassword">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label" for="profileNewPasswordRepeat">Repeat New Password</label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="newpassword" id="profileNewPasswordRepeat">
            </div>
        </div>
    </fieldset>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md-9 col-md-offset-3">
                <button type="submit" name="change" class="btn btn-primary">Update</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </div>
        </div>
    </div>

</form>';
}
?>