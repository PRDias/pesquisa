<div class="form-actions">
    <!--<p class="required"><span class="req">*</span> campos de preenchimento obrigat&oacute;rio</p>-->
    <?php
    $options = array(
        'class' => 'btn btn-default cancel',
        'title' => 'clique para cancelar',
        'div' => false,
    );

    if (!empty($cancel))
        $options['alt'] = $this->Html->url($cancel);
    else if (!empty($this->name))
        $cancel = "/" . $this->name . "/";

    //    if (!empty($cancelRedirect))
    //        $options['alt'] = $this->Html->url($cancel[$cancelRedirect]);
    ?>
    <div class="p-button">
        <?= $this->Form->button('Próximo <i class="glyphicon glyphicon-hand-right"></i> ', array('class' => 'btn btn-primary submit', 'div' => false, 'escape' => false)); ?>

       <!-- <?= $this->Html->link('Cancelar', $cancel, $options); ?>-->

    </div>
</div>

<?= $this->Form->end() ?>