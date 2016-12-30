<?php $id_chart = md5(microtime()) ?>
<div id="<?= $id_chart ?>" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script>

    $(document).ready(function () {
        $(function () {
            $('#<?= $id_chart?>').highcharts({
                title: {
                    text: '<?= $title?>',
                    x: -20 //center
                },
                subtitle: {
                    text: '<?= $subtitle?>',
                    x: -20
                },
                xAxis: {
                    categories: <?= $categories?>
                },
                yAxis: {
                    title: {
                        text: '<?= $yAxis?>'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f} R$</b><br/>'
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                series: <?= $series ?>
            });
        });
    });
</script>