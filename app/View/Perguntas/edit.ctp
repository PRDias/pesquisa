<?= $this->Form->create('User', array('class' => 'form-horizontal', 'novalidate')); ?>
<div class="row">
    <div class="panel panel-default borda">
        <div class="panel-body ">
            <div class="col-lg-6 col-lg-offset-3">

                <?php
                print $this->Form->hidden('Pergunta.id');
                print $this->B3Form->input('Pergunta.texto', ['type' => 'text', 'label' => 'Texto']);
                ?>
             <?= $this->element("form/submit-b3") ?>
            </div>
            
        </div>
       
    </div>
</div>



