<?php
namespace App\Services;

use App\Models\Candidate;
use PDO;

class CandidateManager {
    private $conn;

    public function __construct(PDO $dbConnection) {
        $this->conn = $dbConnection;
    }

    public function add(Candidate $candidate) {
        $stmt = $this->conn->prepare("INSERT INTO users (name,email,age,gender) VALUES (?,?,?,?)");
        return $stmt->execute([$candidate->name, $candidate->email, $candidate->age, $candidate->gender]);
    }

    public function update($id, Candidate $candidate) {
        $stmt = $this->conn->prepare("UPDATE users SET name=?, email=?, age=?, gender=? WHERE id=?");
        return $stmt->execute([$candidate->name, $candidate->email, $candidate->age, $candidate->gender, $id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id=?");
        return $stmt->execute([$id]);
    }

    public function getAll() {
        $stmt = $this->conn->query("SELECT * FROM users ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
