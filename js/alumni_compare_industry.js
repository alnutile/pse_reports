(function ($) {

    Drupal.behaviors.alumni_compare_industry = {
        attach: function (context) {
            var arrayData;
            var base = Drupal.settings.basePath;
            var url = window.location.host;
            var protocol = window.location.protocol;
            function drawChart() {
                $.ajax({
                    url:  protocol + '//' + url + '/' + base +"pse/get/alumni_compare_industry"
                }).done(function(data) {
                        arrayData = data;
                        $('div.aci-total').append("Total Records " + data['count'] );
                        Drupal.pse_reports.pie_chart('aci_report',arrayData['group_count']);
                });

            }
            drawChart();
        }
 };

})(jQuery);