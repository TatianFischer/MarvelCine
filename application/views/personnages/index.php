<?php //debug($personnages) ?>

<ul class="grid-5-small-3 has-gutter-l" id="list_persos">
	<?php foreach ($personnages as $personnage): ?>
		<li class="inbl txtcenter flex-container-v">
			<a class="flex-item-center" href="<?= base_url("personnages/fiche/".$personnage->id) ?>">
				<?= $personnage->identity; ?><br>
				<?= ($personnage->alias != "") ? "(".$personnage->alias.")" : "" ?>
			</a>
		</li>
	<?php endforeach ?>
</ul>

<div id="btn-ajout">
    <p>
        <a href="<?= base_url("personnages/create/") ?>" title="Ajout d'un personnage">
            <i class="fa fa-user-plus" aria-hidden="true"></i>
        </a>
    </p>
    <p>
        <a href="<?= base_url("films/create/") ?>" title="Ajout d'un film">
            <i class="fa fa-film" aria-hidden="true"></i>
        </a>
    </p>
</div>