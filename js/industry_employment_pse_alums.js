/**
 * Created by andrewcavanagh on 12/7/13.
 */
(function ($) {
   // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    Drupal.pse_reports.drawChart3DPieAlums = function(alums_arrayData) {

        // Create the data table.
        var dataGoogleChart = new google.visualization.DataTable();
        dataGoogleChart.addColumn('string', 'Employment');
        dataGoogleChart.addColumn('number', 'Count');
        dataGoogleChart.addRows(alums_arrayData);


        // Set chart options
        var options = {
            'title':'Industry Employment of PSE Alums',
            'width':600,
            'height':500,

        };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('industry_employment_pse_alums'));
        chart.draw(dataGoogleChart, options);

        var table = new google.visualization.Table(document.getElementById('industry_employment_pse_alums_table'));
        table.draw(dataGoogleChart, options);

        google.visualization.events.addListener(table, 'sort',
            function(event) {
                dataGoogleChart.sort([{column: event.column, desc: !event.ascending}]);
                chart.draw(dataGoogleChart, options);
            });
    };



    Drupal.behaviors.industry_employment_pse_alums = {
        attach: function (context) {
            // var arrayData;
            var base = Drupal.settings.basePath;
            var url = window.location.host;
            var protocol = window.location.protocol;
            if($('#industry_employment_pse_alums').length){
                // Load the Visualization API and the piechart package.

                function alumsChart() {
                    $.ajax({
                        url:  protocol + '//' + url + base +"pse/get/industry_employment_pse_alums"
                    }).done(function(alums_data) {
                            var alums_arrayData = alums_data;
                            google.setOnLoadCallback(Drupal.pse_reports.drawChart3DPieAlums);
                            Drupal.pse_reports.drawChart3DPieAlums(alums_arrayData);
                        });

                }

                alumsChart();
            }
        }
    };


})(jQuery);