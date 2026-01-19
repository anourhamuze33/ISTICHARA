<?php
require "../app/core/router/router.php";
Router::getRoutes('home', 'index.php');
Router::getRoutes('formulaireAdmin', '../src/Views/FormInscriptionAdmin.php');
Router::getRoutes('listAvocat', '../app/Controller/AvocatController.php');
Router::getRoutes('listHuissier', '../app/Controller/HuissierController.php');
Router::getRoutes('avocat/store', '../app/Controller/AvocatHuissierStore.php');
Router::getRoutes('huissier/store', '../app/Controller/AvocatHuissierStore.php');
Router::getRoutes('avocat/edit', '../app/Controller/AvocatHuissierStore.php');
Router::getRoutes('avocat/filter', '../app/Controller/AvocatFilter.php');
Router::getRoutes('huissier/filter', '../app/Controller/HuissierFilter.php');
Router::dispatch();