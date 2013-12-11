/**
 * Created by andrewcavanagh on 12/7/13.
 */
(function ($) {

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    Drupal.pse_reports.drawChart3DPieAig = function(arrayData) {

        // Create the data table.
        var dataGoogleChart = new google.visualization.DataTable();
        dataGoogleChart.addColumn('string', 'Industry');
        dataGoogleChart.addColumn('number', 'Count');
        dataGoogleChart.addRows(arrayData);

        // Set chart options
        var options = {'title':'Pie Chart of Alumni Compare Industry',
            'width':600,
            'height':500,
            is3D: true
        };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('alumni_compare_industry'));
        chart.draw(dataGoogleChart, options);
    };



    Drupal.behaviors.alumni_compare_industry = {
        attach: function (context) {
            // var arrayData;
            var base = Drupal.settings.basePath;
            var url = window.location.host;
            var protocol = window.location.protocol;
            if($('#alumni_compare_industry').length){
                // Load the Visualization API and the piechart package.

                function aigChart() {
                    $.ajax({
                        url:  protocol + '//' + url + base +"pse/get/alumni_compare_industry"
                    }).done(function(aig_data) {
                            var aig_arrayData = aig_data;
                            google.setOnLoadCallback(Drupal.pse_reports.drawChart3DPieAig);
                            Drupal.pse_reports.drawChart3DPieAig(aig_arrayData);
                        });

                }

                aigChart();
            }
        }
    };


})(jQuery);