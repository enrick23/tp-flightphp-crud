<?php
require_once __DIR__ . '/../models/Etablissement.php';
require_once __DIR__ . '/../helpers/Utils.php';
require_once __DIR__ . '/../db.php';


class EFController {
    private static $etablissement = new Etablissement(getDB());
    public static function getAll() {
        $resultat = $etablissement::getAll();
        Flight::json($resultat);
    }

    public static function getById($id) {
        $resultat = $etablissement::getById($id);
        Flight::json($resultat);
    }

    public static function create() {
        $data = Flight::request()->data;
        $id = $etablissement::create($data);
        $dateFormatted = Utils::formatDate('2025-01-01');
        Flight::json(['message' => 'Etablissement ajouté', 'id' => $id]);
    }

    public static function update($id) {
        $data = Flight::request()->data;
        $etablissement::update($id, $data);
        Flight::json(['message' => 'Etablissement modifié']);
    }

    public static function delete($id) {
        $etablissement::delete($id);
        Flight::json(['message' => 'Etablissement supprimé']);
    }

     public static function ajoutFond($id) {
       $data = Flight::request()->data;
        $etablissement::ajoutFond($id, $data);
        Flight::json(['message' => 'Etablissement modifié']);
    }
}
