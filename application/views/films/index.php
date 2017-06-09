<h1 class="txtcenter">Liste des films</h1>

<!-- Liens de paginations -->
<?php if(isset($liens)) : ?>
<div class="txtcenter pagination">
    <?= $liens; ?>
</div>
<?php endif ?>

<!-- Vignettes -->
<div class="grid-3-small-2 has-gutter-xl" id="vignettes">
<?php foreach($films as $film) : ?>
    <div class="vignette">
        <a href="<?= base_url("films/fiche/".$film->id) ?>">
            <div class="front">
                <?php if(isset($film->main_cover)) : ?>
                    <?= img('affiches/'.$film->main_cover->img, $film->main_cover->alt, 'center') ?>
                <?php else : ?>
                    <?= img('affiches/gray.jpg'); ?>
                <?php endif ?>
            </div>
            <div class="back">
                <p class="w75 ">
                    <?= $film->title ?> <br>
                    <?= "Phase - ".$film->phase ?><br>
                </p>
            </div>
        </a>               
    </div>

<?php endforeach ?>
</div>


<!-- Liens de paginations -->
<?php if(isset($liens)) : ?>
<div class="txtcenter pagination">
    <?= $liens; ?>
</div>
<?php endif ?>