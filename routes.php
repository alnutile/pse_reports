<?php

use Drupal\PSEReports\Controllers;

function pse_get_alumni_compare_industry() {
    composer_manager_register_autoloader();
    $test = new Drupal\PSEReports\Controllers\AlumniCompareIndustry();
    $output = $test->getReport();
    echo drupal_json_output($output);
    exit();
}