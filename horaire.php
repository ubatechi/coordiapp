<?php
	include 'config/database.php';
	
	$query="SELECT * FROM affecthoraire";
	$statement=$db->prepare($query);
	$statement->execute();
	$b=$statement->fetchAll(PDO::FETCH_OBJ);
    $query1 = $db->query("SELECT idclass,designation FROM classe");
    $query2 = $db->query("SELECT idopti,designation FROM options");
    $query3 = $db->query("SELECT idcours,designation FROM cours");
    $query4 = $db->query("SELECT idense,nom FROM enseignant");
    $query5 = $db->query("SELECT idsec,designation FROM section");
    $query6 = $db->query("SELECT idecole,nom FROM ecole");

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
					<li class="breadcrumb-item active">Horaire</li>		
				</ol>
			</div>
		</div>

        <section class="main-content">		
			
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    
                    <div class="col-md-12 col-sm-12 text-right">							
								<button data-toggle="modal" data-target="#myModal" class="btn btn-primary mt-3">Effectuer l'opération</button>
							
							<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
							<div role="document" class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 id="exampleModalLabel" class="modal-title">Horaire</h5>
									<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
								</div>
								<div class="modal-body col-md-12">						
									<form id="forme" method="POST" Action="admin/addHoraire.php" class="form-horizontal col-md-12" autocomplete="off">										
                                        <div class="row">
                                            <div class="col-md-6 mt-3">
                                                <div class="form-group">
                                                    <label for="classe">Choisir la classe</label>
                                                    <select class="form-control" name='idclass' required >
                                                        <?php while ($ligne = $query1->fetch()) { ?>												
                                                            <option value="<?php echo($ligne['idclass']); ?>"><?php echo($ligne['designation']); ?></option>
                                                        <?php } ?>	
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="idopt">Choisir l'option</label>
                                                    <select  class="form-control" name='idopt' required >
                                                        <?php while ($ligne = $query2->fetch()) { ?>												
                                                            <option value="<?php echo($ligne['idopti']); ?>"><?php echo($ligne['designation']); ?></option>
                                                        <?php } ?>	
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="idcours">Choisir le cours</label>
                                                    <select  class="form-control" name='idcours' required >
                                                        <?php while ($ligne = $query3->fetch()) { ?>												
                                                            <option value="<?php echo($ligne['idcours']); ?>"><?php echo($ligne['designation']); ?></option>
                                                        <?php } ?>	
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="categorie">Entré le jour</label>
                                                    <input type="text" class="form-control" placeholder="Entré le jours" name='jours' required />
                                                </div>   
                                                <div class="form-group">
                                                    <label for="heuredebut">Entré l'heure du debut</label>
                                                    <input type="text" class="form-control" placeholder="Entré l'heure debut" name='heuredebut' required />
                                                </div>                                                                                             
                                            </div>  
                                            <div class="col-md-6 mt-3">
                                                <div class="form-group">
                                                    <label for="heurefin">Entré l'heure de fin</label>
                                                    <input type="text" class="form-control" placeholder="Entré l'heure fin" name='heurefin' required />
                                                </div>  
                                                <div class="form-group">
                                                    <label for="idenseig">Choisir l'enseignant</label>
                                                    <select  class="form-control" name='idenseig' required >
                                                        <?php while ($ligne = $query4->fetch()) { ?>												
                                                            <option value="<?php echo($ligne['idense']); ?>"><?php echo($ligne['nom']); ?></option>
                                                        <?php } ?>	
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="idsect">Choisir la section</label>
                                                    <select  class="form-control" name='idsect' required >
                                                        <?php while ($ligne = $query5->fetch()) { ?>												
                                                            <option value="<?php echo($ligne['idsec']); ?>"><?php echo($ligne['designation']); ?></option>
                                                        <?php } ?>	
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="idecole">Choisir l'ecole</label>
                                                    <select  class="form-control" name='idecole' required >
                                                        <?php while ($ligne = $query6->fetch()) { ?>												
                                                            <option value="<?php echo($ligne['idecole']); ?>"><?php echo($ligne['nom']); ?></option>
                                                        <?php } ?>	
                                                    </select>
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
                                        <th>Classe</th>                                                    
                                        <th>Options</th>                                                    
                                        <th>Cours</th>                                                    
                                        <th>Jours</th>                                                    
                                        <th>Heure debut</th>                                                    
                                        <th>Heure fin</th>                                                    
                                        <th>Enseignant</th>                                                    
                                        <th>Section</th>                                                    
                                        <th>Ecole</th>                                                    
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php foreach ($b as $lig) :?>
                                    <div id="edit<?=$lig->idhoraire ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                        <div role="document" class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 id="exampleModalLabel" class="modal-title">Edit Horaire</h5>
                                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body col-md-12">						
                                                    <form id="forme" method="POST" Action="admin/editHoraire.php" class="form-horizontal col-md-12" autocomplete="off">										
                                                    <input type="hidden" name="idhoraire" id="idhoraire" value="<?=$lig->idhoraire ;?>" class="form-control" required/>
                                                        <div class="row">
                                                            <div class="col-md-6 mt-3">
                                                                <div class="form-group">
                                                                    <label for="classe">Choisir la classe</label>
                                                                    <select class="form-control" name='idclass' value="<?=$lig->idclass ;?>" required >
                                                                        <option value="<?=$lig->idclass ;?>"><?=$lig->idclass ;?></option> 
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="idopt">Choisir l'option</label>
                                                                    <select  class="form-control" name='idopt' value="<?=$lig->idopt ;?>" required >
                                                                        <option value="<?=$lig->idopt ;?>"><?=$lig->idopt ;?></option> 
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="idcours">Choisir le cours</label>
                                                                    <select  class="form-control" name='idcours' value="<?=$lig->idcours ;?>" required >
                                                                        <option value="<?=$lig->idcours ;?>"><?=$lig->idcours ;?></option> 
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="categorie">Entré le jour</label>
                                                                    <input type="text" class="form-control" placeholder="Entré le jours" value="<?=$lig->jours ;?>" name='jours' required />
                                                                </div>   
                                                                <div class="form-group">
                                                                    <label for="heuredebut">Entré l'heure du debut</label>
                                                                    <input type="text" class="form-control" placeholder="Entré l'heure debut" value="<?=$lig->heuredebut ;?>" name='heuredebut' required />
                                                                </div>                                                                                             
                                                            </div>  
                                                            <div class="col-md-6 mt-3">
                                                                <div class="form-group">
                                                                    <label for="heurefin">Entré l'heure de fin</label>
                                                                    <input type="text" class="form-control" placeholder="Entré l'heure fin" value="<?=$lig->heurefin ;?>" name='heurefin' required />
                                                                </div>  
                                                                <div class="form-group">
                                                                    <label for="idenseig">Choisir l'enseignant</label>
                                                                    <select  class="form-control" name='idenseig' value="<?=$lig->idenseig ;?>" required >
                                                                        <option value="<?=$lig->idenseig ;?>"><?=$lig->idenseig ;?></option> 
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="idsect">Choisir la section</label>
                                                                    <select  class="form-control" name='idsect' value="<?=$lig->idsect ;?>" required >
                                                                        <option value="<?=$lig->idsect ;?>"><?=$lig->idsect ;?></option> 
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="idecole">Choisir l'ecole</label>
                                                                    <select  class="form-control" name='idecole' value="<?=$lig->idecole ;?>" required >
                                                                        <option value="<?=$lig->idecole ;?>"><?=$lig->idecole ;?></option> 
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
                                        <div class="modal fade" id="edit<?=$lig->idhoraire ;?>">
                                            <div class="modal-dialog modal-success">
                                                <div class="modal-content">
                                                    <div class="modal-header" >
                                                    <h3>Editer</h3><button class="btn btn-danger" data-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <td><?=$lig->idclass ;?></td>
                                        <td><?=$lig->idopt ;?></td>
                                        <td><?=$lig->idcours ;?></td>
                                        <td><?=$lig->jours ;?></td>
                                        <td><?=$lig->heuredebut ;?></td>
                                        <td><?=$lig->heurefin ;?></td>
                                        <td><?=$lig->idenseig ;?></td>
                                        <td><?=$lig->idsect ;?></td>
                                        <td><?=$lig->idecole ;?></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#edit<?=$lig->idhoraire ;?>" href="" id="edit"><i class="fa fa-edit"></i></a>
                                            <a onclick= "return (confirm(' Voulez-vous supprimer vraiment cette information ?'));" href="admin/deleteHoraire.php?idhoraire=<?=$lig->idhoraire ;?>" id="del" class="ml-3"><i class="fa fa-trash"></i></a>                                                        
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