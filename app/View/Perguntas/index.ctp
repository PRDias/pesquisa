<div class="panel panel-default">
    <div class="panel-body">
        <?= $this->element('crud/view-list', [
            'icon_class' => 'fa fa-list-alt',
            'data' => $perguntas,
            'fields' => ['Pergunta.texto']
        ]); ?>
    </div>
</div>



