<?php
/*
Plugin Name: Unbounce Assignment
Description: Unbounce Assignment for WordPress Plugin
Version: 1.0
Author: Zee Caniago
*/
require_once __DIR__ . '/Controllers/DashboardController.php';

/**
 * unbounceDashboard
 */
function zc_unbounceDashboard() {
    $dashboardController = new DashboardController();

    if (isset($_POST['submit'])) {
        $dashboardController->store($_POST);
    }

    $dashboardController->index();
}

/**
 * unbounceDashboardShortcode
 *
 * @return string
 */
function zc_unbounceDashboardShortcode() {
    ob_start();
    zc_unbounceDashboard();
    return ob_get_clean();
}

add_shortcode('unbounce_dashboard', 'zc_unbounceDashboardShortcode');
