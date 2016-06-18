$(document).ready(function() {

    getRadarChart = function(skillChart) {
        var data = {
            labels: ["PHP", "jS/jQuery", "C#", "HTML5/CSS3", "Wordress", "SQL", "Git"],
            datasets: [
                {
                    label: "",
                    backgroundColor: "rgba(179,181,198,0.2)",
                    borderColor: "rgba(179,181,198,1)",
                    pointBackgroundColor: "#fff",
                    pointBorderColor: "#FFC107",
                    pointBorderWidth: 6,
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(179,181,198,1)",
                    data: [85, 65, 45, 85, 80, 75, 70]
                }
            ]
        };

        var options = {
            responsive: true,
            responsiveAnimationDuration: 600,
            maintainAspectRatio: true,
            scale: {
                reverse: false,
                ticks: {
                    beginAtZero: true,
                    display: false
                },
            },
            legend : {
                display: false
            },
            tooltips : {
                titleFontSize : 0,
                titleSpacing : 0,
                titleMarginBottom : 0,
                backgroundColor : '#FFC107',
                bodyColor : "#212121",
                callbacks : {
                    label : function(tooltipItem, data) {
                        return data.labels[tooltipItem.index] + ' : ' + tooltipItem.yLabel + '%';
                    }
                }
            },
            // label settings
            ticks: {
                //Boolean - Show a backdrop to the scale label
                showLabelBackdrop: true,

                //String - The colour of the label backdrop
                backdropColor: "rgba(255,255,255,0.75)",

                //Number - The backdrop padding above & below the label in pixels
                backdropPaddingY: 2,

                //Number - The backdrop padding to the side of the label in pixels
                backdropPaddingX: 2
            },

            pointLabels: {
                //Number - Point label font size in pixels
                fontSize: 24,

                //Function - Used to convert point labels
                callback: function(label) {
                    return label;
                }
            }
        };

        return new Chart(skillChart, {
            type: 'radar',
            data: data,
            options: options
        });
    };

    // PAGE Home

    localStorage.removeItem('checkChart');

    /** ScrollFire **/
    var options = [
        {selector: '#parallax2', offset: 50, callback: function() { Materialize.toast("This is our ScrollFire Demo!", 1500 ); }},
        {selector: '#parallax2', offset: 400, callback: function() { Materialize.toast("Please continue scrolling Down !", 1500 ); }},
        {selector: '#parallax2', offset: 1400, callback: function() { Materialize.toast("Please continue scrolling Up !", 1500 ); }}
    ];

    Materialize.scrollFire(options);

    /** Charts **/

    hideRadarChart = function(checkChart) {
        if(localStorage.getItem('checkChart') === 'true') {
            if(checkChart) {
                $('#skills-chart').fadeOut(800, function() {
                    checkChart.destroy();
                    localStorage.setItem("checkChart", 'false');
                });
            }
        }

        return checkChart;
    };

    showRadarChart = function(checkChart) {
        if(localStorage.getItem('checkChart') === null || localStorage.getItem('checkChart') === 'false') {
            checkChart = getRadarChart($('#skills-chart')).render(800);
            $('#skills-chart').fadeIn(800, function() {
                localStorage.setItem("checkChart", 'true');
            });
        }

        return checkChart;
    };

    var checkChart = null,
        scrollValue,
        lastScrollValue = 0,
        fired = false,
        lastScrollTop = 0;

    $(window).scroll(function() {
        var st = $(this).scrollTop();
        scrollValue = Math.floor((st+50)/100)*100;

        if (st > lastScrollTop){

            console.log(scrollValue);

            if(scrollValue != lastScrollValue && fired === false) {
                if(scrollValue >= 400 && scrollValue < 500) {
                    checkChart = showRadarChart(checkChart);
                    fired = true;
                } else if(scrollValue >= 1200 && scrollValue < 1300) {
                    checkChart = hideRadarChart(checkChart);
                    fired = true;
                }
            } else {
                fired = false;
            }

            lastScrollValue = scrollValue;
        } else {
            if(scrollValue != lastScrollValue && fired === false) {
                if(scrollValue >= 400 && scrollValue < 500) {
                    checkChart = hideRadarChart(checkChart);
                    fired = true;
                } else if(scrollValue >= 1200 && scrollValue < 1300) {
                    checkChart = showRadarChart(checkChart);
                    fired = true;
                }
            } else {
                fired = false;
            }

            lastScrollValue = scrollValue;
        }

        lastScrollTop = st;
    });

    // PAGE News
    $('.chip .material-icons').click(function(e) {
        e.preventDefault();
        e.stopPropagation();
    });
});