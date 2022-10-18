<?php
	include 'config/database.php';
	
	$query="SELECT * FROM eleve";
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
					<li class="breadcrumb-item active">Elève</li>		
				</ol>
			</div>
		</div>

        <section class="main-content">		
			
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <a href="fpdf/tutorial/listeleve.php" class="btn btn-primary col-md-3 ml-3 mt-3">Imprimer la liste des eleves</a>
                    <div class="col-md-12 col-sm-12 text-right">							
								<button data-toggle="modal" data-target="#myModal" class="btn btn-primary mt-3">Effectuer l'opération</button>
							
							<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
							<div role="document" class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 id="exampleModalLabel" class="modal-title">Elève</h5>
									<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
								</div>
								<div class="modal-body col-md-12">						
									<form id="forme" method="POST" Action="admin/addEleve.php" class="form-horizontal col-md-12" autocomplete="off" enctype="multipart/form-data">										
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
                                                    <label for="datenassance">Entré la date de naissance</label>
                                                    <input type="date" class="form-control" name='datenassance' required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="lieunaiss">Entré le lieu de naissance</label>
                                                    <input type="text" class="form-control" placeholder="Entré le lieu de naissance" name='lieunaiss' required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="province">Entré la province d'origine</label>
                                                    <input type="text" class="form-control" placeholder="Entré la province d'origine" name='province' required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="territoire">Entré le territoire</label>
                                                    <input type="text" class="form-control" placeholder="Entré le territoire" name='territoire' required />
                                                </div>                                                    
                                                <div class="form-group">
                                                    <label for="nationalite">Entré la nationalite</label>
                                                    <input type="text" class="form-control" placeholder="Entré la nationalite" name='nationalite' required />
                                                </div>                                                                                     
                                            </div>  
                                            <div class="col-md-6 mt-3">
                                               
                                                <div class="form-group">
                                                    <label for="avenue">Entré l'avenue</label>
                                                    <input type="text" class="form-control" placeholder="Entré l'avenue" name='avenue' required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="quartier">Entré le quartier</label>
                                                    <input type="text" class="form-control" placeholder="Entré le quartier" name='quartier' required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="commune">Entré la commune</label>
                                                    <input type="text" class="form-control" placeholder="Entré la commune" name='commune' required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="ville">Entré la ville</label>
                                                    <input type="text" class="form-control" placeholder="Entré la ville" name='ville' required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="tutaire">Entré le nom de tutaire</label>
                                                    <input type="text" class="form-control" placeholder="Entré le nom de tutaire" name='tutaire' required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="professiontutaire">Entré la profession de tutaire</label>
                                                    <input type="text" class="form-control" placeholder="Entré la profession de tutaire" name='professiontutaire' required />
                                                </div>
                                                <div class="form-group">
                                                    <label for="contact">Entré le contact</label>
                                                    <input type="tel" class="form-control" placeholder="Entré le contact" name='contact' required />
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
                                        <th>Date de naissance</th>                                                    
                                        <th>Lieu de naissance</th>                                                    
                                        <th>Province d'origine</th>                                                    
                                        <th>Territoire</th>                                                    
                                        <th>Nationalité</th>                                                    
                                        <th>Avenue</th>                                                    
                                        <th>Quartier</th>                                                    
                                        <th>Commune</th>                                                    
                                        <th>Ville</th>                                                    
                                        <th>Tutaire</th>                                                    
                                        <th>Profession du tutaire</th>                                                    
                                        <th>Contact</th>                                                    
                                        <th>Images</th>                                                    
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php foreach ($b as $lig) :?>
                                    <div id="edit<?=$lig->ideleve ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                        <div role="document" class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 id="exampleModalLabel" class="modal-title">Edit Eleve</h5>
                                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body col-md-12">						
                                                    <form id="forme" method="POST" Action="admin/editEleve.php" class="form-horizontal col-md-12" autocomplete="off" enctype="multipart/form-data">										
                                                    <input type="hidden" name="ideleve" id="ideleve" value="<?=$lig->ideleve ;?>" class="form-control" required/>
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
                                                                    <select  class="form-control" name='sexe' value="<?=$lig->sexe ;?>" >
                                                                        <option>M</option>
                                                                        <option>F</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="datenassance">Entré la date de naissance</label>
                                                                    <input type="date" class="form-control" value="<?=$lig->datenassance ;?>" name='datenassance' required />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="lieunaiss">Entré le lieu de naissance</label>
                                                                    <input type="text" class="form-control" placeholder="Entré le lieu de naissance" value="<?=$lig->lieunaiss ;?>" name='lieunaiss' required />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="province">Entré la province d'origine</label>
                                                                    <input type="text" class="form-control" placeholder="Entré la province d'origine" value="<?=$lig->province ;?>" name='province' required />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="territoire">Entré le territoire</label>
                                                                    <input type="text" class="form-control" placeholder="Entré le territoire" value="<?=$lig->territoire ;?>" name='territoire' required />
                                                                </div>                                                    
                                                                <div class="form-group">
                                                                    <label for="nationalite">Entré la nationalite</label>
                                                                    <input type="text" class="form-control" placeholder="Entré la nationalite" value="<?=$lig->nationalite ;?>" name='nationalite' required />
                                                                </div>                                                                                     
                                                            </div>  
                                                            <div class="col-md-6 mt-3">
                                                            
                                                                <div class="form-group">
                                                                    <label for="avenue">Entré l'avenue</label>
                                                                    <input type="text" class="form-control" placeholder="Entré l'avenue" value="<?=$lig->avenue ;?>" name='avenue' required />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="quartier">Entré le quartier</label>
                                                                    <input type="text" class="form-control" placeholder="Entré le quartier" value="<?=$lig->quartier ;?>" name='quartier' required />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="commune">Entré la commune</label>
                                                                    <input type="text" class="form-control" placeholder="Entré la commune" value="<?=$lig->commune ;?>" name='commune' required />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="ville">Entré la ville</label>
                                                                    <input type="text" class="form-control" placeholder="Entré la ville" value="<?=$lig->ville ;?>" name='ville' required />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tutaire">Entré le nom de tutaire</label>
                                                                    <input type="text" class="form-control" placeholder="Entré le nom de tutaire" value="<?=$lig->tutaire ;?>" name='tutaire' required />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="professiontutaire">Entré la profession de tutaire</label>
                                                                    <input type="text" class="form-control" placeholder="Entré la profession de tutaire" value="<?=$lig->professiontutaire ;?>" name='professiontutaire' required />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="contact">Entré le contact</label>
                                                                    <input type="tel" class="form-control" placeholder="Entré le contact" value="<?=$lig->contact ;?>" name='contact' required />
                                                                </div>  
                                                                <div class="form-group">
                                                                    <label for="photo">Images</label>
                                                                    <input type="file" class="form-control" value="<?=$lig->photo ;?>" name='photo' />
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
                                        <div class="modal fade" id="edit<?=$lig->ideleve ;?>">
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
                                        <td><?=$lig->datenassance ;?></td>
                                        <td><?=$lig->lieunaiss ;?></td>
                                        <td><?=$lig->province ;?></td>
                                        <td><?=$lig->territoire ;?></td>
                                        <td><?=$lig->nationalite ;?></td>
                                        <td><?=$lig->avenue ;?></td>
                                        <td><?=$lig->quartier ;?></td>
                                        <td><?=$lig->commune ;?></td>
                                        <td><?=$lig->ville ;?></td>
                                        <td><?=$lig->tutaire ;?></td>
                                        <td><?=$lig->professiontutaire ;?></td>
                                        <td><?=$lig->contact ;?></td>
                                        <td><img class="pro" src="./images/<?=$lig->photo;?>"></td>
                                        <td>
                                            <a data-toggle="modal" data-target="#edit<?=$lig->ideleve ;?>" href="#" id="edit"><i class="fa fa-edit"></i></a>
                                            <a onclick= "return (confirm(' Voulez-vous supprimer vraiment cette information ?'));" href="admin/deleteEleve.php?ideleve=<?=$lig->ideleve ;?>" id="del" class="ml-3"><i class="fa fa-trash"></i></a>                                                        
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