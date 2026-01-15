<?php
require "../app/core/router/router.php";
Router::getRoutes('home', 'index.php');
Router::getRoutes('formulaireAdmin', '../src/Views/FormInscriptionAdmin.php');
Router::getRoutes('formulaire', '../src/Views/FormAvocatHuissier.php');
Router::getRoutes('avocat', '../app/Controller/AvocatController.php');
// Router::getRoutes()
Router::dispatch();