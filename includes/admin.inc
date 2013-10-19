<?php


function pse_admin() {

    $pie = theme('pse_reports_pie_chart', array());

    $build['intro'] = array(
        '#markup' => t('You can use the below tokens in a node. If the node is set to FULL HTML that token will turn into a graph. Make sure to use the brackets [] and the capital letters.<br>')
    );

    $build['title'] = array(
        '#markup' => t('<br>Pie Chart of Alumni Compare Industry. The token for this is [ALUMNI_COMPARE_INDUSTRY]')
    );

    $build['chart'] = array(
        '#markup' => $pie
    );

    return $build;
}