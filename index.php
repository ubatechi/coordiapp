<?php
  include 'config/database.php';
  session_start();
  if (!isset($_SESSION['user_id'])){
	  header('location:login.php');
  }
  $query=$db->query("SELECT COUNT(*) AS id FROM eleve");
  $query1=$db->query("SELECT COUNT(*) AS id FROM enseignant");
  $query2=$db->query("SELECT COUNT(*) AS id FROM ecole");
  $query3=$db->query("SELECT montant FROM vpaiement ");

?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Coordination</title>
		<link rel="icon" type="image/png" sizes="16x16" href="assets/img/icon.png">
		
        <!-- Common Plugins -->
        <link href="assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- Vector Map Css-->
        <link href="assets/lib/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
		
		<!-- Chart C3 -->
		<link href="assets/lib/chart-c3/c3.min.css" rel="stylesheet">
		<link href="assets/lib/chartjs/chartjs-sass-default.css" rel="stylesheet">

        <!-- DataTables -->
        <link href="assets/lib/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
        <link href="assets/lib/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/lib/toast/jquery.toast.min.css" rel="stylesheet">
		
        <!-- Custom Css-->
        <link href="assets/scss/style.css" rel="stylesheet">
   
    </head>
    <body>
			<?php
			include'topbar.php'
			?>
       <?php
	     include 'sidebar.php' 
	   ?>
      
		<div class="row page-header">
				<div class="col-lg-6 align-self-center ">
				  <h2>Dashboard</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div>
			
		</div>
		
        <section class="main-content">
            <div class="row w-no-padding margin-b-30">
			
				<div class="col-md-3">
                    <div class="widget  bg-light">
                        <div class="row row-table ">
                            <div class="margin-b-30">
								<h2 class="margin-b-5">NOMBRE TOTAL DES ELEVES</h2>
								<p class="text-muted">Total Elèves</p>
                                <?php while ($b = $query->fetch()) {?>
								<span class="float-right text-primary widget-r-m"><?=$b['id'];?></span>
                                <?php } ?>
							</div>
							<div class="progress margin-b-10  progress-mini">
								<div style="width:50%;" class="progress-bar bg-primary"></div>
							</div>							
                        </div>
                    </div>
                </div>
				
                <div class="col-md-3">
                    <div class="widget  bg-light">
                        <div class="row row-table ">
                            <div class="margin-b-30">
								<h2 class="margin-b-5">NOMBRE TOTAL DES ENSEIGNANTS</h2>
								<p class="text-muted">Total Enseignants</p>
                                <?php while ($b = $query1->fetch()) {?>
								<span class="float-right text-indigo widget-r-m"><?=$b['id'];?></span>
                                <?php } ?>
							</div>
							<div class="progress margin-b-10 progress-mini">
								<div style="width:45%;" class="progress-bar bg-indigo"></div>
							</div>
							
                        </div>
                    </div>
                </div>
				
				<div class="col-md-3">
                    <div class="widget  bg-light">
                        <div class="row row-table ">
                            <div class="margin-b-30">
								<h2 class="margin-b-5">NOMBRE TOTAL DES ECOLES</h2>
								<p class="text-muted">Total Ecoles</p>
                                <?php while ($b = $query2->fetch()) {?>
								<span class="float-right text-success widget-r-m"><?=$b['id'];?></span>
                                <?php } ?>
							</div>
							<div class="progress margin-b-10 progress-mini">
								<div style="width:85%;" class="progress-bar bg-success"></div>
							</div>							
                        </div>
                    </div>
                </div>
				
				<div class="col-md-3">
                    <div class="widget  bg-light">
                        <div class="row row-table ">
                            <div class="margin-b-30">
								<h2 class="margin-b-5">NOMBRE DES PAIEMENTS</h2>
								<p class="text-muted">Total Paiements</p>
                                <?php while ($b = $query3->fetch()) {?>
								<span class="float-right text-warning widget-r-m"><?=$b['montant'];?></span>
                                <?php } ?>
							</div>
							<div class="progress margin-b-10 progress-mini">
								<div style="width:38%;" class="progress-bar bg-warning"></div>
							</div>							
                        </div>
                    </div>
                </div>
            </div>
			
			<div class="row">
                <div class="col-md-12">
                  <div class="card bg-chart ">
                        <div class="card-header text-white anime">
                            Sales Overview			
							<p class="text-white">Lorem Ipsum is simply dummy text of the printing</p>
                        </div>
                        <div class="card-body">
                            <div>
                                <canvas id="myChart"  height="100"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

		<?php
		include'footer.php'
		?>

        </section>

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
			
        <!--Chart Script-->
        <script src="assets/lib/chartjs/chart.min.js"></script>
		<script src="assets/lib/chartjs/chartjs-sass.js"></script>

		<!--Vetor Map Script-->
		<script src="assets/lib/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="assets/lib/vectormap/jquery-jvectormap-us-aea-en.js"></script>
		
		<!-- Chart C3 -->
        <script src="assets/lib/chart-c3/d3.min.js"></script>
        <script src="assets/lib/chart-c3/c3.min.js"></script>
	
        <!-- Datatables-->
        <script src="assets/lib/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/lib/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/lib/toast/jquery.toast.min.js"></script>
        <script src="assets/js/dashboard.js"></script>
		
    </body>

</html>