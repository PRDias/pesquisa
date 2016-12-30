<?= $this->element('crud/view-list', [
    'icon_class' => 'fa fa-user',
    'data' => $users,
    'fields' => ['User.name',
        'Profile.name' => ['label' => 'Perfil'], 'User.email',
        'User.last_login' => ['format' => function ($d) {
            return $this->FrontEnd->niceDate($d);
        }]]
]); ?>

<div class="well well-sm" style="background-color:#f1f1f1 ; border:none ;padding-top:10%" ></div>
