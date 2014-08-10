<?php
require_once 'functions.php';
$painting=json_decode(file_get_contents('http://fr.dbpedia.org/sparql?format='.urlencode('application/json').'&query='.
rawurlencode('SELECT ?name ?depiction ?thumb ?abstract ?authorName
WHERE {
   ?painting rdfs:label ?name.
   ?painting foaf:depiction  ?depiction.
   ?painting dbpedia-owl:thumbnail ?thumb.
   ?painting dbpedia-owl:abstract  ?abstract.
   ?painting dbpedia-owl:author  ?author.
   ?author rdfs:label   ?authorName.
   FILTER( ?painting = <'.($_GET['painting']).'> )
}')), true);
$painting=$painting['results']['bindings'][0];
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <title>
    <?php echo $painting['name']['value'], ' de ', $painting['authorName']['value']; ?>
    </title>
    <meta charset="UTF-8" />
</head>
<body>
<?php
echo '<h3>', $painting['name']['value'], '</h3>';
echo '<div class="pic"><a href="', $painting['depiction']['value'], '" alt="" title="Afficher en plus grand" /><img src="', str_replace('200px', '1024px', $painting['thumb']['value']), '" alt="" /></a></div>';
echo '<p>', $painting['abstract']['value'], '</p>';

?>
</body>
</html>
