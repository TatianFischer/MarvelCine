<div id="directors" class="grid-2-small-1 has-gutter-l">
<?php foreach ($directors as $director) : ?>
	<div>
		<h4><?= $director->name ?></h4>
		<ul>
		<?php foreach ($director->films as $film) : ?>
			<li>
				<a href="<?= base_url("films/fiche/".$film->id)?>"><?= $film->title." - ".date_fr($film->release_date, 'd-m-Y')." - phase ".$film->phase ?></a>
			</li>
		<?php endforeach; ?>
		</ul>
	</div>
<?php endforeach; ?>
</div>