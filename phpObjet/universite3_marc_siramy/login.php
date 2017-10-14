<?php
if (!isset($_SESSION)) {
	session_start();
}
spl_autoload_register(function ($class) {
		include $class.'.php';
	});
// message par défaut si erreur de redirection
include 'entete_login.php';
?>
<form id="loginform" class="well center-block col-md-4 block_centered_vertically test-form has-validation-callback"  style="float:none;"
		action="" method="post">
	 <fieldset>
		<div id="box-enseignant" class="form-group col-xs-11">
			<label class="control-label row" for="enseignant">Nom</label>
			<div class="inputGroupContainer row">
					<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<select id="enseignant" name="enseignant" class="selectpicker form-control" title=" Enseignant" required="true">
						<option value="-1" selected="selected"></option>
<?php foreach ($tabEnseignants as $enseignant) {?>
																			<option value="<?php echo $enseignant->nom()?>"><?php echo $enseignant->nom()." ".$enseignant->prenom();?></option>
	<?php }?>
</select>
		          </div>
		         </div>
          	<div class="clear"></div>
		</div>
		<div class="form-group col-xs-11">
			<label class="control-label row" for="motDePasse">Mot de passe</label>
			<div class="inputGroupContainer control row">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					<input id="motDePasse" name="motDePasse" type="password" class="form-control"
						placeholder="Entrez votre mot de passe"  required />
				</div>
			</div>
		</div>
		<div class="form-group col-xs-11">
<?php if (!empty($erreur_message)) {?>
				<div class="alert alert-danger">
					<strong><?php echo ($erreur_message);?></strong>
				</div>
	<?php }?>
</div>
		<div>
			<button id="valider" name="valider" type="submit"
				class="btn btn-primary">Valider
				<span class="glyphicon glyphicon-send"></span>
			</button>
		</div>
	</fieldset>
</form>


<?php
include 'pieddepage.php';
?>