<?php

class Categoria extends AppModel
{

    /*----------------------------------------
     * Atributtes
     ----------------------------------------*/

    public $name = "Categoria";
    public $label = 'Categoria';
    public $displayField='controller_label';
    public $gender = 'a';
    public $useTable = 'categorias';
    public $hasMany = ['Pergunta'];

    /*----------------------------------------
     * Validation
     ----------------------------------------*/

   
    /*----------------------------------------
     * Methods
     ----------------------------------------*/

    public function lists()
    {

        $areas = $this->find("all", array('fields' => array('id', 'controller_label', 'action_label'), 'contain' => array()));
        $areasLista = array();

        foreach ($areas as $area) {

            $index = $area['Categoria']['controller_label'];
            $areasLista[$index][$area["Categoria"]["id"]] = $area["Categoria"]["action_label"];
        }

        return $areasLista;
    }

}