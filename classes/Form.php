<?php

namespace App;

class Form
{
    private string $method = "GET";
    private string $id = "form";
    private string $content = "";
    private string $button = "Test";

    public function setMethod(string $input):Form {
        $this -> method = $input;
        return $this;
    }

    public function setButton(string $innerText):Form {
        $this -> button = $innerText;
        return $this;
    }

    public function setId(string $id) {
        $this -> id = $id;
    }

    public function addInput(string $type, string $name, string $placeholder, string $id) {
        $this -> content = $this ->content.<<<Input
        <input id="{$id}" type="{$type}" name="{$name}" placeholder={$placeholder} />
        Input;
    }

    public function render():string {
        return <<<FORM
        <form 
        id="{$this -> id}" method="{$this -> method}"
        class="d-flex flex-col ai-center jc-center bg-primary p-4 pt-6 pb-6 br-rad-1"
        >
        {$this->content}
        <button type="submit">{$this->button}</button>
        </form>
        FORM;
    }
}