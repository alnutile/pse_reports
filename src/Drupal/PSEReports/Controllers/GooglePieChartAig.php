<?php
/**
 * Created by PhpStorm.
 * User: andrewcavanagh
 * Date: 12/7/13
 * Time: 11:11 AM
 */

namespace Drupal\PSEReports\Controllers;


class GooglePieChartAig {
  public $results;

  public function __construct($results) {
    composer_manager_register_autoloader();
    $this->results = $results;
  }

  public function strucutureData() {
    $data = array();
    foreach($this->results as $key=>$value) {
      if($value->btype == 'A') {
        $value->btype = 'Academic';
      }elseif ($value->btype == 'I') {
        $value->btype = 'Industrial';
      }elseif ($value->btype == 'G') {
        $value->btype = 'Government';
      }
      $data[] = array($value->btype, intval($value->count));
    }
    return $data;
  }
} 