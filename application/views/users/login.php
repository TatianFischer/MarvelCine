<?= validation_errors();?>
<?= $error_msg= $this->session->flashdata('error_msg') ?>
<?= $success_msg= $this->session->flashdata('success_msg') ?>

<?= form_open('users/login', 'id="login_form"');?>

<fieldset>
	<legend class="txtcenter">Connexion</legend>

	<div class="form-group">
		<label for="login">Email ou pseudo</label>
		<input type="text" name="login" id="login" required>
	</div>

	<div class="form-group">
		<label for="password">Mot de passe</label>
		<input type="password" name="password" id="password" required>
	</div>

	<div class="form-group">
		<input type="submit" name="Connexion">
	</div>
</fieldset>