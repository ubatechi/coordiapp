<!DOCTYPE html>
<html lang="en">


<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Coordination</title>

        <!-- Common Plugins -->
        <link href="assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Css-->
        <link href="assets/scss/style.css" rel="stylesheet">

        <style type="text/css">
            html,body{
                height: 100%;
            }
        </style>
    </head>
    <body class="bg-light">

        <div class="misc-wrapper">
            <div class="misc-content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-4">
                            <div class="misc-header text-center">
							    <img alt="" src="assets/img/icon.png" class="logo-icon margin-r-10">
                                <span class="toggle-none hidden-xs text-blue">Coordination Provinciale du 8ème CEPAC</span>
                            </div>
                            <div class="misc-box">   
                                 <!-- <p class="text-center">Sign up to get instant access.</p> -->
                                <form role="form" method="POST" Action="admin/addUsers.php" autocomplete="off">
                                    <div class="form-group">
                                         <label for="eampleuser1">Noms</label>
                                         <div class="group-icon">
                                        <input id="eampleuser1" type="text" placeholder="Enter name" class="form-control" name="noms" required="">
                                        <span class="icon-user text-muted icon-input"></span>
                                         </div>
                                    </div>
                                     <div class="form-group">
                                         <label for="eampleuser1">Email Adress</label>
                                         <div class="group-icon">
                                        <input id="eampleuser1" type="email" placeholder="Enter Email" class="form-control" name="email" required="">
                                        <span class="icon-envelope text-muted icon-input"></span>
                                         </div>
                                    </div>
                                    <div class="form-group group-icon">
                                         <label for="exampleInputPassword1">Password</label>
                                         <div class="group-icon">
                                        <input id="exampleInputPassword1" type="password" placeholder="Password" name="password" class="form-control">
                                        <span class="icon-lock text-muted icon-input"></span>
                                         </div>
                                    </div>                                    
                                    <div class="clearfix">
                                        <div class="float-left">
											<div class="checkbox checkbox-primary margin-r-5">
												<input id="checkbox2" type="checkbox" checked="">
												<label for="checkbox2"> I Agree with Terms <a href="#">Terms</a> </label>
											</div> 
                                        </div>
                                    </div>
									 <button type="submit" class="btn btn-block btn-primary btn-rounded box-shadow mt-10">Register Now</button>
                                    <hr>
									
                                    <p class=" text-center">Have an account?</p>
                                    <a href="login.php" class="btn btn-block btn-success btn-rounded box-shadow">Login</a>
                                </form>
                            </div>
                            <div class="text-center">
                            <?php
                              include'footer.php'
                              ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Common Plugins -->
        <script src="assets/lib/jquery/dist/jquery.min.js"></script>
		<script src="assets/lib/bootstrap/js/popper.min.js"></script>
        <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/lib/pace/pace.min.js"></script>
        <script src="assets/lib/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
        <script src="assets/lib/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/lib/nano-scroll/jquery.nanoscroller.min.js"></script>
        <script src="assets/lib/metisMenu/metisMenu.min.js"></script>
        <script src="assets/js/custom.js"></script>
</html>
