<?php


function theme_pse_reports_three_d_pie_chart($variables){

    $build['container'] = array('#markup' => '<div id="background_current_students"></div>');
    //$path = drupal_get_path('module', 'pse_reports');
    //$build['chart']['#attached']['js'][] = array('pse_reports' => , 'type' => 'inline');
    return render($build);


}