<?php
var_dump(file_get_contents('http://fr.dbpedia.org/sparql?format='.urlencode('application/json').'&query='.
urlencode('SELECT ?name ?thumb
WHERE {
   ?painting a dbpedia-owl:Artwork.
   ?painting dbpedia-owl:author dbpedia-fr:Léonard_de_Vinci.
   ?painting foaf:name ?name.
   ?painting dbpedia-owl:thumbnail   ?thumb.
}')));
//?painting dbpedia-owl:abstract ?abstract.
//   FILTER langMatches( lang(?abstract), "fr")
?>
