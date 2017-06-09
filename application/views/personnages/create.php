<?= validation_errors(); ?>

<!-- le CSRF token est généré en même temps -->
<?= form_open_multipart('personnages/create'); ?>

<fieldset>
	<legend class="txtcenter">Ajout d'un nouveau personnage</legend>
	<div class="form-group">
		<label>Identité</label>
		<input type="text" name="identity" value="<?= set_value('identity') ?>" required>
	</div>
	
	<div class="form-group">
		<label>Alias (s'il existe)</label>
		<input type="text" name="alias" value="<?= set_value('alias') ?>">
	</div>
	
	<div class="form-group">
		<label>Acteur</label>
		<input type="text" name="actor" value="<?= set_value('actor') ?>" required>
	</div>
	
	<div class="form-group">
		<label>Image</label>
		<input type="file" name="img">
	</div>

	<div class="form-group">
		<label>Bibliographie</label>
		<textarea id="bibliography"><?= set_value('bibliography'); ?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="Validation">
	</div>	
</fieldset>