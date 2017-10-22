<h1 class="txtcenter">Liste des films<?php if(isset($phase)){ echo ' : phase '.$phase; } ?></h1>

<!-- Liens de paginations -->
<?php if(isset($liens)) : ?>
<div class="txtcenter pagination">
    <div><?= $liens; ?></div>
    <?php 
        $offset = (isset($offset)) ? $offset : 0;
        function order_link($current_order, $value, $libelle, $offset)
        {
            $class_li = ($current_order == $value) ? 'current' : '';
            $link = '<li class="'.$class_li.'">';
            $link .= ($current_order == $value) ? '<b>' : '<a href="'.base_url('films/number/'.$value.'/'.$offset).'">';
            $link .= $libelle;
            $link .= ($current_order == $value) ? '</b>' : '</a>';
            $link .= '</li>';

            echo $link;
        }
    ?>
    <ul>
        <li>Trier</li>
        <?php order_link($order, 'release_date', 'Date de sortie', $offset); ?>
        <?php order_link($order, 'title', 'Titre', $offset); ?>
        <?php order_link($order, 'duration', 'Durée', $offset); ?>
    </ul>
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
                <p class="w75">
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
