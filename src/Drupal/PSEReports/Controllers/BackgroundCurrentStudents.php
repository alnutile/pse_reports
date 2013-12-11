<?php

namespace Drupal\PSEReports\Controllers;
use Drupal\PSEReports\Controllers;

class BackgroundCurrentStudents extends Reports {

  public function __construct() {
    composer_manager_register_autoloader();
  }

  public function getReport() {
    $rows = array();
    $groups = array();
    $data = array();
    db_set_active('pse2');
    $query = db_select('VIEW_Drupal_studDegree', 'r');
    $query->fields('r', array('program', 'cnt'));
    $results = $query->execute();
    db_set_active();

    $data = new GooglePieChart($results);

    return $data->strucutureData();
  }

}