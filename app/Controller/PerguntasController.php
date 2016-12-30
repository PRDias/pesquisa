<?php

class PerguntasController extends AppController {
    /* ----------------------------------------
     * Atributtes
      ---------------------------------------- */

    public $name = "Perguntas";
    public $setMenu = "Perguntas";
    public $label = 'Perguntas';
    public $submenu = array('index', 'add');
    public $uses = ['Pergunta','Categoria'];
    /* ----------------------------------------
     * Actions
      ---------------------------------------- */

    private function getCategorias() {
        $categorias = $this->Categoria->find('list', ['fields' => ['id', 'nome']]);
        $this->set(compact('categorias'));
    }

    public function index() {
        
        $this->checkAccess($this->name, __FUNCTION__);
        $this->paginate['order'] = ['controller ASC'];
        $this->set("perguntas", $this->paginate("Pergunta"));
    }

    public function view($id = null) {

        $this->checkAccess($this->name, __FUNCTION__);

        $pergunta = $this->Pergunta->find('first', [
            'conditions' => ['Pergunta.id' => $id],
        ]);

        $this->checkResult($pergunta, 'pergunta');
        $this->set("pergunta", $pergunta);
    }

    public function add() {

        $this->checkAccess($this->name, __FUNCTION__);

        if ($this->request->isPost()) {

            $this->Pergunta->create($this->request->data);

            if ($this->Pergunta->validates()) {

                if ($this->Pergunta->save(null, false)) {

                    $this->setMessage('saveSuccess', 'Pergunta');
                    $this->redirect(array('controller' => $this->name, 'action' => 'view', $this->Pergunta->id));
                } else
                    $this->setMessage('saveError', 'Pergunta');
            } else
                $this->setMessage('validateError');
        }
        self::getCategorias();
    }

    public function edit($id = null) {

        $this->checkAccess($this->name, __FUNCTION__);


        if (!$this->request->isPost()) {

            $this->data = $this->Pergunta->findById($id);
        } else {

            $this->Pergunta->create($this->request->data);

            if ($this->Pergunta->validates()) {

                if ($this->Pergunta->save(null, false)) {
                    $this->setMessage('saveSuccess', 'Pergunta');
                    $this->redirect(array('controller' => $this->name, 'action' => 'view', $id));
                } else {
                    $this->setMessage('saveError', 'Pergunta');
                }
            } else
                $this->setMessage('validateError');
        }
        self::getCategorias();
    }

    public function delete($id = null) {

        $this->checkAccess($this->name, __FUNCTION__);


        if ($this->Pergunta->delete($id))
            $this->setMessage('deleteSuccess', 'Pergunta');
        else
            $this->setMessage('deteleError', 'Pergunta');

        $this->redirect(array('controller' => $this->name, 'action' => 'index'));
    }

}
