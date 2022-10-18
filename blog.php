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
					<li class="breadcrumb-item"><a href="#">Blog</a></li>
					<li class="breadcrumb-item active">Nos Blogs</li>		
				</ol>
			</div>
		</div>

        <section class="main-content">		
			
        <section class="ptb-100 bg-image overflow-hidden" image-overlay="10">
            <div class="hero-bottom-shape-two" style="background: url('assets/img/img/hero-bottom-shape-2.svg')no-repeat bottom center"></div>

            <div class="container">
            <?php foreach ($b as $lig) :?>
                <div class="row align-items-center justify-content-lg-between justify-content-md-center justify-content-sm-center">
                    <div class="col-md-12 col-lg-6">
                        <div class="hero-slider-content py-5">
                            <h1 class=""><?=$lig->titre;?></h1>
                            <p class="lead"><?=$lig->description;?></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-5">
                        <div class="img-wrap">
                            <img class="pro" src="./images/<?=$lig->photo;?>">
                        </div>
                    </div>
                    <?php endforeach ;?> 
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </section><br/>
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