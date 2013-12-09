<?php


function pse_admin() {

 $pie = theme('pse_reports_three_d_pie_chart_aig', array());

 $build['intro'] = array(
   '#markup' => t('You can use the below tokens in a node. If the node is set to FULL HTML that token will turn into a graph. Make sure to use the brackets [] and the capital letters.<br>')
 );

 $build['title'] = array(
   '#markup' => t('<br>Pie Chart of Alumni Compare Industry. The token for this is [ALUMNI_COMPARE_INDUSTRY]')
 );

 $build['chart'] = array(
   '#markup' => $pie
 );



  $build['title_bcs_3d'] = array(
    '#markup' => t('<br>Pie Chart of Background Current Students. The token for this is [BACKGROUND_CURRENT_STUDENTS_3D_PIE]')
  );

  $pie = theme('pse_reports_three_d_pie_chart', array());

  $build['chart_bcs_3d'] = array(
    '#markup' => $pie
  );

  return $build;
}