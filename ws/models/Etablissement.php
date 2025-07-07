<?php

class Etablissement
{
    private $db;

    public function __construct($connexion)
    {
        $this->db = $connexion;
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM etablissement");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM etablissement WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO etablissement (nom, montant_disponible) VALUES (?, ?)");
        return $stmt->execute([
            $data['nom'],
            $data['montant_disponible']
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare("UPDATE etablissement SET nom = ?, montant_disponible = ? WHERE id = ?");
        return $stmt->execute([
            $data['nom'],
            $data['montant_disponible'],
            $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM etablissement WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function ajoutFond($id, $data)
    {
        $stmt = $pdo->prepare("CALL ajoutFond(:id, :amount)");

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':amount', $data['amount'], PDO::PARAM_STR); 

        return $stmt->execute();
    }
}
