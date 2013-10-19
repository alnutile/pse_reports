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
        db_set_active('pse');
        $query = db_select('test1', 'r');
        $query->fields('r');
        $query->condition('r.type', '', '!=');
        $result = $query->execute();
        db_set_active();
        foreach ($result as $record) {
            $groups[$record->type][] = (array) $record;
            $rows[] = (array) $record;
        }

        foreach($groups as $key => $value) {
            $keys = self::keys();
            $data = $keys[$key];
            $data['value'] =  count($groups[$key]);
            $data['label'] =  "{$data['label']} = " . count($groups[$key]);
            $counts[] = $data;
        }

        $data['count'] = count($rows);
        $data['data'] = $rows;
        $data['groups'] = $groups;
        $data['group_count'] = $counts;
        return $data;
    }

    public function keys() {
        return array(
            'G' => array('label' => 'Government', 'color' => '#F38630', 'labelFontSize' => '16', 'labelColor' => 'white', 'value' => 0),
            'I' => array('label' => 'Industrial', 'color' => '#E0E4CC', 'labelFontSize' => '16', 'labelColor' => 'white', 'value' => 0),
            'A' => array('label' => 'Academic', 'color' => '#69D2E7', 'labelFontSize' => '16', 'labelColor' => 'white', 'value' => 0),
        );
    }
}