<?php


function theme_industry_employment_pse_alums($variables){

  $build['container'] = array('#markup' => '
  <div class="table_chart_wrap">
     <div id="industry_employment_pse_alums" style="float:left"></div>
     <div id="industry_employment_pse_alums_table" style="float:right; padding-top:70px"></div>
  </div>

  ');

  return render($build);


}