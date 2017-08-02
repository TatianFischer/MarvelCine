<?php //debug($list_all_persos); ?>
<h1 class="txtcenter"><?= $film->title ?></h1>

<!-- Affiche du film  -->
<div class="grid-3-small-2 has-gutter-l">
    <div class="one-third">
		<div id="conteneurAffiches">
		    <?php if(!isset($covers)) : ?>

				<figure class="affiche" id="mainAffiche">
		    		<?php echo img('affiches/gray.jpg'); ?>
				</figure>

		    <?php else :

		    	foreach($covers as $cover) : ?>

		        <figure class="affiche" id="<?= (isset($cover->affiche)) ? 'mainAffiche' : '' ?>">
		            <?= img('affiches/'.$cover->img, $cover->alt); ?>
		        </figure>

		    	<?php endforeach;

		    endif; ?>
		</div>

	    <div id="covers">
	    	<ul>
	    	<?php for ($i=0; $i < count($covers); $i++) : ?>
	    		<li class="w10 small-tiny-w25 mini">
	    			<?= img('affiches/'.$covers[$i]->img, $covers[$i]->alt, $i) ?></li>
	    	<?php endfor; ?>
	    	</ul>
	    </div>

    </div> <!-- Fin #mainAffiche -->





    <!-- Description -->
    <div class="two-thirds clear">

        <h2>Synopsis</h2>
        <p class="synopsis">
        	<?= nl2br($film->synopsis); ?>
        </p>
	    <div id="informations">
	        <div class="grid-3-small-2 has-gutter-l ">
	        	<div>
	        		<h2>Réalisateur</h2>
	            	<p><?= $director->name ?></p>
	            </div>
	            <div>
	            	<h2>Durée</h2>
	            	<?php if($film->duration != 61) : ?>
	            		<p><?= minutesToHours($film->duration) ?></p>
	            	<?php else : ?>
	            		<p>Durée inconnue</p>
	            	<?php endif; ?>
	        	</div>	            
	            <div>
	            	<h2>Date de sortie</h2>
	            	<p><?= date_fr($film->release_date, 'd-m-Y'); ?></p>
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
	            			echo '<a href="'.base_url('personnages/fiche/'.$hero->id).'">';
	            			echo $string;
	            			echo '</a>';
	            			echo $separator = ($key != $lastKey) ? ", " : ".";
	            		}
	            	?>
	            </p>
				<div>
					<a href="<?= base_url('films/ajout_personnage/'.$film->id) ?>" id="btn-hero">
						<i class="fa fa-plus-circle" aria-hidden="true"></i>
						Nouveau hero
					</a>

					<?= form_error('new_perso');?>

					<?= form_open('films/ajout_personnage/'.$film->id, 'id="form_perso"') ?>
					<select name="new_perso">
						<?php foreach($list_all_persos as $personnage) :?>
							<option value="<?= $personnage->id ?>"><?= $personnage->identity." - ".$personnage->actor ?></option>
						<?php endforeach; ?>
					</select>
					<input type="submit" name="" value="Ajouter">
					<?= form_close() ?>
				</div>	
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
			<i class="fa fa-plus-circle" aria-hidden="true"></i>
				Nouvelle affiche
		</a>
	</div>
	<div>
		<a href="#">
			<i class="fa fa-eye" aria-hidden="true"></i>
			Voir la bande annonce
		</a>
	</div>
</div>


<!-- AJOUT D'UNE AFFICHE -->
<?= ($this->session->flashdata('upload') !== null) ? $this->session->flashdata('upload') : "" ?>
<?= (isset($error)) ? $error : "" ?>

<div id="form_cover">

	<?= form_open_multipart('films/fiche/'.$film->id, 'id="form_affiche"');?>
	<?= form_error('form_affiche'); ?>

	<fieldset>
		<legend>Ajout d'une affiche</legend>

		<input type="hidden" name="film" value="<?= $film->id ?>">

		<div class="form-group">
			<label for="image">Image</label>
			<input type="file" name="img" value="<?= set_value('img') ?>" required>
		</div>

		<div class="form-group">
			<label for="name">Nom de l'image</label>
			<input type="text" name="name" value="<?= set_value('name') ?>" required>
		</div>

		<div class="form-group">
			<label for="alternative">Description</label>
			<textarea name="alt" id='alternative' required><?= set_value('alt') ?></textarea>
		</div>
		
		<!-- <div class="form-control">
			<p class="like-label">Affiche principale ?</p>
			<label>Oui</label>
			<input type="radio" name="affiche" value="true" <?= set_radio('affiche', 'true'); ?>>
			<label>Non</label>
			<input type="radio" name="affiche" value="false" <?= set_radio('affiche', 'false', TRUE); ?>>
		</div> -->

		<input type="submit" name="Ajout">
	</fieldset>
	<?= form_close();?>
</div>



<!-- BANDE ANNONCE -->
<div id="bande_annonce">
    <div id='blogvision'>
        <iframe src="http://www.allocine.fr/_video/iblogvision.aspx?cmedia=<?= $film->trailer ?>">
        </iframe>
    </div>
</div>

<hr>

<div class="row r-m" style="display: none;">
	<div class="col-sm-10 col-sm-offset-1" id="comment_bloc">
	    <?= form_open('#', 'id="form_comment"') ?>
	        <fieldset>
	            <legend>Ajouter un commentaire</legend>

	            <input type="text" value="" name="movie_id" hidden>
	            <input type="text" value="" hidden>

	            <div class="form-group">
                    <label class="control-label" for="content">Votre Commentaire</label>
                    <textarea class="form-control" id="textarea" name="content"></textarea>
	            </div>

	            <div class="form-group">
	                <input type="submit" class="form-control">
	            </div>
	        </fieldset>
	    <?= form_close();?>
	</div>
</div>

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