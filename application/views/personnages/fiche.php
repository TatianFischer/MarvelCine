<h1>My name is <?= $personnage->identity; ?></h1>

<p>
	<?= $personnage->biography; ?>
</p>

<p>Liste des films</p>

<ul>
<?php foreach ($films as $film) : ?>
	<li><?= $film->title; ?></li>
<?php endforeach; ?>
</ul>

<p id="btn-ajout">
	<a href="<?= base_url("personnages/create/") ?>" title="Ajout d'un personnage">
		<i class="fa fa-plus-circle" aria-hidden="true"></i>
	</a>
</p>