<?php

function generateCardListItem(string $content, int $id):string {
    return <<<ELEMENT
    <div id="{$id}" class="">
        <label>{$content}</label>
        <button>Edit</button>
        <button>Delete</button>
    </div>
    ELEMENT;
}
