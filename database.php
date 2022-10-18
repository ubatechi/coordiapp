<?php
	include 'config/database.php';
	
	$query="SELECT * FROM information";
	$statement=$db->prepare($query);
	$statement->execute();
	$b=$statement->fetchAll(PDO::FETCH_OBJ);
    $query1 = $db->query("SELECT idopti,designation FROM options");

?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Coordination 8eme CEPAC</title>

        <!-- Common Plugins -->
        <link href="assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		
        <!-- DataTables -->
        <link href="assets/lib/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
        <link href="assets/lib/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css">
		 <link href="assets/lib/datatables/buttons.dataTables.css" rel="stylesheet" type="text/css">
		 
        <!-- Custom Css-->
        <link href="assets/scss/style.css" rel="stylesheet">
	<style rel="stylesheet" type="text/css">
        #del{
            font-size: 20px;
            color: #ee4511 !important;
        }
        #edit{
            font-size: 20px;
        }
        .pro{
		    width: 500px;
            border-radius: 20px;
	    }
    </style>

    </head>
    <body>

            <?php
                include'topbar.php'
            ?>

        <?php
	 	include'sidebar.php'  
	   ?>
  
        <div class="row page-header">
			<div class="col-lg-6 align-self-center ">
			    <h2>Coordination de la 8eme CEPAC</h2>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Sauvegarde</a></li>
					<li class="breadcrumb-item active">Sauvegarde de données</li>		
				</ol>
			</div>
		</div>

        <section class="main-content">		
	
<div class="col-md-12">
	<div class="row">
		<!-- bloc notification -->
		<div class="col-md-12" style="margin-top: 10px;">
           
        </div>
		<!-- fin bloc -->
		<!-- bloc 1 -->
		<div class="col-md-6" style="margin-top: 10px;">
			<div class="card">
				<div class="card-header text-center text-uppercase bg-primary text-white">
					<i class="fa fa-download"></i>&nbsp;Generer la sauvergarde des données(backup)
				</div>
				<div class="card-body">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-4"></div>
									<div class="col-4">
										<img src="upload/annumation/backup db.svg" class="img img-responsive" >
									</div>
									<div class="col-4"></div>

								</div>
							</div>

							<div class="col-md-12 text-center" style="margin-top: 53px;">
								<i class="fa fa-hand-o-down fa-lg"></i>
							</div>
							<div class="col-md-12 text-center">

								<a href="#" class="btn btn-primary btn-round">
									<i class="fa fa-download"></i>&nbsp; Sauvegarder la base des données
								</a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- fin bloc 1 -->

		<!-- bloc 1 -->
		<div class="col-md-6" style="margin-top: 10px;">
			<div class="card">
				<div class="card-header text-center text-uppercase bg-primary text-white">
					<i class="fa fa-download"></i>&nbsp;Importer la sauvergarde des données(backup)
				</div>
				<div class="card-body">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-4"></div>
									<div class="col-4">
										<img src="upload/annumation/restore db.svg" class="img img-responsive" >
									</div>
									<div class="col-4"></div>
								</div>
							</div>
							<div class="col-md-12 text-center mb-2" style="margin-top: 10px;">
								<form method="POST" action="#" enctype="multipart/form-data" class="row">

									<div class="col-12" style="margin-top: 10px;">
										<input type="file" name="file_name" id="file_name" class="form-control form-round">
								    </div>

								    <div class="col-12" style="margin-top: 10px;">
										<button type="submit" class="btn btn-primary btn-round"><i class="fa fa-download"></i>&nbsp; importer la base des données</button>
								    </div>
								
								</form>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- fin bloc 1 -->



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

        <!-- Datatables-->
        <script src="assets/lib/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/lib/datatables/dataTables.responsive.min.js"></script>

		<script src="assets/lib/datatables/dataTables.buttons.min.js"></script>
		<script src="assets/lib/datatables/jszip.min.js"></script>
		<script src="assets/lib/datatables/pdfmake.min.js"></script>
		<script src="assets/lib/datatables/vfs_fonts.js"></script>
		<script src="assets/lib/datatables/buttons.html5.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#datatable').dataTable();
				
				$('#datatable2').DataTable({
					 dom: 'Bfrtip',
					buttons: [
						'copyHtml5',
						'excelHtml5',
						'csvHtml5',
						'pdfHtml5'
					]
				});
				
				 $('#datatable3').DataTable( {
					"scrollY":        "400px",
					"scrollCollapse": true,
					"paging":         false
				} );
            });
			
        </script>
    </body>

</html>