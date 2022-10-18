<?php

    require './config/database.php';
    if(isset($_SESSION['PROFILE']['id_utilisateur'])) {
        switch ($_SESSION['PROFILE']['designation']) {
            case 'personnel':
                header('location: ./personnel/');
            break;
            case 'patrimoine':
                header('location: ./patrimoine/');
            break;
            case 'magasin':
                header('location: ./magasin/');
            break;
            case 'admin':
                header('location: ./admin/');
            break;
            case 'agent':
                header('location: ./user/');
            break;
            default:
                header('location: ./');
                die('aucune service');
            break;
        }
    }

    if(isset($_POST['btn_submit'])) {
        extract($_POST);
        $sql = "SELECT * FROM authentification  WHERE (username=:username OR email=:email) AND password=:password";
        $req = $db->prepare($sql);
        $req->execute([
            'username' => htmlspecialchars(trim($username)),
            'email' => $username,
            'password' => sha1($password)
        ]);
        
        if($informations = $req->fetch()) { /*Si l'adresse et le mot de passe sont vrai*/
            $_SESSION['TMP_PROFILE'] = $informations;
            //echo $_SESSION['TMP_PROFILE']['ref_utilisateur'];
            
            $recup_informations = $db->prepare("SELECT * FROM fonction INNER JOIN tbl_agent ON fonction.id_fonction=tbl_agent.ref_fonction WHERE id_utilisateur=:id_utilisateur");
            $recup_informations->execute([
            'id_utilisateur' => $_SESSION['TMP_PROFILE']['ref_utilisateur']
            ]);

            while($session = $recup_informations->fetch()) {
                $_SESSION['PROFILE'] = $session;
            }
            
            switch ($_SESSION['PROFILE']['designation']) {
                 case 'personnel':
                 header('location: ./personnel/');
                 break;
                case 'patrimoine':
                header('location: ./patrimoine/');
                 break;
                 case 'magasin':
                header('location: ./magasin/');
                 break;
                  case 'admin':
                header('location: ./admin/');
                 break;
                 case 'agent':
                header('location: ./user/');
                 break;
                default:
                    header('location: ./');
                    die('aucune service');
                break;
            }
        }
        else{
            $error = '';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:29:48 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="img" href="assets/img/L.png">
        <title>Login</title>

        <!-- Common Plugins -->
        <link href="assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Css-->
        <link href="assets/scss/style.css" rel="stylesheet">
		
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
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
                                <h1><strong>UNIGOM-RH-MANAGER</strong></h1>
								
								<img width="100px;" src="assets/img/L.png" class="toggle-none hidden-xs">
                            </div>
                            <div class="misc-box"> 
                            <div id="errorConnection" style="margin-top: 30px; margin-bottom: 30px">
                                    <?php if(isset($error)) : ?>
                                    <div class="alert alert-danger" onclick="document.querySelector('#errorConnection').style.display = 'none';">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="color: red"><b>Informations incorrectes !</b></span>
                                    </div>
                                    <?php endif; ?>
                                </div>  
                                <form role="form" method="POST" autocomplete="off">
                                    <div class="form-group">                                      
                                        <label  for="exampleuser1">Nom d'utilisateur ou email</label>
                                        <div class="group-icon">
                                        <input id="exampleuser1" name="username" value="<?= (isset($username)) ? $username : ''; ?>" type="text" placeholder="Nom d'utilisateur ou email" class="form-control" required="">
                                        <span class="icon-user text-muted icon-input"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mot de passe</label>
                                        <div class="group-icon">
                                        <input id="exampleInputPassword1" name="password" value="<?= (isset($password)) ? $password : ''; ?>" type="password" placeholder="Password" class="form-control">
                                        <span class="icon-lock text-muted icon-input"></span>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="float-left">
                                           <div class="checkbox checkbox-primary margin-r-5">
												<input id="checkbox2" type="checkbox" checked="">
												<label for="checkbox2"> Se souvenir de moi</label>
											</div>
                                        </div>
                                        <div class="float-right">
                                            <button type="submit" name="btn_submit" class="btn btn-block btn-primary btn-rounded box-shadow">Se connecter</button>
                                        </div>
                                    </div>
                                    <hr>
                                   
                                </form>
                            </div>
                            <div class="text-center misc-footer">
                               <p>Copyright &copy; 2021 UNIGOM-HR-MANAGER</p>
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
		
    </body>

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:29:48 GMT -->
</html>
