<?php //debug($personnages) ?>

<ul class="grid-5-small-3 has-gutter-l" id="list_persos">
	<?php foreach ($personnages as $personnage): ?>
		<li class="inbl txtcenter flex-container-v">
			<?= ($personnage->img) ? img('logo/'.$personnage->img) : '' ?>
			<a class="flex-item-center" href="<?= base_url("personnages/fiche/".$personnage->id) ?>">
				<?= $personnage->identity; ?><br>
				<?= ($personnage->alias != "") ? "(".$personnage->alias.")" : "" ?>
			</a>
		</li>
	<?php endforeach ?>
</ul>

<p id="btn-ajout">
	<a href="<?= base_url("personnages/create/") ?>" title="Ajout d'un personnage">
		<i class="fa fa-plus-circle" aria-hidden="true"></i>
	</a>
</p>