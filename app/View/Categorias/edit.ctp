<?= $this->Form->create('User', array('class' => 'form-horizontal', 'novalidate')); ?>
<div class="row">
    <div class="col-lg-6">
        <?php
        print $this->Form->hidden('Categoria.id');
        print $this->B3Form->input('Categoria.nome',['type'=>'text','label'=>'Nome']);
        
        ?>
        <?= $this->element("form/submit-b3") ?>
    </div>
</div>



