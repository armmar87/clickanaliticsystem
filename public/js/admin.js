$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    selectSites();

});

function selectSites() {
    $('select#selectSites').on('change', function() {
        let siteId = this.value;
        let data = {siteId: siteId};
        let url = 'update-chart';

        $.post( url, data, function( response ) {
            chartInit(response);
        });
    });
}

function chartInit(chart) {
    $(function () {
        let ctx = document.getElementById("myChart").getContext('2d');
        let myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: chart.labels,
                datasets: [{
                    data: chart.data,
                    label: "Clicks",
                    borderColor: "#3e95cd",
                    fill: false
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Click Analytic Sites'
                }
            }

        });
    });
}
