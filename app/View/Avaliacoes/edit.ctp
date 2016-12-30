<?= $this->Form->create('User', array('class' => 'form-horizontal', 'novalidate')); ?>
<div class="row">
    <div class="col-lg-6">
        <?php
        print $this->Form->hidden('Avaliacao.id');
        print $this->B3Form->input('Avaliacao.nota',['type'=>'text','label'=>'Nome']);
        
        ?>
        <?= $this->element("form/submit-b3") ?>
    </div>
</div>



