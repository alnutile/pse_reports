<?php

namespace Drupal\PSEReports\Controllers;
use Drupal\PSEReports\Controllers;

class AlumniCompareIndustry extends Reports {

    public function __construct() {
        composer_manager_register_autoloader();
    }

    public function getReport() {
        $rows = array();
        $groups = array();
        $data = array();
        db_set_active('pse2');
      $query = db_select('v1_addresses', 'r');
      $query->fields('r', array('btype'));
      $query->condition('r.btype', '', '!=');
      $query->groupBy('btype');
      $query->addExpression('COUNT(r.btype)', 'count');
      $results = $query->execute();
      db_set_active();

      $data = new GooglePieChartAig($results);
      //dpm($data->strucutureData());
      return $data->strucutureData();

    }


}