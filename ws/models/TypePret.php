<?php

class TypePret
{
    private $db;

    public function __construct($connexion)
    {
        $this->db = $connexion;
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT tp.*, e.nom AS etablissement FROM type_pret tp JOIN etablissement e ON tp.id_etablissement = e.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM type_pret WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO type_pret (libelle, id_etablissement, taux_interet) VALUES (?, ?, ?)");
        return $stmt->execute([
            $data['libelle'],
            $data['id_etablissement'],
            $data['taux_interet']
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare("UPDATE type_pret SET libelle = ?, id_etablissement = ?, taux_interet = ? WHERE id = ?");
        return $stmt->execute([
            $data['libelle'],
            $data['id_etablissement'],
            $data['taux_interet'],
            $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM type_pret WHERE id = ?");
        return $stmt->execute([$id]);
    }
}