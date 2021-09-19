<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="public/js/scripts.js"></script>
<link href="public/css/adminstyles.css" rel="stylesheet" />


  
  <body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Gestion des <b>articles</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Ajouter un nouvel article</span></a>
						
						
                        <!--checker si l'utilisateur a des droits (1) pour accéder à la vue admin user-->
						<?php if($_SESSION['permission']==1){$adminlink='post&permission';}else{$adminlink='#';}?>
						<a href=<?php echo $adminlink ?> class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Afficher les utilisateurs</span></a>
						
						<!--<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Supprimer un article</span></a>-->	
						<!--<a href="#" class="btn btn-warning" data-toggle="modal"><i class="material-icons">&#xe0b7;</i> <span>Afficher les commentaires</span></a>-->			
			
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
					<!-- <span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span> -->
						</th>
                        <th>ID</th>
                        <th>Auteur</th>
						<th>Intitulé article</th>
                        <th>Sous-titre</th>
						<th>Contenu</th>
                        <th>Date de publication</th>
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
						
					<?php
                      foreach ($articles as $article):
                    ?>
						<td>	

						<?php if(strcmp($_SESSION['usersname'], $article->author()) && $_SESSION['permission']>1){$adminlink='#';}else{$adminlink= $article->id();}?>			
						<a href="post&com=<?= $adminlink ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Visualiser les commentaires de l'article">&#xe0b7;</i></a>
						</td>
                        <td><?= $article->id() ?></td>
                        <td><?= $article->author() ?></td>
						<td><?= $article->title() ?></td>
                        <td><?= $article->chapo() ?></td>
						<td><?= $article->content() ?></td>
						<td><?= $article->date() ?></td>
                        <td>
                            
							<a href="#editmodal" class="edit editbtn" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editer">&#xE254;</i></a>					
							<a href="post&delete=<?= $adminlink ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Supprimer">&#xE872;</i></a>
                        
						</td>
                    </tr>
                    <tr>
					<?php endforeach ?>
			
			 
                </tbody>
            </table>
			<div class="clearfix">
                <div class="hint-text">Afficher <b>1</b> sur <b>10</b> entrées</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Précédent</a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Suivant</a></li>
                </ul>
            </div>
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="post&adcreate" enctype="multipart/from-data">
					<div class="modal-header">						
						<h4 class="modal-title">Ajouter un nouvel article</h4>
						<i class="material-icons" data-toggle="tooltip" title="Editer">&#xE147;</i></a>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Intitulé article</label>
							<input type="text" name="title" id="title" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Sous-titre</label>
							<input type="text" name="sub-title" id="sub-title" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Contenu</label>
							<textarea class="form-control" name="content" id="content" rows="10" required></textarea>
						<div class="form-group">
							<!--<input type="file" name="image" id="image" class="form-control" required>-->
						</div>
						</div>
							
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
						<input type="submit" class="btn btn-success" value="Ajouter">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editmodal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" name="editForm" id="editForm" action="post&update">
					<div class="modal-header">						
						<h4 class="modal-title">Modifier l'article N°</h4><label name="labelid" id="labelid"></label>
						
						<i class="material-icons" data-toggle="tooltip" title="Editer">&#xE254;</i></a>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">

					    <input type="hidden"  name="id" id="id" class="form-control" required>
						<input type="hidden"  name="name-user" id="name-user" class="form-control" required>


						<div class="form-group">
							<label>Intitulé article</label>
							<input type="text" name="title-edit" id="title-edit" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Sous-titre</label>
							<input type="text" name="sub-title-edit" id="sub-title-edit" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Contenu</label>
							<textarea type="text" name="content-edit" id="content-edit" class="form-control"  rows="10" required></textarea>
						</div>
				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Quitter">
						<input type="submit"  class="btn btn-info" name="updatedata" value="Enregistrer">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="post&delete">
					<div class="modal-header">						
						<h4 class="modal-title">Supprimer un article</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Etes-vous sûr de vouloir supprimer cet enregistrement ?</p>
						<p class="text-warning"><small>Cette action est irréversible.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
						<input type="submit" id="modalDelete" class="btn btn-danger" value="Supprimer">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>