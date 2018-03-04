<?= validation_errors(); ?>
<?= $error_msg= $this->session->flashdata('error_msg') ?>

<?= form_open('users/register', 'id="registration"');?>
<!-- le CSRF token est généré en même temps -->

<fieldset>
	<legend class="txtcenter">Inscription</legend>

	<div class="form-group">
		<label for="lastname">Nom</label>
		<input type="text" name="lastname" id="lastname" value="<?= set_value('lastname')?>" required>
	</div>

	<div class="form-group">
		<label for="firstname">Prénom</label>
		<input type="text" name="firstname" id="firstname" value="<?= set_value('firstname')?>" required>
	</div>

	<div class="form-group">
		<label for="pseudo">Pseudo</label>
		<input type="text" name="pseudo" id="pseudo" value="<?= set_value('pseudo')?>">
	</div>

	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" name="email" id="email" value="<?= set_value('email')?>" required>
	</div>

	<div class="form-group" id="sexe">
		<p class="like-label">Sexe</p>
		<label for="woman" title="femme">
			<i class="fa fa-venus"></i>
			<input type="radio" name="sexe" id="woman" value="woman" <?= set_radio('sexe', 'woman'); ?>>
		</label>	
		<label for="man" title="homme">
			<i class="fa fa-mars"></i>
			<input type="radio" name="sexe" id="man" value="man" <?= set_radio('sexe', 'man'); ?>>
		</label>	
		<label for="both" title="les deux">
			<i class="fa fa-venus-mars"></i>
			<input type="radio" name="sexe" id="both" value="both" <?= set_radio('sexe', 'both'); ?>>
		</label>	
		<label for="none" title="aucun">
			<i class="fa fa-genderless"></i>
			<input type="radio" name="sexe" id="none" value="none" <?= set_radio('sexe', 'none'); ?>>	
		</label>
	</div>
	
	<div class="form-group">
		<label for="password">Mot de passe</label>
		<input type="password" name="password" id="password" required>
	</div>

	<div class="form-group">
		<label for="confirm_password">Confirmation</label>
		<input type="password" name="confirm_password" id="confirm_password" required>
	</div>
	<div class="form-group">
		<input type="submit" name="Validation">
	</div>
</fieldset>