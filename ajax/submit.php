<?php
require_once "../classes/Database.php";
require_once "../classes/Candidate.php";
require_once "../classes/CandidateManager.php";

use App\Database\Database;
use App\Models\Candidate;
use App\Services\CandidateManager;

$db = Database::getConnection();
$manager = new CandidateManager($db);

$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$gender = $_POST['gender'];

$candidate = new Candidate($name, $email, $age, $gender);

$manager->add($candidate);
echo "success";
