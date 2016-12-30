<?php

class Avaliacao extends AppModel
{
    /* ----------------------------------------
     * Atributtes
      ---------------------------------------- */

    public $name = "Avaliacao";
    public $label = 'Avaliacao';
    public $displayField = 'controller_label';
    public $gender = 'a';
    public $useTable = 'avaliacoes';
    public $belongsTo = ['Pergunta' => ['foreignKey' => 'pergunta_id']];

    /* ----------------------------------------
     * Validation
      ---------------------------------------- */

    /* ----------------------------------------
     * Methods
      ---------------------------------------- */

    public function getNumeroAvaliacao()
    {
        $sql ="select * from (select  count(avaliacoes.nota) as total ,month(created) as mes from avaliacoes  GROUP BY month(created)) as numeroAvaliacoes";
        $result = $this->query($sql);
        return $result;

    }

    
}
