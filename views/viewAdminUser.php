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
						<h2>Gestion des <b>utilisateurs</b></h2>
					</div>
					<div class="col-sm-6">
					<a href="post&admin" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xe0b7;</i> <span>Revenir et afficher les articles</span></a>				
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
                        <th>Nom</th>
						<th>Nom utilisateur</th>
                        <th>Email</th>			
						<th>Date inscription</th>
						<th>Permission</th>
						<th>Action sur permission</th>
						
                    </tr>
                </thead>
                <tbody>
                    <tr>
						
					<?php
                      foreach ($users as $user):
                    ?>
						<td>

		
							<!-- <span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span> -->
						    <a href="post&edituser=<?= $user->id() ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Visualiser les articles de l'utilisateur">&#xe7ff;</i></a>
						</td>
                        <td><?= $user->id() ?></td>
                        <td><?= $user->username() ?></td>
						<td><?= $user->usersname() ?></td>
                        <td><?= $user->email() ?></td>
						<td><?= $user->date_inscription()?></td>
						<td><b><?= $user->permission()?></b></td>
						
                        <td>
                            <!--<a href="#editEmployeeModal" data-id="<?= $user->id() ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editer">&#xE254;</i></a>-->
							<a href="#editmodal" class="edit editbtnuser" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editer">&#xE254;</i></a>



                            <!--<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>-->
							 <a href="post&riduser=<?= $user->id() ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Supprimer">&#xE872;</i></a>
						    <!--<a href="#deleteEmployeeModal" data-id="<?= $user->id() ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Supprimer">&#xE872;</i></a>-->
                        
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
	<div id="editmodal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" name="editForm" id="editForm" action="post&updateuser">
					<div class="modal-header">						
						<h4 class="modal-title">Utilisateur </h4><label name="labelid" id="labelid"></label>
						
						<i class="material-icons" data-toggle="tooltip" title="Editer">&#xe7ff;</i></a>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">

					    <input type="hidden"  name="id" id="id" class="form-control" required>


						<div class="form-group">
							<label name= "username" id="username"></label>
						</div>
						<div class="form-group">
							<label name= "useremail" id="useremail"></label>
						</div>

                        <div class="form-group">
						<label name="permission" id="permission">Permission => </label>
							<select name="list-permission" id="list-permission">
							    <option value="user">Utilisateurs 0</option>
								<option value="admin">Administrateurs 2</option>
							</select>

						</div>

						<br>
						<br>

							<p><b> Les administrateurs </b> (permission => 2) peuvent ajouter,modifier, supprimer ou commenter un article.</p>
                            <p><b> Les utilisateurs </b> (permission => 0) peuvent seulement commenter un article.</p>
							<p><b> Le super administrateur </b> (permission => 1) peut ajouter, modifier, supprimer, commenter un article + supprimer ou modifier les comptes utilisateurs.</p>
						
				
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
				<form method="POST" action="post&deleteuser">
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