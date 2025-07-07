<?php
require_once __DIR__ . '/../controllers/EFController.php';

Flight::route('GET /etablissement', ['EFController', 'getAll']);
Flight::route('GET /etablissement/@id', ['EFController', 'getById']);
Flight::route('POST /etablissement', ['EFController', 'create']);
Flight::route('PUT /etablissement/@id', ['EFController', 'update']);
Flight::route('DELETE /etablissement/@id', ['EFController', 'delete']);
