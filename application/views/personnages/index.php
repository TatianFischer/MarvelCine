<?php //debug($personnages) ?>

<ul class="grid-5-small-3 has-gutter-l" id="list_persos">
	<?php foreach ($personnages as $personnage): ?>
		<li class="inbl txtcenter flex-container-v">
			<a class="flex-item-center" href="<?= base_url("personnages/view/".$personnage->id) ?>">
				<?= $personnage->identity; ?><br>
				<?= ($personnage->alias != "") ? "(".$personnage->alias.")" : "" ?>
			</a>
		</li>
	<?php endforeach ?>
</ul>