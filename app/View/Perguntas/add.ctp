<?= $this->Form->create('User', array('class' => 'form-horizontal', 'novalidate')); ?>
<div class="row">
    <div class="panel panel-default borda">
        <div class="panel-body ">
            <div class="col-lg-6 col-lg-offset-3">


                <?php
                print $this->B3Form->input('Pergunta.categoria_id', ['label' => 'Categoria', 'options' => $categorias]);
                print $this->B3Form->input('Pergunta.texto', ['type' => 'text', 'label' => 'Pergunta']);
                ?>
                <?= $this->element("form/submit-b3") ?>
            </div>
        </div>
    </div>

</div>



