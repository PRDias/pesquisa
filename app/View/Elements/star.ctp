<?php

$point = empty($point) ? 1 : $point;
$max_star = empty($max_star) ? 5 : $max_star;
$value = empty($value) ? 0 : $value;
$options = [];
$index = isset($index) ? $index : 0;

for ($i = $max_star; $i > 0; $i--) {
    $options[$point * $i] = '';
}

$value = floor($value);

if($value % $point != 0){
    $value -= $value % $point ;
}

$attributes = [
    'div' => 'rating',
    'label ' => false,
    'class' => 'full',
    'type' => 'radio',
    'options' => $options,
    'legend' => false,
    'disabled' => true,
    'value' => "$value"
];





print $this->Form->input('Avaliacao.' . $index. '.nota', $attributes);


