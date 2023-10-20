<?php

namespace App;

class Form
{
    private string $method = "GET";
    private string $id = "form";
    private string $content = "";
    private string $button = "Test";
    private string $additionalLink = "";

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
        return $this;
    }

    public function setAdditionalLink(string $href, string $content) {
        $this -> additionalLink = "<a href={$href}>{$content}</a>";
        return $this;
    }

    public function addInput(string $type, string $name, string $placeholder, string $id, string $value) {
        $this -> content = $this ->content.<<<Input
        <input class="m-1 mt-3 mb-3 font-other p-1 outline-none br-none br-b-solid br-b-2 br-b-accent bg-secondary color f-s"
        id="{$id}" type="{$type}" name="{$name}" placeholder="{$placeholder}" 
        value="{$value}"
        />
        Input;

        return $this;
    }

    public function render():string {
        return <<<FORM
        <form 
        id="{$this -> id}" method="{$this -> method}"
        class="d-flex flex-col ai-center jc-center bg-primary p-4 pt-6 pb-6 br-rad-1"
        >
        {$this->content}
        <button class="br-none bg-accent-hover color-bg-hover mt-3 mb-3
        m-1 font-head color f-500 f-s bg-secondary p-1 pr-5 pl-5 c-pointer" type="submit">
        {$this->button}</button>
        {$this->additionalLink}
        <div class="errors"></div>
        </form>
        FORM;
    }
}