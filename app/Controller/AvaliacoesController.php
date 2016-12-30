<?php

class AvaliacoesController extends AppController
{
    /* ----------------------------------------
     * Atributtes
      ---------------------------------------- */

    public $name = "Avaliacoes";
    public $setMenu = "Avaliacoes";
    public $label = 'Avaliacoes';
    public $submenu = array('index', 'add');
    public $uses = ['Avaliacao', 'Pergunta'];

    /* ----------------------------------------
     * Actions
      ---------------------------------------- */


    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('add', 'confirmacao','home');
    }

    public function  home(){
        $this->layout = "default2";
    }

    public function index()
    {
        $this->checkAccess($this->name, __FUNCTION__);
        $medias = $this->Pergunta->getMediaAvaliacao();

        $numero = $this->Avaliacao->getNumeroAvaliacao();
        //pr($medias);die;
        $this->set(compact('medias','numero'));
    }

    public function view($id = null)
    {

        $this->checkAccess($this->name, __FUNCTION__);
        $this->Avaliacao->contain([]);
        $avaliacao = $this->Avaliacao->find('first');

        $this->checkResult($avaliacao, 'avaliacao');
        $this->set("avaliacao", $avaliacao);
    }

    public function add()
    {
        $this->layout = 'default2';

        $page_number = empty($this->request->params['named']['page']) ? 1 : $this->request->params['named']['page'];

        $page_number -= 1;

        if ($this->request->isPost()) {
            $data = $this->request->data;

            $this->Session->write("Dados.{$page_number}.Avaliacao", $data['Avaliacao']);

            $p = $page_number + 2;
            $this->redirect("/Avaliacoes/add/page:{$p}");
        } else {
            $this->data = $this->Session->read("Dados.{$page_number}");

        }
        try {

            $perguntas = $this->paginate('Pergunta');

        } catch (Exception $e) {
            $dados = $this->Session->read("Dados");


            $av['Avaliacao'] = [];

            foreach ($dados as $val) {
                if (empty($av['Avaliacao'])) {
                    $av['Avaliacao'] = $val['Avaliacao'];

                } else {
                    $av['Avaliacao'] = array_merge($av['Avaliacao'], $val['Avaliacao']);
                }
            }


            foreach ($av['Avaliacao'] as $k) {

                $this->Avaliacao->create();
                $this->Avaliacao->save($k, false);

            }

            unset($_SESSION['Dados']);
            $this->redirect('/Avaliacoes/confirmacao');
        }

        $this->set('perguntas', $perguntas);
    }

    public function edit($id = null)
    {

        $this->checkAccess($this->name, __FUNCTION__);


        if (!$this->request->isPut()) {
            $this->Avaliacao->contain([]);
            $this->data = $this->Avaliacao->findById($id);
        } else {


            $this->Avaliacao->create($this->request->data);

            if ($this->Avaliacao->validates()) {

                if ($this->Avaliacao->save(null, false)) {
                    $this->setMessage('saveSuccess', 'Avaliacao');
                    $this->redirect(array('controller' => $this->name, 'action' => 'view', $id));
                } else {
                    $this->setMessage('saveError', 'Avaliacao');
                }
            } else
                $this->setMessage('validateError');
        }

        self:: getPerguntas();
    }

    public function delete($id = null)
    {

        $this->checkAccess($this->name, __FUNCTION__);


        if ($this->Avaliacao->delete($id))
            $this->setMessage('deleteSuccess', 'Avaliacao');
        else
            $this->setMessage('deteleError', 'Avaliacao');

        $this->redirect(array('controller' => $this->name, 'action' => 'index'));
    }

    public function confirmacao()
    {
        $this->layout = 'default2';
    }

}
