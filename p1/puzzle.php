<?php

// i was able to implemente easy solution like finding fist ducplicate, 
// 
// for bonus point requirement, copied and coverted solution i found at
// http://keithschwarz.com/interesting/code/?dir=find-duplicate

$file = fopen ($argv[1], 'r') or die ("can't open file $argv[1]\n");



function bonus_solution($arr)
{
	$slow = sizeof($arr) - 1;
	$fast = $slow;

	for (;;) {
		$slow = $arr[$slow];
		$fast = $arr[$arr[$fast]];

		if ($slow == $fast)
		{
			break;
		}
	}

	$finder = sizeof($arr) - 1;
	for (;;) 
	{
		$slow   = $arr[$slow];
		$finder = $arr[$finder];

		if ($slow == $finder) 
		{
			break;
		}
	}

	print ('bonus: ' . $slow . PHP_EOL);
}



function my_solution($arr)
{
	$hash = array();
	$dup = '';
	
	foreach ($arr as $c)
	{
		if (isset($hash[$c]))
		{
			$dup = $c;
			break;
		} else {
			$hash[$c] = 1;
		}
	}
	
	print ('mine : ' . $dup . PHP_EOL);
}

while (!feof ($file))
{
	$str = (trim (fgets ($file)));

	if (! empty($str))
	{
		$arr = explode (';', $str);
		$arr = explode (',', $arr[1]);

		if (! empty($arr)) {

			print (PHP_EOL);
			print('solve: ' . $str . PHP_EOL);

			my_solution ($arr);
			bonus_solution ($arr);
		}
	}
}

fclose ($file);

