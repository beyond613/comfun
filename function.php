<?php

/**
 * @param $httpUrl
 * @param array $httpData
 * @return array|mixed|null
 */
function httpPostSend($httpUrl, $httpData = array()) {
	if (!$httpUrl) {
		return null;
	}

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $httpUrl);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10); // 超时时间
	if ($httpData) {
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $httpData);
	}
	$output = json_decode(curl_exec($ch), true);
	curl_close($ch);
	if (!$output) {
		$output = [];
	}
	return $output;
}

/**
 * @param $min
 * @param $max
 * @param $in
 * @return bool
 */
function in_between($min, $max, $in) {
	if ($min <= $in && $max >= $in) {
		return TRUE;
	}
	return FALSE;
}

/**
 * @param $input
 * @return string
 */
function base64_url_encode($input) {
	return strtr(base64_encode($input), '+/', '-_');
}

/**
 * @param $input
 * @return string
 */
function base64_url_decode($input) {
	return base64_decode(strtr($input, '-_', '+/'));
}

/**
 * @param $str
 * @param $len
 * @return string
 */
function utf8_mb_substr($str, $len) {
	return mb_substr(iconv('UTF-8', 'UTF-8//IGNORE', $str), 0, $len, 'UTF-8');
}

/**
 * 自定义多维数组相加  键相同值相加
 * @param $a
 * @param $b
 * @return mixed
 */
function array_add($a, $b) {
	foreach ($b as $key => $value) {
		if (isset($a[$key])) {
			if (is_array($a[$key]) && is_array($value)) {
				$a[$key] = array_add($a[$key], $value);
			} elseif (is_numeric($a[$key]) && is_numeric($value)) {
				$a[$key] += $value;
			} else {
				echo "数组不对等";die;
			}
		} else {
			$a[$key] = $value;
		}
	}
	return $a;
}

/**
 * 自定义多维数组，值乘
 * @param $arr
 * @param $num
 * @return mixed
 */
function array_value_multiply($arr, $num) {
	foreach ($arr as $key => $value) {
		if (is_array($value)) {
			$arr[$key] = array_value_multiply($value, $num);
		} else {
			$arr[$key] = $value * $num;
		}
	}
	return $arr;
}