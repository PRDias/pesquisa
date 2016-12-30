
<div id="paginator-counter"><?= $this->Paginator->counter( array( 'format' => "<strong>%count%</strong> registro(s) encontrado(s)" ) ) ?></div>

<ul class="pagination">
	<li class="previous"><?= $this->Paginator->prev(" <span aria-hidden='true'>&laquo;</span>
      ", array( 'escape' => false ), null, array( 'escape' => false, 'class' => 'Previous disable' ) ) ?></li>
        <li class="counter"><a><?= $this->Paginator->counter( array( "format" => "p&aacute;gina %page% de %pages%" ) ) ?></a></li>
	<li class="next"><?= $this->Paginator->next( " <span aria-hidden='true'>&raquo;</span>", array( 'escape' => false ), null, array( 'escape' => false, 'class' => 'next disable' ) ) ?></li>
</ul>
