<?php
/**
 * Created by PhpStorm.
 * User: andrewcavanagh
 * Date: 12/7/13
 * Time: 11:11 AM
 */

namespace Drupal\PSEReports\Controllers;


class GooglePieChart {
  public $results;

  public function __construct($results) {
    composer_manager_register_autoloader();
    $this->results = $results;
  }

  public function strucutureData() {
    $data = array();
    foreach($this->results as $key=>$value) {
      $data[] = array($value->program, intval($value->cnt));
    }
    return $data;
  }
} 