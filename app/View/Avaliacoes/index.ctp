<?= $this->Html->css(['star']); ?>


<div class="container">

    <div class="row">
        <div class="col-lg-6">

            <legend class="fonteMenu tamanho">Notas</legend>
            <?php foreach ($medias as $key=> $media) : ?>

                <div class="row ">
                    <div class="col-lg-12">
                        <div class="panel panel-default ">
                            <div class="panel-body borda">

                                <div class="texto "><?= $media['AvaliacaoMedia']['texto'] ?></div>


                                <?= $this->element('star',['max_star' => 5,'index'=>$key, 'value' =>$media['AvaliacaoMedia']['media'], 'point' => 2]); ?><br>

                               <span class="badge badge-info"> Nota <?= str_replace(".",",",sprintf("%.1f",$media['AvaliacaoMedia']['media'])) ;?></span>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>

        <div class="col-lg-6">
            <legend class="fonteMenu tamanho">Gráficos</legend>
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>

            <div id="container" class="borda" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

        </div>
    </div>

</div>

<script>
    $(function () {
        $('#container').highcharts({
            chart: {
                type: 'line'
            },
            title: {
                text: 'Média de avaliações '
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [ 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro']
            },
            yAxis: {
                title: {
                    text: 'Quantidade de avaliações'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                name: 'Peguntas Respondidas',
                data: [
                    <?php
                    foreach ($numero AS $key => $numeros) {

                        print  $numeros['numeroAvaliacoes']['total'] .",";

                    }
                    ?>
                ]
            }]
        });
    });

</script>

