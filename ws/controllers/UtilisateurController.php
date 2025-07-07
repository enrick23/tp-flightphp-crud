<?php
require_once __DIR__ . '/../models/Etudiant.php';
require_once __DIR__ . '/../helpers/Utils.php';
require_once __DIR__ . '/../db.php';


class UtilisateurController {
    private static $client = new Client(getDB());
    public static function getAll() {
        $resultat = $client::getAll();
        Flight::json($resultat);
    }

    public static function getById($id) {
        $resultat = $client::getById($id);
        Flight::json($resultat);
    }

    public static function create() {
        $data = Flight::request()->data;
        $id = $client::create($data);
        $dateFormatted = Utils::formatDate('2025-01-01');
        Flight::json(['message' => 'Client ajouté', 'id' => $id]);
    }

    public static function update($id) {
        $data = Flight::request()->data;
        $client::update($id, $data);
        Flight::json(['message' => 'Client modifié']);
    }

    public static function delete($id) {
        $client::delete($id);
        Flight::json(['message' => 'Client supprimé']);
    }
}
