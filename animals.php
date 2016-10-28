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

// Находим названия зверей, которые состоят из двух слов
$two_words_animals = array();
foreach ($animals_in_the_world as $continent => $animals_name) {
  foreach ($animals_name as $each_animals_name) {
    $number_of_words = str_word_count ($each_animals_name, $format = 0);
    if ($number_of_words === 2) {
      array_push($two_words_animals, $each_animals_name);
    }
  }
}

// Формируем массив из отдельных слов, перемешиваем
$words = array();
foreach ($two_words_animals as $value) {
  $a = explode(' ', $value);
  foreach ($a as $b) {
    array_push($words, $b);
  }
}
shuffle($words);

// Сортируем слова на первые (по которым будем привязывать к стране) и вторые
$first_words = array();
$second_words = array();
foreach ($words as $words_key => $word) {
  if(preg_match('/[A-Z]/', $word)) {
    array_push($first_words, $word);
  }
  else
  array_push($second_words, $word);
}

// Формируем новые названия
$new_names = array_combine($first_words, $second_words);

// Создаем функцию для поиска внутри массива, чтобы определить страну
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

// С использованием функции определяем, к какой стране относится первое слово.
// Выводим результаты на экран.
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
