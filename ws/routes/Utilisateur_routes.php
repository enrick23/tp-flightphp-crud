<?php
require_once __DIR__ . '/../controllers/UtilisateurController.php';

Flight::route('GET /client', ['UtilisateurController', 'getAll']);
Flight::route('GET /client/@id', ['UtilisateurController', 'getById']);
Flight::route('POST /client', ['UtilisateurController', 'create']);
Flight::route('PUT /client/@id', ['UtilisateurController', 'update']);
Flight::route('DELETE /client/@id', ['UtilisateurController', 'delete']);
