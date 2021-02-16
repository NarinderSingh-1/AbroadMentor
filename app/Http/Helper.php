<?php

if (!function_exists('currentUser')) {
    function currentUser() {
        $auth = app('Auth');
        return $auth::User();
    }    
}


if (!function_exists('getHash')) {
    function getHash($id) {
        $user = currentUser();
        return md5(env('APP_KEY') . '~' . $id . '~' . getIP() . '~' . ($user ? $user->id : null));
    }

}

if (!function_exists('alert')) {
    function alert($type, $message) {
        return ['alert-type' => $type, 'message' => $message];
    }

}

if (!function_exists('toastr')) {

    function toastr($type = null, $msg = null) {
        if (\Session::has('message') || $type != null) {
            $type = $type ? $type : Session::get('alert-type', 'info');
            $msg = $msg ? $msg : Session::get('message');
            
            if(is_array($msg)) {
                $msg = implode("<br/>", $msg);
            }
            
            $script = '<style type="text/css">
                #toast-container {top: auto !important; right: auto !important; bottom: 10%; left:7%;}
            </style>
            <script type="text/javascript">
                var type = "'. $type .'", cls = "red";
                switch(type){
                    case "info":
                        cls = "light-blue";
                        break;

                    case "warning":
                        cls = "orange darken-2";
                        break;

                    case "success":
                        cls = "green darken-2";
                        break;

                    case "error":
                        cls = "red darken-2";
                        break;
                }
                
                Materialize.toast("'. $msg .'", 5000, cls);
            </script>';
            
            return $script;
        }
    }

}

if (!function_exists('getFavicon')) {

    function getFavicon($echo = true) {
        $path = 'assets/images/favicon'; // Bucket Path
        $icon = '<link rel="icon" type="image/png" href="' . awsUrl($path . '/favicon.png') . '" />';
        $icon .= '<link rel="apple-touch-icon" sizes="57x57" href="' . awsUrl($path . '/apple-icon-57x57.png') . '">';
        $icon .= '<link rel="apple-touch-icon" sizes="60x60" href="' . awsUrl($path . '/apple-icon-60x60.png') . '">';
        $icon .= '<link rel="apple-touch-icon" sizes="72x72" href="' . awsUrl($path . '/apple-icon-72x72.png') . '">';
        $icon .= '<link rel="apple-touch-icon" sizes="76x76" href="' . awsUrl($path . '/apple-icon-76x76.png') . '">';
        $icon .= '<link rel="apple-touch-icon" sizes="114x114" href="' . awsUrl($path . '/apple-icon-114x114.png') . '">';
        $icon .= '<link rel="apple-touch-icon" sizes="120x120" href="' . awsUrl($path . '/apple-icon-120x120.png') . '">';
        $icon .= '<link rel="apple-touch-icon" sizes="144x144" href="' . awsUrl($path . '/apple-icon-144x144.png') . '">';
        $icon .= '<link rel="apple-touch-icon" sizes="152x152" href="' . awsUrl($path . '/apple-icon-152x152.png') . '">';
        $icon .= '<link rel="apple-touch-icon" sizes="180x180" href="' . awsUrl($path . '/apple-icon-180x180.png') . '">';
        $icon .= '<link rel="icon" type="image/png" sizes="192x192" href="' . awsUrl($path . '/android-icon-192x192.png') . '">';
        $icon .= '<link rel="icon" type="image/png" sizes="32x32" href="' . awsUrl($path . '/favicon-32x32.png') . '">';
        $icon .= '<link rel="icon" type="image/png" sizes="96x96" href="' . awsUrl($path . '/favicon-96x96.png') . '">';
        $icon .= '<link rel="icon" type="image/png" sizes="16x16" href="' . awsUrl($path . '/favicon-16x16.png') . '">';
        $icon .= '<link rel="manifest" href="' . URL::asset($path . '/manifest.json') . '">';
        $icon .= '<meta name="msapplication-TileColor" content="#ffffff">';
        $icon .= '<meta name="msapplication-TileImage" content="' . awsUrl($path . '/ms-icon-144x144.png') . '">';
        $icon .= '<meta name="theme-color" content="#ffffff">';

        if ($echo) {
            echo $icon;
        } else {
            return $echo;
        }
    }

}

/**
 * Get images from cdn path
 * @param type $path
 * @param type $fromRoot  If True then it will select from root
 * @return type
 */
function awsUrl($path, $fromRoot = false) {
    if (env('CUSTOMIZED_IMAGE_PATHS')) { //T9085 : Added customizable images for crm
        $customImages = explode(',', env('CUSTOMIZED_IMAGE_PATHS'));
        $fromRoot = in_array(basename($path), $customImages) ? false : $fromRoot;
    }

    if (env('S3_CACHE_URL')) { // IF S3 Cache URL exists
        return rtrim(env('S3_CACHE_URL'), "/") . "/" . ($fromRoot ? 'allcommon' : env('AWS_BUCKET')) . "/" . $path;
    }

    return '';
}

if (!function_exists('getIP')) {

    function getIP() {
        $ip = 0;
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (array_map('trim', explode(',', $_SERVER[$key])) as $ip) {
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }
        return $ip;
    }

}

$_SERVER['REMOTE_ADDR'] = getIP();



if (!function_exists('isMember')) {

    function isMember() {
        $user = currentUser();
        if (!$user) {
            return false;
        }
        if ($user->is_member == 1) {
            return true;
        }
        return false;
    }

}

if(!function_exists('profileSlug')) {
    function profileSlug($slug) {
        return trim(preg_replace("/[^a-z0-9-]+/", "-", strtolower(trim($slug))), '-');
    }
}

if (!function_exists('getSearchData')) {
    function getSearchData()
    {
        $cityList    = \App\City::getList();
        $serviceList = \App\Service::getList();
        $categoryList = \App\Category::getList();

        $cities = [];
        foreach ($cityList as $cityName) {
            $cities[ucfirst($cityName)] = null;
        }

        $services = [];
        foreach ($serviceList as $serviceName) {
            $services[$serviceName] = null;
        }
        $categories = [];
        foreach ($categoryList as $categoryName) {
            $categories[$categoryName] = null;
        }

        return '<style type="text/css">
            .autocomplete-content{position: absolute; width: 100%; top: 63px;}
            .loc .caret{right:15px !important; top:3px !important;}
        </style>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $("input#locationAutoComplete").autocomplete({
                    data: ' . json_encode($cities) . ',
                    limit: 10,
                    onAutocomplete: function (data) {
                        if($("input#serviceAutoComplete").val() != "") {
                            $(".loc_search").submit();
                        }
                    },
                    minLength: 1 // The minimum length of the input for the autocomplete to start. Default: 1.
                });

                $("input#serviceAutoComplete").autocomplete({
                    data: ' . json_encode($services) . ',
                    limit: 10,
                    onAutocomplete: function (data) {
                        if($("input#locationAutoComplete").val() != "") {
                            $(".loc_search").submit();
                        }
                    },
                    minLength: 1 // The minimum length of the input for the autocomplete to start. Default: 1.
                });
                $("input#categoryAutoComplete").autocomplete({
                    data: ' . json_encode($categories) . ',
                    limit: 10,
                    onAutocomplete: function (data) {
                        if($("input#locationAutoComplete").val() != "") {
                            $(".loc_search").submit();
                        }
                    },
                    minLength: 1 // The minimum length of the input for the autocomplete to start. Default: 1.
                });
            });
        </script>';
    }
}

if(!function_exists('getPreloader')) {
    function getPreloader() {
        return '<div class="preloader-wrapper big active">
                    <div class="spinner-layer spinner-blue-only">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                    </div>
                </div>';
    }
}