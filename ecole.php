<?php
	include 'config/database.php';
	
	$query="SELECT * FROM ecole";
	$statement=$db->prepare($query);
	$statement->execute();
	$b=$statement->fetchAll(PDO::FETCH_OBJ);

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
		    width: 30px;
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
					<li class="breadcrumb-item"><a href="#">admin</a></li>
					<li class="breadcrumb-item active">Ecole</li>		
				</ol>
			</div>
		</div>

        <section class="main-content">		
			
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <a href="fpdf/tutorial/listecole.php" class="btn btn-primary col-md-5 ml-3 mt-3">Imprimer la liste des écoles conventionnées protestantes</a>
                    <div class="col-md-12 col-sm-12 text-right">							
								<button data-toggle="modal" data-target="#myModal" class="btn btn-primary mt-3">Effectuer l'opération</button>
							
							<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
							<div role="document" class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 id="exampleModalLabel" class="modal-title">Ecole</h5>
									<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
								</div>
								<div class="modal-body col-md-12">						
									<form id="forme" method="POST" Action="admin/addEcole.php" class="form-horizontal col-md-12" autocomplete="off" enctype="multipart/form-data">										
                                        <div class="row">
                                            <div class="col-md-12 mt-3">
                                                <div class="form-group">
                                                    <label for="nom">Entré le nom d'une ecole</label>
                                                    <input type="text" class="form-control" placeholder="Entré le nom d'une ecole" name='nom' required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="responsable">Entré le nom du responsable</label>
                                                    <input type="text" class="form-control" placeholder="Entré le nom du responsable" name='responsable' required />
                                                </div>  
                                                <div class="form-group">
                                                    <label for="telephone">Entré le contact</label>
                                                    <input type="tel" class="form-control" placeholder="Entré le contact" name='telephone' required />
                                                </div>  
                                                <div class="form-group">
                                                    <label for="email">Entré l'adresse email</label>
                                                    <input type="email" class="form-control" placeholder="Entré l'adresse email" name='email' required />
                                                </div>  
                                                <div class="form-group">
                                                    <label for="adresse">Entré l'adresse de l'ecole</label>
                                                    <input type="text" class="form-control" placeholder="Entré l'adresse de l'ecole" name='adresse' required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="logo">Logo</label>
                                                    <input type="file" class="form-control" name='logo' required />
                                                </div>                                                                                                  
                                            </div>                                                               
                                            <div class="form-group">                               
                                                <input type="submit" class="btn btn-primary mt-4 ml-5" value="Enregistrer" />
                                            </div> 																								
									</form>
									</div>
								</div>								                        
							</div>							
							</div>							
						</div>
                        <div class="card-body">
                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                <thead>
                                    <tr class="text-center">
                                        <th>Nom de l'ecole</th>                                                    
                                        <th>Responsable</th>                                                    
                                        <th>Contact</th>                                                    
                                        <th>Email</th>                                                    
                                        <th>Adresse</th>                                                    
                                        <th>Logo</th>                                                    
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php foreach ($b as $lig) :?>
                                    <div id="edit<?=$lig->idecole ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                        <div role="document" class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 id="exampleModalLabel" class="modal-title">Edit ecole</h5>
                                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body col-md-12">						
                                                    <form id="forme" method="POST" Action="admin/editEcole.php" class="form-horizontal col-md-12" autocomplete="off" enctype="multipart/form-data">										
                                                    <input type="hidden" name="idecole" id="idecole" value="<?=$lig->idecole ;?>" class="form-control" required/>
                                                        <div class="row">
                                                            <div class="col-md-12 mt-3">
                                                                <div class="form-group">
                                                                    <label for="nom">Entré le nom d'une ecole</label>
                                                                    <input type="text" class="form-control" placeholder="Entré le nom d'une ecole" value="<?=$lig->nom ;?>" name='nom' required />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="responsable">Entré le nom du responsable</label>
                                                                    <input type="text" class="form-control" placeholder="Entré le nom du responsable" value="<?=$lig->responsable ;?>" name='responsable' required />
                                                                </div>  
                                                                <div class="form-group">
                                                                    <label for="telephone">Entré le contact</label>
                                                                    <input type="tel" class="form-control" placeholder="Entré le contact" value="<?=$lig->telephone ;?>" name='telephone' required />
                                                                </div>  
                                                                <div class="form-group">
                                                                    <label for="email">Entré l'adresse email</label>
                                                                    <input type="email" class="form-control" placeholder="Entré l'adresse email" value="<?=$lig->email ;?>" name='email' required />
                                                                </div>  
                                                                <div class="form-group">
                                                                    <label for="adresse">Entré l'adresse de l'ecole</label>
                                                                    <input type="text" class="form-control" placeholder="Entré l'adresse de l'ecole" value="<?=$lig->adresse ;?>" name='adresse' required />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="logo">Logo</label>
                                                                    <input type="file" class="form-control" name='logo' value="<?=$lig->logo ;?>" />
                                                                </div>                                                                                                  
                                                            </div>                                                               
                                                            <div class="form-group">                               
                                                                <input type="submit" class="btn btn-primary mt-4 ml-5" value="Modifier" />
                                                            </div> 																								
                                                    </form>
                                                </div>
                                            </div>								                        
                                        </div>							
                                    </div>
                                    <tr>
                                        <div class="modal fade" id="edit<?=$lig->idecole ;?>">
                                            <div class="modal-dialog modal-success">
                                                <div class="modal-content">
                                                    <div class="modal-header" >
                                                    <h3>Editer</h3><button class="btn btn-danger" data-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <td><?=$lig->nom ;?></td>
                                        <td><?=$lig->responsable ;?></td>
                                        <td><?=$lig->telephone ;?></td>
                                        <td><?=$lig->email ;?></td>
                                        <td><?=$lig->adresse ;?></td>
                                        <td><img class="pro" src="./images/<?=$lig->logo;?>"></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#edit<?=$lig->idecole ;?>" href="#" id="edit"><i class="fa fa-edit"></i></a>
                                            <a onclick= "return (confirm(' Voulez-vous supprimer vraiment cette information ?'));" href="admin/deleteEcole.php?idecole=<?=$lig->idecole ;?>" id="del" class="ml-3"><i class="fa fa-trash"></i></a>                                                        
                                        </td>                                                    
                                    </tr>
                                    <?php endforeach ;?>                                                                                            
                                </tbody>
                            </table>               

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