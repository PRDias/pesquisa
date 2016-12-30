<?php

class Pergunta extends AppModel {
    /* ----------------------------------------
     * Atributtes
      ---------------------------------------- */

    public $name = "Pergunta";
    public $label = 'Pergunta';
    public $displayField = 'controller_label';
    public $gender = 'a';
    public $useTable = 'perguntas';

    /* ----------------------------------------
     * Association
      ---------------------------------------- */
    public $belongsTo = ['Categoria'];
    public $hasMany = ['Avaliacao' => ['foreignKey' => 'pergunta_id']];

    /* ----------------------------------------
     * Validation
      ---------------------------------------- */


    /* ----------------------------------------
     * Methods
      ---------------------------------------- */

    public function lists() {

        $perguntas = $this->find("all", array('fields' => array('id', 'controller_label', 'action_label'), 'contain' => array()));
        $perguntasLista = array();

        foreach ($perguntas as $pergunta) {

            $index = $pergunta['Pergunta']['controller_label'];
            $perguntasLista[$index][$pergunta["Pergunta"]["id"]] = $pergunta["Pergunta"]["action_label"];
        }

        return $perguntasLista;
    }

    public function getMediaAvaliacao() {
        $sql = "SELECT * FROM (SELECT Pergunta.id, Pergunta.texto, COALESCE(SUM(Avaliacao.nota) / COUNT(Avaliacao.id) ,0)AS media FROM perguntas AS Pergunta
                LEFT JOIN avaliacoes AS Avaliacao ON Avaliacao.pergunta_id = Pergunta.id
                GROUP BY Pergunta.id) AS AvaliacaoMedia";
        $result = $this->query($sql);
        return $result;
    }

}
