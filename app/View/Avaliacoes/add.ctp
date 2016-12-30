<link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
    <script>$("#input-id").rating();

        // with plugin options
        $("#input-id").rating({min:1, max:10, step:2, size:'lg'});</script>
<?= $this->Html->css(['star']) ?>
    <?= $this->Html->script(['star-rating']) ?>
<?= $this->Form->create('Avaliacao', ['class' => 'form-horizontal', 'novalidate']); ?>
<?php global $numeroQuestao; ?>

<div class= 'container' >
    <div class="row">

<div class="row">
    <div class="col-lg-12 text-center">
    </div>
</div>

<?php $current_category =''?>
<div class="row">
    <div class="col-lg-10 col-lg-offset-1  ">

        <div class="panel panel-default borda">
            <div class="panel-body">


                <?php $numeroQuestao = 0; ?>

                <?php foreach ($perguntas as $key => $pergunta): ?>
                    <?php if(empty($current_category)) {
                            $current_category = $pergunta['Categoria']['nome'];
                                print '<h3 class="gerais" style="padding-bottom: 10px ; padding-top: 12px">'.$pergunta['Categoria']['nome'].'</h3>';
                        }else{
                            if($current_category !=$pergunta['Categoria']['nome']){
                                $current_category = $pergunta['Categoria']['nome'];
                                print '<h3 class="gerais" style="padding-bottom: 10px ; padding-top: 12px">'.$pergunta['Categoria']['nome'].'</h3>';
                            }
                        }
                        ?>
                    <?php $numeroQuestao = $numeroQuestao + 1; ?>


                    <div class="row">
                        <div class="col-lg-12 col-lg-offset-1 distancia">
                            <?= $this->Form->hidden('Avaliacao.' . $key . '.pergunta_id', ['value' => $pergunta['Pergunta']['id']]); ?>
                            <div class="fonteQuestoes"><?= $numeroQuestao ?>
                                )<?= $pergunta['Pergunta']['texto']; ?></div><span class="badge " ></span>

                            <br>
                        </div>
                    </div>

                    <div class="row ">
                        <div class=" col-lg-12 col-xs-12 col-lg-offset-1" >

                            <?php $options = array('10' => '', '8' => '', '6' => '', '4' => '', '2' => ''); ?>
                            <?php
                            $attributes = [

                                'div' => 'rating',
                                'label ' => false,
                                'class' => 'full',
                                'type' => 'radio',
                                'options' => $options,
                                'default' => '0',
                                'legend' => false
                            ];
                            ?>

                            <?= $this->Form->input('Avaliacao.' . $key . '.nota', $attributes); ?>


                        </div>

                    </div><br>


                <?php endforeach; ?>

                <hr>
                <div class="row">

                    <div class=" col-lg-4 ">


                        <!-- <?php print $this->element('crud/pagination'); ?> -->


                        <div
                            class="gambiarra"> <?= $b = $this->Paginator->counter(array("format" => "%page% %pages%")); ?></div>
                        <?php
                        $paginas = explode(" ", $b);
                        $paginaAtual = intval($paginas[0]);
                        $paginaFinal = intval($paginas[1]);

                        $progresso = (($paginaAtual / $paginaFinal) * 100);
                        ?>

                    </div>


                </div>
                <div class="row">
                    <div class=" col-lg-3 ">
                        <div class="progress">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
                                 aria-valuemin="0" aria-valuemax="100" style="width:<?= $progresso . '%' ?>">
                                <?= $progresso . '%' ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <?= $this->element('form/submit-b3'); ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>



</div>
</div>

