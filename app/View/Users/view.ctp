<?= $this->element('crud/view-detail', [
    'icon_class' => 'fa fa-user',
    'data' => $user,
    'title' => 'User.name',
    'fields' => ['User.name', 'User.email',
        'Profile.name' => [
            'label' => 'Perfil',
        ],
        "User.last_login" => [
            'format' => function ($d) {
                return $this->FrontEnd->niceDate($d);
            }
        ]],
]); ?>

<div class="well well-sm" style="background-color:#f1f1f1 ; border:none ;padding-top:20%" ></div>
