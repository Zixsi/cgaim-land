<?php

function debug($data)
{
    echo '<pre>';
    var_dump($data);
    echo '<pre>';
}

function getSchoolFileUrl($file)
{
    $ci = & get_instance();
    $url = $ci->config->item('school_url');
    $url .= DIRECTORY_SEPARATOR . $file;

    return $url;
}

function getDefaultFileUrl()
{
    return IMG_DEFAULT_16_9;
}

function getVideoId($url)
{
    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);

    return $match[1] ?? '';
}

function isActiveMenuItem($c, $a = null)
{
    $CI = & get_instance();
    $cr = strtolower($CI->router->fetch_class());
    $ar = strtolower($CI->router->fetch_method());
    $c = strtolower($c);
    $a = strtolower($a);

    return (($c === $cr) && (empty($a) || $a === null || $a === $ar)) ? true : false;
}

function nextMondayTs()
{
    $date = new \DateTime('next monday');
    return $date->getTimestamp();
}

function getNumEnding($number, $endingArray)
{
    $number = $number % 100;
    if ($number >= 11 && $number <= 19) {
        $ending = $endingArray[2];
    } else {
        $i = $number % 10;
        switch ($i) {
            case (1): $ending = $endingArray[0];
                break;
            case (2):
            case (3):
            case (4): $ending = $endingArray[1];
                break;
            default: $ending = $endingArray[2];
        }
    }
    return $ending;
}

function time2minutes($val)
{
    $val = (int) $val;
    $m = floor($val / 60);
    $s = $val - ($m * 60);
    $m = str_pad($m, 2, '0', STR_PAD_LEFT);
    $s = str_pad($s, 2, '0', STR_PAD_LEFT);

    return $m . ':' . $s;
}

function time2hours($val)
{
    $val = (int) $val;
    $h = floor($val / 3600);
    $val = $val - ($h * 3600);
    $m = floor($val / 60);
    $s = $val - ($m * 60);
    $h = str_pad($h, 2, '0', STR_PAD_LEFT);
    $m = str_pad($m, 2, '0', STR_PAD_LEFT);
    $s = str_pad($s, 2, '0', STR_PAD_LEFT);

    return $h . ':' . $m . ':' . $s;
}

function is_active_menu_item($c, $a = null)
{
    $CI = & get_instance();
    $cr = strtolower($CI->router->fetch_class());
    $ar = strtolower($CI->router->fetch_method());
    $c = strtolower($c);
    $a = strtolower($a);

    return (($c === $cr) && (empty($a) || $a === null || $a === $ar)) ? true : false;
}

/**
 * @param string $file
 */
function removeUploadedFile($file)
{
    $path = str_replace('//', '/', (FCPATH . $file));
    
    if (file_exists($path)) {
        unlink($path);
    }
}

function sendAjaxSuccess($result = true)
{
    header('Content-Type: application/json');
    echo json_encode(['result' => $result]);
    die();
}

function sendAjaxError($error)
{
    header('Content-Type: application/json');
    echo json_encode(['error' => $error]);
    die();
}

/**
 * @param string $date
 * @return string
 */
function getDateStartFormated($date)
{
    $monthsMap = [
        1 => 'января',
        2 => 'февраля',
        3 => 'марта',
        4 => 'апреля',
        5 => 'мая',
        6 => 'июня',
        7 => 'июля',
        8 => 'августа',
        9 => 'сентября',
        10 => 'октября',
        11 => 'ноября',
        12 => 'декабря'
    ];
    $ts = strtotime($date);
    
    return sprintf('%s %s', date('d', $ts), $monthsMap[date('n', $ts)]);
}

function clear_array(array $data = [])
{
    return array_diff($data, ['', NULL, false]);
}

/**
 * 
 * @param int $month
 * @param int $index
 * @return int
 */
function makeLectureNumber($month, $index)
{
    return (($month * 100) + ($index + 1));
}

/**
 * @param int $value
 * @return string
 */
function getStringNumber($value)
{
    $map = [
        1 => 'Первый',
        2 => 'Второй',
        3 => 'Третий',
        4 => 'Четвертый',
        5 => 'Пятый',
        6 => 'Шестой',
        7 => 'Седьмой',
        8 => 'Восьмой',
        9 => 'Девятый',
        10 => 'Десятый',
        11 => 'Одинадцатый',
        12 => 'Двенадцатый',
        13 => 'Тринадцатый',
        14 => 'Четырнадцатый',
        15 => 'Пятнадцатый',
        16 => 'Шестнадцатый',
        17 => 'Семнадцатый',
        18 => 'Восемнадцатый',
        19 => 'Девятнадцатый',
        20 => 'Двадцатый',
        21 => 'Двадцать первый',
        22 => 'Двадцать второй',
        23 => 'Двадцать третий',
        24 => 'Двадцать четвертый'
    ];
    
    return isset($map[(int) $value])?$map[(int) $value]:'???';
}


/**
 * @param string $code
 * @return string
 */
function getPayWorkshop($code)
{
    $ci = & get_instance();
    
    return sprintf(
        '%s/external/pay/?code=%s&target=workshop',
        getSchoolUrl(),
        $code
    );
}

/**
 * @param string $code
 * @param string $date
 * @param string $type
 * @param bool $full
 * @return string
 */
function getPayCourse($code, $date, $type, $full = true)
{
    $ci = & get_instance();
    
    return sprintf(
        '%s/external/pay/?code=%s&group=%s&type=%s&period=%s',
        getSchoolUrl(),
        $code,
        date('d.m.Y', strtotime($date)),
        $type,
        (($full)?'full':'month')
    );
}

/**
 * @return string
 */
function getSchoolUrl()
{
    return get_instance()->config->item('school_url');
}

/**
 * @param array $item
 * @return string
 */
function getMetaKeywords($item = [])
{
    if (isset($item['page_keywords']) && empty($item['page_keywords']) === false) {
        return $item['page_keywords'];
    }
    
    return META_KEYWORDS;
}

/**
 * @param array $item
 * @return string
 */
function getMetaDescription($item = [])
{
    if (isset($item['page_description']) && empty($item['page_description']) === false) {
        return $item['page_description'];
    }
    
    return META_DESCRIPTION;
}