<?php

function generateCardListItem(string $content, int $id):string {
    return <<<ELEMENT
    <div id="{$id}" 
    class="cardElement f-s d-flex br-rad-2 ai-center jc-between width-50 bg-secondary color mt-2 font-other f-400 m-1 p-2">
        <label>{$content}</label>
        <section>
            <button class="br-none c-pointer font-head p-1 pl-3 pr-3 bg-primary color-bg">Edit</button>
            <button class="br-none c-pointer font-head p-1 pl-3 pr-3 bg-primary color-bg">Delete</button>
        </section>      
    </div>
    ELEMENT;
}
