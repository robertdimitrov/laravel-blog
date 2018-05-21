<?php

namespace App\Utilities\Tokenizer;

class Tokenizer
{
	private $commonWords_EN = ["", "a", "about", "all", "also", "and", "as", "at", "be", "been", "because", "but", "by", "can", "come", "could", "day", "do", "even", "find", "first", "for", "from", "get", "give", "go", "had", "has", "have", "having", "he", "her", "here", "him", "his", "how", "I", "if", "in", "into", "is", "it", "its", "just", "know", "like", "look", "make", "man", "many", "me", "more", "my", "new", "no", "not", "now", "of", "on", "one", "only", "or", "other", "our", "out", "people", "say", "see", "she", "so", "some", "take", "tell", "than", "that", "the", "their", "them", "then", "there", "these", "they", "thing", "think", "this", "those", "time", "to", "two", "up", "use", "very", "want", "way", "we", "well", "what", "when", "which", "who", "will", "with", "would", "year", "you", "your"];

	private $commonWords_DE = ["", "die", "der", "und", "in", "zu", "den", "das", "nicht", "von", "sie", "ist", "des", "sich", "mit", "dem", "dass", "er", "es", "ein", "ich", "auf", "so", "eine", "auch", "als", "an", "nach", "wie", "im", "für", "man", "aber", "aus", "durch", "wenn", "nur", "war", "noch", "werden", "bei", "hat", "wir", "was", "wird", "sein", "einen", "welche", "sind", "oder", "zur", "um", "haben", "einer", "mir", "über", "ihm", "diese", "einem", "ihr", "uns", "da", "zum", "kann", "doch", "vor", "dieser", "mich", "ihn", "du", "hatte", "seine", "mehr", "am", "denn", "nun", "unter", "sehr", "selbst", "schon", "hier", "bis", "habe", "ihre", "dann", "ihnen", "seiner", "alle", "wieder", "meine", "Zeit", "gegen", "vom", "ganz", "einzelnen", "wo", "muss", "ohne", "eines", "können", "sei"];

	public function tokenize($string, $language = 'en', $minLength = 3)
	{
		$normalized = strtolower(preg_replace("/[^A-Za-z0-9 ]/", '', $string));
		$array = explode(' ', $normalized);

		$shortWords = [];

		foreach ($array as $word)
		{
			if (strlen($word) < $minLength)
			{
				$shortWords[] = $word;
			}
		}

		$array = array_diff($array, $shortWords);

		$unique = array_unique($array);

		$commonWords = [];

		switch($language)
		{
			case 'en': $commonWords = $this->commonWords_EN; break;
			case 'de': $commonWords = $this->commonWords_DE; break;
			case 'none': break;
			default: $commonWords = $this->commonWords_EN;
		}

		$tokens = array_diff($unique, $commonWords);

		return $tokens;
	}
}