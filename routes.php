<?php

use Drupal\PSEReports\Controllers;

function pse_get_alumni_compare_industry() {
    composer_manager_register_autoloader();
    $test = new Drupal\PSEReports\Controllers\AlumniCompareIndustry();
    $output = $test->getReport();
    echo drupal_json_output($output);
    exit();
}

function pse_reports_background_current_students() {
  composer_manager_register_autoloader();
  $test = new Drupal\PSEReports\Controllers\BackgroundCurrentStudents();
  $output = $test->getReport();
  echo drupal_json_output($output);
  exit();
}