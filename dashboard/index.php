<?php
require_once __DIR__ . '/../Controllers/DashboardController.php';

$dashboardController = new DashboardController();

if (isset($_POST['submit'])) {
    $dashboardController->store($_POST);
}

$dashboardController->index();
