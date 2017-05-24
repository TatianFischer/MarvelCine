<?php //debug($covers); ?>
<h1 class="txtcenter"><?= $film->title ?></h1>

<!-- Affiche du film  -->
<div class="grid-3-small-1 has-gutter-l">
    <div class="one-third">
        <figure class="affiche">
        <?php if(isset($covers[0])) :
            echo img('affiches/'.$covers[0]->img, $covers[0]->alt);
        else :
        	echo img('affiches/gray.jpg');
        endif; ?>
        </figure>
    </div>

    <!-- Description -->
    <div class="two-thirds">
	    <div id="covers">
	    	<h2>Affiches</h2>
	    	<ul>
	    	<?php foreach ($covers as $cover) : ?>
	    		<li class="inbl w10 small-tiny-w25 mini"><?= img('affiches/'.$cover->img, $cover->alt, "w100") ?></li>
	    	<?php endforeach; ?>
	    	</ul>
	    </div>

        <h2>Synopsis</h2>
        <p>
        	<?= $film->synopsis ?>
        </p>
	    <div class="informations">
	        <div class="grid-3 has-gutter-l ">
	        	<div>
	        		<h2>Réalisateur</h2>
	            	<p><?= $director->lastname.", ".$director->firstname ?></p>
	            </div>
	            <div>
	            	<h2>Date de sortie</h2>
	            	<p><?= date_fr($film->relase_date, 'd-m-Y'); ?></p>
	            </div>
	            <div>
	            	<h2>Durée</h2>
	            	<p><?= minutesToHours($film->duration) ?> min</p>
	        	</div>	            
	        </div>
	        <div class="">
	            <h2>Heros</h2>
	            <p>
	            	<?php
	            		$array = array_keys($personnages);
	            		$lastKey = array_pop($array);
	            		foreach ($personnages as $key => $hero) {
	            			$string = $hero->identity;
	            			$string .= ($hero->alias) ? " (".$hero->alias.")" : "";
	            			$string .= ($key != $lastKey) ? ", " : ".";
	            			echo $string;
	            		}
	            	?>
	            </p>
	        </div>
	    </div>

    </div>
</div>

<hr>

<div id="menuBA">
	<div>
		<a href="<?= base_url('films/index') ?>">
			<i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i>
			Vers la liste des films
		</a>
	</div>
	<div>
		<a href="#">
			<i class="fa fa-eye" aria-hidden="true"></i>
			Voir la bande annonce
		</a>
	</div>
</div>

<div id="bande_annonce">
    <div id='blogvision'>
        <iframe src="http://www.allocine.fr/_video/iblogvision.aspx?cmedia=<?= $film->trailer ?>">
        </iframe>
    </div>
</div>

<hr>

<div class="row r-m" style="display: none;">
	<div class="col-sm-10 col-sm-offset-1" id="comment_bloc">
	    <form class="form-horizontal" action="" method="post" id="comment">
	        <fieldset>
	            <legend>Ajouter un commentaire</legend>

	            <input type="text" value="" name="movie_id" hidden>
	            <input type="text" value="" hidden>

	            <div class="form-group">
	                <div class="col-sm-10 col-sm-offset-1 col-xs-12">
	                    <textarea class="form-control" id="textarea" name="content"></textarea>
	                    <label class="control-label" for="content">Votre Commentaire</label>
	                </div>
	            </div>

	            <div class="form-group">
	                <div class="col-xs-6 col-xs-offset-3">
	                    <input type="submit" class="form-control">
	                </div>
	            </div>
	        </fieldset>
	    </form>
	</div>
</div>