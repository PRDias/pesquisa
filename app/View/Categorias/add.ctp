<?= $this->Form->create('User', array('class' => 'form-horizontal', 'novalidate')); ?>
<div class="row">
    <div class="col-lg-6">
        <?php
        print $this->B3Form->input('Categoria.nome', ['type' => 'text','label'=>'Categoria']);
        
        ?>
        <?= $this->element("form/submit-b3") ?>
    </div>
</div>



