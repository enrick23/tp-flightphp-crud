<?php
require_once __DIR__ . '/../controllers/PretController.php';

Flight::route('GET /typepret', ['PretController', 'getAll']);
Flight::route('GET /typepret/@id', ['PretController', 'getById']);
Flight::route('POST /typepret', ['PretController', 'create']);
Flight::route('PUT /typepret/@id', ['PretController', 'update']);
Flight::route('DELETE /typepret/@id', ['PretController', 'delete']);
