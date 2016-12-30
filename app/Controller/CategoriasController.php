<?php

class CategoriasController extends AppController
{

    /*----------------------------------------
     * Atributtes
     ----------------------------------------*/

    public $name = "Categorias";

    public $setMenu = "Categorias";

    public $label = 'Categorias';
   
    public $uses = ['Categoria','Pergunta'];

    public $submenu = array('index', 'add');

    /*----------------------------------------
     * Actions
     ----------------------------------------*/

    public function index()
    {

        $this->checkAccess($this->name, __FUNCTION__);
        $this->paginate['order'] = ['controller ASC'];
        $this->set("categorias", $this->paginate("Categoria"));
    }

    public function view($id = null)
    {

        $this->checkAccess($this->name, __FUNCTION__);

        $categoria = $this->Categoria->find('first', [
            'conditions' => ['Categoria.id' => $id],
        ]);

        $this->checkResult($categoria, 'categoria');
        $this->set("categoria", $categoria);
    }

    public function add()
    {

        $this->checkAccess($this->name, __FUNCTION__);

        if ($this->request->isPost()) {

            $this->Categoria->create($this->request->data);

            if ($this->Categoria->validates()) {

                if ($this->Categoria->save(null, false)) {

                    $this->setMessage('saveSuccess', 'Categoria');
                    $this->redirect(array('controller' => $this->name, 'action' => 'view', $this->Categoria->id));

                } else
                    $this->setMessage('saveError', 'Categoria');

            } else
                $this->setMessage('validateError');
        }
    }

    public function edit($id = null)
    {

        $this->checkAccess($this->name, __FUNCTION__);


        if (!$this->request->isPost()) {

            $this->data = $this->Categoria->findById($id);

        } else {

            $this->Categoria->create($this->request->data);

            if ($this->Categoria->validates()) {

                if ($this->Categoria->save(null, false)) {
                    $this->setMessage('saveSuccess', 'Categoria');
                    $this->redirect(array('controller' => $this->name, 'action' => 'view', $id));
                } else {
                    $this->setMessage('saveError', 'Categoria');
                }
            } else
                $this->setMessage('validateError');
        }
    }

    public function delete($id = null)
    {

        $this->checkAccess($this->name, __FUNCTION__);


        if ($this->Categoria->delete($id))
            $this->setMessage('deleteSuccess', 'Categoria');
        else
            $this->setMessage('deteleError', 'Categoria');

        $this->redirect(array('controller' => $this->name, 'action' => 'index'));
    }

}