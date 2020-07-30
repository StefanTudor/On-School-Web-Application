<?php

function parseURL($url, $retdata = true)
{
    $url = substr($url, 0, 4) == 'http' ? $url : 'http://' . $url; 
    if ($urldata = parse_url(str_replace('&amp;', '&', $url))) {
        $path_parts = pathinfo($urldata['host']);
        $tmp = explode('.', $urldata['host']);
        $n = count($tmp);
        if ($n >= 2) {
            if ($n == 4 || ($n == 3 && strlen($tmp[($n - 2)]) <= 3)) {
                // extragere domeniu
                $urldata['domain'] = $tmp[($n - 3)] . "." . $tmp[($n - 2)] . "." . $tmp[($n - 1)];
                // extragere top level domain
                $urldata['tld'] = $tmp[($n - 2)] . "." . $tmp[($n - 1)];
                // extragere subdomeniu
                $urldata['subdomain'] = $n == 4 ? $tmp[0] : ($n == 3 && strlen($tmp[($n - 2)]) <= 3) ? $tmp[0] : '';
            } else {
                $urldata['domain'] = $tmp[($n - 2)] . "." . $tmp[($n - 1)];
                $urldata['tld'] = $tmp[($n - 1)];
                $urldata['subdomain'] = $n == 3 ? $tmp[0] : '';
            }
        }

        //Set data
        if ($retdata) {
            return $urldata;
        } else {
            return true;
        }
    } else {
        //invalid URL
        return false;
    }
}

function clearText($text)
{
    $text = trim($text);
    $text = preg_replace('/\s+/', ' ', $text);
    $text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    return $text;
}
