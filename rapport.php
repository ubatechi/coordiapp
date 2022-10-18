<?php
	include 'config/database.php';
    $query="SELECT ecole.idecole,rapport.archive,ecole.nom as ecole, rapport.idrapport,rapport.designation,rapport.motif,rapport.dateexep from rapport inner JOIN ecole on ecole.idecole=rapport.idecole";
    // $query="SELECT * FROM rapport";
	$statement=$db->prepare($query);
	$statement->execute();
	$b=$statement->fetchAll(PDO::FETCH_OBJ);
    $query1 = $db->query("SELECT idecole,nom FROM ecole");
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
					<li class="breadcrumb-item active">Rapport</li>		
				</ol>
			</div>
		</div>

        <section class="main-content">		
			
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <a href="fpdf/tutorial/listerapport.php" class="btn btn-primary col-md-3 ml-3 mt-3">Imprimer la liste des rapports</a>

                    <div class="col-md-12 col-sm-12 text-right">							
								<button data-toggle="modal" data-target="#myModal" class="btn btn-primary mt-3">Effectuer l'opération</button>
							
							<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
							<div role="document" class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 id="exampleModalLabel" class="modal-title">Rapport</h5>
									<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
								</div>
								<div class="modal-body col-md-12">						
									<form id="forme" method="POST" Action="admin/addRapport.php" class="form-horizontal col-md-12" autocomplete="off">										
                                        <div class="row">
                                            <div class="col-md-12 mt-3">
                                                <div class="form-group">
                                                    <label for="designation">Entrez le titre</label>
                                                    <input type="text" class="form-control" placeholder="Entrez le titre" name='designation' required />
                                                </div>  
                                                <div class="form-group">
                                                    <label for="motif">Entrez le motif</label>
                                                    <input type="text" class="form-control" placeholder="Entrez le motif" name='motif' required />
                                                </div> 
                                                <div class="form-group">
                                                    <label for="idecole">Choisir l'ecole</label>
                                                    <select  class="form-control" name='idecole' required >
                                                        <?php while ($ligne = $query1->fetch()) { ?>												
                                                            <option value="<?php echo($ligne['idecole']); ?>"><?php echo($ligne['nom']); ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>    
                                                 <div class="form-group">
                                                     <label for="categorie">Choisir le document</label>
                                                     <input type="file" class="form-control" name='archive' id="archive" required />
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
                                        <th>Designation</th>                                                    
                                        <th>Motif</th>                                                    
                                        <th>Ecole</th>  
                                        <th>Archive</th>                                                   
                                        <th>Mise à jour</th>                                                    
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php foreach ($b as $lig) :?>
                                    <div id="edit<?=$lig->idrapport ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                        <div role="document" class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 id="exampleModalLabel" class="modal-title">Edit Rapport</h5>
                                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body col-md-12">						
                                                    <form id="forme" method="POST" Action="admin/editrapport.php" class="form-horizontal col-md-12" autocomplete="off">										
                                                    <input type="hidden" name="idrapport" id="idrapport" value="<?=$lig->idrapport ;?>" class="form-control" required/>
                                                        <div class="row">
                                                            <div class="col-md-12 mt-3">
                                                            <div class="form-group">
                                                                    <label for="motif">Entrez le titre</label>
                                                                    <input type="text" class="form-control" placeholder="Entrez le motif" value="<?=$lig->designation ;?>" name='designation' required />
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label for="motif">Entrez le motif</label>
                                                                    <input type="text" class="form-control" placeholder="Entrez le motif" value="<?=$lig->motif ;?>" name='motif' required />
                                                                </div> 
                                                                <div class="form-group">
                                                                     <label for="categorie">Choisir le document</label>
                                                                     <input type="file" class="form-control" name='archive' id="archive" value="<?=$lig->archive ;?> required />
                                                                </div>  
                                                                <div class="form-group">
                                                                    <label for="idecole">Choisir l'ecole</label>
                                                                    <select  class="form-control" name='ecole' value="<?=$lig->ecole ;?>" required >
                                                                        <option value="<?=$lig->ecole ;?>"><?=$lig->ecole ;?></option> 
                                                                    </select>
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
                                        <div class="modal fade" id="edit<?=$lig->idrapport ;?>">
                                            <div class="modal-dialog modal-success">
                                                <div class="modal-content">
                                                    <div class="modal-header" >
                                                    <h3>Editer</h3><button class="btn btn-danger" data-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <td><?=$lig->designation ;?></td>
                                        <td><?=$lig->motif ;?></td>
                                        <td><?=$lig->ecole ;?></td>
                                        <td><a href="download.php?file=<?= $lig->archive; ?>">Telecharger</a><br></td>
                                        <td><?=$lig->dateexep;?></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#edit<?=$lig->idrapport ;?>" href="#" id="edit"><i class="fa fa-edit"></i></a>
                                            <a onclick= "return (confirm(' Voulez-vous supprimer vraiment cette information ?'));" href="admin/deleterapport.php?idrapport=<?=$lig->idrapport ;?>" id="del" class="ml-3"><i class="fa fa-trash"></i></a>                                                        
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
         <!-- Common Plugins -->
         <?php include '../partials/_scripto.php'; ?>
        <script type="text/javascript">
			$('#formdoc').submit(function(e){

				e.preventDefault();

				$.ajax({
					url:'../admin/admin/addfichier.php',
					method: 'POST',
					data: new FormData(this),
					processData:false,
					contentType:false,
					cache:false,
					headers:{'X-CSRF-Token':$('meta[name="csrf-token"]').attr('content')},
					
					success: function(data){
						alert('inserted successfully');
						$('#formdoc')[0].reset();
					}
				});
			});			
		</script>
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