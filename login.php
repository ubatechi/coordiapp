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
                              <?php if(isset($_GET['error'])) {echo"<div class='alert alert-danger'>Erreur de connexion !!! email ou password incorrect</div>";} ?>
								<img alt="" src="assets/img/icon.png" class="logo-icon margin-r-10">
                                <span class="toggle-none hidden-xs text-blue">Coordination Provinciale du 8ème CEPAC</span>
                            </div>
                            <div class="misc-box">   
                                <form role="form" method="POST" action="session.php" autocomplete="off">
                                    <div class="form-group">                                      
                                        <label  for="exampleuser1">Email</label>
                                        <div class="group-icon">
                                        <input id="exampleuser1" type="email" placeholder="Entrez votre adresse email" class="form-control" name="email" required="">
                                        <span class="icon-user text-muted icon-input"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <div class="group-icon">
                                        <input id="exampleInputPassword1" type="password" placeholder="Password" name="password" class="form-control">
                                        <span class="icon-lock text-muted icon-input"><i onclick="afficher()"></i></span>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="float-left">
                                           <div class="checkbox checkbox-primary margin-r-5">
												<input id="checkbox2" type="checkbox" checked="">
												<label for="checkbox2"> Remember Me </label>
											</div>
                                        </div>
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-block btn-primary btn-rounded box-shadow">Login</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="text-center">Need to Signup?</p>
                                    <a href="register.php" class="btn btn-block btn-success btn-rounded box-shadow">Register Now</a>                                  
                                </form>
                            </div>
                            <div class="text-center misc-footer">
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
        <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/lib/pace/pace.min.js"></script>
        <script src="assets/lib/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
        <script src="assets/lib/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/lib/nano-scroll/jquery.nanoscroller.min.js"></script>
        <script src="assets/lib/metisMenu/metisMenu.min.js"></script>
        <script src="assets/js/custom.js"></script>
        <script>
		function afficher(){
			var input=document.getElementById("password");
			if(input.type==="password"){
				input.type="text";
			}
			else{
				input.type="password";
			}
		}
	</script>
    </body>

</html>
