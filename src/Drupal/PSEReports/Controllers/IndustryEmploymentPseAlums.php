<?php

namespace Drupal\PSEReports\Controllers;
use Drupal\PSEReports\Controllers;

class IndustryEmploymentPseAlums extends Reports {

  public function __construct() {
    composer_manager_register_autoloader();
  }

  public function getReport() {
    $rows = array();
    $groups = array();
    $data = array();
    $string = 'program';
    db_set_active('pse2');
    $query = db_select('VIEW_Employment', 'e');
    $query->fields('e', array('cnt'));
    $query->addExpression('employment', 'program');
    $query->condition('e.employment', '', '!=');
    $query->groupBy('employment');
    $results = $query->execute();
    db_set_active();

    $data = new GooglePieChart($results);



    //dpm($data->strucutureData());
    return $data->strucutureData();

  }


}