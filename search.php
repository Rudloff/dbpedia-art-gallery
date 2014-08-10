<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8" />
</head>
<body>
    <ul>
<?php
$results=json_decode(file_get_contents('http://fr.dbpedia.org/sparql?format='.urlencode('application/json').'&query='.
urlencode('SELECT ?name
WHERE {
    ?author a dbpedia-owl:Person.
   ?author foaf:name ?name . ?name bif:contains "\''.$_GET['search'].'\'".
   FILTER langMatches( lang(?name), "fr")
}')), true);
foreach ($results['results']['bindings'] as $result) {
    echo '<li>', $result['name']['value'], '</li>';
}
?>
</ul>
</body>
</html>
