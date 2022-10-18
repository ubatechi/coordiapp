<?php
	include 'config/database.php';
	
	$query="SELECT * FROM enseignant";
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
					<li class="breadcrumb-item active">Enseignant</li>		
				</ol>
			</div>
		</div>

        <section class="main-content">		
			
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <a href="fpdf/tutorial/listenseignant.php" class="btn btn-primary col-md-3 ml-3 mt-3">Imprimer la liste des enseignants</a>
                    <div class="col-md-12 col-sm-12 text-right">							
								<button data-toggle="modal" data-target="#myModal" class="btn btn-primary mt-3">Effectuer l'opération</button>
							
							<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
							<div role="document" class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 id="exampleModalLabel" class="modal-title">Enseignant</h5>
									<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
								</div>
								<div class="modal-body col-md-12">						
									<form id="forme" method="POST" Action="admin/addEnseignant.php" class="form-horizontal col-md-12" autocomplete="off" enctype="multipart/form-data">										
                                        <div class="row">
                                            <div class="col-md-6 mt-3">
                                                <div class="form-group">
                                                    <label for="nom">Entré le nom</label>
                                                    <input type="text" class="form-control" placeholder="Entré le nom" name='nom' required />
                                                </div> 
                                                <div class="form-group">
                                                    <label for="postnom">Entré le postnom</label>
                                                    <input type="text" class="form-control" placeholder="Entré le postnom" name='postnom' required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="prenom">Entré le prenom</label>
                                                    <input type="text" class="form-control" placeholder="Entré le prenom" name='prenom' required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="sexe">Choisir le sexe</label>
                                                    <select  class="form-control" name='sexe' required >
                                                        <option>M</option>
                                                        <option>F</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="adresse">Entré l'adresse</label>
                                                    <input type="text" class="form-control" placeholder="Entré l'adresse" name='adresse' required />
                                                </div> 
                                                <div class="form-group">
                                                    <label for="contact">Entré le contact</label>
                                                    <input type="tel" class="form-control" placeholder="Entré le contact" name='contact' required />
                                                </div>                                                                                               
                                            </div> 
                                            <div class="col-md-6 mt-3">                                               
                                                <div class="form-group">
                                                    <label for="mail">Entré le mail</label>
                                                    <input type="email" class="form-control" placeholder="Entré le mail" name='mail' required />
                                                </div>                                             
                                                <div class="form-group">
                                                    <label for="domaine">Entré le domaine</label>
                                                    <input type="text" class="form-control" placeholder="Entré le domaine" name='domaine' required />
                                                </div> 
                                                <div class="form-group">
                                                    <label for="qualification">Entré la qualification</label>
                                                    <input type="text" class="form-control" placeholder="Entré la qualification" name='qualification' required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="etatcivile">Choisir l'etat civile</label>
                                                    <select  class="form-control" name='etatcivile' required >
                                                        <option>Celibataire</option>
                                                        <option>Marié</option>
                                                        <option>Autres</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="photo">Images</label>
                                                    <input type="file" class="form-control" name='photo' required />
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
                                        <th>Nom</th>                                                    
                                        <th>Postnom</th>                                                    
                                        <th>Prenom</th>                                                    
                                        <th>Sexe</th>                                                    
                                        <th>Adresse</th>                                                    
                                        <th>Contact</th>                                                    
                                        <th>Email</th>                                                    
                                        <th>Domaine</th>                                                    
                                        <th>Qualification</th>                                                    
                                        <th>Etat civile</th>                                                    
                                        <th>Images</th>                                                    
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php foreach ($b as $lig) :?>
                                    <div id="edit<?=$lig->idense ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                        <div role="document" class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 id="exampleModalLabel" class="modal-title">Edit Enseignant</h5>
                                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body col-md-12">						
                                                    <form id="forme" method="POST" Action="admin/editEnseignant.php" class="form-horizontal col-md-12" autocomplete="off" enctype="multipart/form-data">										
                                                    <input type="hidden" name="idense" id="idense" value="<?=$lig->idense ;?>" class="form-control" required/>
                                                        <div class="row">
                                                            <div class="col-md-6 mt-3">
                                                                <div class="form-group">
                                                                    <label for="nom">Entré le nom</label>
                                                                    <input type="text" class="form-control" placeholder="Entré le nom" value="<?=$lig->nom ;?>" name='nom' required />
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label for="postnom">Entré le postnom</label>
                                                                    <input type="text" class="form-control" placeholder="Entré le postnom" value="<?=$lig->postnom ;?>" name='postnom' required />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="prenom">Entré le prenom</label>
                                                                    <input type="text" class="form-control" placeholder="Entré le prenom" value="<?=$lig->prenom ;?>" name='prenom' required />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="sexe">Choisir le sexe</label>
                                                                    <select  class="form-control" name='sexe' value="<?=$lig->sexe ;?>" required >
                                                                        <option>M</option>
                                                                        <option>F</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="adresse">Entré l'adresse</label>
                                                                    <input type="text" class="form-control" placeholder="Entré l'adresse" value="<?=$lig->adresse ;?>" name='adresse' required />
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label for="contact">Entré le contact</label>
                                                                    <input type="tel" class="form-control" placeholder="Entré le contact" value="<?=$lig->contact ;?>" name='contact' required />
                                                                </div>                                                                                               
                                                            </div> 
                                                            <div class="col-md-6 mt-3">                                               
                                                                <div class="form-group">
                                                                    <label for="mail">Entré le mail</label>
                                                                    <input type="email" class="form-control" placeholder="Entré le mail" value="<?=$lig->mail ;?>" name='mail' required />
                                                                </div>                                             
                                                                <div class="form-group">
                                                                    <label for="domaine">Entré le domaine</label>
                                                                    <input type="text" class="form-control" placeholder="Entré le domaine" value="<?=$lig->domaine ;?>" name='domaine' required />
                                                                </div> 
                                                                <div class="form-group">
                                                                    <label for="qualification">Entré la qualification</label>
                                                                    <input type="text" class="form-control" placeholder="Entré la qualification" value="<?=$lig->qualification ;?>" name='qualification' required />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="etatcivile">Choisir l'etat civile</label>
                                                                    <select  class="form-control" name='etatcivile' value="<?=$lig->etatcivile ;?>" required >
                                                                        <option>Celibataire</option>
                                                                        <option>Marié</option>
                                                                        <option>Autres</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="photo">Images</label>
                                                                    <input type="file" class="form-control" name='photo' value="<?=$lig->photo ;?>" />
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
                                        <div class="modal fade" id="edit<?=$lig->idense ;?>">
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
                                        <td><?=$lig->postnom ;?></td>
                                        <td><?=$lig->prenom ;?></td>
                                        <td><?=$lig->sexe ;?></td>
                                        <td><?=$lig->adresse ;?></td>
                                        <td><?=$lig->contact ;?></td>
                                        <td><?=$lig->mail ;?></td>
                                        <td><?=$lig->domaine ;?></td>
                                        <td><?=$lig->qualification ;?></td>
                                        <td><?=$lig->etatcivile ;?></td>
                                        <td><img class="pro" src="./images/<?=$lig->photo;?>"></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#edit<?=$lig->idense ;?>" href="#" id="edit"><i class="fa fa-edit"></i></a>
                                            <a onclick= "return (confirm(' Voulez-vous supprimer vraiment cette information ?'));" href="admin/deleteEnseignant.php?idense=<?=$lig->idense ;?>" id="del" class="ml-3"><i class="fa fa-trash"></i></a>                                                        
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