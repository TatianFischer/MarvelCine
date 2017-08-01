<div id="logo_fond">
	<?= ($personnage->img) ? img('logo/'.$personnage->img) : '' ?>
</div>

<h1>Fiche de <?= $personnage->identity; ?></h1>


<div id="bio">
	<h2>Biographie</h2>
	<p>
		<?= $personnage->biography; ?>
	</p>
</div>



<h2>Liste des films</h2>

<p id="add_film">
	<a href="<?= base_url('personnages/ajout_film/'.$personnage->id) ?>" id="btn-film">
		<i class="fa fa-plus-circle" aria-hidden="true"></i>
		Nouveau film
	</a>

	<?= form_error('new_film');?>

	<?= form_open('personnages/ajout_film/'.$personnage->id, 'id="form_film"') ?>
	<select name="new_film">
		<?php foreach($list_all_films as $film) :?>
			<option value="<?= $film->id ?>"><?= $film->title ?></option>
		<?php endforeach; ?>
	</select>
	<input type="submit" name="" value="Ajouter">
	<?= form_close() ?>
</p>



<ul id="list_films" class="grid-2 has-gutter-l">
	<?php foreach ($films as $film) : ?>
		<a href="<?= base_url('films/fiche/').$film->id ?>">
			<li>
				<?php if(isset($film->main_cover)) : ?>
	                <?= img('affiches/'.$film->main_cover->img, $film->main_cover->alt, 'center') ?>
	            <?php else : ?>
	                <?= img('affiches/gray.jpg'); ?>
	            <?php endif ?>
	            <!-- Titre du film -->
	            <span><?= $film->title; ?></span>
			</li>
        </a>
	<?php endforeach; ?>
</ul>


<p id="btn-ajout">
	<a href="<?= base_url("personnages/create/") ?>" title="Ajout d'un personnage">
		<i class="fa fa-user-plus" aria-hidden="true"></i>
	</a>
</p>