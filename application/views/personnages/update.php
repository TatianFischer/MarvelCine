<?= validation_errors(); ?>

<!-- le CSRF token est généré en même temps -->
<?= form_open_multipart('personnages/update/'.$personnage->id); ?>

<fieldset>
	<legend class="txtcenter">Modification de <?= ($personnage->alias) ? $personnage->alias : $personnage->identity ; ?></legend>
	<div class="form-group">
		<label for="identity">Identité</label>
		<input type="text" name="identity" value="<?= (set_value('identity'))?set_value('identity'):$personnage->identity ?>" id="identity" required>
	</div>
	
	<div class="form-group">
		<label for="alias">Alias (s'il existe)</label>
		<input type="text" name="alias" id="alias" value="<?= (set_value('alias'))?set_value('alias'):$personnage->alias; ?>">
	</div>
	
	<div class="form-group">
		<label for="actor">Acteur</label>
		<input type="text" name="actor" id="actor" value="<?= (set_value('actor'))?set_value('actor'):$personnage->actor; ?>" required>
	</div>
	
	<div class="form-group">
		<label for="img">Image</label>
		<input type="text" name="img" id="img" value="<?= (set_value('img'))?set_value('img'):$personnage->img; ?>" placeholder="Nom du fichier">
		<?php if($personnage->img) : ?>
			<div class="image">
				<?= img('logo/'.$personnage->img); ?>
			</div>
		<?php endif; ?>
	</div>

	<div class="form-group">
		<label for="biography">Bibliographie</label>
		<textarea id="biography" name="biography"><?= (set_value('biography'))?set_value('biography'):$personnage->biography; ?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="Validation">
	</div>	
</fieldset>