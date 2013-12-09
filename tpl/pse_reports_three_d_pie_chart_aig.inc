<?php


function theme_pse_reports_three_d_pie_chart_aig($variables){

  $build['container'] = array('#markup' => '<div id="alumni_compare_industry"></div>');
  //$path = drupal_get_path('module', 'pse_reports');
  //$build['chart']['#attached']['js'][] = array('pse_reports' => , 'type' => 'inline');
  return render($build);


}