<?php
require "../app/core/router/router.php";
Router::getRoutes('home', 'index.php');
Router::getRoutes('formulaireAdmin', '../src/Views/FormInscriptionAdmin.php');
Router::getRoutes('listAvocat', '../app/Controller/AvocatController.php');
Router::getRoutes('avocat/store', '../app/Controller/AvocatHuissierStore.php');
Router::dispatch();