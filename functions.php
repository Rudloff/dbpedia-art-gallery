<?php
function espaceSparql ($var) {
    return addcslashes(str_replace(' ', '_', $var), '()');
}
?>
