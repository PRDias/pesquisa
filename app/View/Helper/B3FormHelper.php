<?php

App::uses('AppHelper', 'View/Helper');
define('FORMS_REQUIRED_STRING', '<span class="req">*</span> ');

class B3FormHelper extends AppHelper
{

    /*----------------------------------------
     * Attributes
     ----------------------------------------*/

    public $helpers = array('Form', 'Html');

    private $defaultOptions = array(

        'label' => false,
        'div' => 'form-group',
        'escape' => false,
        'before' => false,
        'after' => false,
        'error' => array(
            'attributes' => array(
                'escape' => false,
                'wrap' => 'div',
                'class' => 'help-block'
            )));

    /*----------------------------------------
     * Constructor
     ----------------------------------------*/

    function __construct(View $View, $settings = array())
    {
        parent::__construct($View, $settings);
    }

    /*----------------------------------------
     * Methods
     ----------------------------------------*/

    private function controlGroupOpen(&$fieldName, &$options)
    {
        $wrap = empty($options['wrap']) ? 'form-group' : $options['wrap'];
        unset($options['wrap']);

        $str = "<div class='{$wrap}";
        $model = '';
        $field = '';
        if (empty($options['label'])) {

            $model = explode('.', $fieldName);
            $field = empty($model[1]) ? '' : $model[1];
            $model = $model[0];
            $before = $after = null;
        }

        if (empty($options['label'])) {
            if (!isset($options['label'])) {
                App::import('Model', "{$model}");
                $modelObject = new $model;
                $options['label'] = empty($modelObject->attributeLabels[$field]) ? $field : $modelObject->attributeLabels[$field];
            }
        }

        if (!isset($options['required']))
            $options['label'] = FORMS_REQUIRED_STRING . $options['label'];

        $hasError = !empty($this->Form->validationErrors[$model][$field]);
        if ($hasError) {
            $str .= ' has-error';
        } elseif (!empty($options['help'])) {
            $this->defaultOptions['after'] = "<div class=\"help-block help\">{$options['help']}</div>";
        } else {
            if (!empty($this->Form->validationErrors[$model])) {
                $str .= ' has-success';
            }
        }

        $str .= "'>";
        if (!empty($options['label']))
            $str .= $this->Form->label($fieldName, $options['label'], array('class' => 'control-label'));

        unset($options['label']);

        return $str;
    }

    private function controlGroupClose()
    {

        $this->defaultOptions = array(
            'label' => false,
            'div' => 'form-group',
            'escape' => false,
            'before' => false,
            'after' => false,
            'error' => array(
                'attributes' => array(
                    'escape' => false,
                    'wrap' => 'span',
                    'class' => 'help-block'
                )));

        return '</div>';
    }

    public function date($fieldName, $options = [])
    {
        $input_id = $this->fieldNameToId($fieldName);

        $script_moment_url = $this->importJs('moment.js');
        $script_date_url = $this->importJs('bootstrap3/bootstrap-datetimepicker.min.js');
        $css_date = $this->importCss('bootstrap3/bootstrap-datetimepicker.min.css');
        $script_date = "";
        $format = "";
        if (!empty($options['format'])) {
            $format = $options['format'];

        }else{
            $format = 'DD/MM/Y HH:mm';
        }

        $script_date = $this->addScript("$('#{$input_id}').datetimepicker({format:'{$format}'});");

        $str = $script_moment_url;
        $str .= $script_date_url;
        $str .= $css_date;
        $str .= $this->controlGroupOpen($fieldName, $options);
        if (!empty($options['prepend'])) {
            $options['before'] = "<div class=\"input-prepend\"><span class=\"add-on\">{$options['prepend']}</span>";
            $options['after'] .= '</div>';
        }
        $options['class'] = 'form-control';
        $options['div'] = false;

        $str .= $this->Form->input($fieldName, array_merge($this->defaultOptions, $options));
        $str .= $this->controlGroupClose();
        $str .= $script_date;
        return $str;
    }

    public function input($fieldName, $options = [])
    {

        $str = $this->controlGroupOpen($fieldName, $options);

        if (!empty($options['prepend'])) {

            $options['before'] = "<div class=\"input-prepend\"><span class=\"add-on\">{$options['prepend']}</span>";
            $options['after'] .= '</div>';
        }
        $options['class'] = 'form-control';
        $options['div'] = false;
        $str .= $this->Form->input($fieldName, array_merge($this->defaultOptions, $options));
        $str .= $this->controlGroupClose();
        return $str;
    }

    public function fieldNameToId($fieldName)
    {
        $input = explode(".", $fieldName);
        $input_id = "";
        if (!empty($input)) {
            foreach ($input as $name) {
                $input_id .= Inflector::camelize($name);
            }
        }
        return $input_id;
    }

    public function inputMask($fieldName, $options = [])
    {
        $input_id = $this->fieldNameToId($fieldName);

        $script_mask_url = $this->importJs('jquery.maskedinput.min.js');
        $script_mask = "";
        if (!empty($options['mask'])) {
            $mask = $options['mask'];
            $script_mask = $this->addScript("$('#{$input_id}').mask('{$mask}');");
        }
        $str = $script_mask_url;
        $str .= $this->controlGroupOpen($fieldName, $options);
        if (!empty($options['prepend'])) {
            $options['before'] = "<div class=\"input-prepend\"><span class=\"add-on\">{$options['prepend']}</span>";
            $options['after'] .= '</div>';
        }
        $options['class'] = 'form-control';
        $options['div'] = false;

        $str .= $this->Form->input($fieldName, array_merge($this->defaultOptions, $options));
        $str .= $this->controlGroupClose();
        $str .= $script_mask;
        return $str;
    }


    private function importCss($fileName)
    {
        $url = $this->Html->url('/') . 'css' . DS . $fileName;
        return "<link rel='stylesheet' type='text/css' href='{$url}'/>";
    }

    private function importJs($fileName)
    {
        $url = $this->Html->url('/') . 'js' . DS . $fileName;
        return "<script src='{$url}'></script>";
    }

    private function addScript($script)
    {
        $str_script = "<script>$(document).ready(function() {" . $script . "});</script>";
        return $str_script;
    }

    public function select2($fieldName, $options = [])
    {
        $input_id = $this->fieldNameToId($fieldName);

        $script_select2 = $this->importJs('select2.min.js');
        $css_select2 = $this->importCss('select2.min.css');

        $script = $this->addScript("$('#{$input_id}').select2();");
        $str = $script_select2;
        $str .= $css_select2;
        $str .= $this->controlGroupOpen($fieldName, $options);
        if (!empty($options['prepend'])) {
            $options['before'] = "<div class=\"input-prepend\"><span class=\"add-on\">{$options['prepend']}</span>";
            $options['after'] .= '</div>';
        }
        $options['class'] = 'form-control';
        $options['div'] = false;

        $str .= $this->Form->input($fieldName, array_merge($this->defaultOptions, $options));
        $str .= $this->controlGroupClose();
        $str .= $script;
        return $str;
    }

    public function check($fieldName, $options = [])
    {

        $str = $this->controlGroupOpen($fieldName, $options);

        if (empty($options['buttons'])) {

            if (isset($options['inline']))
                $inline = $options['inline'] ? ' inline' : null;
            else
                $inline = ' inline';

            $options['type'] = 'checkbox';
            $options['before'] = "<label class=\"checkbox{$inline}\">";
            $options['after'] = '</label>';

            if (is_array($options['options'])) {

                $this->defaultOptions['div'] = false;
                $str .= '<div class="controls">';

                foreach ($options['options'] as $value => $label) {

                    $options['label'] = $label;
                    $str .= $this->Form->input($fieldName . $value, array_merge($this->defaultOptions, $options));
                }

                $str .= '</div>';

            } else {

                $options['label'] = $options['options'];
                $str .= $this->Form->input($fieldName, array_merge($this->defaultOptions, $options));
            }

        } else {

            $str .= '<div class="controls">';
            $buttonOptions = array(
                'type' => 'button',
                'escape' => false,
                'class' => 'btn checkbox'
            );

            if (!empty($options['class']))
                $buttonOptions['class'] .= ' ' . $options['class'];

            $field = explode('.', $fieldName);
            $field = array_pop($field);

            if (is_array($options['options'])) {

                foreach ($options['options'] as $value => $label)
                    $str .= $this->Form->input($fieldName . $value, array('type' => 'hidden'));

                $str .= '<div class="btn-group" data-toggle="buttons-checkbox">';
                $classes = $buttonOptions['class'];

                foreach ($options['options'] as $value => $label) {

                    if (!empty($this->data[$this->Form->_modelScope][$field . $value]))
                        $buttonOptions['class'] .= ' active';
                    else
                        $buttonOptions['class'] = $classes;

                    $buttonOptions['data-setinput'] = '#' . $this->domId($fieldName . $value);
                    $str .= $this->Form->button($label, $buttonOptions);
                }

                $str .= '</div>';

            } else {

                if (!empty($this->data[$this->Form->_modelScope][$field]))
                    $buttonOptions['class'] .= ' active';

                $str .= $this->Form->input($fieldName, array('type' => 'hidden'));
                $buttonOptions['data-setinput'] = '#' . $this->domId($fieldName);
                $buttonOptions['data-toggle'] = 'button';
                $str .= $this->Form->button($options['options'], $buttonOptions);
            }

            $str .= '</div>';
        }

        $str .= $this->controlGroupClose();
        return $str;
    }

    public function radio($fieldName, $options = [])
    {

        $str = $this->controlGroupOpen($fieldName, $options);
        $this->defaultOptions['error']['attributes']['class'] .= ' radio';

        if (isset($options['align'])) {
            $align = $options['align'] === false ? null : ' align';
            unset($options['align']);
        } else
            $align = ' align';

        if (empty($options['buttons'])) {

            if (isset($options['inline']))
                $inline = $options['inline'] ? ' inline' : null;
            else
                $inline = ' inline';

            $options['type'] = 'radio';
            $options['before'] = "<div class=\"radio-group{$align}\"><label class=\"radio{$inline}\">";
            $options['after'] = '</label></div>';
            $options['separator'] = "</label><label class=\"radio{$inline}\">";
            $options['legend'] = false;
            $this->defaultOptions['div'] = false;
            $str .= '<div class="controls">' . $this->Form->input($fieldName, array_merge($this->defaultOptions, $options)) . '</div>';

        } else {

            $buttonOptions = array(
                'type' => 'button',
                'escape' => false,
                'class' => 'btn radio'
            );

            if (!empty($options['class']))
                $buttonOptions['class'] .= ' ' . $options['class'];

            if (empty($options['default']))
                $options['default'] = null;

            $field = explode('.', $fieldName);
            $field = array_pop($field);
            $str .= '<div class="controls hidden-radio"><div class="btn-group radio-group-buttons' . $align . '" data-toggle="buttons-radio">';
            $classes = $buttonOptions['class'];

            foreach ($options['options'] as $value => $label) {

                if (!empty($this->data[$this->Form->_modelScope][$field])) {

                    if ($this->data[$this->Form->_modelScope][$field] == $value)
                        $buttonOptions['class'] .= ' active';
                    else
                        $buttonOptions['class'] = $classes;

                } elseif ($value == $options['default'])
                    $buttonOptions['class'] .= ' active';
                else
                    $buttonOptions['class'] = $classes;

                $buttonOptions['data-setinput'] = '#' . $this->domId($fieldName . $value);
                $str .= $this->Form->button($label, $buttonOptions);
            }

            $options['div'] = false;
            $options['legend'] = false;
            $options['label'] = true;
            $options['type'] = 'radio';
            $options['buttons'] = false;
            $str .= '</div>' . $this->Form->input($fieldName, array_merge($this->defaultOptions, $options)) . '</div>';
        }

        $str .= $this->controlGroupClose();
        return $str;
    }

}