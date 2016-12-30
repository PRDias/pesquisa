<?= $this->element('crud/view-list', [
    'icon_class' => 'fa fa-list-alt',
    'data' => $categorias,
    'fields' => ['Categoria.nome']
]); ?>

