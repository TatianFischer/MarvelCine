<?= validation_errors(); ?>

<!-- le CSRF token est généré en même temps -->
<?= form_open_multipart('personnages/create'); ?>

<fieldset>
	<legend class="txtcenter">Ajout d'un nouveau personnage</legend>
	<div class="form-group">
		<label for="identity">Identité</label>
		<input type="text" name="identity" value="<?= set_value('identity') ?>" id="identity" required>
	</div>
	
	<div class="form-group">
		<label for="alias">Alias (s'il existe)</label>
		<input type="text" name="alias" id="alias" value="<?= set_value('alias') ?>">
	</div>
	
	<div class="form-group">
		<label for="actor">Acteur</label>
		<input type="text" name="actor" id="actor" value="<?= set_value('actor') ?>" required>
	</div>
	
	<div class="form-group">
		<label for="img">Image</label>
		<input type="text" name="img" id="img" value="<?= set_value('img') ?>" placeholder="Nom du fichier">
	</div>

	<div class="form-group">
		<label for="biography">Bibliographie</label>
		<textarea id="biography" name="biography"><?= set_value('biography'); ?></textarea>
	</div>

	<div class="form-group">
		<label for="groupe">Groupe</label>
		<select name="groupe" id="groupe">
			<?php foreach ($groupes as $name) : ?>
				<option value="<?= $name->groupe ?>" <?= set_select('groupe', $name->groupe) ?> >
					<?= $name->groupe ?>
				</option>
			<?php endforeach ?>
		</select>
	</div>

	<div class="form-group">
		<input type="submit" name="Validation">
	</div>	
</fieldset>