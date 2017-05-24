<h1 class="txtcenter">Liste des films</h1>
<!-- Vignettes -->
<div class="grid-3-small-2 has-gutter-xl" id="vignettes">
<?php foreach($films as $film) : ?>
    <div class="vignette">

        <a href="<?= base_url("films/view/".$film->id) ?>">
            <?php if(isset($film->main_cover)) : ?>
                <?= img('affiches/'.$film->main_cover->img, $film->main_cover->alt, 'center') ?>
            <?php else : ?>
                <?= img('affiches/gray.jpg'); ?>
            <?php endif ?>

            <p class="w75">
                <?= $film->title ?> <br>
                <?= "Phase - ".$film->phase ?>
            </p>
        </a>

    </div>
<?php endforeach ?>
</div>