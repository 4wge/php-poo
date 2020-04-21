<?php

abstract class HtmlField {
    private $name;
    private $value;

    private function isValid() {
        //a faire
        return true;
    }
    public function __construct($name, $value) {
        if (!$this->isValid()) {
            throw new Exception('Please set a value');
        }
        $this->name = $name;
        $this->value = $value;
    }
}

class TextField extends HtmlField {
    private function isValis() {
        //a faire
        return true;
    }
    public function __toString() {
        return "<input type=\"text\" name=\"".$this->name."\" value=\"".$this->value."\">";
    }
}

class TextAreaField extends HtmlField {
    private function isValis() {
        //a faire
        return true;
    }
    public function __toString() {
        return "<input type=\"textarea\" name=\"".$name."\" value=\"".$value."\">";
    }
}

class RadioField extends HtmlField {
    private function isValis() {
        //a faire
        return true;
    }
    public function __toString() {
        return "<input type=\"radio\" name=\"".$name."\" value=\"".$value."\">";
    }
}

class Form{
    private $fields;

    public function __construct(string $action, string $method) {
        $this->fields = $this->addForm($action, $method);
    }

    private function addForm(string $action, string $method) {
        return "<form action=\"".$action." method=\"".$method."\">";
    }

    public function addTextField(string $name, string $value) {
        $this->fields[] = new TextField($name, $value);
        return $this;
    }
    public function addTextArea(string $name, string $value){
        $this->fields[] = new TextAreaField($name, $value);
        return $this;
    }
    public function addSelectField(string $name, array $options) {
        $select .= "<select name=\"$name\">";
        foreach ($options as  $option) {
            $select .= '<option>'.$option.'</option>';
        }
        $select .= '</select>';
        $this->fields[] = $select;
        return $this;
    }
    public function addRadioButton(string $name, string $value) {
        $this->fields[] = new RadioField($name, $value);
        return $this;
    }
    public function addSubmitButton($value) {
        $this->fields[] = "<input type=\"submit\" value=\"".$value."\">";
        return $this;
    }
    public function  build() {
        foreach ($this->fields as $field) {
            $html .= $field;
        }
        return $html."</form>";
    }
}

class Validator{
    private $errMessage;

    public function __construc(string $errMessage) {
        $this->errMessage = $errMessage;
    }
    public function isValid($fields) {
        $valid = true;

        foreach ($fields as $field) {
            if (!$field->isValid()) {
                $valid = false;
            }
        }
        return $valid;
    }
    public function setErrMessage(string $errMessage) {
        if (is_string($errMessage)) {
            $this->errMessage = $errMessage;
        }
    }
    public function getErrMessage() {
        return $this->errMessage;
    }
}