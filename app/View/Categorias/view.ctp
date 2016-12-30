<?= $this->element('crud/view-detail', [
    'icon_class' => 'fa fa-list-alt',
    'data' => $categoria,
    'fields' => ['Categoria.nome']
]); ?>