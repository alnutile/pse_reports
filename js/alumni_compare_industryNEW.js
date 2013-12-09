/**
 * Created by andrewcavanagh on 12/7/13.
 */
(function ($) {

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    Drupal.pse_reports.drawChart3DPie = function(arrayData) {

        // Create the data table.
        var dataGoogleChart = new google.visualization.DataTable();
        dataGoogleChart.addColumn('string', 'Programs');
        dataGoogleChart.addColumn('number', 'Count');
        dataGoogleChart.addRows(arrayData);

        // Set chart options
        var options = {
            'title':'Pie Chart of Alumni Compare Industry.',
            'width':600,
            'height':500,
            is3D: true
        };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('background_current_students'));
        chart.draw(dataGoogleChart, options);
    };

    Drupal.behaviors.google_chart = {
        attach: function(context) {
            // Set a callback to run when the Google Visualization API is loaded.
        }
    };

    Drupal.behaviors.background_current_students = {
        attach: function (context) {
            // var arrayData;
            var base = Drupal.settings.basePath;
            var url = window.location.host;
            var protocol = window.location.protocol;
            if($('#background_current_students').length){
                // Load the Visualization API and the piechart package.

                function bcsChart() {
                    $.ajax({
                        url:  protocol + '//' + url + base +"pse/get/alumni_compare_industry"
                    }).done(function(bcs_data) {
                            var bcs_arrayData = bcs_data;
                            google.setOnLoadCallback(Drupal.pse_reports.drawChart3DPie);
                            Drupal.pse_reports.drawChart3DPie(bcs_arrayData);
                        });

                }

                bcsChart();
            }
        }
    };


})(jQuery);