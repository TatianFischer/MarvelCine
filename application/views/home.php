<h1 class="txtcenter">Accueil</h1>

<article>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas posuere sollicitudin iaculis. Mauris velit risus, euismod a quam eget, malesuada gravida nulla. Nulla rutrum porta tortor, quis faucibus nunc aliquet nec. Nam dignissim, nibh id aliquet pharetra, mauris sem consectetur dolor, in sagittis tortor metus vel dolor.
    </p>
</article>

<article class="grid-3-small-2 has-gutter-l" id="home_film">
    <div>
        <p>Dernier film</p>
        <figure>
            <legend class="center"><?= $last_film->title ?></legend>
            <a href="<?= base_url("films/fiche/".$last_film->id);?>">
                <?php if(isset($last_film->main_cover)) : ?>
                    <?= img('affiches/'.$last_film->main_cover->img, $last_film->main_cover->alt, 'w100') ?>
                <?php else : ?>
                    <?= img('affiches/gray.jpg', 'w100'); ?>
                <?php endif ?>
            </a>
        </figure>           
    </div>

    <div>
        <p>Prochain film</p>
        <figure>
            <legend class="center"><?= $next_film->title ?></legend>
            <a href="<?= base_url("films/fiche/".$next_film->id); ?>">
                <?php if(isset($next_film->main_cover)) : ?>
                    <?= img('affiches/'.$next_film->main_cover->img, $next_film->main_cover->alt, 'w100') ?>
                <?php else : ?>
                    <?= img('affiches/gray.jpg', 'w100'); ?>
                <?php endif; ?>
            </a>
        </figure>
    </div>

    <div>
        <p>Film au hasard</p>
        <figure>
            <legend class="center"><?= $random_film->title ?></legend>
            <a href="<?= base_url("films/fiche/".$random_film->id); ?>">
                <?php if(isset($random_film->main_cover)) : ?>
                    <?= img('affiches/'.$random_film->main_cover->img, $random_film->main_cover->alt, 'w100') ?>
                <?php else : ?>
                    <?= img('affiches/gray.jpg', 'w100'); ?>
                <?php endif; ?>
            </a>
        </figure>
    </div>
</article>

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