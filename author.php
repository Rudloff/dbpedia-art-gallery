<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8" />
</head>
<body>
    <ul>
<?php
$paintings=json_decode(file_get_contents('http://fr.dbpedia.org/sparql?format='.urlencode('application/json').'&query='.
urlencode('SELECT ?painting ?name ?thumb
WHERE {
   ?painting a dbpedia-owl:Artwork.
   ?painting dbpedia-owl:author dbpedia-fr:'.str_replace(' ', '_', $_GET['author']).'.
   ?painting rdfs:label ?name.
   ?painting dbpedia-owl:thumbnail ?thumb.
   FILTER langMatches( lang(?name), "fr")
}')), true);
foreach ($paintings['results']['bindings'] as $painting) {
    ?>
    <li>
    <?php
    echo '<a href="painting.php?painting=', urlencode($painting['painting']['value']), '"><img src="', $painting['thumb']['value'], '" alt="" />';
    echo '<h3>', $painting['name']['value'], '</h3></a>';
    ?>
    </li>
    <?php
}
?>
</ul>
</body>
</html>
