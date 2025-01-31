<?php

use App\Models\BlogPost;
use App\Models\Page;
use App\Settings\GeneralSettings;
use App\Settings\LanguageSettings;
use App\Settings\SassFeatures;
use App\Settings\ToolSlugSettings;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

if( ! function_exists( 'storage_url' ) ) {
    function storage_url($param) {
        return url( Storage::url($param) );
    }
}

if( ! function_exists( 'unique_public_id' ) ) {
    function unique_public_id($limit = 9) {
    return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    }
}

if( ! function_exists( 'is_cloudflare_https' ) ) {
    function is_cloudflare_https() {
        return isset($_SERVER['HTTPS']) ||
            (isset($_SERVER['HTTP_CF_VISITOR']) && (($visitor = json_decode($_SERVER['HTTP_CF_VISITOR'])) &&
                $visitor->scheme == 'https'));
    }
}

if( ! function_exists( 'country_name' ) ) {
    function country_name( $code ) {
        $countryList = array(
            "AF" => "Afghanistan",
            "AL" => "Albania",
            "DZ" => "Algeria",
            "AS" => "American Samoa",
            "AD" => "Andorra",
            "AO" => "Angola",
            "AI" => "Anguilla",
            "AQ" => "Antarctica",
            "AG" => "Antigua and Barbuda",
            "AR" => "Argentina",
            "AM" => "Armenia",
            "AW" => "Aruba",
            "AU" => "Australia",
            "AT" => "Austria",
            "AZ" => "Azerbaijan",
            "BS" => "Bahamas",
            "BH" => "Bahrain",
            "BD" => "Bangladesh",
            "BB" => "Barbados",
            "BY" => "Belarus",
            "BE" => "Belgium",
            "BZ" => "Belize",
            "BJ" => "Benin",
            "BM" => "Bermuda",
            "BT" => "Bhutan",
            "BO" => "Bolivia",
            "BA" => "Bosnia and Herzegovina",
            "BW" => "Botswana",
            "BV" => "Bouvet Island",
            "BR" => "Brazil",
            "BQ" => "British Antarctic Territory",
            "IO" => "British Indian Ocean Territory",
            "VG" => "British Virgin Islands",
            "BN" => "Brunei",
            "BG" => "Bulgaria",
            "BF" => "Burkina Faso",
            "BI" => "Burundi",
            "KH" => "Cambodia",
            "CM" => "Cameroon",
            "CA" => "Canada",
            "CT" => "Canton and Enderbury Islands",
            "CV" => "Cape Verde",
            "KY" => "Cayman Islands",
            "CF" => "Central African Republic",
            "TD" => "Chad",
            "CL" => "Chile",
            "CN" => "China",
            "CX" => "Christmas Island",
            "CC" => "Cocos [Keeling] Islands",
            "CO" => "Colombia",
            "KM" => "Comoros",
            "CG" => "Congo - Brazzaville",
            "CD" => "Congo - Kinshasa",
            "CK" => "Cook Islands",
            "CR" => "Costa Rica",
            "HR" => "Croatia",
            "CU" => "Cuba",
            "CY" => "Cyprus",
            "CZ" => "Czech Republic",
            "CI" => "Côte d’Ivoire",
            "DK" => "Denmark",
            "DJ" => "Djibouti",
            "DM" => "Dominica",
            "DO" => "Dominican Republic",
            "NQ" => "Dronning Maud Land",
            "DD" => "East Germany",
            "EC" => "Ecuador",
            "EG" => "Egypt",
            "SV" => "El Salvador",
            "GQ" => "Equatorial Guinea",
            "ER" => "Eritrea",
            "EE" => "Estonia",
            "ET" => "Ethiopia",
            "FK" => "Falkland Islands",
            "FO" => "Faroe Islands",
            "FJ" => "Fiji",
            "FI" => "Finland",
            "FR" => "France",
            "GF" => "French Guiana",
            "PF" => "French Polynesia",
            "TF" => "French Southern Territories",
            "FQ" => "French Southern and Antarctic Territories",
            "GA" => "Gabon",
            "GM" => "Gambia",
            "GE" => "Georgia",
            "DE" => "Germany",
            "GH" => "Ghana",
            "GI" => "Gibraltar",
            "GR" => "Greece",
            "GL" => "Greenland",
            "GD" => "Grenada",
            "GP" => "Guadeloupe",
            "GU" => "Guam",
            "GT" => "Guatemala",
            "GG" => "Guernsey",
            "GN" => "Guinea",
            "GW" => "Guinea-Bissau",
            "GY" => "Guyana",
            "HT" => "Haiti",
            "HM" => "Heard Island and McDonald Islands",
            "HN" => "Honduras",
            "HK" => "Hong Kong SAR China",
            "HU" => "Hungary",
            "IS" => "Iceland",
            "IN" => "India",
            "ID" => "Indonesia",
            "IR" => "Iran",
            "IQ" => "Iraq",
            "IE" => "Ireland",
            "IM" => "Isle of Man",
            "IL" => "Israel",
            "IT" => "Italy",
            "JM" => "Jamaica",
            "JP" => "Japan",
            "JE" => "Jersey",
            "JT" => "Johnston Island",
            "JO" => "Jordan",
            "KZ" => "Kazakhstan",
            "KE" => "Kenya",
            "KI" => "Kiribati",
            "KW" => "Kuwait",
            "KG" => "Kyrgyzstan",
            "LA" => "Laos",
            "LV" => "Latvia",
            "LB" => "Lebanon",
            "LS" => "Lesotho",
            "LR" => "Liberia",
            "LY" => "Libya",
            "LI" => "Liechtenstein",
            "LT" => "Lithuania",
            "LU" => "Luxembourg",
            "MO" => "Macau SAR China",
            "MK" => "Macedonia",
            "MG" => "Madagascar",
            "MW" => "Malawi",
            "MY" => "Malaysia",
            "MV" => "Maldives",
            "ML" => "Mali",
            "MT" => "Malta",
            "MH" => "Marshall Islands",
            "MQ" => "Martinique",
            "MR" => "Mauritania",
            "MU" => "Mauritius",
            "YT" => "Mayotte",
            "FX" => "Metropolitan France",
            "MX" => "Mexico",
            "FM" => "Micronesia",
            "MI" => "Midway Islands",
            "MD" => "Moldova",
            "MC" => "Monaco",
            "MN" => "Mongolia",
            "ME" => "Montenegro",
            "MS" => "Montserrat",
            "MA" => "Morocco",
            "MZ" => "Mozambique",
            "MM" => "Myanmar [Burma]",
            "NA" => "Namibia",
            "NR" => "Nauru",
            "NP" => "Nepal",
            "NL" => "Netherlands",
            "AN" => "Netherlands Antilles",
            "NT" => "Neutral Zone",
            "NC" => "New Caledonia",
            "NZ" => "New Zealand",
            "NI" => "Nicaragua",
            "NE" => "Niger",
            "NG" => "Nigeria",
            "NU" => "Niue",
            "NF" => "Norfolk Island",
            "KP" => "North Korea",
            "VD" => "North Vietnam",
            "MP" => "Northern Mariana Islands",
            "NO" => "Norway",
            "OM" => "Oman",
            "PC" => "Pacific Islands Trust Territory",
            "PK" => "Pakistan",
            "PW" => "Palau",
            "PS" => "Palestinian Territories",
            "PA" => "Panama",
            "PZ" => "Panama Canal Zone",
            "PG" => "Papua New Guinea",
            "PY" => "Paraguay",
            "YD" => "People's Democratic Republic of Yemen",
            "PE" => "Peru",
            "PH" => "Philippines",
            "PN" => "Pitcairn Islands",
            "PL" => "Poland",
            "PT" => "Portugal",
            "PR" => "Puerto Rico",
            "QA" => "Qatar",
            "RO" => "Romania",
            "RU" => "Russia",
            "RW" => "Rwanda",
            "RE" => "Réunion",
            "BL" => "Saint Barthélemy",
            "SH" => "Saint Helena",
            "KN" => "Saint Kitts and Nevis",
            "LC" => "Saint Lucia",
            "MF" => "Saint Martin",
            "PM" => "Saint Pierre and Miquelon",
            "VC" => "Saint Vincent and the Grenadines",
            "WS" => "Samoa",
            "SM" => "San Marino",
            "SA" => "Saudi Arabia",
            "SN" => "Senegal",
            "RS" => "Serbia",
            "CS" => "Serbia and Montenegro",
            "SC" => "Seychelles",
            "SL" => "Sierra Leone",
            "SG" => "Singapore",
            "SK" => "Slovakia",
            "SI" => "Slovenia",
            "SB" => "Solomon Islands",
            "SO" => "Somalia",
            "ZA" => "South Africa",
            "GS" => "South Georgia and the South Sandwich Islands",
            "KR" => "South Korea",
            "ES" => "Spain",
            "LK" => "Sri Lanka",
            "SD" => "Sudan",
            "SR" => "Suriname",
            "SJ" => "Svalbard and Jan Mayen",
            "SZ" => "Swaziland",
            "SE" => "Sweden",
            "CH" => "Switzerland",
            "SY" => "Syria",
            "ST" => "São Tomé and Príncipe",
            "TW" => "Taiwan",
            "TJ" => "Tajikistan",
            "TZ" => "Tanzania",
            "TH" => "Thailand",
            "TL" => "Timor-Leste",
            "TG" => "Togo",
            "TK" => "Tokelau",
            "TO" => "Tonga",
            "TT" => "Trinidad and Tobago",
            "TN" => "Tunisia",
            "TR" => "Turkey",
            "TM" => "Turkmenistan",
            "TC" => "Turks and Caicos Islands",
            "TV" => "Tuvalu",
            "UM" => "U.S. Minor Outlying Islands",
            "PU" => "U.S. Miscellaneous Pacific Islands",
            "VI" => "U.S. Virgin Islands",
            "UG" => "Uganda",
            "UA" => "Ukraine",
            "SU" => "Union of Soviet Socialist Republics",
            "AE" => "United Arab Emirates",
            "GB" => "United Kingdom",
            "US" => "United States",
            "ZZ" => "Unknown or Invalid Region",
            "UY" => "Uruguay",
            "UZ" => "Uzbekistan",
            "VU" => "Vanuatu",
            "VA" => "Vatican City",
            "VE" => "Venezuela",
            "VN" => "Vietnam",
            "WK" => "Wake Island",
            "WF" => "Wallis and Futuna",
            "EH" => "Western Sahara",
            "YE" => "Yemen",
            "ZM" => "Zambia",
            "ZW" => "Zimbabwe",
            "AX" => "Åland Islands",
        );

        $code = strtoupper($code);

        return isset($countryList[ $code ]) ? $countryList[ $code ] : 'Unknown';
    }
}

function is_valid_locale($code) {
    $settings = app(LanguageSettings::class);

    foreach($settings->languages as $language) {
        if($language['code'] == $code)
            return true;
    }

    return false;
}

if( !function_exists('get_locale') ) {
    function get_locale() {
        $settings = app(LanguageSettings::class);

        $code = strtolower(trim(app()->getLocale()));

        foreach($settings->languages as $language)
            if($code == strtolower(trim($language['code'])))
                return $language;

        if($code == 'en')
            return [
                'label' => 'English',
                'flag'  => 'GB',
                'code'  => 'en',
                'direction' => 'ltr'
            ];

        return null;
    }
}

if( !function_exists('get_tool_title_from_key') ) {
    function get_tool_title_from_key($name) {
        $settings = app(LanguageSettings::class);

        if($settings->translateTools) {
            foreach(config('tools.categories') as $cats) {
                foreach($cats['tools'] as $toolKey => $tool) {
                    if($toolKey == $name) {
                        return trans('webtools/tools/' . $tool['name'] . '.title');
                        break;
                    }
                }
            }
        }


        foreach(config('tools.categories') as $cats) {
            foreach($cats['tools'] as $toolKey => $tool) {
                if($toolKey == $name) {
                    $setts = app($tool['settings']);

                    return $setts->title;
                    break;
                }
            }
        }

        return 'Unknown';
    }
}

if( !function_exists('get_tool_title') ) {
    function get_tool_title($name, $default) {
        $settings = app(LanguageSettings::class);

        if($settings->translateTools)
            return str_replace("\\/", '/', trans('webtools/tools/' . $name . '.title'));

        return str_replace("\\/", '/', $default);
    }
}

if( !function_exists('get_tool_summary') ) {
    function get_tool_summary($name, $default) {
        $settings = app(LanguageSettings::class);

        if($settings->translateTools)
            return str_replace("\\/", '/', trans('webtools/tools/' . $name . '.summary'));

        return str_replace("\\/", '/', $default);
    }
}

if( !function_exists('get_tool_description') ) {
    function get_tool_description($name, $default) {
        $settings = app(LanguageSettings::class);

        if($settings->translateTools)
            return str_replace("\\/", '/', trans('webtools/tools/' . $name . '.description'));

        return str_replace("\\/", '/', $default);
    }
}

function web_protocol() {
	return ((isset($_SERVER["HTTPS"]) && ($_SERVER["HTTPS"] == "on")) || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == "https") ? "https" : "http") . "://";
}

function get_domain($url) {
	if(preg_match("#https?://#", $url) === 0) {
		$url = web_protocol() . $url;
	}
    $exp = explode('.', $url);
    if(count($exp) == 2) {
        return strtolower(parse_url($url, PHP_URL_HOST));
    } else {
        if(strpos($exp[0], 'www.') !== false) {
            $exp[0] = str_ireplace('www.', '', $exp[0]);
        }
        return strtolower(parse_url(join('.', $exp), PHP_URL_HOST));
    }
}

function get_tld($domain) {
	$domain = "https://".$domain;
	$ext = pathinfo($domain, PATHINFO_EXTENSION);
	return "." . $ext;
}

function getClientIp() {
    $ipAddress = '';
    if (! empty($_SERVER['HTTP_CLIENT_IP'])) {
        // to get shared ISP IP address
        $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // check for IPs passing through proxy servers
        // check if multiple IP addresses are set and take the first one
        $ipAddressList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        foreach ($ipAddressList as $ip) {
            if (! empty($ip)) {
                // if you prefer, you can check for valid IP address here
                $ipAddress = $ip;
                break;
            }
        }
    } else if (! empty($_SERVER['HTTP_X_FORWARDED'])) {
        $ipAddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (! empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
        $ipAddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    } else if (! empty($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (! empty($_SERVER['HTTP_FORWARDED'])) {
        $ipAddress = $_SERVER['HTTP_FORWARDED'];
    } else if (! empty($_SERVER['REMOTE_ADDR'])) {
        $ipAddress = $_SERVER['REMOTE_ADDR'];
    }

    if($ipAddress)
        return $ipAddress;

    return 'Not Found';
}

function generate_new_sitemap() {
    $slugs   = app(ToolSlugSettings::class);
    $sitemap = '
	<?xml version="1.0" encoding="UTF-8"?>
	<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
    <url>
        <loc>' . url('') . '</loc>
        <lastmod>' . date('c', time()) . '</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>' . "\n";

    $settings = DB::table('settings')->where('name', 'enabled')->get([ 'group', 'payload' ]);
    $status = [];

    foreach($settings as $item) {
        $status[str_replace('tool-', '', $item->group)] = $item->payload;
    };

    $toolSlugs = app(ToolSlugSettings::class);
    foreach(config('tools.categories') as $category) {
        foreach($category['tools'] as $key => $tool) {
            if(isset($slugs->{$key}) && $status[$tool['name']] === 'true') {
                $sitemap .= '
	<url>
		<loc>' . url('tool/' . $toolSlugs->{$key}) . '</loc>
		<lastmod>' . date('c', time()) . '</lastmod>
		<changefreq>daily</changefreq>
		<priority>0.8</priority>
	</url>' . "\n";
            }
        }
    }

    foreach(Page::all() as $page) {
        $sitemap .= '
        <url>
            <loc>' . url('page/website-status-checker') . '</loc>
            <lastmod>' . date('c', time()) . '</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.6</priority>
        </url>' . "\n";
    }

    if(app(GeneralSettings::class)->contactPage) {
        $sitemap .= '
	<url>
		<loc>' . url('contact') . '</loc>
		<lastmod>' . date('c', time()) . '</lastmod>
		<changefreq>daily</changefreq>
		<priority>0.6</priority>
	</url>' . "\n";
    }

    if(app(GeneralSettings::class)->blogSection) {
        $sitemap .= '
	<url>
		<loc>' . url('blog') . '</loc>
		<lastmod>' . date('c', time()) . '</lastmod>
		<changefreq>daily</changefreq>
		<priority>0.6</priority>
	</url>' . "\n";

        foreach(BlogPost::all() as $post) {
            $sitemap .= '
	<url>
		<loc>' . url('blog/' . $post->slug) . '</loc>
		<lastmod>' . date('c', time()) . '</lastmod>
		<changefreq>daily</changefreq>
		<priority>0.6</priority>
	</url>' . "\n";
        }
    }
	$sitemap .= '	</urlset>';
    file_put_contents(public_path('sitemap.xml'), trim($sitemap));
    return true;
}

function can_use($tool) {
    $settings = app(SassFeatures::class);

    if(auth()->check() && auth()->user()->premium())
        return true;

    if(!in_array($tool, $settings->premiumTools))
        return true;

    return false;
}

function str_rot($s, $n = 13) {
    $n = $n % 26;
    if (!$n) return $s;
    for ($i = 0, $l = strlen($s); $i < $l; $i++) {
        $c = ord($s[$i]);
        if ($c >= 97 && $c <= 122) {
          $s[$i] = chr(($c - 71 + $n) % 26 + 97);
        } else if ($c >= 65 && $c <= 90) {
          $s[$i] = chr(($c - 39 + $n) % 26 + 65);
        }
    }
    return $s;
}

function filter_url($input) {
    // Remove the http://, www., and slash(/) from the URL

    // If URI is like, eg. www.way2tutorial.com/
    $input = trim($input, '/');

    // If not have http:// or https:// then prepend it
    if (!preg_match('#^http(s)?://#', $input)) {
        $input = 'http://' . $input;
    }

    $urlParts = parse_url($input);

    // Remove www.
    $domain_name = @preg_replace('/^www\./', '', $urlParts['host']);

    // Output way2tutorial.com
    return $domain_name;
}

function is_valid_url($url){
    if ($ret = parse_url($url)) {
        if (!isset($ret["scheme"])) {
            $url = "http://" . $url;
        }
    }

    return filter_var($url, FILTER_VALIDATE_URL);
}

function getBrowser() {
  $u_agent = $_SERVER['HTTP_USER_AGENT'];
  $bname = 'Unknown';
  $platform = 'Unknown';
  $version= "";

  //First get the platform?
  if (preg_match('/linux/i', $u_agent)) {
    $platform = 'linux';
  }elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
    $platform = 'mac';
  }elseif (preg_match('/windows|win32/i', $u_agent)) {
    $platform = 'windows';
  }

  // Next get the name of the useragent yes seperately and for good reason
  if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)){
    $bname = 'Internet Explorer';
    $ub = "MSIE";
  }elseif(preg_match('/Firefox/i',$u_agent)){
    $bname = 'Mozilla Firefox';
    $ub = "Firefox";
  }elseif(preg_match('/OPR/i',$u_agent)){
    $bname = 'Opera';
    $ub = "Opera";
  }elseif(preg_match('/Chrome/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){
    $bname = 'Google Chrome';
    $ub = "Chrome";
  }elseif(preg_match('/Safari/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){
    $bname = 'Apple Safari';
    $ub = "Safari";
  }elseif(preg_match('/Netscape/i',$u_agent)){
    $bname = 'Netscape';
    $ub = "Netscape";
  }elseif(preg_match('/Edge/i',$u_agent)){
    $bname = 'Edge';
    $ub = "Edge";
  }elseif(preg_match('/Trident/i',$u_agent)){
    $bname = 'Internet Explorer';
    $ub = "MSIE";
  }

  // finally get the correct version number
  $known = array('Version', $ub, 'other');
  $pattern = '#(?<browser>' . join('|', $known) .
')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
  if (!preg_match_all($pattern, $u_agent, $matches)) {
    // we have no matching number just continue
  }
  // see how many we have
  $i = count($matches['browser']);
  if ($i != 1) {
    //we will have two since we are not using 'other' argument yet
    //see if version is before or after the name
    if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
        $version= $matches['version'][0];
    }else {
        $version= $matches['version'][1];
    }
  }else {
    $version= $matches['version'][0];
  }

  // check if we have a number
  if ($version==null || $version=="") {$version="?";}

  return array(
    'userAgent' => $u_agent,
    'name'      => $bname,
    'version'   => $version,
    'platform'  => $platform,
    'pattern'    => $pattern
  );
}

function arrayToXml($array, &$xml){
    if($array != null){
        foreach ($array as $key => $value) {
            if(is_int($key)){
                $key = "e";
            }
            if(is_array($value)){
                $label = $xml->addChild($key);
                arrayToXml($value, $label);
            }
            else {
                $xml->addChild($key, $value);
            }
        }
    }
}

function pingDomain($domain, $port_number){

    $starttime = microtime(true);
    $file      = @fsockopen($domain, $port_number, $errno, $errstr, 10);
    $stoptime  = microtime(true);
    $status    = 0;

    if (!$file) {
        $status = -1;  // Site is down

    } else {

        fclose($file);
        $status = ($stoptime - $starttime) * 1000;
        $status = floor($status);
    }
    return $status;
}

function pretty_json( $json )
{
    $result = '';
    $level = 0;
    $in_quotes = false;
    $in_escape = false;
    $ends_line_level = NULL;
    $json_length = strlen( $json );

    for( $i = 0; $i < $json_length; $i++ ) {
        $char = $json[$i];
        $new_line_level = NULL;
        $post = "";
        if( $ends_line_level !== NULL ) {
            $new_line_level = $ends_line_level;
            $ends_line_level = NULL;
        }
        if ( $in_escape ) {
            $in_escape = false;
        } else if( $char === '"' ) {
            $in_quotes = !$in_quotes;
        } else if( ! $in_quotes ) {
            switch( $char ) {
                case '}': case ']':
                    $level--;
                    $ends_line_level = NULL;
                    $new_line_level = $level;
                    break;

                case '{': case '[':
                    $level++;
                case ',':
                    $ends_line_level = $level;
                    break;

                case ':':
                    $post = " ";
                    break;

                case " ": case "\t": case "\n": case "\r":
                    $char = "";
                    $ends_line_level = $new_line_level;
                    $new_line_level = NULL;
                    break;
            }
        } else if ( $char === '\\' ) {
            $in_escape = true;
        }
        if( $new_line_level !== NULL ) {
            $result .= "\n".str_repeat( "\t", $new_line_level );
        }
        $result .= $char.$post;
    }

    return $result;
}

function is_localhost($whitelist = ['127.0.0.1', '::1']) {
    return isset($_SERVER) && isset($_SERVER['REMOTE_ADDR']) && in_array($_SERVER['REMOTE_ADDR'], $whitelist);
}

function isValidXml($content)
{
    $content = trim($content);
    if (empty($content)) {
        return false;
    }
    //html go to hell!
    if (stripos($content, '<!DOCTYPE html>') !== false) {
        return false;
    }

    libxml_use_internal_errors(true);
    simplexml_load_string($content);
    $errors = libxml_get_errors();          
    libxml_clear_errors();  

    return empty($errors);
}