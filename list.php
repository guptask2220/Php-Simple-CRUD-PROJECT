<?php
require_once "classes/Database.php";
require_once "classes/CandidateManager.php";

use App\Database\Database;
use App\Services\CandidateManager;

$db = Database::getConnection();
$manager = new CandidateManager($db);
$users = $manager->getAll();

foreach ($users as $user) {
    echo "<tr>
        <td>{$user['name']}</td>
        <td>{$user['email']}</td>
        <td>{$user['age']}</td>
        <td>{$user['gender']}</td>
        <td>
            <a href='#' class='action-btn editBtn' 
                data-id='{$user['id']}'
                data-name='{$user['name']}'
                data-email='{$user['email']}'
                data-age='{$user['age']}'
                data-gender='{$user['gender']}'>Edit</a> |
            <a href='#' class='action-btn deleteBtn' data-id='{$user['id']}'>Delete</a>
        </td>
    </tr>";
}
