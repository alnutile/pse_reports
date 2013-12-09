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
        $query->fields('r', array('id', 'btype', 'bcompany', 'bcity', 'bposition', 'bcountry'));
        $query->condition('r.btype', '', '!=');
        $result = $query->execute();
        db_set_active();
        foreach ($result as $record) {
            $groups[$record->btype][] = (array) $record;
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
            'G' => array('label' => 'Government', 'color' => '#F38630', 'labelFontSize' => '17', 'labelColor' => 'white', 'value' => 0, 'labelFontFamily' => 'Times'),
            'I' => array('label' => 'Industrial', 'color' => '#80A22B', 'labelFontSize' => '17', 'labelColor' => 'white', 'value' => 0, 'labelFontFamily' => 'Times'),
            'A' => array('label' => 'Academic', 'color' => '#69D2E7', 'labelFontSize' => '17', 'labelColor' => 'white', 'value' => 0, 'labelFontFamily' => 'Times'),
        );
    }
}