#!/usr/bin/php
<?php

function is_nbr($a)
{
	$ord = ord($a);
	if ($ord >= ord('0') && $ord <= ord('9'))
		return (TRUE);
	else {
		return (FALSE);
	}
}

function is_op($a)
{
	if ($a == '+' || $a == '-' || $a == '*' || $a == '/' || $a == '%')
		return (TRUE);
	else
		return (FALSE);
}

if ($argc != 2)
{
	echo "Incorrect Parameters\n";
	exit();
}

$i = 0;
$start = -1;
while (isset($argv[1][$i]))
{
	if (is_nbr($argv[1][$i]))
		$start = $i;
	else if ($argv[1][$i] == ' ' && $start != -1 && !isset($p1))
	{
		$s1 = substr($argv[1], 0, $i);
		if (!is_numeric($s1))
		{
			echo "Syntax Error\n";
			exit();
		}
		$p1 = intval($s1);
		$start = -1;
	}
	else if (is_op($argv[1][$i]))
	{
		if (!isset($p1))
		{
			if ($start != -1)
			{
				$s1 = substr($argv[1], 0, $i);
				if (!is_numeric($s1))
				{
					echo "Syntax Error\n";
					exit();
				}
				$p1 = intval($s1);
				$start = -1;
			}
			else
			{
				echo "Syntax Error\n";
				exit();
			}
		}
		$pop = $argv[1][$i];
	}
	else if ($argv[1][$i] == ' ' && $start != -1 && isset($p1) && !isset($p2))
	{
		echo "caca";
		$s2 = substr($argv[1], $start, $i - $start);
		if (!is_numeric($s2))
		{
			echo "Syntax Error\n";
			exit();
		}
		$p2 = intval($s1);
		$start = -1;
	}
	else if ($argv[1][$i] == ' ');
	else
	{
		echo "Syntax Error\n";
		exit();
	}
	$i++;
}

echo "\p1 : $p1, \pop : $pop, \p2 : $p2\n";

switch (trim($pop))
{
	case "+":
		$result = $p1 + $p2;
		break;
	case "-":
		$result = $p1 - $p2;
		break;
	case "*":
		$result = $p1 * $p2;
		break;
	case "/":
		$result = $p1 / $p2;
		break;
	case "%":
		$result = $p1 % $p2;
		break;
	default :
		$result = "";
		break;
}

echo $result."\n";

?>