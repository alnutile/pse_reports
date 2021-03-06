(function ($) {
    Drupal.pse_reports = {};

    Drupal.pse_reports.pie_chart = function(id, data, options) {
        var ctx = document.getElementById(id).getContext("2d");
        var options = [
            {
                //Boolean - Whether we should show a stroke on each segment
                segmentShowStroke : true,
                //String - The colour of each segment stroke
                segmentStrokeColor : "#fff",
                //Number - The width of each segment stroke
                segmentStrokeWidth : 2,
                //Boolean - Whether we should animate the chart
                animation : true,
                //Number - Amount of animation steps
                animationSteps : 100,
                //String - Animation easing effect
                animationEasing : "easeOutBounce",
                //Boolean - Whether we animate the rotation of the Pie
                animateRotate : true,
                //Boolean - Whether we animate scaling the Pie from the centre
                animateScale : false,
                //Function - Will fire on animation completion.
                onAnimationComplete : null
            }
        ];
        new Chart(ctx).Pie(data,options);
    }


})(jQuery);