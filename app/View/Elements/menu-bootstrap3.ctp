<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<nav class="navbar navbar-inverse navbar-fixed-top "style="height: auto">
    <div class="container">
        <div class="navbar-header">
            <?php print $this->Html->image('logo_color.png',['width'=>'200']);?>

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>



        </div>

        <div id="navbar" class="collapse navbar-collapse">

            <ul id="menu" class="nav navbar-nav" >
                <?= $this->FrontEnd->getMenu() ?>
               
            </ul>
            <ul id="menu-admin" class="nav navbar-nav pull-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-question-circle"></i>Perguntas<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><?= $this->Html->link('<i class="fa fa-list"></i> Listar', '/perguntas/index', ['escape' => false]) ?></li>
                        <li><?= $this->Html->link('<i class="fa fa-plus"></i> Adicionar', '/perguntas/add', ['escape' => false]) ?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-inbox"></i>Categorias<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><?= $this->Html->link('<i class="fa fa-list"></i> Listar', '/categorias/index', ['escape' => false]) ?></li>
                        <li><?= $this->Html->link('<i class="fa fa-plus"></i> Adicionar', '/categorias/add', ['escape' => false]) ?></li>
                    </ul>
                </li>
                <li>
                    <?= $this->Html->link('<i class="fa fa-book"></i> Relatorios', '/avaliacoes/index', ['escape' => false]) ?>
                </li>
                <li class="dropdown ">

                    <a href="#" class="dropdown-toggle "
                       data-toggle="dropdown"><i class="fa fa-users"></i><?= $this->Session->read("Auth.User.name") ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?= $this->Html->link('<i class="fa fa-sign-out"></i> Sair', '/users/logout', ['escape' => false]) ?></li>
                        <li><?= $this->Html->link('<i class="fa fa-user"></i> Meus dados', '/users/manageAccount', ['escape' => false]) ?></li>
                        <li class="divider"></li>
                        <li class="nav-header">Último Login</li>
                        <?php
                        $date = $this->Session->read("Auth.User.last_login");
                        if ($date) {
                            ?>
                            <li class="logtime"><i
                                    class="fa fa-calendar-o"></i> <?= $this->Time->format("d/m/Y", $date) ?>
                            </li>
                            <li class="logtime"><i class="fa fa-clock-o"></i> <?= $this->Time->format("H:i:s", $date) ?>
                            </li>

                        <?php } else { ?>

                            <li class="logtime">Nunca</li>

                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->

    </div>
</nav>