<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function __get_date($str, $type=1) {
    $str = strtotime($str);
    if ($type == 1) return date('d/m/Y', $str);
    elseif ($type == 2) return date('d ',$str).__get_month(date('m',$str)).date(' Y', $str);
    elseif ($type == 3) return date('d/m/Y H:i', $str);
    elseif ($type == 4) return date('d/m/Y H:i:s', $str);
    elseif ($type == 5) return date('d ',$str).__get_month(date('m',$str)).date(' Y H:i',$str);
    else return __get_day(date('Y-m-d', $str)) . ', ' . date('d/m/Y', $str);
}

function __get_upload_file($file, $type=1) {
    $CI =& get_instance();
    if (!$file) return '';
    if ($type == 1)
        return $CI -> config -> config['upload']['host'] . $CI -> config -> config['upload']['media']['path'] . $file;
    elseif ($type == 2)
        return $CI -> config -> config['upload']['host'] . $CI -> config -> config['upload']['gallery']['path'] . $file;
    elseif ($type == 3)
        return $CI -> config -> config['upload']['host'] . $CI -> config -> config['upload']['slideshow']['path'] . $file;
    elseif ($type == 4)
        return $CI -> config -> config['upload']['host'] . $CI -> config -> config['upload']['testimonial']['path'] . $file;
    elseif ($type == 5)
        return $CI -> config -> config['upload']['host'] . $CI -> config -> config['upload']['events']['path'] . $file;
    elseif ($type == 6)
        return $CI -> config -> config['upload']['host'] . $CI -> config -> config['upload']['marketplace']['path'] . $file;
    else
        return $CI -> config -> config['upload']['host'] . $CI -> config -> config['upload']['category_cover']['path'] . $file;
}

function __get_month($date) {
    $date = (int) date('m', strtotime($date));
    $arr = array('Januari', 'Febuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    return $arr[$date];
}

function __get_day($date) {
    $date = (int) date('w', strtotime($date));
    $arr = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
    return $arr[$date];
}

function __get_categories_products() {
    $CI =& get_instance();
    $CI -> load -> model('home/Home_model');
    $menus = $CI -> Home_model -> __get_categories_product();
    $res = '<ul>';
    foreach ($menus as $key => $v) {
        $res .= '<li>';
        $res .= '<a href="'.base_url('collections/' . $v -> cslug).'">'.strtoupper($v -> cname).'</a>';
        $res .= '</li>';
    }
    $res .= '</ul>';
    return $res;
}

function __get_cover_collection($id) {
    $CI =& get_instance();
    $CI -> load -> model('product/Products_model');
    $data = $CI -> Products_model -> __get_category_cover($id);
    $cover = __get_upload_file($data[0] -> ccover,7);
    return $cover;
}

function __get_menus() {
    $CI =& get_instance();
    $CI -> load -> model('home/Home_model');
    $menus = $CI -> Home_model -> __get_menus(0);
    $res = '';
    foreach ($menus as $key => $v) {
        $res .= '<li>';
        $childs = $CI -> Home_model -> __get_menus($v -> pid);
        if (count($childs) > 0) {
            $res .= '<a href="#" class="sf-with-ul">'.strtoupper($v -> ptitle).'</a>';
            $res .= '<ul>';
            foreach ($childs as $k1 => $v1) {
                $res .= '<li>';
                $res .= '<a href="'.base_url($v -> pslug . '/' . $v1 -> pslug).'">'.$v1 -> ptitle.'</a>';
                $res .= '</li>';
            }
            $res .= '</ul>';
        }
        else {
            $res .= '<a href="'.base_url($v -> pslug . '/' . $v -> pslug).'">'.strtoupper($v -> ptitle).'</a>';
        }
        $res .= '</li>';
    }
    return $res;
}

function __grep_image_url($html) {
    preg_match_all("/src=[\"\']?([^\"\']?.*(png|jpg|jpeg|gif))[\"\']?/i",$html, $result);
    if (!empty($result[1][0])) {
        return $result[1][0];
    }
    else {
        preg_match_all('/src="([^"]+)"/',$html, $result);
        if (!empty($result[0][0])) {
            preg_match('/(http(s|):|)\/\/(www\.|)yout(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $result[0][0], $results);
            if (!empty($results[6])) return 'https://img.youtube.com/vi/'.$results[6].'/0.jpg';
        }
    }
}

function __limit_word($text, $limit) {
    $text = strip_tags($text);
    $strings = $text;
    if (strlen($text) > $limit) {
        $words = str_word_count($text, 2);
        $pos = array_keys($words);
        if(sizeof($pos) > $limit) {
            $text = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
    }
    return $text;
}

function __get_image_url($text) {
    preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $text, $result);
    return isset($result[1]) ? $result[1] : '';
}

function limit_text($text, $limit) {
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos = array_keys($words);
        $text = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}

function __price_format($price) {
    return ($price / 1000) . 'K';
}

function __generate_schema($detail, $type) {
    $data = [];
    if ($type === 1) {
        $data = [
            ["@context" => "http://schema.org/"],
            ["@graph" => [
                [
                    "@type" => ["LocalBusiness", "Organization"],
                    "name" => $detail['title'],
                    "url" => base_url($_SERVER['REQUEST_URI']),
                    "image" => "https://gamesir.id/assets/images/logo-white-3.png",
                    "email" => "ask@gamesir.id",
                    "contactPoint" => [
                        "@type" => "ContactPoint",
                        "telephone" => "+62-882-1101-0000",
                        "contactType" => "Customer service",
                        "email" => "ask@gamesir.id",
                    ],
                    "openingHours" => "Mo,Tu,We,Th,Fr,Sa 09:00-18:00",
                    "openingHoursSpecification" => [
                        "@type" => "OpeningHoursSpecification",
                        "dayOfWeek" => [
                            "Monday",
                            "Tuesday",
                            "Wednesday",
                            "Thursday",
                            "Friday",
                            "Saturday"
                        ],
                        "opens" => "09:00",
                        "closes" => "18:00"
                    ]
                ],
                [
                    "@type" => "WebSite",
                    "author" => "GameSir Indonesia Team",
                    "name" => $detail['title'],
                    "description" => $detail['description'],
                    "alternateName" => $detail['title'],
                    "url" => base_url($_SERVER['REQUEST_URI']),
                    "@id" => base_url($_SERVER['REQUEST_URI']) . '#website',
                    "contactPoint" => [
                        "@type" => "ContactPoint",
                        "telephone" => "+62-882-1101-0000",
                        "contactType" => "Customer service"
                    ]
                ]
            ]]
        ];
    }
    return json_encode($data);
}