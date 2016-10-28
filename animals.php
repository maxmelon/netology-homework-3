<?php
ini_set("display_errors", "On"); error_reporting(E_ALL);

$animals_in_the_world = array (
  "Africa" => array ("Oryctolagus cuniculus", "Oryx gazella", "Crocuta crocuta"),
  "Europe" => array ("Panthera pardus spelaea", "Candiacervus cretensis", "Equus hydruntinus"),
  "Asia" => array ("Hippopotamus minor", "Neofelis nebulosa brachyura"),
  "South America" => array ("Antifer crassus", "Aramides gutturalis"),
  "North America" => array ("Oryzomys antillarum", "Canis lupus beothucu", "Monophyllus frater"),
  "Australia" => array ("Pteropus brunneus", "Rattus macleari"),
);

$two_words_animals = array();
$words = array();
$first_words = array();
$second_words = array();

function deep_search ($needle, $array) {
$value1 = array();
  foreach ($array as $key => $values) {
    foreach ($values as $value) {
      $value1 = explode (' ', $value);
      if (in_array ($needle, $value1) == true) {
        return $key;
        break 3;
      }
    }
  }
}

foreach ($animals_in_the_world as $continent => $animals_name) {

  foreach ($animals_name as $each_animals_name) {
    $number_of_words = str_word_count ($each_animals_name, $format = 0);

    if ($number_of_words === 2) {
      array_push($two_words_animals, $each_animals_name);
    }
  }
}

foreach ($two_words_animals as $value) {
  $a = explode(' ', $value);
  foreach ($a as $b) {
    array_push($words, $b);
  }
}

array_unshift($words, $words[0]);
unset($words[0]);
shuffle($words);

foreach ($words as $words_key => $word) {
  if(!preg_match('/[A-Z]/', $word)) {
    array_push($second_words, $word);
  }
  else
  array_push($first_words, $word);
}

$new_names = array_combine($first_words, $second_words);

echo "<h2>Africa</h2>";
$string = '';
foreach ($new_names as $first_word => $second_word) {
  if (deep_search ($first_word, $animals_in_the_world) == "Africa") {
    $string .= "$first_word" . " $second_word, ";
  }
}
$string = substr($string, 0, -2);
echo "$string";

echo "<h2>Europe</h2>";
$string = '';
foreach ($new_names as $first_word => $second_word) {
  if (deep_search ($first_word, $animals_in_the_world) == "Europe") {
    $string .= "$first_word" . " $second_word, ";
  }
}
$string = substr($string, 0, -2);
echo "$string";

echo "<h2>Asia</h2>";
$string = '';
foreach ($new_names as $first_word => $second_word) {
  if (deep_search ($first_word, $animals_in_the_world) == "Asia") {
  $string .= "$first_word" . " $second_word, ";
  }
}
$string = substr($string, 0, -2);
echo "$string";

echo "<h2>South America</h2>";
$string = '';
foreach ($new_names as $first_word => $second_word) {
  if (deep_search ($first_word, $animals_in_the_world) == "South America") {
    $string .= "$first_word" . " $second_word, ";
  }
}
$string = substr($string, 0, -2);
echo "$string";

echo "<h2>North America</h2>";
$string = '';
foreach ($new_names as $first_word => $second_word) {
  if (deep_search ($first_word, $animals_in_the_world) == "North America") {
    $string .= "$first_word" . " $second_word, ";
  }
}
$string = substr($string, 0, -2);
echo "$string";

echo "<h2>Australia</h2>";
$string = '';
foreach ($new_names as $first_word => $second_word) {
  if (deep_search ($first_word, $animals_in_the_world) == "Australia") {
    $string .= "$first_word" . " $second_word, ";
  }
}
$string = substr($string, 0, -2);
echo "$string";

?>
