<?= validation_errors(); ?>

<?= form_open('films/create');?>
<!-- le CSRF token est généré en même temps -->

<fieldset>
	<legend class="txtcenter">Ajout d'un nouveau film</legend>

	<div class="form-group">
		<label for="title">Titre</label>
		<input type="text" name="title" id="title" value="<?= set_value('title') ?>" required>
	</div>

	<div class="form-group">
		<label for="release_date">Date de sortie</label>
		<input type="date" name="release_date" id="release_date" value="<?= set_value('release_date') ?>" required>
	</div>

	<div class="form-group">
		<label for="synopsis">Résumé</label>
		<textarea id="synopsis" name="synopsis"><?= set_value('synopsis') ?></textarea>
	</div>

	<div class="form-group">
		<label for="duration">Durée (min)</label>
		<input type="number" min="0" name="duration" id="duration" value="<?= set_value('duration') ?>" required>
	</div>

	<div class="form-group">
		<label for="phase">Phase</label>
		<input type="number" min="0" max="10" name="phase" id="phase" value="<?= set_value('phase') ?>" required>
	</div>

	<div class="form-group">
		<label for="director">Réalisateur</label>
		<select name="director" id="director">
			<?php foreach ($directors as $director) : ?>
				<option value="<?= $director->id ?>" <?= set_select('director', $director->id) ?>>
					<?= $director->id." - ".$director->firstname." ".$director->lastname; ?>
				</option>
			<?php endforeach; ?>
			<option value="<?= 'other' ?>" <?= set_select('director', 'other') ?>>
				Un autre réalisateur
			</option>
		</select>

		
		<!-- <input type="radio" name="other_director" id="other_director">
		<p class="like-input">Pour ajouter un nouveau réalisateur</p> -->

		<input type="text" name="new_director" value="<?= set_value('new_director') ?>">
	</div>

	<div class="form-group">
		<label for="trailer">Trailer</label>
		<input type="text" name="trailer" id="trailer" value="<?= set_value('trailer') ?>">
	</div>

	<div class="form-group">
		<input type="submit" name="Validation">
	</div>
</fieldset>