<link rel="stylesheet" href="/css/login.css" type="text/css">
<?php $title = 'Notre site web'; ?>  <!-- Debut du template -->

<?php ob_start(); ?>
<h1>Page LogIn</h1>
<p>Oh shit</p>
<?php $content = ob_get_clean(); ?> <!-- Fin du template -->

<?php require('template.php'); ?>