<?php
require_once __DIR__ . '/../models/TypePret.php';
require_once __DIR__ . '/../helpers/Utils.php';
require_once __DIR__ . '/../db.php';



class PretController {
    private static $typepret = new TypePret(getDB());
    public static function getAll() {
        $resultat = $typepret::getAll();
        Flight::json($resultat);
    }

    public static function getById($id) {
        $resultat = $typepret::getById($id);
        Flight::json($resultat);
    }

    public static function create() {
        $data = Flight::request()->data;
        $id = $typepret::create($data);
        $dateFormatted = Utils::formatDate('2025-01-01');
        Flight::json(['message' => 'Type de pret ajouté', 'id' => $id]);
    }

    public static function update($id) {
        $data = Flight::request()->data;
        $typepret::update($id, $data);
        Flight::json(['message' => 'Type de pret modifié']);
    }

    public static function delete($id) {
        $typepret::delete($id);
        Flight::json(['message' => 'Type de pret supprimé']);
    }
}
