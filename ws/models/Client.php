<?php

class Client
{
    private $db;

    public function __construct($connexion)
    {
        $this->db = $connexion;
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM client");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM client WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO client (nom, prenom, email, telephone) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $data['nom'],
            $data['prenom'],
            $data['email'],
            $data['telephone']
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare("UPDATE client SET nom = ?, prenom = ?, email = ?, telephone = ? WHERE id = ?");
        return $stmt->execute([
            $data['nom'],
            $data['prenom'],
            $data['email'],
            $data['telephone'],
            $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM client WHERE id = ?");
        return $stmt->execute([$id]);
    }
}