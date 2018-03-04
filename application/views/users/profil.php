<?php
$user_id = $this->session->userdata('user_id');
if(!$user_id){redirect('users/login','refresh');}
?>
<?= $success_msg= $this->session->flashdata('success_msg') ?>

<div>
	<h1>Mes informations</h1>
	<?php debug($user) ?>	
</div>

<div>
	<h1>Mes commentaires</h1>
</div>