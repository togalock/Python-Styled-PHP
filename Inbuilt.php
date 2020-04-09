<?php

/**

Python inbuilt functions for PHP

Made by H-AL-NKM Alphor at L-AL-ISM.
Some rights reserved.

**/

function all($iterable) {
	foreach($iterable as $element) {
		if (!$element) {
			return false;
		}
	}
	return true;
}

function any($iterable) {
	foreach ($iterable as $element) {
		if ($element) {
			return true;
		}
	}
	return false;
}

function _bool($x) {
	return (boolean)$x;
}

function delattr($object, $name) {
	if (property_exists($object, $name)) {
		unset($object->$name);
	}
}

function _dict($iterable) {
	$result = array();
	foreach ($iterable as $item) {
		if (sizeof($item) !== 2) {
			return null;
		}
	$result[current($item)] = next($item);
	}
	return $result;
}

function divmod($a, $b) {
	assert(is_numeric($a, $b));
	return array(intdiv($a, $b), $a % $b);
}

function enumerate($iterable, $start = 0) {
	$n = $start;
	$result = array();
	foreach ($iterable as $element) {
		$result[] = array($n, $element);
		$n++;
	}
	return $result;
}

function filter($function, $iterable) {
	return array_filter($iterable, $function);
}

function _float($x) {
	return (float)$x;
}

function getattr($object, $name, $default = null) {
	if (property_exists($object, $name)) {
		return $object->$name;
	}
	return $default;
}

function hasattr($object, $name) {
	return (property_exists($object, $name));
}

function _int($x) {
	return (integer)$x;
}

function isinstance($object, $class) {
	return ($object instanceof $class);
}

function len($s) {
	if (is_array($s) || is_object($s)) {
		return sizeof($s);
	}
	elseif (is_string($s)) {
		return strlen($s);
	}
	else {
		return null;
	}
}

function _list($iterable) {
	$result = array();
	foreach ($iterable as $item) {
		$result[] = $item;
	}
	return $result;
}

function map($function, $iterable) {
	return array_map($function, $iterable);
}

function reduce($function, $iterable) {
	return array_reduce($iterable, $function);
}

function sorted($iterable, $sort_flags = SORT_REGULAR, $reverse = false) {
	$result = $iterable;
	sort($result, $sort_flags);
	if ($reverse) {
		array_reverse($result);
	}
	return $result;
}

function _str($object) {
	return (string)$object;
}

function sum($iterable, $start = 0) {
	return $start + array_sum($iterable);
}

function type($object) {
	return gettype($object);
}

function zip($iterables) {
	$result = array();
	$length = array(); 
	
	foreach ($iterables as &$iterable) {
		$length[] = sizeof($iterable);
		array_unshift($iterable, null);
	}
	$length = min($length);
	
	for ($i = 0; $i < $length; $i++) {
		$next_element = array();
		foreach ($iterables as &$iterable) {
			$next_element[] = next($iterable);
		}
		$result[] = $next_element;
	}
	return $result;
}

?>
