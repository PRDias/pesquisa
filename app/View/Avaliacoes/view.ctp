<?=

$this->element('crud/view-detail', [
    'icon_class' => 'fa fa-list-alt',
    'data' => $avaliacao,
    'model_name' => 'Avaliacao',
    'fields' => ['Avaliacao.nota']
]);
?>