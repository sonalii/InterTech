<?php

$file = fopen ($argv[1], 'r') or die ("can't open file $argv[1]\n");

// http://stackoverflow.com/questions/834303/php-startswith-and-endswith-functions
function endsWith($str, $pattern)
{
    return $pattern === "" || substr($str, -strlen($pattern)) === $pattern;
}

while (!feof ($file))
{
	$str = (trim (fgets ($file)));

	if (! empty($str))
	{
		$arr = explode (',', $str);

		if (! empty($arr)) {
			print($str . "\t\t");

			$ans = endsWith($arr[0], $arr[1]) ? 1 : 0;

			print($ans . PHP_EOL);
		}
	}
}

fclose ($file);

