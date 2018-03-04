<?php $user_id = $this->session->userdata('user_id'); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="description" content="<?= $contentDescription ?>">
    <title><?= $titre; ?></title>

    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= img_url('favicon.ico')?>" />

    <!--    Framework CSS : Alsacréation -->
    <link rel="stylesheet" href="<?= css_url('knacss') ?>">
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
    <?php foreach($css as $url) : ?>
        <link rel="stylesheet" href="<?= $url; ?>">
    <?php endforeach ?>

    <!-- HTML 5 Shiv-min script tag with SRI - Polyfill (voir p8 du cahier)-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" integrity="sha256-3Jy/GbSLrg0o9y5Z5n1uw0qxZECH7C6OQpVBgNFYa0g=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container w100" id="wrapper">
        <nav class="w100">
            <label for="menu-mobile" class="menu-mobile fr">
                <span class="sr-only">Menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </label>
            <input type="checkbox" id="menu-mobile" role="button">
            <a href="<?= base_url() ?>" class="menu-home">
                <?= img('logo.jpg', 'Accueil') ?>
            </a>
            <ul class="fl">
                <li class="dropdown">
                    <a href="<?= base_url()."films/" ?>">Liste des films</a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?= base_url()."films/index/1" ?>">Phase 1</a>
                        </li>
                        <li>
                            <a href="<?= base_url()."films/index/2" ?>">Phase 2</a>
                        </li>
                        <li>
                            <a href="<?= base_url()."films/index/3" ?>">Phase 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url('personnages/') ?>">Liste des personnages</a>

                    <!-- <ul class="dropdown-menu">
                        <li>
                            <a href="<?= base_url()."films/index/1" ?>">Phase 1</a>
                        </li>
                    </ul> -->
                </li>
                <li>
                    <a href="<?= base_url('directors/') ?>">Liste des réalisateurs</a>
                </li>
            </ul>
            <ul class="fr">
                <?php if(!$user_id) : ?>
                    <li>
                        <a href="<?=base_url('users/register')?>">Inscription</a>
                    </li>
                    <li>
                        <a href="<?=base_url('users/login')?>">Connexion</a>
                    </li>
                <?php else : ?>
                    <?php $user_pseudo = $this->session->userdata('user_pseudo');
                            $user = (!is_null($user_pseudo)) ? $user_pseudo : $this->session->userdata('user_firstname');
                     ?>
                    <li>
                        <a href="<?=base_url('users/profil/'.$user_id)?>">Bonjour <?= $user ?></a>
                    </li>
                    <li>
                        <a href="<?=base_url('users/logout')?>">Déconnexion</a>
                    </li>
                <?php endif ?>
            </ul>
        </nav>
        
        <main class="mw1140p center">
            <section><?= $output; ?></section>            
        </main>

        <footer>
            <p>2017/<?= date('Y') ?> - <a href="http://www.tatianafischer.fr" target="_blanc">@TatianFischer</a> - Tous droits réservés</p>
            <p>The Flaticons are designed by Freepik from Flaticon</p>
        </footer>
    </div>


    <script rel="script" src="<?= js_url('main') ?>"></script>
    <?php foreach ($js as $url) : ?>
        <script rel="script" src="<?= $url ?>"></script>
    <?php endforeach; ?>
</body>
</html>
