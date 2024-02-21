<?php

    $getList = file_get_contents('https://raw.githubusercontent.com/ippscan/ippscanTEAM/main/ippscan-warp?v1.'.time());
    $strings = explode("\n", $getList);

    $warp = "//profile-title: base64:V0FSUCAoSVJDRik=\n";
    $warp .= "//profile-update-interval: 6\n";
    $warp .= "//support-url: https://t.me/ircfspace\n";
    $warp .= "//profile-web-page-url: https://ircf.space\n\n";
    $warp .= "warp://auto#WarpIR&&detour=warp://auto?ifp=10-20&ifps=40-100&ifpd=10-200#WarpInWarp";

    $i = 1;
    $pattern = '/^warp:\/\/.*$/';
    foreach ($strings as $val) {
        if ( $i > 3) {
            break;
        }
        if (preg_match($pattern, $val)) {
            $warp .= "\n".$val;
        }
        $i++;
    }

    file_put_contents("export/warp", $warp);