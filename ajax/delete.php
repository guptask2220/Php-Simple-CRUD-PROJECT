<?php
require_once "../classes/Database.php";
require_once "../classes/CandidateManager.php";

use App\Database\Database;
use App\Services\CandidateManager;

$db = Database::getConnection();
$manager = new CandidateManager($db);

$id = $_POST['id'];
$manager->delete($id);
echo "success";
