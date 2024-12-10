<?php

function creerBouton($texte, $name, $id, $classe, $value) {
    return "
        <form method='post' action='index.php'>
            <button type='submit' name='$name' id='$id' class='$classe' value='$value'>$texte</button>
        </form>
    ";
}
