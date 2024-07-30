<?php

function feedback404()
{
    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";

    
}

if (isset($_GET['tunnel'])) {
    $filename = "logs.txt";
    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $target_string = strtolower($_GET['tunnel']);
    foreach ($lines as $item) {
        if (strtolower($item) === $target_string) {
            $BRAND = strtoupper($target_string);
        }    
    }
    if (isset($BRAND)) {
        $BRANDS = $BRAND;
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $fullUrl = $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        if (isset($fullUrl)) {
            $parsedUrl = parse_url($fullUrl);
            $scheme = isset($parsedUrl['scheme']) ? $parsedUrl['scheme'] : '';
            $host = isset($parsedUrl['host']) ? $parsedUrl['host'] : '';
            $path = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';
            $query = isset($parsedUrl['query']) ? $parsedUrl['query'] : '';
            $baseUrl = $scheme . "://" . $host . $path . '?' . $query;
            $url = $baseUrl;
            $dftr = "https://pub-5c57ad3c25aa45e7865a27b305252835.r2.dev/maaf.html";
        } else {
            echo "URL saat ini tidak didefinisikan.";
        }
    } else {
        feedback404();
        exit();
    }
} else {
    feedback404();
    exit();
}

$filename = "logs.txt";
$lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$brand = "";
foreach ($lines as $item) {
    if (strtolower($_GET['tunnel']) === strtolower($item)) {
        $brand = strtoupper($item);
        break;
    }
}

$url  = "https://foodtech.ittelkom-pwt.ac.id/conf/?tunnel=" . $brand;
$amp  = "https://pub-5c57ad3c25aa45e7865a27b305252835.r2.dev/maaf.html?id=" . $brand;
$kw   = "$brand, slot $brand, judi $brand, login $brand,  $brand, livechat $brand, situs $brand, agen $brand, slot online $brand, rtp $brand, bandar $brand, daftar $BRANDS.";
?>

<!doctype html>
<html xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" lang="id-ID">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewkartu" content="width=device-width, initial-scale=1">
    <!-- This is Squarespace. -->
    <base href="">
    <meta charset="utf-8" />
    <title><?php echo $BRANDS ?> 💋 Paling Suka Beri Maxwin #1 Di Indonesia</title>
    <link rel="amphtml" href="<?php echo $amp ?>" />
    <meta http-equiv="Accept-CH" content="Sec-CH-UA-Platform-Version, Sec-CH-UA-Model" />
    <link rel="icon" type="image/x-icon" media="(prefers-color-scheme: light)" href="https://res.cloudinary.com/dqplzxgxy/image/upload/v1718770226/beranda_agx1m2.webp?format=100w" />
    <link rel="icon" type="image/x-icon" media="(prefers-color-scheme: dark)" href="https://res.cloudinary.com/dqplzxgxy/image/upload/v1718770226/beranda_agx1m2.webp?format=100w" />
    <link rel="canonical" href="<?php echo $url ?>" />
    <meta property="og:site_name" content="<?php echo $BRANDS ?>" />
    <meta property="og:title" content="<?php echo $BRANDS ?> 💋 Paling Suka Beri Maxwin #1 Di Indonesia" />
    <meta property="og:url" content="<?php echo $url ?>" />
    <meta property="og:type" content="product" />
    <meta property="og:description" content="<?php echo $BRANDS?> merupakan situs pilihan slot Bet 200 Terpercaya di Indonesia saat ini. Menyediakan berbagai macam provider permainan yang menghibur, Daftar sekarang juga dan menangkan kesempatan untuk mendapatkan maxwin hanya dengan Modal 200 saja di <?php echo $BRANDS ?>." />
    <meta property="og:image" content="https://res.cloudinary.com/dqplzxgxy/image/upload/v1722225003/scatter-hitam_eo3cca.jpg?format=1500w" />
    <meta property="og:image:width" content="1024" />
    <meta property="og:image:height" content="1024" />
    <meta property="product:price:amount" content="10000.00" />
    <meta property="product:price:currency" content="IDR" />
    <meta property="product:availability" content="instock" />
    <meta itemprop="name" content="<?php echo $BRANDS ?> 💋 Paling Suka Beri Maxwin #1 Di Indonesia" />
    <meta itemprop="url" content="<?php echo $url ?>" />
    <meta itemprop="description" content="<?php echo $BRANDS?> merupakan situs pilihan slot Bet 200 Terpercaya di Indonesia saat ini. Menyediakan berbagai macam provider permainan yang menghibur, Daftar sekarang juga dan menangkan kesempatan untuk mendapatkan maxwin hanya dengan Modal 200 saja di <?php echo $BRANDS ?>." />
    <meta itemprop="thumbnailUrl" content="https://res.cloudinary.com/dqplzxgxy/image/upload/v1722225003/scatter-hitam_eo3cca.jpg?format=1500w" />
    <link rel="image_src" href="https://res.cloudinary.com/dqplzxgxy/image/upload/v1722225003/scatter-hitam_eo3cca.jpg?format=1500w" />
    <meta itemprop="image" content="https://res.cloudinary.com/dqplzxgxy/image/upload/v1722225003/scatter-hitam_eo3cca.jpg?format=1500w" />
    <meta name="twitter:title" content="<?php echo $BRANDS ?> 💋 Paling Suka Beri Maxwin #1 Di Indonesia" />
    <meta name="twitter:image" content="https://res.cloudinary.com/dqplzxgxy/image/upload/v1722225003/scatter-hitam_eo3cca.jpg?format=1500w" />
    <meta name="twitter:url" content="<?php echo $url ?>" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="<?php echo $BRANDS?> merupakan situs pilihan slot Bet 200 Terpercaya di Indonesia saat ini. Menyediakan berbagai macam provider permainan yang menghibur, Daftar sekarang juga dan menangkan kesempatan untuk mendapatkan maxwin hanya dengan Modal 200 saja di <?php echo $BRANDS ?>." />
    <meta name="description" content="<?php echo $BRANDS?> merupakan situs pilihan slot Bet 200 Terpercaya di Indonesia saat ini. Menyediakan berbagai macam provider permainan yang menghibur, Daftar sekarang juga dan menangkan kesempatan untuk mendapatkan maxwin hanya dengan Modal 200 saja di <?php echo $BRANDS ?>." />
    <link rel="preconnect" href="https://images.squarespace-cdn.com">
    <script type="text/javascript" src="//use.typekit.net/ik/hVkq-VxFrorerjM_w4e1pFer6Al85BPRKS83QUp8S8Sfe1bJXnX1IyvhF2jtFRZLFRjDjRStjQZyFDJaFQSXwAmqjRycwe9De6MK2ABnie8hOAikdas8ShC7fbRbdsMMeMb6MKG4fFZlIMMjgPMfH6qJXcXbMg6YJMJ7fbRsdsMMeMt6MKG4fFFlIMMjIPMfqMeiv0hUg6.js"></script>
    <script type="text/javascript">
      try {
        Typekit.load();
      } catch (e) {}
    </script>
    <script type="text/javascript" crossorigin="anonymous" defer="defer" nomodule="nomodule" src="//assets.squarespace.com/@sqs/polyfiller/1.6/legacy.js"></script>
    <script type="text/javascript" crossorigin="anonymous" defer="defer" src="//assets.squarespace.com/@sqs/polyfiller/1.6/modern.js"></script>
    <script type="text/javascript">
      SQUARESPACE_ROLLUPS = {};
    </script>
    <script>
      (function(rollups, name) {
        if (!rollups[name]) {
          rollups[name] = {};
        }
        rollups[name].js = ["//assets.squarespace.com/universal/scripts-compressed/extract-css-runtime-9f99077288518e0f0b42-min.id-ID.js"];
      })(SQUARESPACE_ROLLUPS, 'squarespace-extract_css_runtime');
    </script>
    <script crossorigin="anonymous" src="//assets.squarespace.com/universal/scripts-compressed/extract-css-runtime-9f99077288518e0f0b42-min.id-ID.js" defer></script>
    <script>
      (function(rollups, name) {
        if (!rollups[name]) {
          rollups[name] = {};
        }
        rollups[name].js = ["//assets.squarespace.com/universal/scripts-compressed/extract-css-moment-js-vendor-6f117db4eb7fd4392375-min.id-ID.js"];
      })(SQUARESPACE_ROLLUPS, 'squarespace-extract_css_moment_js_vendor');
    </script>
    <script crossorigin="anonymous" src="//assets.squarespace.com/universal/scripts-compressed/extract-css-moment-js-vendor-6f117db4eb7fd4392375-min.id-ID.js" defer></script>
    <script>
      (function(rollups, name) {
        if (!rollups[name]) {
          rollups[name] = {};
        }
        rollups[name].js = ["//assets.squarespace.com/universal/scripts-compressed/cldr-resource-pack-e94539391642d3b99900-min.id-ID.js"];
      })(SQUARESPACE_ROLLUPS, 'squarespace-cldr_resource_pack');
    </script>
    <script crossorigin="anonymous" src="//assets.squarespace.com/universal/scripts-compressed/cldr-resource-pack-e94539391642d3b99900-min.id-ID.js" defer></script>
    <script>
      (function(rollups, name) {
        if (!rollups[name]) {
          rollups[name] = {};
        }
        rollups[name].js = ["//assets.squarespace.com/universal/scripts-compressed/common-vendors-stable-3598b219a3c023c1915a-min.id-ID.js"];
      })(SQUARESPACE_ROLLUPS, 'squarespace-common_vendors_stable');
    </script>
    <script crossorigin="anonymous" src="//assets.squarespace.com/universal/scripts-compressed/common-vendors-stable-3598b219a3c023c1915a-min.id-ID.js" defer></script>
    <script>
      (function(rollups, name) {
        if (!rollups[name]) {
          rollups[name] = {};
        }
        rollups[name].js = ["//assets.squarespace.com/universal/scripts-compressed/common-vendors-61a01b41fe335828ded0-min.id-ID.js"];
      })(SQUARESPACE_ROLLUPS, 'squarespace-common_vendors');
    </script>
    <script crossorigin="anonymous" src="//assets.squarespace.com/universal/scripts-compressed/common-vendors-61a01b41fe335828ded0-min.id-ID.js" defer></script>
    <script>
      (function(rollups, name) {
        if (!rollups[name]) {
          rollups[name] = {};
        }
        rollups[name].js = ["//assets.squarespace.com/universal/scripts-compressed/common-d290cbc4ad3b71e2abac-min.id-ID.js"];
      })(SQUARESPACE_ROLLUPS, 'squarespace-common');
    </script>
    <script crossorigin="anonymous" src="//assets.squarespace.com/universal/scripts-compressed/common-d290cbc4ad3b71e2abac-min.id-ID.js" defer></script>
    <script>
      (function(rollups, name) {
        if (!rollups[name]) {
          rollups[name] = {};
        }
        rollups[name].js = ["//assets.squarespace.com/universal/scripts-compressed/commerce-7af10c309a43b417aff8-min.id-ID.js"];
      })(SQUARESPACE_ROLLUPS, 'squarespace-commerce');
    </script>
    <script crossorigin="anonymous" src="//assets.squarespace.com/universal/scripts-compressed/commerce-7af10c309a43b417aff8-min.id-ID.js" defer></script>
    <script>
      (function(rollups, name) {
        if (!rollups[name]) {
          rollups[name] = {};
        }
        rollups[name].css = ["//assets.squarespace.com/universal/styles-compressed/commerce-2af06f7948db5477d8f5-min.id-ID.css"];
      })(SQUARESPACE_ROLLUPS, 'squarespace-commerce');
    </script>
    <link rel="stylesheet" type="text/css" href="//assets.squarespace.com/universal/styles-compressed/commerce-2af06f7948db5477d8f5-min.id-ID.css">
    <script>
      (function(rollups, name) {
        if (!rollups[name]) {
          rollups[name] = {};
        }
        rollups[name].js = ["//assets.squarespace.com/universal/scripts-compressed/user-account-core-ff138918e8330c505a02-min.id-ID.js"];
      })(SQUARESPACE_ROLLUPS, 'squarespace-user_account_core');
    </script>
    <script crossorigin="anonymous" src="//assets.squarespace.com/universal/scripts-compressed/user-account-core-ff138918e8330c505a02-min.id-ID.js" defer></script>
    <script>
      (function(rollups, name) {
        if (!rollups[name]) {
          rollups[name] = {};
        }
        rollups[name].css = ["//assets.squarespace.com/universal/styles-compressed/user-account-core-e84acd73aa5ee3fcd4ad-min.id-ID.css"];
      })(SQUARESPACE_ROLLUPS, 'squarespace-user_account_core');
    </script>
    <link rel="stylesheet" type="text/css" href="//assets.squarespace.com/universal/styles-compressed/user-account-core-e84acd73aa5ee3fcd4ad-min.id-ID.css">
    <script>
      (function(rollups, name) {
        if (!rollups[name]) {
          rollups[name] = {};
        }
        rollups[name].js = ["//assets.squarespace.com/universal/scripts-compressed/performance-a421cd35cd6417f1d39b-min.id-ID.js"];
      })(SQUARESPACE_ROLLUPS, 'squarespace-performance');
    </script>
    <script crossorigin="anonymous" src="//assets.squarespace.com/universal/scripts-compressed/performance-a421cd35cd6417f1d39b-min.id-ID.js" defer></script>
    <script data-name="static-context">
      Static = window.Static || {};
      Static.SQUARESPACE_CONTEXT = {
        "facebookAppId": "314192535267336",
        "facebookApiVersion": "v6.0",
        "rollups": {
          "squarespace-announcement-bar": {
            "js": "//assets.squarespace.com/universal/scripts-compressed/announcement-bar-35e50722ab0bf1abdb44-min.id-ID.js"
          },
          "squarespace-audio-player": {
            "css": "//assets.squarespace.com/universal/styles-compressed/audio-player-9fb16b1675c0ff315dae-min.id-ID.css",
            "js": "//assets.squarespace.com/universal/scripts-compressed/audio-player-8be052f38e2c155258ee-min.id-ID.js"
          },
          "squarespace-blog-collection-list": {
            "css": "//assets.squarespace.com/universal/styles-compressed/blog-collection-list-0106e2d3707028a62a85-min.id-ID.css",
            "js": "//assets.squarespace.com/universal/scripts-compressed/blog-collection-list-0ac0afef4825691a4645-min.id-ID.js"
          },
          "squarespace-calendar-block-renderer": {
            "css": "//assets.squarespace.com/universal/styles-compressed/calendar-block-renderer-0e361398b7723c9dc63e-min.id-ID.css",
            "js": "//assets.squarespace.com/universal/scripts-compressed/calendar-block-renderer-806a48ce3e4728cb9d65-min.id-ID.js"
          },
          "squarespace-chartjs-helpers": {
            "css": "//assets.squarespace.com/universal/styles-compressed/chartjs-helpers-e1c09c17d776634c0edc-min.id-ID.css",
            "js": "//assets.squarespace.com/universal/scripts-compressed/chartjs-helpers-bc47025de0c2dc839bf3-min.id-ID.js"
          },
          "squarespace-comments": {
            "css": "//assets.squarespace.com/universal/styles-compressed/comments-24b74a0326eae0cd5049-min.id-ID.css",
            "js": "//assets.squarespace.com/universal/scripts-compressed/comments-9fc311647ccafdf0c2d4-min.id-ID.js"
          },
          "squarespace-custom-css-popup": {
            "css": "//assets.squarespace.com/universal/styles-compressed/custom-css-popup-73e57f4e74d32d434fca-min.id-ID.css",
            "js": "//assets.squarespace.com/universal/scripts-compressed/custom-css-popup-7f20186b47d1beb1b01d-min.id-ID.js"
          },
          "squarespace-dialog": {
            "css": "//assets.squarespace.com/universal/styles-compressed/dialog-942ba8e1b80795995d77-min.id-ID.css",
            "js": "//assets.squarespace.com/universal/scripts-compressed/dialog-3720fd3f6deaff64c1e7-min.id-ID.js"
          },
          "squarespace-events-collection": {
            "css": "//assets.squarespace.com/universal/styles-compressed/events-collection-0e361398b7723c9dc63e-min.id-ID.css",
            "js": "//assets.squarespace.com/universal/scripts-compressed/events-collection-7cc7366bda2c5540f0b1-min.id-ID.js"
          },
          "squarespace-form-rendering-utils": {
            "js": "//assets.squarespace.com/universal/scripts-compressed/form-rendering-utils-d17ff2ee8ac30a71308d-min.id-ID.js"
          },
          "squarespace-forms": {
            "css": "//assets.squarespace.com/universal/styles-compressed/forms-8d93ba2c12ff0765b64c-min.id-ID.css",
            "js": "//assets.squarespace.com/universal/scripts-compressed/forms-0e32250c5a05298f4a3a-min.id-ID.js"
          },
          "squarespace-gallery-collection-list": {
            "css": "//assets.squarespace.com/universal/styles-compressed/gallery-collection-list-0106e2d3707028a62a85-min.id-ID.css",
            "js": "//assets.squarespace.com/universal/scripts-compressed/gallery-collection-list-4015fa07502fd85cce51-min.id-ID.js"
          },
          "squarespace-image-zoom": {
            "css": "//assets.squarespace.com/universal/styles-compressed/image-zoom-0106e2d3707028a62a85-min.id-ID.css",
            "js": "//assets.squarespace.com/universal/scripts-compressed/image-zoom-9c7b93bd6c6eec5cef37-min.id-ID.js"
          },
          "squarespace-pinterest": {
            "css": "//assets.squarespace.com/universal/styles-compressed/pinterest-0106e2d3707028a62a85-min.id-ID.css",
            "js": "//assets.squarespace.com/universal/scripts-compressed/pinterest-a5020f5bd4c8ffda4ef1-min.id-ID.js"
          },
          "squarespace-popup-overlay": {
            "css": "//assets.squarespace.com/universal/styles-compressed/popup-overlay-b2bf7df4402e207cd72c-min.id-ID.css",
            "js": "//assets.squarespace.com/universal/scripts-compressed/popup-overlay-25eec8644c11ab1c81b0-min.id-ID.js"
          },
          "squarespace-product-quick-view": {
            "css": "//assets.squarespace.com/universal/styles-compressed/product-quick-view-4aec27f1bd826750e9db-min.id-ID.css",
            "js": "//assets.squarespace.com/universal/scripts-compressed/product-quick-view-5b06990968e0559d4e41-min.id-ID.js"
          },
          "squarespace-products-collection-item-v2": {
            "css": "//assets.squarespace.com/universal/styles-compressed/products-collection-item-v2-0106e2d3707028a62a85-min.id-ID.css",
            "js": "//assets.squarespace.com/universal/scripts-compressed/products-collection-item-v2-4f86cb20877dafd2ae07-min.id-ID.js"
          },
          "squarespace-products-collection-list-v2": {
            "css": "//assets.squarespace.com/universal/styles-compressed/products-collection-list-v2-0106e2d3707028a62a85-min.id-ID.css",
            "js": "//assets.squarespace.com/universal/scripts-compressed/products-collection-list-v2-5869a38a2bb3cda993d1-min.id-ID.js"
          },
          "squarespace-search-page": {
            "css": "//assets.squarespace.com/universal/styles-compressed/search-page-dcc0462e30efbd6dc562-min.id-ID.css",
            "js": "//assets.squarespace.com/universal/scripts-compressed/search-page-c748fbeab0ff3ac8287f-min.id-ID.js"
          },
          "squarespace-search-preview": {
            "js": "//assets.squarespace.com/universal/scripts-compressed/search-preview-a5ab82bfe253d3d2dd8c-min.id-ID.js"
          },
          "squarespace-simple-liking": {
            "css": "//assets.squarespace.com/universal/styles-compressed/simple-liking-a9eb87c1b73b199ce387-min.id-ID.css",
            "js": "//assets.squarespace.com/universal/scripts-compressed/simple-liking-78c29e2a12a5aa2a2d61-min.id-ID.js"
          },
          "squarespace-social-buttons": {
            "css": "//assets.squarespace.com/universal/styles-compressed/social-buttons-98ee3a678d356d849b76-min.id-ID.css",
            "js": "//assets.squarespace.com/universal/scripts-compressed/social-buttons-c52b0741952de8df0b07-min.id-ID.js"
          },
          "squarespace-tourdates": {
            "css": "//assets.squarespace.com/universal/styles-compressed/tourdates-0106e2d3707028a62a85-min.id-ID.css",
            "js": "//assets.squarespace.com/universal/scripts-compressed/tourdates-6494713832425f8e79d2-min.id-ID.js"
          },
          "squarespace-website-overlays-manager": {
            "css": "//assets.squarespace.com/universal/styles-compressed/website-overlays-manager-6dfb472f441e39d78b13-min.id-ID.css",
            "js": "//assets.squarespace.com/universal/scripts-compressed/website-overlays-manager-e0b85974b943e62386de-min.id-ID.js"
          }
        },
        "pageType": 50,
        "website": {
          "id": "663b78a6a7275741edb8f0e3",
          "identifier": "slot-gacor-thailand-gg",
          "websiteType": 1,
          "contentModifiedOn": 1715174187194,
          "cloneable": false,
          "hasBeenCloneable": false,
          "siteStatus": {},
          "language": "id-ID",
          "timeZone": "Asia/Jakarta",
          "machineTimeZoneOffset": 25200000,
          "timeZoneOffset": 25200000,
          "timeZoneAbbr": "WIB",
          "siteTitle": "<?php echo $BRANDS ?>",
          "fullSiteTitle": "<?php echo $BRANDS ?> 💋 Paling Suka Beri Maxwin #1 Di Indonesia",
          "siteDescription": "",
          "location": {
            "mapLat": -6.2591169,
            "mapLng": 107.0199814,
            "addressTitle": "<?php echo $BRANDS ?>",
            "addressLine1": "42 DE Jalan HM. Joyo Martono",
            "addressLine2": ", Jawa Barat, 17113",
            "addressCountry": "Indonesia"
          },
          "logoImageId": "663b7a4d8b810351d47e2b13",
          "mobileLogoImageId": "663b7a5ef1ea6f68c556a738",
          "shareButtonOptions": {
            "3": true,
            "6": true,
            "7": true,
            "2": true,
            "1": true,
            "8": true,
            "4": true
          },
          "logoImageUrl": "//res.cloudinary.com/dqplzxgxy/image/upload/v1719652172/1212_o8nabc.png",
          "mobileLogoImageUrl": "//res.cloudinary.com/dqplzxgxy/image/upload/v1719652172/1212_o8nabc.png",
          "authenticUrl": "<?php echo $url ?>",
          "internalUrl": "<?php echo $url ?>",
          "baseUrl": "<?php echo $url ?>",
          "sslSetting": 3,
          "isHstsEnabled": true,
          "socialAccounts": [{
            "serviceId": 65,
            "screenname": "LinkedIn",
            "addedOn": 1715173751881,
            "profileUrl": "https://www.linkedin.com/",
            "iconEnabled": true,
            "serviceName": "linkedin-unauth"
          }, {
            "serviceId": 64,
            "screenname": "Instagram",
            "addedOn": 1715173737057,
            "profileUrl": "https://www.instagram.com/",
            "iconEnabled": true,
            "serviceName": "instagram-unauth"
          }, {
            "serviceId": 62,
            "screenname": "Twitter",
            "addedOn": 1715173739894,
            "profileUrl": "https://www.twitter.com/",
            "iconEnabled": true,
            "serviceName": "twitter-unauth"
          }, {
            "serviceId": 60,
            "screenname": "Facebook",
            "addedOn": 1715173734365,
            "profileUrl": "https://www.facebook.com/",
            "iconEnabled": true,
            "serviceName": "facebook-unauth"
          }, {
            "serviceId": 43,
            "screenname": "Reddit",
            "addedOn": 1715173745508,
            "profileUrl": "https://www.reddit.com/",
            "iconEnabled": true,
            "serviceName": "reddit"
          }, {
            "serviceId": 82,
            "screenname": "TikTok",
            "addedOn": 1715173742693,
            "profileUrl": "https://www.tiktok.com/",
            "iconEnabled": true,
            "serviceName": "tiktok-unauth"
          }, {
            "serviceId": 35,
            "screenname": "Twitch",
            "addedOn": 1715173758677,
            "profileUrl": "https://www.twitch.tv/",
            "iconEnabled": true,
            "serviceName": "twitch"
          }, {
            "serviceId": 73,
            "screenname": "GitHub",
            "addedOn": 1715173755671,
            "profileUrl": "https://www.github.com/",
            "iconEnabled": true,
            "serviceName": "github-unauth"
          }, {
            "serviceId": 61,
            "screenname": "Pinterest",
            "addedOn": 1715173748833,
            "profileUrl": "https://www.pinterest.com/",
            "iconEnabled": true,
            "serviceName": "pinterest-unauth"
          }, {
            "serviceId": 69,
            "screenname": "YouTube",
            "addedOn": 1715173761669,
            "profileUrl": "https://www.youtube.com/",
            "iconEnabled": true,
            "serviceName": "youtube-unauth"
          }],
          "typekitId": "",
          "statsMigrated": false,
          "imageMetadataProcessingEnabled": false,
          "screenshotId": "4763bfdcffc6c6fa504f1ed023d846ae3677c34765b85fd33aed3228082c4efc",
          "captchaSettings": {
            "enabledForDonations": false
          },
          "showOwnerLogin": false
        },
        "websiteSettings": {
          "id": "663b78a6a7275741edb8f0e7",
          "websiteId": "663b78a6a7275741edb8f0e3",
          "subjects": [],
          "country": "ID",
          "state": "",
          "simpleLikingEnabled": true,
          "mobileInfoBarSettings": {
            "isContactEmailEnabled": false,
            "isContactPhoneNumberEnabled": false,
            "isLocationEnabled": false,
            "isBusinessHoursEnabled": false
          },
          "commentLikesAllowed": true,
          "commentAnonAllowed": true,
          "commentThreaded": true,
          "commentApprovalRequired": false,
          "commentAvatarsOn": true,
          "commentSortType": 2,
          "commentFlagThreshold": 0,
          "commentFlagsAllowed": true,
          "commentEnableByDefault": true,
          "commentDisableAfterDaysDefault": 0,
          "disqusShortname": "",
          "commentsEnabled": false,
          "contactPhoneNumber": "081333666999",
          "businessHours": {
            "monday": {
              "text": "Open",
              "ranges": [{
                "from": 0,
                "to": 1440
              }]
            },
            "tuesday": {
              "text": "Open",
              "ranges": [{
                "from": 0,
                "to": 1440
              }]},
            "wednesday": {
              "text": "Open",
              "ranges": [{
                "from": 0,
                "to": 1440
              }]
            },
            "thursday": {
              "text": "Open",
              "ranges": [{
                "from": 0,
                "to": 1440
              }]
            },
            "friday": {
              "text": "Open",
              "ranges": [{
                "from": 0,
                "to": 1440
              }]
            },
            "saturday": {
              "text": "Open",
              "ranges": [{
                "from": 0,
                "to": 1440
              }]
            },
            "sunday": {
              "text": "Open",
              "ranges": [{
                "from": 0,
                "to": 1440
              }]
            }
          },
          "storeSettings": {
            "returnPolicy": null,
            "termsOfService": null,
            "privacyPolicy": null,
            "expressCheckout": false,
            "continueShoppingLinkUrl": "<?php echo $url ?>",
            "useLightCart": false,
            "showNoteField": false,
            "shippingCountryDefaultValue": "US",
            "billToShippingDefaultValue": false,
            "showShippingPhoneNumber": true,
            "isShippingPhoneRequired": false,
            "showBillingPhoneNumber": true,
            "isBillingPhoneRequired": false,
            "currenciesSupkartued": ["USD", "CAD", "GBP", "AUD", "EUR", "CHF", "NOK", "SEK", "DKK", "NZD", "SGD", "MXN", "HKD", "CZK", "ILS", "MYR", "RUB", "PHP", "PLN", "THB", "BRL", "ARS", "COP", "IDR", "INR", "JPY", "ZAR"],
            "defaultCurrency": "USD",
            "selectedCurrency": "IDR",
            "measurementStandard": 1,
            "showCustomCheckoutForm": false,
            "checkoutPageMarketingOptInEnabled": true,
            "enableMailingListOptInByDefault": false,
            "sameAsRetailLocation": false,
            "merchandisingSettings": {
              "scarcityEnabledOnProductItems": false,
              "scarcityEnabledOnProductBlocks": false,
              "scarcityMessageType": "DEFAULT_SCARCITY_MESSAGE",
              "scarcityThreshold": 10,
              "multipleQuantityAllowedForServices": true,
              "restockNotificationsEnabled": false,
              "restockNotificationsMailingListSignUpEnabled": false,
              "relatedProductsEnabled": false,
              "relatedProductsOrdering": "random",
              "soldOutVariantsDropdownDisabled": false,
              "productComposerOptedIn": false,
              "productComposerABTestOptedOut": false,
              "productReviewsEnabled": false
            },
            "minimumOrderSubtotalEnabled": false,
            "minimumOrderSubtotal": {
              "currency": "IDR",
              "value": "0.00"
            },
            "isLive": false,
            "multipleQuantityAllowedForServices": true
          },
          "useEscapeKeyToLogin": false,
          "ssBadgeType": 1,
          "ssBadgePosition": 4,
          "ssBadgeVisibility": 1,
          "ssBadgeDevices": 1,
          "pinterestOverlayOptions": {
            "mode": "disabled"
          },
          "ampEnabled": false,
          "userAccountsSettings": {
            "loginAllowed": true,
            "signupAllowed": true
          }
        },
        "cookieSettings": {
          "isCookieBannerEnabled": false,
          "isRestrictiveCookiePolicyEnabled": false,
          "isRestrictiveCookiePolicyAbsolute": false,
          "cookieBannerText": "",
          "cookieBannerTheme": "",
          "cookieBannerVariant": "",
          "cookieBannerPosition": "",
          "cookieBannerCtaVariant": "",
          "cookieBannerCtaText": "",
          "cookieBannerAcceptType": "OPT_IN",
          "cookieBannerOptOutCtaText": "",
          "cookieBannerHasOptOut": false,
          "cookieBannerHasManageCookies": true,
          "cookieBannerManageCookiesLabel": ""
        },
        "websiteCloneable": false,
        "collection": {
          "title": "<?php echo $BRANDS ?>",
          "id": "663b7a93350d180f02352cd8",
          "fullUrl": "<?php echo $url ?>",
          "type": 13,
          "permissionType": 1
        },
        "item": {
          "title": "<?php echo $BRANDS ?> 💋 Paling Suka Beri Maxwin #1 Di Indonesia",
          "id": "663b7aab6e91257626fa4793",
          "fullUrl": "<?php echo $url ?>",
          "publicCommentCount": 0,
          "commentState": 1,
          "recordType": 11
        },
        "subscribed": false,
        "appDomain": "squarespace.com",
        "templateTweakable": true,
        "tweakJSON": {
          "form-use-theme-colors": "false",
          "header-logo-height": "50px",
          "header-mobile-logo-max-height": "30px",
          "header-vert-padding": "2vw",
          "header-width": "Inset",
          "maxPageWidth": "1800px",
          "pagePadding": "4vw",
          "tweak-blog-alternating-side-by-side-image-aspect-ratio": "1:1 Square",
          "tweak-blog-alternating-side-by-side-image-spacing": "5%",
          "tweak-blog-alternating-side-by-side-meta-spacing": "15px",
          "tweak-blog-alternating-side-by-side-primary-meta": "Categories",
          "tweak-blog-alternating-side-by-side-read-more-spacing": "5px",
          "tweak-blog-alternating-side-by-side-secondary-meta": "Date",
          "tweak-blog-basic-grid-columns": "2",
          "tweak-blog-basic-grid-image-aspect-ratio": "3:2 Standard",
          "tweak-blog-basic-grid-image-spacing": "30px",
          "tweak-blog-basic-grid-meta-spacing": "15px",
          "tweak-blog-basic-grid-primary-meta": "Categories",
          "tweak-blog-basic-grid-read-more-spacing": "15px",
          "tweak-blog-basic-grid-secondary-meta": "Date",
          "tweak-blog-item-custom-width": "60",
          "tweak-blog-item-show-author-profile": "true",
          "tweak-blog-item-width": "Narrow",
          "tweak-blog-masonry-columns": "2",
          "tweak-blog-masonry-horizontal-spacing": "150px",
          "tweak-blog-masonry-image-spacing": "25px",
          "tweak-blog-masonry-meta-spacing": "20px",
          "tweak-blog-masonry-primary-meta": "Categories",
          "tweak-blog-masonry-read-more-spacing": "5px",
          "tweak-blog-masonry-secondary-meta": "Date",
          "tweak-blog-masonry-vertical-spacing": "100px",
          "tweak-blog-side-by-side-image-aspect-ratio": "1:1 Square",
          "tweak-blog-side-by-side-image-spacing": "6%",
          "tweak-blog-side-by-side-meta-spacing": "20px",
          "tweak-blog-side-by-side-primary-meta": "Categories",
          "tweak-blog-side-by-side-read-more-spacing": "5px",
          "tweak-blog-side-by-side-secondary-meta": "Date",
          "tweak-blog-single-column-image-spacing": "40px",
          "tweak-blog-single-column-meta-spacing": "30px",
          "tweak-blog-single-column-primary-meta": "Categories",
          "tweak-blog-single-column-read-more-spacing": "30px",
          "tweak-blog-single-column-secondary-meta": "Date",
          "tweak-events-stacked-show-thumbnails": "true",
          "tweak-events-stacked-thumbnail-size": "3:2 Standard",
          "tweak-fixed-header": "true",
          "tweak-fixed-header-style": "Scroll Back",
          "tweak-global-animations-animation-curve": "ease",
          "tweak-global-animations-animation-delay": "0.1s",
          "tweak-global-animations-animation-duration": "0.1s",
          "tweak-global-animations-animation-style": "fade",
          "tweak-global-animations-animation-type": "none",
          "tweak-global-animations-complexity-level": "detailed",
          "tweak-global-animations-enabled": "false",
          "tweak-kartufolio-grid-basic-custom-height": "50",
          "tweak-kartufolio-grid-overlay-custom-height": "50",
          "tweak-kartufolio-hover-follow-acceleration": "10%",
          "tweak-kartufolio-hover-follow-animation-duration": "Medium",
          "tweak-kartufolio-hover-follow-animation-type": "Fade",
          "tweak-kartufolio-hover-follow-delimiter": "Forward Slash",
          "tweak-kartufolio-hover-follow-front": "false",
          "tweak-kartufolio-hover-follow-layout": "Inline",
          "tweak-kartufolio-hover-follow-size": "75",
          "tweak-kartufolio-hover-follow-text-spacing-x": "1.5",
          "tweak-kartufolio-hover-follow-text-spacing-y": "1.5",
          "tweak-kartufolio-hover-static-animation-duration": "Medium",
          "tweak-kartufolio-hover-static-animation-type": "Scale Up",
          "tweak-kartufolio-hover-static-delimiter": "Forward Slash",
          "tweak-kartufolio-hover-static-front": "false",
          "tweak-kartufolio-hover-static-layout": "Stacked",
          "tweak-kartufolio-hover-static-size": "75",
          "tweak-kartufolio-hover-static-text-spacing-x": "1.5",
          "tweak-kartufolio-hover-static-text-spacing-y": "1.5",
          "tweak-kartufolio-index-background-animation-duration": "Medium",
          "tweak-kartufolio-index-background-animation-type": "Fade",
          "tweak-kartufolio-index-background-custom-height": "50",
          "tweak-kartufolio-index-background-delimiter": "None",
          "tweak-kartufolio-index-background-height": "Large",
          "tweak-kartufolio-index-background-horizontal-alignment": "Center",
          "tweak-kartufolio-index-background-link-format": "Stacked",
          "tweak-kartufolio-index-background-persist": "false",
          "tweak-kartufolio-index-background-vertical-alignment": "Middle",
          "tweak-kartufolio-index-background-width": "Full Bleed",
          "tweak-product-basic-item-click-action": "None",
          "tweak-product-basic-item-gallery-aspect-ratio": "3:4 Three-Four (Vertical)",
          "tweak-product-basic-item-gallery-design": "Slideshow",
          "tweak-product-basic-item-gallery-width": "50%",
          "tweak-product-basic-item-hover-action": "None",
          "tweak-product-basic-item-image-spacing": "3vw",
          "tweak-product-basic-item-image-zoom-factor": "1.75",
          "tweak-product-basic-item-product-variant-display": "Dropdown",
          "tweak-product-basic-item-thumbnail-placement": "Side",
          "tweak-product-basic-item-variant-picker-layout": "Dropdowns",
          "tweak-products-add-to-cart-button": "false",
          "tweak-products-columns": "3",
          "tweak-products-gutter-column": "2vw",
          "tweak-products-gutter-row": "3vw",
          "tweak-products-header-text-alignment": "Middle",
          "tweak-products-image-aspect-ratio": "1:1 Square",
          "tweak-products-image-text-spacing": "1vw",
          "tweak-products-mobile-columns": "1",
          "tweak-products-text-alignment": "Left",
          "tweak-products-width": "Inset",
          "tweak-transparent-header": "true"
        },
        "templateId": "5c5a519771c10ba3470d8101",
        "templateVersion": "7.1",
        "pageFeatures": [1, 2, 4],
        "gmRenderKey": "QUl6YVN5Q0JUUk9xNkx1dkZfSUUxcjQ2LVQ0QWVUU1YtMGQ3bXk4",
        "templateScriptsRootUrl": "https://static1.squarespace.com/static/vta/5c5a519771c10ba3470d8101/scripts/",
        "betaFeatureFlags": ["hideable_header_footer_for_videos", "scripts_defer", "campaigns_global_uc_ab", "website_fonts", "pdp_subs_otp_visitor_site", "hideable_header_footer", "fluid_engine", "i18n_beta_website_locales", "nested_categories", "commerce_order_status_access", "commerce_checkout_website_updates_enabled", "commerce_restock_notifications", "commerce_paywall_renewal_notifications", "send_local_pickup_ready_email", "customer_accounts_email_verification", "commerce_subscription_renewal_notifications", "hide_header_footer_beta", "campaigns_discount_section_in_automations", "hideable_header_footer_for_memberareas", "override_block_styles", "nested_categories_migration_enabled", "marketing_landing_page", "accounting_orders_sync", "pdp_product_add_ons_visitor_site", "unify_edit_mode_p2", "commerce_site_visitor_metrics", "background_art_onboarding", "enable_css_variable_tweaks", "campaigns_new_image_layout_picker", "commerce_clearpay", "commerce_etsy_shipping_imkartu", "commerce_etsy_product_imkartu", "crm_product_contacts_use_mfe", "toggle_preview_new_shortcut", "customer_account_creation_recaptcha", "commsplat_forms_visitor_profile", "fluid_engine_clean_up_grid_contextual_change", "campaigns_discount_section_in_blasts", "campaigns_thumbnail_layout", "google_consent_v2", "supkartus_versioned_template_assets", "hideable_header_footer_for_courses", "member_areas_feature", "proposals_beta_in_circle_labs", "collection_typename_switching", "visitor_react_forms", "campaigns_imkartu_discounts", "themes", "is_feature_gate_refresh_enabled", "crm_redesign_phase_1", "new_stacked_index"],
        "videoAssetsFeatureFlags": ["mux-data-video-collection", "mux-data-course-collection"],
        "impersonatedSession": false,
        "demoCollections": [{
          "collectionId": "624b503a16dabe4934de7282",
          "deleted": true
        }, {
          "collectionId": "624b504016dabe4934de73c2",
          "deleted": true
        }, {
          "collectionId": "624b504416dabe4934de7457",
          "deleted": true
        }, {
          "collectionId": "624b504716dabe4934de74b6",
          "deleted": true
        }],
        "tzData": {
          "zones": [
            [420, null, "WIB", null]
          ],
          "rules": {}
        },
        "product": {
          "variantAttributeNames": [],
          "variants": [{
            "id": "db414567-5f10-435b-8851-6cab03ee4fe9",
            "sku": "SLOTTHAILAND01",
            "price": {
              "currencyCode": "IDR",
              "value": 1000000,
              "decimalValue": "10000.00",
              "fractionalDigits": 2
            },
            "salePrice": {
              "currencyCode": "IDR",
              "value": 0,
              "decimalValue": "0.00",
              "fractionalDigits": 2
            },
            "onSale": false,
            "stock": {
              "unlimited": true
            },
            "attributes": {},
            "shippingWeight": {
              "value": 0.0,
              "unit": "POUND"
            },
            "shippingSize": {
              "unit": "INCH",
              "width": 0.0,
              "height": 0.0,
              "len": 0.0
            }
          }],
          "subscribable": false,
          "fulfilledExternally": false,
          "productType": 1
        },
        "showAnnouncementBar": false,
        "recaptchaEnterpriseContext": {
          "recaptchaEnterpriseSiteKey": "6LdDFQwjAAAAAPigEvvPgEVbb7QBm-TkVJdDTlAv"
        },
        "i18nContext": {
          "timeZoneData": {
            "id": "Asia/Jakarta",
            "name": "Western Indonesia Time"
          }
        },
        "env": "PRODUCTION"
      };
    </script>
    <script type="application/ld+json">
      {
        "url": "<?php echo $url ?>",
        "name": "<?php echo $BRANDS ?>",
        "description": "",
        "image": "//res.cloudinary.com/dqplzxgxy/image/upload/v1719652172/1212_o8nabc.png",
        "@context": "http://schema.org",
        "@type": "WebSite"
      }
    </script>
    <script type="application/ld+json">
      {
        "legalName": "<?php echo $BRANDS ?>",
        "address": "42 DE Jalan HM. Joyo Martono\n, Jawa Barat, 17113\nIndonesia",
        "email": "slotthailand@gmail.com",
        "telephone": "081333666999",
        "sameAs": ["https://www.linkedin.com/", "https://www.instagram.com/", "https://www.twitter.com/", "https://www.facebook.com/", "https://www.reddit.com/", "https://www.tiktok.com/", "https://www.twitch.tv/", "https://www.github.com/", "https://www.pinterest.com/", "https://www.youtube.com/"],
        "@context": "http://schema.org",
        "@type": "Organization"
      }
    </script>
    <script type="application/ld+json">
      {
        "address": "42 DE Jalan HM. Joyo Martono\n, Jawa Barat, 17113\nIndonesia",
        "image": "https://static1.squarespace.com/static/663b78a6a7275741edb8f0e3/t/663b7a4d8b810351d47e2b13/1715174187194/",
        "name": "<?php echo $BRANDS ?>",
        "openingHours": "Mo 00:00-00:00, Tu 00:00-00:00, We 00:00-00:00, Th 00:00-00:00, Fr 00:00-00:00, Sa 00:00-00:00, Su 00:00-00:00",
        "@context": "http://schema.org",
        "@type": "LocalBusiness"
      }
    </script>
    <script type="application/ld+json">
      {
        "name": "<?php echo $BRANDS ?> 💋 Paling Suka Beri Maxwin #1 Di Indonesia",
        "image": "https://res.cloudinary.com/dqplzxgxy/image/upload/v1722225003/scatter-hitam_eo3cca.jpg?format=1500w",
        "description": "<?php echo $BRANDS?> merupakan situs pilihan slot Bet 200 Terpercaya di Indonesia saat ini. Menyediakan berbagai macam provider permainan yang menghibur, Daftar sekarang juga dan menangkan kesempatan untuk mendapatkan maxwin hanya dengan Modal 200 saja di <?php echo $BRANDS ?>.",
        "brand": "<?php echo $BRANDS ?>",
        "offers": {
          "price": 10000.00,
          "priceCurrency": "IDR",
          "url": "<?php echo $url ?>",
          "availability": "InStock",
          "sku": "SLOTTHAILAND01",
          "@context": "http://schema.org",
          "@type": "Offer"
        },
        "@context": "http://schema.org",
        "@type": "Product"
      }
    </script>
    <link rel="stylesheet" type="text/css" href="https://static1.squarespace.com/static/versioned-site-css/663b78a6a7275741edb8f0e3/1/5c5a519771c10ba3470d8101/663b78a6a7275741edb8f106/1522/site.css" />
    <script>
      Static.COOKIE_BANNER_CAPABLE = true;
    </script>
    <!-- End of Squarespace Headers -->
    <link rel="stylesheet" type="text/css" href="https://static1.squarespace.com/static/vta/5c5a519771c10ba3470d8101/versioned-assets/1712772943022-RISL5OTW906SEOCXSNEC/static.css">
  </head>
  <body id="item-663b7aab6e91257626fa4793" class="
      primary-button-style-outline primary-button-shape-square secondary-button-style-outline secondary-button-shape-square tertiary-button-style-outline tertiary-button-shape-square  form-field-style-solid form-field-shape-square form-field-border-all form-field-checkbox-type-icon form-field-checkbox-fill-solid form-field-checkbox-color-inverted form-field-checkbox-shape-square form-field-checkbox-layout-stack form-field-radio-type-icon form-field-radio-fill-solid form-field-radio-color-normal form-field-radio-shape-pill form-field-radio-layout-stack form-field-survey-fill-solid form-field-survey-color-normal form-field-survey-shape-pill form-field-hover-focus-outline form-submit-button-style-label header-overlay-alignment-center header-width-inset tweak-transparent-header tweak-fixed-header tweak-fixed-header-style-scroll-back tweak-blog-alternating-side-by-side-width-inset tweak-blog-alternating-side-by-side-image-aspect-ratio-11-square tweak-blog-alternating-side-by-side-text-alignment-left tweak-blog-alternating-side-by-side-read-more-style-show tweak-blog-alternating-side-by-side-image-text-alignment-middle tweak-blog-alternating-side-by-side-delimiter-bullet tweak-blog-alternating-side-by-side-meta-position-top tweak-blog-alternating-side-by-side-primary-meta-categories tweak-blog-alternating-side-by-side-secondary-meta-date tweak-blog-alternating-side-by-side-excerpt-show tweak-blog-basic-grid-width-inset tweak-blog-basic-grid-image-aspect-ratio-32-standard tweak-blog-basic-grid-text-alignment-center tweak-blog-basic-grid-delimiter-bullet tweak-blog-basic-grid-image-placement-above tweak-blog-basic-grid-read-more-style-show tweak-blog-basic-grid-primary-meta-categories tweak-blog-basic-grid-secondary-meta-date tweak-blog-basic-grid-excerpt-show tweak-blog-item-width-narrow tweak-blog-item-text-alignment-left tweak-blog-item-meta-position-above-title tweak-blog-item-show-categories tweak-blog-item-show-date tweak-blog-item-show-author-name tweak-blog-item-show-author-profile tweak-blog-item-delimiter-dash tweak-blog-masonry-width-full tweak-blog-masonry-text-alignment-center tweak-blog-masonry-primary-meta-categories tweak-blog-masonry-secondary-meta-date tweak-blog-masonry-meta-position-top tweak-blog-masonry-read-more-style-show tweak-blog-masonry-delimiter-space tweak-blog-masonry-image-placement-above tweak-blog-masonry-excerpt-show tweak-blog-side-by-side-width-inset tweak-blog-side-by-side-image-placement-left tweak-blog-side-by-side-image-aspect-ratio-11-square tweak-blog-side-by-side-primary-meta-categories tweak-blog-side-by-side-secondary-meta-date tweak-blog-side-by-side-meta-position-top tweak-blog-side-by-side-text-alignment-left tweak-blog-side-by-side-image-text-alignment-middle tweak-blog-side-by-side-read-more-style-show tweak-blog-side-by-side-delimiter-bullet tweak-blog-side-by-side-excerpt-show tweak-blog-single-column-width-inset tweak-blog-single-column-text-alignment-center tweak-blog-single-column-image-placement-above tweak-blog-single-column-delimiter-bullet tweak-blog-single-column-read-more-style-show tweak-blog-single-column-primary-meta-categories tweak-blog-single-column-secondary-meta-date tweak-blog-single-column-meta-position-top tweak-blog-single-column-content-excerpt-and-title tweak-events-stacked-width-inset tweak-events-stacked-height-small tweak-events-stacked-show-past-events tweak-events-stacked-show-thumbnails tweak-events-stacked-thumbnail-size-32-standard tweak-events-stacked-date-style-side-tag tweak-events-stacked-show-time tweak-events-stacked-show-location tweak-events-stacked-ical-gcal-links tweak-events-stacked-show-excerpt   tweak-global-animations-complexity-level-detailed tweak-global-animations-animation-style-fade tweak-global-animations-animation-type-none tweak-global-animations-animation-curve-ease tweak-kartufolio-grid-basic-width-inset tweak-kartufolio-grid-basic-height-medium tweak-kartufolio-grid-basic-image-aspect-ratio-43-four-three tweak-kartufolio-grid-basic-text-alignment-left tweak-kartufolio-grid-basic-hover-effect-zoom tweak-kartufolio-grid-overlay-width-full tweak-kartufolio-grid-overlay-height-small tweak-kartufolio-grid-overlay-image-aspect-ratio-43-four-three tweak-kartufolio-grid-overlay-text-placement-center tweak-kartufolio-grid-overlay-show-text-after-hover tweak-kartufolio-index-background-link-format-stacked tweak-kartufolio-index-background-width-full-bleed tweak-kartufolio-index-background-height-large  tweak-kartufolio-index-background-vertical-alignment-middle tweak-kartufolio-index-background-horizontal-alignment-center tweak-kartufolio-index-background-delimiter-none tweak-kartufolio-index-background-animation-type-fade tweak-kartufolio-index-background-animation-duration-medium tweak-kartufolio-hover-follow-layout-inline  tweak-kartufolio-hover-follow-delimiter-forward-slash tweak-kartufolio-hover-follow-animation-type-fade tweak-kartufolio-hover-follow-animation-duration-medium tweak-kartufolio-hover-static-layout-stacked  tweak-kartufolio-hover-static-delimiter-forward-slash tweak-kartufolio-hover-static-animation-type-scale-up tweak-kartufolio-hover-static-animation-duration-medium tweak-product-basic-item-product-variant-display-dropdown tweak-product-basic-item-product-subscription-display-radio tweak-product-basic-item-width-full tweak-product-basic-item-gallery-aspect-ratio-34-three-four-vertical tweak-product-basic-item-text-alignment-left tweak-product-basic-item-navigation-breadcrumbs tweak-product-basic-item-content-alignment-top tweak-product-basic-item-gallery-design-slideshow tweak-product-basic-item-gallery-placement-left tweak-product-basic-item-thumbnail-placement-side tweak-product-basic-item-click-action-none tweak-product-basic-item-hover-action-none tweak-product-basic-item-variant-picker-layout-dropdowns tweak-products-width-inset tweak-products-image-aspect-ratio-11-square tweak-products-text-alignment-left  tweak-products-price-show tweak-products-nested-category-type-top  tweak-products-header-text-alignment-middle tweak-products-breadcrumbs image-block-poster-text-alignment-center image-block-card-content-position-center image-block-card-text-alignment-left image-block-overlap-content-position-center image-block-overlap-text-alignment-left image-block-collage-content-position-top image-block-collage-text-alignment-left image-block-stack-text-alignment-left hide-opentable-icons opentable-style-dark tweak-product-quick-view-button-style-floating tweak-product-quick-view-button-position-bottom tweak-product-quick-view-lightbox-excerpt-display-truncate tweak-product-quick-view-lightbox-show-arrows tweak-product-quick-view-lightbox-show-close-button tweak-product-quick-view-lightbox-controls-weight-light native-currency-code-idr view-item collection-663b7a93350d180f02352cd8 collection-layout-default collection-type-products mobile-style-available sqs-seven-one
      
        show-pdp-product-add-ons
      
      
        show-pdp-subs-otp
      
      
      
        
          
          
        
      
    " data-description="plp-mobile-editor-column" tabindex="-1">
    <div id="siteWrapper" class="clearfix site-wrapper">
      <div id="floatingCart" class="floating-cart hidden">
        <a href="/cart" class="icon icon--stroke icon--fill icon--cart sqs-custom-cart">
          <span class="Cart-inner">
            <svg class="icon icon--cart" width="61" height="49" viewBox="0 0 61 49">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 2C0.5 1.17157 1.17157 0.5 2 0.5H13.6362C14.3878 0.5 15.0234 1.05632 15.123 1.80135L16.431 11.5916H59C59.5122 11.5916 59.989 11.8529 60.2645 12.2847C60.54 12.7165 60.5762 13.2591 60.3604 13.7236L50.182 35.632C49.9361 36.1614 49.4054 36.5 48.8217 36.5H18.0453C17.2937 36.5 16.6581 35.9437 16.5585 35.1987L12.3233 3.5H2C1.17157 3.5 0.5 2.82843 0.5 2ZM16.8319 14.5916L19.3582 33.5H47.8646L56.6491 14.5916H16.8319Z" />
              <path d="M18.589 35H49.7083L60 13H16L18.589 35Z" />
              <path d="M21 49C23.2091 49 25 47.2091 25 45C25 42.7909 23.2091 41 21 41C18.7909 41 17 42.7909 17 45C17 47.2091 18.7909 49 21 49Z" />
              <path d="M45 49C47.2091 49 49 47.2091 49 45C49 42.7909 47.2091 41 45 41C42.7909 41 41 42.7909 41 45C41 47.2091 42.7909 49 45 49Z" />
            </svg>
            <div class="legacy-cart icon-cart-quantity">
              <span class="sqs-cart-quantity">0</span>
            </div>
          </span>
        </a>
      </div>
      <header data-test="header" id="header" class="
      
        
          
        
      
      header theme-col--primary
    " data-section-theme="" data-controller="Header" data-current-styles="{
&quot;layout&quot;: &quot;brandingCenter&quot;,
&quot;action&quot;: {
&quot;buttonText&quot;: &quot;Get Started&quot;,
&quot;newWindow&quot;: false
},
&quot;showSocial&quot;: false,
&quot;socialOptions&quot;: {
&quot;socialBorderShape&quot;: &quot;none&quot;,
&quot;socialBorderStyle&quot;: &quot;outline&quot;,
&quot;socialBorderThickness&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 1.0
}
},
&quot;menuOverlayAnimation&quot;: &quot;fade&quot;,
&quot;cartStyle&quot;: &quot;cart&quot;,
&quot;cartText&quot;: &quot;Cart&quot;,
&quot;showEmptyCartState&quot;: true,
&quot;cartOptions&quot;: {
&quot;iconType&quot;: &quot;solid-7&quot;,
&quot;cartBorderShape&quot;: &quot;none&quot;,
&quot;cartBorderStyle&quot;: &quot;outline&quot;,
&quot;cartBorderThickness&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 1.0
}
},
&quot;showButton&quot;: false,
&quot;showCart&quot;: false,
&quot;showAccountLogin&quot;: false,
&quot;headerStyle&quot;: &quot;dynamic&quot;,
&quot;languagePicker&quot;: {
&quot;enabled&quot;: false,
&quot;iconEnabled&quot;: false,
&quot;iconType&quot;: &quot;globe&quot;,
&quot;flagShape&quot;: &quot;shiny&quot;,
&quot;languageFlags&quot;: [ ]
},
&quot;mobileOptions&quot;: {
&quot;layout&quot;: &quot;logoLeftNavRight&quot;,
&quot;menuIcon&quot;: &quot;doubleLineHamburger&quot;,
&quot;menuIconOptions&quot;: {
&quot;style&quot;: &quot;doubleLineHamburger&quot;,
&quot;thickness&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 1.0
}
}
},
&quot;dynamicOptions&quot;: {
&quot;border&quot;: {
&quot;enabled&quot;: false,
&quot;position&quot;: &quot;allSides&quot;,
&quot;thickness&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 4.0
},
&quot;color&quot;: {
&quot;type&quot;: &quot;SITE_PALETTE_COLOR&quot;,
&quot;sitePaletteColor&quot;: {
&quot;colorName&quot;: &quot;black&quot;,
&quot;alphaModifier&quot;: 1.0
}
}
}
},
&quot;solidOptions&quot;: {
&quot;headerOpacity&quot;: {
&quot;unit&quot;: &quot;%&quot;,
&quot;value&quot;: 100.0
},
&quot;border&quot;: {
&quot;enabled&quot;: false,
&quot;position&quot;: &quot;allSides&quot;,
&quot;thickness&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 4.0
},
&quot;color&quot;: {
&quot;type&quot;: &quot;SITE_PALETTE_COLOR&quot;,
&quot;sitePaletteColor&quot;: {
&quot;colorName&quot;: &quot;black&quot;,
&quot;alphaModifier&quot;: 1.0
}
}
},
&quot;dropShadow&quot;: {
&quot;enabled&quot;: false,
&quot;blur&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 30.0
},
&quot;spread&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 0.0
},
&quot;distance&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 0.0
},
&quot;color&quot;: {
&quot;type&quot;: &quot;SITE_PALETTE_COLOR&quot;,
&quot;sitePaletteColor&quot;: {
&quot;colorName&quot;: &quot;black&quot;,
&quot;alphaModifier&quot;: 1.0
}
}
},
&quot;blurBackground&quot;: {
&quot;enabled&quot;: false,
&quot;blurRadius&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 12.0
}
},
&quot;backgroundColor&quot;: {
&quot;type&quot;: &quot;SITE_PALETTE_COLOR&quot;,
&quot;sitePaletteColor&quot;: {
&quot;colorName&quot;: &quot;white&quot;,
&quot;alphaModifier&quot;: 1.0
}
},
&quot;navigationColor&quot;: {
&quot;type&quot;: &quot;SITE_PALETTE_COLOR&quot;,
&quot;sitePaletteColor&quot;: {
&quot;colorName&quot;: &quot;black&quot;,
&quot;alphaModifier&quot;: 1.0
}
}
},
&quot;gradientOptions&quot;: {
&quot;gradientType&quot;: &quot;faded&quot;,
&quot;headerOpacity&quot;: {
&quot;unit&quot;: &quot;%&quot;,
&quot;value&quot;: 90.0
},
&quot;border&quot;: {
&quot;enabled&quot;: false,
&quot;position&quot;: &quot;allSides&quot;,
&quot;thickness&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 4.0
},
&quot;color&quot;: {
&quot;type&quot;: &quot;SITE_PALETTE_COLOR&quot;,
&quot;sitePaletteColor&quot;: {
&quot;colorName&quot;: &quot;black&quot;,
&quot;alphaModifier&quot;: 1.0
}
}
},
&quot;dropShadow&quot;: {
&quot;enabled&quot;: false,
&quot;blur&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 30.0
},
&quot;spread&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 0.0
},
&quot;distance&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 0.0
},
&quot;color&quot;: {
&quot;type&quot;: &quot;SITE_PALETTE_COLOR&quot;,
&quot;sitePaletteColor&quot;: {
&quot;colorName&quot;: &quot;black&quot;,
&quot;alphaModifier&quot;: 1.0
}
}
},
&quot;blurBackground&quot;: {
&quot;enabled&quot;: false,
&quot;blurRadius&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 12.0
}
},
&quot;backgroundColor&quot;: {
&quot;type&quot;: &quot;SITE_PALETTE_COLOR&quot;,
&quot;sitePaletteColor&quot;: {
&quot;colorName&quot;: &quot;white&quot;,
&quot;alphaModifier&quot;: 1.0
}
},
&quot;navigationColor&quot;: {
&quot;type&quot;: &quot;SITE_PALETTE_COLOR&quot;,
&quot;sitePaletteColor&quot;: {
&quot;colorName&quot;: &quot;black&quot;,
&quot;alphaModifier&quot;: 1.0
}
}
},
&quot;dropShadowOptions&quot;: {
&quot;enabled&quot;: false,
&quot;blur&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 12.0
},
&quot;spread&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 0.0
},
&quot;distance&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 12.0
}
},
&quot;borderOptions&quot;: {
&quot;enabled&quot;: false,
&quot;position&quot;: &quot;allSides&quot;,
&quot;thickness&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 4.0
},
&quot;color&quot;: {
&quot;type&quot;: &quot;SITE_PALETTE_COLOR&quot;,
&quot;sitePaletteColor&quot;: {
&quot;colorName&quot;: &quot;black&quot;,
&quot;alphaModifier&quot;: 1.0
}
}
},
&quot;showPromotedElement&quot;: false,
&quot;buttonVariant&quot;: &quot;primary&quot;,
&quot;blurBackground&quot;: {
&quot;enabled&quot;: false,
&quot;blurRadius&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 12.0
}
},
&quot;headerOpacity&quot;: {
&quot;unit&quot;: &quot;%&quot;,
&quot;value&quot;: 100.0
}
}" data-section-id="header" data-header-style="dynamic" data-language-picker="{
&quot;enabled&quot;: false,
&quot;iconEnabled&quot;: false,
&quot;iconType&quot;: &quot;globe&quot;,
&quot;flagShape&quot;: &quot;shiny&quot;,
&quot;languageFlags&quot;: [ ]
}" data-first-focusable-element tabindex="-1" style="
      
        
        
          --headerBorderColor: hsla(var(--black-hsl), 1);
        
      
      
        --solidHeaderBackgroundColor: hsla(var(--white-hsl), 1);
      
      
        --solidHeaderNavigationColor: hsla(var(--black-hsl), 1);
      
      
        --gradientHeaderBackgroundColor: hsla(var(--white-hsl), 1);
      
      
        --gradientHeaderNavigationColor: hsla(var(--black-hsl), 1);
      
    ">
        <div class="sqs-announcement-bar-dropzone"></div>
        <div class="header-announcement-bar-wrapper">
          <a href="#page" class="header-skip-link sqs-button-element--primary"> Skip to Content </a>

          <div class="header-border" data-header-style="dynamic" data-header-usability-enabled="true" data-header-border="false" data-test="header-border" style="






  
    border-width: 0px !imkartuant;
  



  



"></div>
          <div class="header-dropshadow" data-header-style="dynamic" data-header-usability-enabled="true" data-header-dropshadow="false" data-test="header-dropshadow"style="


  
"></div>
          <div class='header-inner container--fluid
        
        
        
         header-mobile-layout-logo-left-nav-right
        
        
        
        
        
        
        
        
        
         header-layout-branding-center
        
        
        
        
        
        ' style="






  
    padding: 0;
  



" data-test="header-inner">
            <!-- Background -->
            <div class="header-background theme-bg--primary"></div>
            <div class="header-display-desktop" data-content-field="site-title">
              <!-- Social -->
              <!-- Title and nav wrapper -->
              <div class="header-title-nav-wrapper">
                <!-- Nav -->
                <div class="header-nav">
                  <div class="header-nav-wrapper">
                    <nav class="header-nav-list">
                      <div class="header-nav-item header-nav-item--collection header-nav-item--active">
                        <a href="<?php echo $url ?>" data-animation-role="header-element" aria-current="page"> <?php echo $BRANDS ?> </a>
                      </div>
                      <div class="header-nav-item header-nav-item--collection">
                        <a href="<?php echo $a,p ?>" data-animation-role="header-element"> SLOT GACOR </a>
                      </div>
                      <div class="header-nav-item header-nav-item--collection">
                        <a href="<?php echo $amp ?>" data-animation-role="header-element"> DAFTAR </a>
                      </div>
                      <div class="header-nav-item header-nav-item--collection">
                        <a href="<?php echo $amp ?>" data-animation-role="header-element"> LOGIN </a>
                      </div>
                    </nav>
                  </div>
                </div>
                <!-- Title -->
                <div class="
                      header-title
                      header-title--use-mobile-logo
                    " data-animation-role="header-element">
                  <div class="header-title-logo">
                    <a href="<?php echo $url ?>" data-animation-role="header-element">
                      <picture>
                        <source media="only screen and (pointer: coarse) and (max-width: 1024px), screen and (max-width: 799px)" srcset="//res.cloudinary.com/dqplzxgxy/image/upload/v1719652172/1212_o8nabc.png?format=1500w">
                        <source media="only screen and (pointer: coarse) and (min-width: 1025px), screen and (min-width: 800px)" srcset="//res.cloudinary.com/dqplzxgxy/image/upload/v1719652172/1212_o8nabc.png?format=1500w">
                        <img elementtiming="nbf-header-logo-desktop" src="//res.cloudinary.com/dqplzxgxy/image/upload/v1719652172/1212_o8nabc.png?format=1500w" alt="<?php echo $BRANDS ?>" style="display:block" fetchpriority="high" loading="eager" decoding="async" data-loader="raw">
                      </picture>
                    </a>
                  </div>
                  <div class="header-mobile-logo">
                    <a href="<?php echo $url ?>" data-animation-role="header-element">
                      <picture>
                        <source media="only screen and (pointer: coarse) and (max-width: 1024px), screen and (max-width: 799px)" srcset="//res.cloudinary.com/dqplzxgxy/image/upload/v1719652172/1212_o8nabc.png?format=1500w">
                        <source media="only screen and (pointer: coarse) and (min-width: 1025px), screen and (min-width: 800px)" srcset="//res.cloudinary.com/dqplzxgxy/image/upload/v1719652172/1212_o8nabc.png?format=1500w">
                        <img elementtiming="nbf-header-logo-mobile" src="//res.cloudinary.com/dqplzxgxy/image/upload/v1719652172/1212_o8nabc.png?format=1500w" alt="<?php echo $BRANDS ?>" style="display:block" fetchpriority="high" loading="eager" decoding="async" data-loader="raw">
                      </picture>
                    </a>
                  </div>
                </div>
              </div>
              <!-- Actions -->
              <div class="header-actions header-actions--right">
                <div class="showOnMobile"></div>
                <div class="showOnDesktop"></div>
              </div>
              <style>
                .top-bun,
                .patty,
                .bottom-bun {
                  height: 1px;
                }
              </style>
              <!-- Burger -->
              <div class="header-burger

  menu-overlay-does-not-have-visible-non-navigation-items


  
  no-actions
  
" data-animation-role="header-element">
                <button class="header-burger-btn burger" data-test="header-burger">
                  <span hidden class="js-header-burger-open-title visually-hidden">Open Menu</span>
                  <span hidden class="js-header-burger-close-title visually-hidden">Close Menu</span>
                  <div class="burger-box">
                    <div class="burger-inner header-menu-icon-doubleLineHamburger">
                      <div class="top-bun"></div>
                      <div class="patty"></div>
                      <div class="bottom-bun"></div>
                    </div>
                  </div>
                </button>
              </div>
            </div>
            <div class="header-display-mobile" data-content-field="site-title">
              <!-- Social -->
              <!-- Title and nav wrapper -->
              <div class="header-title-nav-wrapper">
                <!-- Nav -->
                <div class="header-nav">
                  <div class="header-nav-wrapper">
                    <nav class="header-nav-list">
                      <div class="header-nav-item header-nav-item--collection header-nav-item--active">
                        <a href="<?php echo $url ?>" data-animation-role="header-element" aria-current="page"> <?php echo $BRANDS ?> </a>
                      </div>
                      <div class="header-nav-item header-nav-item--collection">
                        <a href="<?php echo $url ?>" data-animation-role="header-element"> SLOT GACOR </a>
                      </div>
                      <div class="header-nav-item header-nav-item--collection">
                        <a href="<?php echo $url ?>" data-animation-role="header-element"> DAFTAR </a>
                      </div>
                      <div class="header-nav-item header-nav-item--collection">
                        <a href="<?php echo $url ?>" data-animation-role="header-element"> LOGIN </a>
                      </div>
                    </nav>
                  </div>
                </div>
                <!-- Title -->
                <div class="
                      header-title
                      header-title--use-mobile-logo
                    " data-animation-role="header-element">
                  <div class="header-title-logo">
                    <a href="<?php echo $url ?>" data-animation-role="header-element">
                      <picture>
                        <source media="only screen and (pointer: coarse) and (max-width: 1024px), screen and (max-width: 799px)" srcset="//res.cloudinary.com/dqplzxgxy/image/upload/v1719652172/1212_o8nabc.png?format=1500w">
                        <source media="only screen and (pointer: coarse) and (min-width: 1025px), screen and (min-width: 800px)" srcset="//res.cloudinary.com/dqplzxgxy/image/upload/v1719652172/1212_o8nabc.png?format=1500w">
                        <img elementtiming="nbf-header-logo-desktop" src="//res.cloudinary.com/dqplzxgxy/image/upload/v1719652172/1212_o8nabc.png?format=1500w" alt="<?php echo $BRANDS ?>" style="display:block" fetchpriority="high" loading="eager" decoding="async" data-loader="raw">
                      </picture>
                    </a>
                  </div>
                  <div class="header-mobile-logo">
                    <a href="<?php echo $url ?>" data-animation-role="header-element">
                      <picture>
                        <source media="only screen and (pointer: coarse) and (max-width: 1024px), screen and (max-width: 799px)" srcset="//res.cloudinary.com/dqplzxgxy/image/upload/v1719652172/1212_o8nabc.png?format=1500w">
                        <source media="only screen and (pointer: coarse) and (min-width: 1025px), screen and (min-width: 800px)" srcset="//res.cloudinary.com/dqplzxgxy/image/upload/v1719652172/1212_o8nabc.png?format=1500w">
                        <img elementtiming="nbf-header-logo-mobile" src="//res.cloudinary.com/dqplzxgxy/image/upload/v1719652172/1212_o8nabc.png?format=1500w" alt="<?php echo $BRANDS ?>" style="display:block" fetchpriority="high" loading="eager" decoding="async" data-loader="raw">
                      </picture>
                    </a>
                  </div>
                </div>
              </div>
              <!-- Actions -->
              <div class="header-actions header-actions--right">
                <div class="showOnMobile"></div>
                <div class="showOnDesktop"></div>
              </div>
              <style>
                .top-bun,
                .patty,
                .bottom-bun {
                  height: 1px;
                }
              </style>
              <!-- Burger -->
              <div class="header-burger

  menu-overlay-does-not-have-visible-non-navigation-items


  
  no-actions
  
" data-animation-role="header-element">
                <button class="header-burger-btn burger" data-test="header-burger">
                  <span hidden class="js-header-burger-open-title visually-hidden">Open Menu</span>
                  <span hidden class="js-header-burger-close-title visually-hidden">Close Menu</span>
                  <div class="burger-box">
                    <div class="burger-inner header-menu-icon-doubleLineHamburger">
                      <div class="top-bun"></div>
                      <div class="patty"></div>
                      <div class="bottom-bun"></div>
                    </div>
                  </div>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- (Mobile) Menu Navigation -->
        <div class="header-menu header-menu--folder-list
      
      
      
      
      
      " data-section-theme="" data-current-styles="{
&quot;layout&quot;: &quot;brandingCenter&quot;,
&quot;action&quot;: {
&quot;buttonText&quot;: &quot;Get Started&quot;,
&quot;newWindow&quot;: false
},
&quot;showSocial&quot;: false,
&quot;socialOptions&quot;: {
&quot;socialBorderShape&quot;: &quot;none&quot;,
&quot;socialBorderStyle&quot;: &quot;outline&quot;,
&quot;socialBorderThickness&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 1.0
}
},
&quot;menuOverlayAnimation&quot;: &quot;fade&quot;,
&quot;cartStyle&quot;: &quot;cart&quot;,
&quot;cartText&quot;: &quot;Cart&quot;,
&quot;showEmptyCartState&quot;: true,
&quot;cartOptions&quot;: {
&quot;iconType&quot;: &quot;solid-7&quot;,
&quot;cartBorderShape&quot;: &quot;none&quot;,
&quot;cartBorderStyle&quot;: &quot;outline&quot;,
&quot;cartBorderThickness&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 1.0
}
},
&quot;showButton&quot;: false,
&quot;showCart&quot;: false,
&quot;showAccountLogin&quot;: false,
&quot;headerStyle&quot;: &quot;dynamic&quot;,
&quot;languagePicker&quot;: {
&quot;enabled&quot;: false,
&quot;iconEnabled&quot;: false,
&quot;iconType&quot;: &quot;globe&quot;,
&quot;flagShape&quot;: &quot;shiny&quot;,
&quot;languageFlags&quot;: [ ]
},
&quot;mobileOptions&quot;: {
&quot;layout&quot;: &quot;logoLeftNavRight&quot;,
&quot;menuIcon&quot;: &quot;doubleLineHamburger&quot;,
&quot;menuIconOptions&quot;: {
&quot;style&quot;: &quot;doubleLineHamburger&quot;,
&quot;thickness&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 1.0
}
}
},
&quot;dynamicOptions&quot;: {
&quot;border&quot;: {
&quot;enabled&quot;: false,
&quot;position&quot;: &quot;allSides&quot;,
&quot;thickness&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 4.0
},
&quot;color&quot;: {
&quot;type&quot;: &quot;SITE_PALETTE_COLOR&quot;,
&quot;sitePaletteColor&quot;: {
&quot;colorName&quot;: &quot;black&quot;,
&quot;alphaModifier&quot;: 1.0
}
}
}
},
&quot;solidOptions&quot;: {
&quot;headerOpacity&quot;: {
&quot;unit&quot;: &quot;%&quot;,
&quot;value&quot;: 100.0
},
&quot;border&quot;: {
&quot;enabled&quot;: false,
&quot;position&quot;: &quot;allSides&quot;,
&quot;thickness&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 4.0
},
&quot;color&quot;: {
&quot;type&quot;: &quot;SITE_PALETTE_COLOR&quot;,
&quot;sitePaletteColor&quot;: {
&quot;colorName&quot;: &quot;black&quot;,
&quot;alphaModifier&quot;: 1.0
}
}
},
&quot;dropShadow&quot;: {
&quot;enabled&quot;: false,
&quot;blur&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 30.0
},
&quot;spread&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 0.0
},
&quot;distance&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 0.0
},
&quot;color&quot;: {
&quot;type&quot;: &quot;SITE_PALETTE_COLOR&quot;,
&quot;sitePaletteColor&quot;: {
&quot;colorName&quot;: &quot;black&quot;,
&quot;alphaModifier&quot;: 1.0
}
}
},
&quot;blurBackground&quot;: {
&quot;enabled&quot;: false,
&quot;blurRadius&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 12.0
}
},
&quot;backgroundColor&quot;: {
&quot;type&quot;: &quot;SITE_PALETTE_COLOR&quot;,
&quot;sitePaletteColor&quot;: {
&quot;colorName&quot;: &quot;white&quot;,
&quot;alphaModifier&quot;: 1.0
}
},
&quot;navigationColor&quot;: {
&quot;type&quot;: &quot;SITE_PALETTE_COLOR&quot;,
&quot;sitePaletteColor&quot;: {
&quot;colorName&quot;: &quot;black&quot;,
&quot;alphaModifier&quot;: 1.0
}
}
},
&quot;gradientOptions&quot;: {
&quot;gradientType&quot;: &quot;faded&quot;,
&quot;headerOpacity&quot;: {
&quot;unit&quot;: &quot;%&quot;,
&quot;value&quot;: 90.0
},
&quot;border&quot;: {
&quot;enabled&quot;: false,
&quot;position&quot;: &quot;allSides&quot;,
&quot;thickness&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 4.0
},
&quot;color&quot;: {
&quot;type&quot;: &quot;SITE_PALETTE_COLOR&quot;,
&quot;sitePaletteColor&quot;: {
&quot;colorName&quot;: &quot;black&quot;,
&quot;alphaModifier&quot;: 1.0
}
}
},
&quot;dropShadow&quot;: {
&quot;enabled&quot;: false,
&quot;blur&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 30.0
},
&quot;spread&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 0.0
},
&quot;distance&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 0.0
},
&quot;color&quot;: {
&quot;type&quot;: &quot;SITE_PALETTE_COLOR&quot;,
&quot;sitePaletteColor&quot;: {
&quot;colorName&quot;: &quot;black&quot;,
&quot;alphaModifier&quot;: 1.0
}
}
},
&quot;blurBackground&quot;: {
&quot;enabled&quot;: false,
&quot;blurRadius&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 12.0
}
},
&quot;backgroundColor&quot;: {
&quot;type&quot;: &quot;SITE_PALETTE_COLOR&quot;,
&quot;sitePaletteColor&quot;: {
&quot;colorName&quot;: &quot;white&quot;,
&quot;alphaModifier&quot;: 1.0
}
},
&quot;navigationColor&quot;: {
&quot;type&quot;: &quot;SITE_PALETTE_COLOR&quot;,
&quot;sitePaletteColor&quot;: {
&quot;colorName&quot;: &quot;black&quot;,
&quot;alphaModifier&quot;: 1.0
}
}
},
&quot;dropShadowOptions&quot;: {
&quot;enabled&quot;: false,
&quot;blur&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 12.0
},
&quot;spread&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 0.0
},
&quot;distance&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 12.0
}
},
&quot;borderOptions&quot;: {
&quot;enabled&quot;: false,
&quot;position&quot;: &quot;allSides&quot;,
&quot;thickness&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 4.0
},
&quot;color&quot;: {
&quot;type&quot;: &quot;SITE_PALETTE_COLOR&quot;,
&quot;sitePaletteColor&quot;: {
&quot;colorName&quot;: &quot;black&quot;,
&quot;alphaModifier&quot;: 1.0
}
}
},
&quot;showPromotedElement&quot;: false,
&quot;buttonVariant&quot;: &quot;primary&quot;,
&quot;blurBackground&quot;: {
&quot;enabled&quot;: false,
&quot;blurRadius&quot;: {
&quot;unit&quot;: &quot;px&quot;,
&quot;value&quot;: 12.0
}
},
&quot;headerOpacity&quot;: {
&quot;unit&quot;: &quot;%&quot;,
&quot;value&quot;: 100.0
}
}" data-section-id="overlay-nav" data-show-account-login="false" data-test="header-menu">
          <div class="header-menu-bg theme-bg--primary"></div>
          <div class="header-menu-nav">
            <nav class="header-menu-nav-list">
              <div data-folder="root" class="header-menu-nav-folder">
                <div class="header-menu-nav-folder-content">
                  <!-- Menu Navigation -->
                  <div class="header-menu-nav-wrapper">
                    <div class="container header-menu-nav-item header-menu-nav-item--collection header-menu-nav-item--active">
                      <a href="<?php echo $url ?>" aria-current="page">
                        <div class="header-menu-nav-item-content"> <?php echo $BRANDS ?> </div>
                      </a>
                    </div>
                    <div class="container header-menu-nav-item header-menu-nav-item--collection">
                      <a href="<?php echo $url ?>">
                        <div class="header-menu-nav-item-content"> SLOT GACOR </div>
                      </a>
                    </div>
                    <div class="container header-menu-nav-item header-menu-nav-item--collection">
                      <a href="<?php echo $url ?>">
                        <div class="header-menu-nav-item-content"> DAFTAR </div>
                      </a>
                    </div>
                    <div class="container header-menu-nav-item header-menu-nav-item--collection">
                      <a href="<?php echo $url ?>">
                        <div class="header-menu-nav-item-content"> LOGIN </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </nav>
          </div>
        </div>
      </header>
      <main id="page" class="container" role="main">
        <article class="sections" id="sections" data-page-sections="663b7a93350d180f02352d0f">
          <section data-test="page-section" data-section-theme="" class='page-section 
    
      content-collection
      full-bleed-section
      collection-type-products
    
    background-width--full-bleed
    
      section-height--medium
    
    
      content-width--wide
    
    horizontal-alignment--center
    vertical-alignment--middle
    
      
    
    
    ' data-section-id="663b7a93350d180f02352d17" data-controller="SectionWrapperController" data-current-styles="{
&quot;imageOverlayOpacity&quot;: 0.15,
&quot;backgroundWidth&quot;: &quot;background-width--full-bleed&quot;,
&quot;sectionHeight&quot;: &quot;section-height--medium&quot;,
&quot;customSectionHeight&quot;: 10,
&quot;horizontalAlignment&quot;: &quot;horizontal-alignment--center&quot;,
&quot;verticalAlignment&quot;: &quot;vertical-alignment--middle&quot;,
&quot;contentWidth&quot;: &quot;content-width--wide&quot;,
&quot;customContentWidth&quot;: 50,
&quot;sectionAnimation&quot;: &quot;none&quot;,
&quot;backgroundMode&quot;: &quot;image&quot;
}" data-current-context="{
&quot;video&quot;: {
&quot;playbackSpeed&quot;: 0.5,
&quot;filter&quot;: 1,
&quot;filterStrength&quot;: 0,
&quot;zoom&quot;: 0,
&quot;videoSourceProvider&quot;: &quot;none&quot;
},
&quot;backgroundImageId&quot;: null,
&quot;backgroundMediaEffect&quot;: null,
&quot;divider&quot;: null,
&quot;typeName&quot;: &quot;products&quot;
}" data-animation="none">
            <div class="section-border">
              <div class="section-background"></div>
            </div>
            <div class='content-wrapper'style='
      
      
    '>
              <div class="content">
                <section id="pdp" class="
    products
    collection-content-wrapper
    product-layout-side-by-side
  ">
                  <article class="ProductItem hentry author-good-game-universe post-type-store-item featured" data-item-id="663b7aab6e91257626fa4793">
                    <nav class="ProductItem-nav">
                      <div class="ProductItem-nav-breadcrumb" data-animation-role="content">
                        <a href="<?php echo $url ?>" class="ProductItem-nav-breadcrumb-link">Slot Gacor</a>
                        <span class="ProductItem-nav-breadcrumb-separator"></span>
                        <a href="<?php echo $url ?>" class="ProductItem-nav-breadcrumb-link"><?php echo $BRANDS ?> 💋 Paling Suka Beri Maxwin #1 Di Indonesia</a>
                      </div>
                    </nav>
                    <section class="ProductItem-summary" data-controller="ProductGallery">
                      <section aria-label="Gallery" class="ProductItem-gallery" data-product-gallery="container">
                        <div class="ProductItem-gallery-slides" data-animation-role="image" data-product-gallery="slides">
                          <div class="ProductItem-gallery-slides-item" data-slide-index="1" data-image-id=663b7ad8f312f84044882a60 data-controller="ImageZoom" data-slide-url="tdqa0kqyqyv43ha6snnysb7v92vv2x" data-product-gallery="slides-item" data-test="pdp-gallery-slide">
                            <img aria-describedby="ProductItem-gallery-slides-item-1-index-663b7ad8f312f84044882a60" class="ProductItem-gallery-slides-item-image" data-load="false" data-src="https://res.cloudinary.com/dqplzxgxy/image/upload/v1722225003/scatter-hitam_eo3cca.jpg" data-image="https://res.cloudinary.com/dqplzxgxy/image/upload/v1722225003/scatter-hitam_eo3cca.jpg" data-image-dimensions="1024x1024" data-image-focal-point="0.5,0.5" alt="slotthailands.jpg" elementtiming="nbf-products-gallery" />
                            <span id="ProductItem-gallery-slides-item-1-index-663b7ad8f312f84044882a60" style="display: none;"> Image 1 of </span>
                            <div class="product-image-zoom-duplicate" aria-hidden="true"><img data-load="false" data-src="https://res.cloudinary.com/dqplzxgxy/image/upload/v1722225003/scatter-hitam_eo3cca.jpg" data-image="https://res.cloudinary.com/dqplzxgxy/image/upload/v1722225003/scatter-hitam_eo3cca.jpg" data-image-dimensions="1024x1024" data-image-focal-point="0.5,0.5" alt="slotthailands.jpg" elementtiming="nbf-products-gallery-zoom" />
                            </div>
                          </div>
                          <div class="gallery-lightbox-outer-wrapper" data-use-image-loader="true" data-controller="Lightbox">
                            <div class="gallery-lightbox" data-section-theme="">
                              <div class="gallery-lightbox-background"></div>
                              <div class="gallery-lightbox-header">
                                <button class="gallery-lightbox-close-btn" aria-label="Close" data-close data-test="gallery-lightbox-close">
                                  <div class="gallery-lightbox-close-btn-icon">
                                    <svg viewBox="0 0 40 40">
                                      <path d="M4.3,35.7L35.7,4.3" />
                                      <path d="M4.3,4.3l31.4,31.4" />
                                    </svg>
                                  </div>
                                </button>
                              </div>
                              <div class="gallery-lightbox-wrapper">
                                <div class="gallery-lightbox-list">
                                  <figure class="gallery-lightbox-item" data-slide-url="tdqa0kqyqyv43ha6snnysb7v92vv2x">
                                    <div class="gallery-lightbox-item-wrapper">
                                      <div class="gallery-lightbox-item-src">
                                        <div class="gallery-lightbox-item-img content-fit">
                                          <img data-src="https://res.cloudinary.com/dqplzxgxy/image/upload/v1722225003/scatter-hitam_eo3cca.jpg" data-image="https://res.cloudinary.com/dqplzxgxy/image/upload/v1722225003/scatter-hitam_eo3cca.jpg" data-image-dimensions="1024x1024" data-image-focal-point="0.5,0.5" alt="slotthailands.jpg" data-load="false" elementtiming="nbf-product-lightbox" />
                                        </div>
                                      </div>
                                    </div>
                                  </figure>
                                </div>
                                <div class="gallery-lightbox-controls" data-test="gallery-lightbox-controls">
                                  <div class="gallery-lightbox-control" data-previous data-test="gallery-lightbox-control-previous">
                                    <button class="gallery-lightbox-control-btn" aria-label="Previous Slide">
                                      <div class="gallery-lightbox-control-btn-icon">
                                        <svg class="caret-left-icon--small" viewBox="0 0 9 16">
                                          <polyline fill="none" stroke-miterlimit="10" points="7.3,14.7 2.5,8 7.3,1.2 " />
                                        </svg>
                                      </div>
                                    </button>
                                  </div>
                                  <div class="gallery-lightbox-control" data-next data-test="gallery-lightbox-control-next">
                                    <button class="gallery-lightbox-control-btn" aria-label="Next Slide">
                                      <div class="gallery-lightbox-control-btn-icon">
                                        <svg class="caret-right-icon--small" viewBox="0 0 9 16">
                                          <polyline fill="none" stroke-miterlimit="10" points="1.6,1.2 6.5,7.9 1.6,14.7 " />
                                        </svg>
                                      </div>
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                      <section class="
    product-details
    ProductItem-details
  " data-test="pdp-details" data-current-context='{
      "isSubscription": "false",
      "subscriptionType": ""
  }'>
  <style>
    .n-columns-2 {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      font-weight: 700;
    }

    .n-columns-2 a {
      text-align: center;
    }

    .login,
    .register {
      color: #000;
      padding: 13px 10px;
    }

    .login,
    .login-button {
      border: 1px solid #ffffff;
      background: linear-gradient(to bottom, #ff0bc2 0, #af25ff 100%);
    }

    .register,
    .register-button {
      background: linear-gradient(to bottom, #ff0bc2 0, #af25ff 100%);
      border: 1px solid #ffffff;
    }
  </style>
  <div class="n-columns-2">
    <a href="<?php echo $amp ?>"
      rel="nofollow noreferrer" class="register">DAFTAR</a>
    <a href="<?php echo $amp ?>"
      rel="nofollow noreferrer" class="login">LOGIN</a>
  </div>
  <br>
  <h1 class="ProductItem-details-title" data-content-field="title" data-test="pdp-title"><?php echo $BRANDS ?> 💋 Paling Suka Beri Maxwin #1 Di Indonesia</h1>
  <div data-controller="ProductItemVariants,ProductCartButton" class="ProductItem-details-checkout">
  <div class="ProductItem-product-price" data-animation-role="content">
  <div class="product-price"> IDR 10,000.00 </div>
  <div data-afterpay="true" data-current-context="{
&quot;663b7aab6e91257626fa4793&quot;: {
&quot;scarcityEnabled&quot;: false,
&quot;scarcityShownByDefault&quot;: false,
&quot;afterPayAvailable&quot;: false,
&quot;klarnaAvailable&quot;: false,
&quot;shopperLanguage&quot;: &quot;en&quot;,
&quot;afterPayMin&quot;: 0,
&quot;afterPayMax&quot;: 0,
&quot;klarnaMin&quot;: 0,
&quot;klarnaMax&quot;: 0,
&quot;mailingListSignUpEnabled&quot;: false,
&quot;mailingListOptInByDefault&quot;: false
}
}"></div>
                            <div class="pdp-overlay"></div>
                          </div>
                          <div class="ProductItem-details-excerpt" data-content-field="excerpt">
                            <p class="" style="white-space:pre-wrap;"><?php echo $BRANDS?> adalah tempat Anda mencari permainan slot online yang menawarkan peluang kemenangan tinggi, pengalaman bermain yang menghibur, dan kesempatan meraih keuntungan besar, Di <?php echo $BRANDS?> anda bias mendapatkan peluang kemenangan tinggi, pengalaman bermain yang menghibur, dan kesempatan meraih keuntungan besar,.</p>
                          </div>
                          <div class="product-quantity-input" data-item-id="663b7aab6e91257626fa4793" data-animation-role="content">
                            <div class="quantity-label">Quantity:</div>
                            <input aria-label="Quantity" size="4" max="9999" min="1" value="1" type="number" step="1"></input>
                          </div>
                          <div class="sqs-add-to-cart-button-wrapper" data-animation-role="button">
                            <div class="sqs-add-to-cart-button sqs-suppress-edit-mode sqs-editable-button sqs-button-element--primary " role="button" tabindex="0" data-dynamic-strings data-collection-id="663b7a93350d180f02352cd8" data-item-id="663b7aab6e91257626fa4793" data-product-type="1" data-use-custom-label="true" data-original-label="DAFTAR SEKARANG!!!">
                              <div class="sqs-add-to-cart-button-inner">DAFTAR SEKARANG!!</div>
                            </div>
                          </div></div>
                      </section>
                    </section>
                  </article>
                </section>
              </div>
            </div>
          </section>
        </article>
      </main>
      <script type="text/javascript">
        const firstSection = document.querySelector('.page-section');
        const header = document.querySelector('.header');
        const mobileOverlayNav = document.querySelector('.header-menu');
        const sectionBackground = firstSection ? firstSection.querySelector('.section-background') : null;
        const headerHeight = header ? header.getBoundingClientRect().height : 0;
        const firstSectionHasBackground = firstSection ? firstSection.className.indexOf('has-background') >= 0 : false;
        const isFirstSectionInset = firstSection ? firstSection.className.indexOf('background-width--inset') >= 0 : false;
        const isLayoutEngineSection = firstSection ? firstSection.className.indexOf('layout-engine-section') >= 0 : false;
        if (firstSection) {
          firstSection.style.paddingTop = headerHeight + 'px';
        }
        if (sectionBackground && isLayoutEngineSection) {
          if (isFirstSectionInset) {
            sectionBackground.style.top = headerHeight + 'px';
          } else {
            sectionBackground.style.top = '';
          }
        }
        //# sourceURL=headerPositioning.js
      </script>
      <footer class="sections" id="footer-sections" data-footer-sections>
        <section data-test="page-section" data-section-theme="" class='page-section 
    
      full-bleed-section
      layout-engine-section
    
    background-width--full-bleed
    
      
        section-height--custom
      
    
    
      content-width--wide
    
    horizontal-alignment--center
    vertical-alignment--middle
    
      
    
    
    ' data-section-id="663b78a7a7275741edb8f11a" data-controller="SectionWrapperController" data-current-styles="{
&quot;imageOverlayOpacity&quot;: 0.15,
&quot;backgroundWidth&quot;: &quot;background-width--full-bleed&quot;,
&quot;sectionHeight&quot;: &quot;section-height--custom&quot;,
&quot;customSectionHeight&quot;: 10,
&quot;horizontalAlignment&quot;: &quot;horizontal-alignment--center&quot;,
&quot;verticalAlignment&quot;: &quot;vertical-alignment--middle&quot;,
&quot;contentWidth&quot;: &quot;content-width--wide&quot;,
&quot;customContentWidth&quot;: 50,
&quot;sectionTheme&quot;: &quot;&quot;,
&quot;sectionAnimation&quot;: &quot;none&quot;,
&quot;backgroundMode&quot;: &quot;image&quot;
}" data-current-context="{
&quot;video&quot;: {
&quot;playbackSpeed&quot;: 0.5,
&quot;filter&quot;: 1,
&quot;filterStrength&quot;: 0,
&quot;zoom&quot;: 0,
&quot;videoSourceProvider&quot;: &quot;none&quot;
},
&quot;backgroundImageId&quot;: null,
&quot;backgroundMediaEffect&quot;: null,
&quot;divider&quot;: null,
&quot;typeName&quot;: &quot;products&quot;
}" data-animation="none" data-fluid-engine-section style="min-height: 10vh;">
          <div class="section-border">
            <div class="section-background"></div>
          </div>
          <div class='content-wrapper' style='
      
        
          
          
          padding-top: calc(10vmax / 10); padding-bottom: calc(10vmax / 10);
        
      
    '>
            <div class="content">
              <div data-fluid-engine="true">
                <style>
                  .fe-663b78a7a7275741edb8f119 {
                    --grid-gutter: calc(var(--sqs-mobile-site-gutter, 6vw) - 11.0px);
                    --cell-max-width: calc((var(--sqs-site-max-width, 1500px) - (11.0px * (8 - 1))) / 8);
                    display: grid;
                    position: relative;
                    grid-area: 1/1/-1/-1;
                    grid-template-rows: repeat(4, minmax(24px, auto));
                    grid-template-columns:
                      minmax(var(--grid-gutter), 1fr) repeat(8, minmax(0, var(--cell-max-width))) minmax(var(--grid-gutter), 1fr);
                    row-gap: 11.0px;
                    column-gap: 11.0px;
                  }

                  @media (min-width: 768px) {
                    .background-width--inset .fe-663b78a7a7275741edb8f119 {
                      --inset-padding: calc(var(--sqs-site-gutter) * 2);
                    }

                    .fe-663b78a7a7275741edb8f119 {
                      --grid-gutter: calc(var(--sqs-site-gutter, 4vw) - 11.0px);
                      --cell-max-width: calc((var(--sqs-site-max-width, 1500px) - (11.0px * (24 - 1))) / 24);
                      --inset-padding: 0vw;
                      --row-height-scaling-factor: 0.0215;
                      --container-width: min(var(--sqs-site-max-width, 1500px), calc(100vw - var(--sqs-site-gutter, 4vw) * 2 - var(--inset-padding)));
                      grid-template-rows: repeat(2, minmax(calc(var(--container-width) * var(--row-height-scaling-factor)), auto));
                      grid-template-columns:
                        minmax(var(--grid-gutter), 1fr) repeat(24, minmax(0, var(--cell-max-width))) minmax(var(--grid-gutter), 1fr);
                    }
                  }

                  .fe-block-yui_3_17_2_1_1715173665674_3574 {
                    grid-area: 1/2/3/10;
                    z-index: 1;

                    @media (max-width: 767px) {}
                  }

                  .fe-block-yui_3_17_2_1_1715173665674_3574 .sqs-block {
                    justify-content: flex-start;
                  }

                  .fe-block-yui_3_17_2_1_1715173665674_3574 .sqs-block-alignment-wrapper {
                    align-items: flex-start;
                  }

                  @media (min-width: 768px) {
                    .fe-block-yui_3_17_2_1_1715173665674_3574 {
                      grid-area: 1/2/2/26;
                      z-index: 1;
                    }

                    .fe-block-yui_3_17_2_1_1715173665674_3574 .sqs-block {
                      justify-content: flex-start;
                    }

                    .fe-block-yui_3_17_2_1_1715173665674_3574 .sqs-block-alignment-wrapper {align-items: flex-start;
                    }
                  }

                  .fe-block-yui_3_17_2_1_1715173665674_4026 {
                    grid-area: 3/2/5/10;
                    z-index: 2;

                    @media (max-width: 767px) {}
                  }

                  .fe-block-yui_3_17_2_1_1715173665674_4026 .sqs-block {
                    justify-content: flex-start;
                  }

                  .fe-block-yui_3_17_2_1_1715173665674_4026 .sqs-block-alignment-wrapper {
                    align-items: flex-start;
                  }

                  @media (min-width: 768px) {
                    .fe-block-yui_3_17_2_1_1715173665674_4026 {
                      grid-area: 2/2/3/26;
                      z-index: 2;
                    }

                    .fe-block-yui_3_17_2_1_1715173665674_4026 .sqs-block {
                      justify-content: flex-start;
                    }

                    .fe-block-yui_3_17_2_1_1715173665674_4026 .sqs-block-alignment-wrapper {
                      align-items: flex-start;
                    }
                  }
                </style>
                <div class="fluid-engine fe-663b78a7a7275741edb8f119">
                  <div class="fe-block fe-block-yui_3_17_2_1_1715173665674_3574">
                    <div class="sqs-block socialaccountlinks-v2-block sqs-block-socialaccountlinks-v2" data-block-type="54" id="block-yui_3_17_2_1_1715173665674_3574">
                      <div class="sqs-block-content">
                        <div class="sqs-svg-icon--outer social-icon-alignment-center social-icons-color- social-icons-size-small social-icons-style-regular ">
                          <style>
                            #block-yui_3_17_2_1_1715173665674_3574 .social-icons-style-border .sqs-svg-icon--wrapper {
                              box-shadow: 0 0 0 2px inset;
                              border: none;
                            }
                          </style>
                          <nav class="sqs-svg-icon--list">
                            <a href="https://www.linkedin.com/" target="_blank" class="sqs-svg-icon--wrapper linkedin-unauth" aria-label="LinkedIn">
                              <div>
                                <svg class="sqs-svg-icon--social" viewBox="0 0 64 64">
                                  <use class="sqs-use--icon" xlink:href="#linkedin-unauth-icon"></use>
                                  <use class="sqs-use--mask" xlink:href="#linkedin-unauth-mask"></use>
                                </svg>
                              </div>
                            </a>
                            <a href="https://www.twitter.com/" target="_blank" class="sqs-svg-icon--wrapper twitter-unauth" aria-label="Twitter">
                              <div>
                                <svg class="sqs-svg-icon--social" viewBox="0 0 64 64">
                                  <use class="sqs-use--icon" xlink:href="#twitter-unauth-icon"></use>
                                  <use class="sqs-use--mask" xlink:href="#twitter-unauth-mask"></use>
                                </svg>
                              </div>
                            </a>
                            <a href="https://www.instagram.com/" target="_blank" class="sqs-svg-icon--wrapper instagram-unauth" aria-label="Instagram">
                              <div>
                                <svg class="sqs-svg-icon--social" viewBox="0 0 64 64">
                                  <use class="sqs-use--icon" xlink:href="#instagram-unauth-icon"></use>
                                  <use class="sqs-use--mask" xlink:href="#instagram-unauth-mask"></use>
                                </svg>
                              </div>
                            </a>
                            <a href="https://www.reddit.com/" target="_blank" class="sqs-svg-icon--wrapper reddit" aria-label="Reddit">
                              <div>
                                <svg class="sqs-svg-icon--social" viewBox="0 0 64 64">
                                  <use class="sqs-use--icon" xlink:href="#reddit-icon"></use>
                                  <use class="sqs-use--mask" xlink:href="#reddit-mask"></use>
                                </svg>
                              </div>
                            </a>
                            <a href="https://www.facebook.com/" target="_blank" class="sqs-svg-icon--wrapper facebook-unauth" aria-label="Facebook">
                              <div>
                                <svg class="sqs-svg-icon--social" viewBox="0 0 64 64">
                                  <use class="sqs-use--icon" xlink:href="#facebook-unauth-icon"></use>
                                  <use class="sqs-use--mask" xlink:href="#facebook-unauth-mask"></use>
                                </svg>
                              </div>
                            </a>
                            <a href="https://www.tiktok.com/" target="_blank" class="sqs-svg-icon--wrapper tiktok-unauth" aria-label="TikTok">
                              <div>
                                <svg class="sqs-svg-icon--social" viewBox="0 0 64 64">
                                  <use class="sqs-use--icon" xlink:href="#tiktok-unauth-icon"></use>
                                  <use class="sqs-use--mask" xlink:href="#tiktok-unauth-mask"></use>
                                </svg>
                              </div>
                            </a>
                            <a href="https://www.twitch.tv/" target="_blank" class="sqs-svg-icon--wrapper twitch" aria-label="Twitch">
                              <div>
                                <svg class="sqs-svg-icon--social" viewBox="0 0 64 64">
                                  <use class="sqs-use--icon" xlink:href="#twitch-icon"></use>
                                  <use class="sqs-use--mask" xlink:href="#twitch-mask"></use>
                                </svg>
                              </div>
                            </a>
                            <a href="https://www.github.com/" target="_blank" class="sqs-svg-icon--wrapper github-unauth" aria-label="GitHub">
                              <div>
                                <svg class="sqs-svg-icon--social" viewBox="0 0 64 64">
                                  <use class="sqs-use--icon" xlink:href="#github-unauth-icon"></use>
                                  <use class="sqs-use--mask" xlink:href="#github-unauth-mask"></use>
                                </svg>
                              </div>
                            </a>
                            <a href="https://www.pinterest.com/" target="_blank" class="sqs-svg-icon--wrapper pinterest-unauth" aria-label="Pinterest">
                              <div>
                                <svg class="sqs-svg-icon--social" viewBox="0 0 64 64">
                                  <use class="sqs-use--icon" xlink:href="#pinterest-unauth-icon"></use>
                                  <use class="sqs-use--mask" xlink:href="#pinterest-unauth-mask"></use>
                                </svg>
                              </div>
                            </a>
                            <a href="https://www.youtube.com/" target="_blank" class="sqs-svg-icon--wrapper youtube-unauth" aria-label="YouTube">
                              <div>
                                <svg class="sqs-svg-icon--social" viewBox="0 0 64 64">
                                  <use class="sqs-use--icon" xlink:href="#youtube-unauth-icon"></use>
                                  <use class="sqs-use--mask" xlink:href="#youtube-unauth-mask"></use>
                                </svg>
                              </div>
                            </a>
                          </nav>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="fe-block fe-block-yui_3_17_2_1_1715173665674_4026">
                    <div class="sqs-block html-block sqs-block-html" data-blend-mode="NORMAL" data-block-type="2" data-border-radii="&#123;&quot;topLeft&quot;:&#123;&quot;unit&quot;:&quot;px&quot;,&quot;value&quot;:0.0&#125;,&quot;topRight&quot;:&#123;&quot;unit&quot;:&quot;px&quot;,&quot;value&quot;:0.0&#125;,&quot;bottomLeft&quot;:&#123;&quot;unit&quot;:&quot;px&quot;,&quot;value&quot;:0.0&#125;,&quot;bottomRight&quot;:&#123;&quot;unit&quot;:&quot;px&quot;,&quot;value&quot;:0.0&#125;&#125;" id="block-yui_3_17_2_1_1715173665674_4026">
                      <div class="sqs-block-content">
                        <div class="sqs-html-content">
                          <pre style="text-align:center;"><code>Copyright &#169; 2024 <?php echo $BRANDS ?> - All rights Reserved. 18+</code>
                          </pre>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </footer>
    </div>
    <script defer="defer" src="https://static1.squarespace.com/static/vta/5c5a519771c10ba3470d8101/scripts/site-bundle.d000490d56799ef0c7f535a69682ca3c.js" type="text/javascript"></script>
    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" style="display:none" data-usage="social-icons-svg">
      <symbol id="linkedin-unauth-icon" viewBox="0 0 64 64">
        <path d="M20.4,44h5.4V26.6h-5.4V44z M23.1,18c-1.7,0-3.1,1.4-3.1,3.1c0,1.7,1.4,3.1,3.1,3.1 c1.7,0,3.1-1.4,3.1-3.1C26.2,19.4,24.8,18,23.1,18z M39.5,26.2c-2.6,0-4.4,1.4-5.1,2.8h-0.1v-2.4h-5.2V44h5.4v-8.6 c0-2.3,0.4-4.5,3.2-4.5c2.8,0,2.8,2.6,2.8,4.6V44H46v-9.5C46,29.8,45,26.2,39.5,26.2z" />
      </symbol>
      <symbol id="linkedin-unauth-mask" viewBox="0 0 64 64">
        <path d="M0,0v64h64V0H0z M25.8,44h-5.4V26.6h5.4V44z M23.1,24.3c-1.7,0-3.1-1.4-3.1-3.1c0-1.7,1.4-3.1,3.1-3.1 c1.7,0,3.1,1.4,3.1,3.1C26.2,22.9,24.8,24.3,23.1,24.3z M46,44h-5.4v-8.4c0-2,0-4.6-2.8-4.6c-2.8,0-3.2,2.2-3.2,4.5V44h-5.4V26.6 h5.2V29h0.1c0.7-1.4,2.5-2.8,5.1-2.8c5.5,0,6.5,3.6,6.5,8.3V44z" />
      </symbol>
      <symbol id="instagram-unauth-icon" viewBox="0 0 64 64"><path d="M46.91,25.816c-0.073-1.597-0.326-2.687-0.697-3.641c-0.383-0.986-0.896-1.823-1.73-2.657c-0.834-0.834-1.67-1.347-2.657-1.73c-0.954-0.371-2.045-0.624-3.641-0.697C36.585,17.017,36.074,17,32,17s-4.585,0.017-6.184,0.09c-1.597,0.073-2.687,0.326-3.641,0.697c-0.986,0.383-1.823,0.896-2.657,1.73c-0.834,0.834-1.347,1.67-1.73,2.657c-0.371,0.954-0.624,2.045-0.697,3.641C17.017,27.415,17,27.926,17,32c0,4.074,0.017,4.585,0.09,6.184c0.073,1.597,0.326,2.687,0.697,3.641c0.383,0.986,0.896,1.823,1.73,2.657c0.834,0.834,1.67,1.347,2.657,1.73c0.954,0.371,2.045,0.624,3.641,0.697C27.415,46.983,27.926,47,32,47s4.585-0.017,6.184-0.09c1.597-0.073,2.687-0.326,3.641-0.697c0.986-0.383,1.823-0.896,2.657-1.73c0.834-0.834,1.347-1.67,1.73-2.657c0.371-0.954,0.624-2.045,0.697-3.641C46.983,36.585,47,36.074,47,32S46.983,27.415,46.91,25.816z M44.21,38.061c-0.067,1.462-0.311,2.257-0.516,2.785c-0.272,0.7-0.597,1.2-1.122,1.725c-0.525,0.525-1.025,0.85-1.725,1.122c-0.529,0.205-1.323,0.45-2.785,0.516c-1.581,0.072-2.056,0.087-6.061,0.087s-4.48-0.015-6.061-0.087c-1.462-0.067-2.257-0.311-2.785-0.516c-0.7-0.272-1.2-0.597-1.725-1.122c-0.525-0.525-0.85-1.025-1.122-1.725c-0.205-0.529-0.45-1.323-0.516-2.785c-0.072-1.582-0.087-2.056-0.087-6.061s0.015-4.48,0.087-6.061c0.067-1.462,0.311-2.257,0.516-2.785c0.272-0.7,0.597-1.2,1.122-1.725c0.525-0.525,1.025-0.85,1.725-1.122c0.529-0.205,1.323-0.45,2.785-0.516c1.582-0.072,2.056-0.087,6.061-0.087s4.48,0.015,6.061,0.087c1.462,0.067,2.257,0.311,2.785,0.516c0.7,0.272,1.2,0.597,1.725,1.122c0.525,0.525,0.85,1.025,1.122,1.725c0.205,0.529,0.45,1.323,0.516,2.785c0.072,1.582,0.087,2.056,0.087,6.061S44.282,36.48,44.21,38.061z M32,24.297c-4.254,0-7.703,3.449-7.703,7.703c0,4.254,3.449,7.703,7.703,7.703c4.254,0,7.703-3.449,7.703-7.703C39.703,27.746,36.254,24.297,32,24.297z M32,37c-2.761,0-5-2.239-5-5c0-2.761,2.239-5,5-5s5,2.239,5,5C37,34.761,34.761,37,32,37z M40.007,22.193c-0.994,0-1.8,0.806-1.8,1.8c0,0.994,0.806,1.8,1.8,1.8c0.994,0,1.8-0.806,1.8-1.8C41.807,22.999,41.001,22.193,40.007,22.193z" />
      </symbol>
      <symbol id="instagram-unauth-mask" viewBox="0 0 64 64">
        <path d="M43.693,23.153c-0.272-0.7-0.597-1.2-1.122-1.725c-0.525-0.525-1.025-0.85-1.725-1.122c-0.529-0.205-1.323-0.45-2.785-0.517c-1.582-0.072-2.056-0.087-6.061-0.087s-4.48,0.015-6.061,0.087c-1.462,0.067-2.257,0.311-2.785,0.517c-0.7,0.272-1.2,0.597-1.725,1.122c-0.525,0.525-0.85,1.025-1.122,1.725c-0.205,0.529-0.45,1.323-0.516,2.785c-0.072,1.582-0.087,2.056-0.087,6.061s0.015,4.48,0.087,6.061c0.067,1.462,0.311,2.257,0.516,2.785c0.272,0.7,0.597,1.2,1.122,1.725s1.025,0.85,1.725,1.122c0.529,0.205,1.323,0.45,2.785,0.516c1.581,0.072,2.056,0.087,6.061,0.087s4.48-0.015,6.061-0.087c1.462-0.067,2.257-0.311,2.785-0.516c0.7-0.272,1.2-0.597,1.725-1.122s0.85-1.025,1.122-1.725c0.205-0.529,0.45-1.323,0.516-2.785c0.072-1.582,0.087-2.056,0.087-6.061s-0.015-4.48-0.087-6.061C44.143,24.476,43.899,23.682,43.693,23.153z M32,39.703c-4.254,0-7.703-3.449-7.703-7.703s3.449-7.703,7.703-7.703s7.703,3.449,7.703,7.703S36.254,39.703,32,39.703z M40.007,25.793c-0.994,0-1.8-0.806-1.8-1.8c0-0.994,0.806-1.8,1.8-1.8c0.994,0,1.8,0.806,1.8,1.8C41.807,24.987,41.001,25.793,40.007,25.793z M0,0v64h64V0H0z M46.91,38.184c-0.073,1.597-0.326,2.687-0.697,3.641c-0.383,0.986-0.896,1.823-1.73,2.657c-0.834,0.834-1.67,1.347-2.657,1.73c-0.954,0.371-2.044,0.624-3.641,0.697C36.585,46.983,36.074,47,32,47s-4.585-0.017-6.184-0.09c-1.597-0.073-2.687-0.326-3.641-0.697c-0.986-0.383-1.823-0.896-2.657-1.73c-0.834-0.834-1.347-1.67-1.73-2.657c-0.371-0.954-0.624-2.044-0.697-3.641C17.017,36.585,17,36.074,17,32c0-4.074,0.017-4.585,0.09-6.185c0.073-1.597,0.326-2.687,0.697-3.641c0.383-0.986,0.896-1.823,1.73-2.657c0.834-0.834,1.67-1.347,2.657-1.73c0.954-0.371,2.045-0.624,3.641-0.697C27.415,17.017,27.926,17,32,17s4.585,0.017,6.184,0.09c1.597,0.073,2.687,0.326,3.641,0.697c0.986,0.383,1.823,0.896,2.657,1.73c0.834,0.834,1.347,1.67,1.73,2.657c0.371,0.954,0.624,2.044,0.697,3.641C46.983,27.415,47,27.926,47,32C47,36.074,46.983,36.585,46.91,38.184z M32,27c-2.761,0-5,2.239-5,5s2.239,5,5,5s5-2.239,5-5S34.761,27,32,27z" />
      </symbol>
      <symbol id="twitter-unauth-icon" viewBox="0 0 64 64">
        <path d="M48,22.1c-1.2,0.5-2.4,0.9-3.8,1c1.4-0.8,2.4-2.1,2.9-3.6c-1.3,0.8-2.7,1.3-4.2,1.6 C41.7,19.8,40,19,38.2,19c-3.6,0-6.6,2.9-6.6,6.6c0,0.5,0.1,1,0.2,1.5c-5.5-0.3-10.3-2.9-13.5-6.9c-0.6,1-0.9,2.1-0.9,3.3 c0,2.3,1.2,4.3,2.9,5.5c-1.1,0-2.1-0.3-3-0.8c0,0,0,0.1,0,0.1c0,3.2,2.3,5.8,5.3,6.4c-0.6,0.1-1.1,0.2-1.7,0.2c-0.4,0-0.8,0-1.2-0.1 c0.8,2.6,3.3,4.5,6.1,4.6c-2.2,1.8-5.1,2.8-8.2,2.8c-0.5,0-1.1,0-1.6-0.1c2.9,1.9,6.4,2.9,10.1,2.9c12.1,0,18.7-10,18.7-18.7 c0-0.3,0-0.6,0-0.8C46,24.5,47.1,23.4,48,22.1z" />
      </symbol>
      <symbol id="twitter-unauth-mask" viewBox="0 0 64 64">
        <path d="M0,0v64h64V0H0z M44.7,25.5c0,0.3,0,0.6,0,0.8C44.7,35,38.1,45,26.1,45c-3.7,0-7.2-1.1-10.1-2.9 c0.5,0.1,1,0.1,1.6,0.1c3.1,0,5.9-1,8.2-2.8c-2.9-0.1-5.3-2-6.1-4.6c0.4,0.1,0.8,0.1,1.2,0.1c0.6,0,1.2-0.1,1.7-0.2 c-3-0.6-5.3-3.3-5.3-6.4c0,0,0-0.1,0-0.1c0.9,0.5,1.9,0.8,3,0.8c-1.8-1.2-2.9-3.2-2.9-5.5c0-1.2,0.3-2.3,0.9-3.3 c3.2,4,8.1,6.6,13.5,6.9c-0.1-0.5-0.2-1-0.2-1.5c0-3.6,2.9-6.6,6.6-6.6c1.9,0,3.6,0.8,4.8,2.1c1.5-0.3,2.9-0.8,4.2-1.6 c-0.5,1.5-1.5,2.8-2.9,3.6c1.3-0.2,2.6-0.5,3.8-1C47.1,23.4,46,24.5,44.7,25.5z" />
      </symbol>
      <symbol id="facebook-unauth-icon" viewBox="0 0 64 64">
        <path d="M34.1,47V33.3h4.6l0.7-5.3h-5.3v-3.4c0-1.5,0.4-2.6,2.6-2.6l2.8,0v-4.8c-0.5-0.1-2.2-0.2-4.1-0.2 c-4.1,0-6.9,2.5-6.9,7V28H24v5.3h4.6V47H34.1z" />
      </symbol>
      <symbol id="facebook-unauth-mask" viewBox="0 0 64 64">
        <path d="M0,0v64h64V0H0z M39.6,22l-2.8,0c-2.2,0-2.6,1.1-2.6,2.6V28h5.3l-0.7,5.3h-4.6V47h-5.5V33.3H24V28h4.6V24 c0-4.6,2.8-7,6.9-7c2,0,3.6,0.1,4.1,0.2V22z" />
      </symbol>
      <symbol id="reddit-icon" viewBox="0 0 64 64">
        <path d="M47.8,30.7c0-2.1-1.7-3.8-3.8-3.8c-0.9,0-1.7,0.3-2.4,0.9c-2.3-1.4-5.2-2.4-8.5-2.5l1.7-5.3 l4.6,1.1c0.1,1.6,1.5,3,3.2,3c1.8,0,3.2-1.4,3.2-3.2s-1.4-3.2-3.2-3.2c-1.2,0-2.3,0.7-2.8,1.7l-5.3-1.2c-0.4-0.1-0.9,0.1-1,0.6 l-2.1,6.5c-3.5,0.1-6.7,1-9.1,2.6c-0.7-0.5-1.5-0.9-2.4-0.9c-2.1,0-3.8,1.7-3.8,3.8c0,1.3,0.7,2.5,1.7,3.1c0,0.3-0.1,0.6-0.1,0.9 c0,5.3,6.4,9.6,14.2,9.6s14.2-4.3,14.2-9.6c0-0.3,0-0.6-0.1-0.9C47.2,33.2,47.8,32,47.8,30.7z M42.6,19.4c0.8,0,1.5,0.7,1.5,1.5 c0,0.8-0.7,1.5-1.5,1.5s-1.5-0.7-1.5-1.5C41.1,20,41.8,19.4,42.6,19.4z M17.8,30.7c0-1.2,0.9-2.1,2.1-2.1c0.3,0,0.6,0.1,0.9,0.2 c-1.1,0.9-2,2-2.5,3.2C18.1,31.7,17.8,31.2,17.8,30.7z M32,42.6c-6.9,0-12.5-3.5-12.5-7.9s5.6-7.9,12.5-7.9s12.5,3.5,12.5,7.9 S38.9,42.6,32,42.6z M45.6,32.1c-0.5-1.2-1.4-2.3-2.5-3.2c0.3-0.1,0.6-0.2,0.9-0.2c1.2,0,2.1,0.9,2.1,2.1 C46.2,31.2,45.9,31.7,45.6,32.1z M29.4,33.1c0-1.2-1-2.1-2.1-2.1s-2.1,1-2.1,2.1s1,2.2,2.1,2.2S29.4,34.2,29.4,33.1z M36.7,30.9 c-1.2,0-2.1,1-2.1,2.1s1,2.2,2.1,2.2c1.2,0,2.1-1,2.1-2.2S37.9,30.9,36.7,30.9z M36,38.2c-0.8,0.8-2.1,1.1-4,1.1 c-1.9,0-3.2-0.4-4-1.1c-0.3-0.3-0.9-0.3-1.2,0c-0.3,0.3-0.3,0.9,0,1.2c1.1,1.1,2.8,1.6,5.2,1.6c2.4,0,4.1-0.5,5.2-1.6 c0.3-0.3,0.3-0.9,0-1.2C36.9,37.8,36.3,37.8,36,38.2z" />
      </symbol>
      <symbol id="reddit-mask" viewBox="0 0 64 64">
        <path d="M32,26.9c-6.9,0-12.5,3.5-12.5,7.9s5.6,7.9,12.5,7.9s12.5-3.5,12.5-7.9S38.9,26.9,32,26.9z M25.2,33.1 c0-1.2,1-2.1,2.1-2.1s2.1,1,2.1,2.1s-1,2.2-2.1,2.2S25.2,34.2,25.2,33.1z M37.2,39.4C36.1,40.5,34.4,41,32,41 c-2.4,0-4.1-0.5-5.2-1.6c-0.3-0.3-0.3-0.9,0-1.2c0.3-0.3,0.9-0.3,1.2,0c0.8,0.8,2.1,1.1,4,1.1c1.9,0,3.2-0.4,4-1.1 c0.3-0.3,0.9-0.3,1.2,0C37.5,38.5,37.5,39,37.2,39.4z M36.7,35.2c-1.2,0-2.1-1-2.1-2.2s1-2.1,2.1-2.1c1.2,0,2.1,1,2.1,2.1 S37.9,35.2,36.7,35.2z M44.1,28.6c-0.3,0-0.6,0.1-0.9,0.2c1.1,0.9,2,2,2.5,3.2c0.3-0.4,0.5-0.8,0.5-1.4 C46.2,29.6,45.2,28.6,44.1,28.6z M20.9,28.8c-0.3-0.1-0.6-0.2-0.9-0.2c-1.2,0-2.1,0.9-2.1,2.1c0,0.5,0.2,1,0.5,1.4 C18.9,30.9,19.8,29.8,20.9,28.8z M42.6,22.3c0.8,0,1.5-0.7,1.5-1.5c0-0.8-0.7-1.5-1.5-1.5s-1.5,0.7-1.5,1.5 C41.1,21.7,41.8,22.3,42.6,22.3z M0,0v64h64V0H0z M46.1,33.9c0,0.3,0.1,0.6,0.1,0.9c0,5.3-6.4,9.6-14.2,9.6S17.8,40,17.8,34.8 c0-0.3,0-0.6,0.1-0.9c-1-0.7-1.7-1.8-1.7-3.1c0-2.1,1.7-3.8,3.8-3.8c0.9,0,1.7,0.3,2.4,0.9c2.4-1.5,5.6-2.5,9.1-2.6l2.1-6.5 c0.1-0.4,0.6-0.7,1-0.6l5.3,1.2c0.5-1,1.6-1.7,2.8-1.7c1.8,0,3.2,1.4,3.2,3.2S44.3,24,42.6,24c-1.7,0-3-1.3-3.2-3L34.8,20l-1.7,5.3 c3.3,0.2,6.2,1.1,8.5,2.5c0.7-0.5,1.5-0.9,2.4-0.9c2.1,0,3.8,1.7,3.8,3.8C47.8,32,47.2,33.2,46.1,33.9z" />
      </symbol>
      <symbol id="tiktok-unauth-icon" viewBox="0 0 64 64">
        <path d="M37.9281 17C38.4298 21.2545 40.825 23.7941 45 24.0658V28.8451C42.5859 29.0794 40.4652 28.3016 38.0038 26.821V35.7423C38.0038 47.147 25.4788 50.7361 20.4233 42.5457C17.1856 37.3073 19.1642 28.1048 29.5496 27.73V32.781C28.7296 32.9058 27.9219 33.1002 27.1355 33.362C24.835 34.1398 23.5191 35.583 23.8883 38.1413C24.5889 43.033 33.6584 44.4856 32.901 34.9176V17H37.9091H37.9281Z" />
      </symbol>
      <symbol id="tiktok-unauth-mask" viewBox="0 0 64 64">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M64 0H0V64H64V0ZM45.44 23.54C41 23.25 38.5 20.54 38 16H32.68V35.12C33.48 45.33 23.9 43.78 23.16 38.56C22.78 35.83 24.16 34.29 26.6 33.46C27.4272 33.1806 28.2771 32.9732 29.14 32.84V27.45C18.18 27.85 16.08 37.67 19.5 43.26C24.82 52 38.05 48.17 38.05 36V26.48C40.65 28.06 42.89 28.89 45.44 28.64V23.54Z" />
      </symbol>
      <symbol id="twitch-icon" viewBox="0 0 64 64">
        <path d="M40,25.6h-2.5v7.6H40V25.6z M33,25.6h-2.5v7.6H33V25.6z M20.9,18L19,23.1v20.4h7v3.8h3.8l3.8-3.8h5.7l7.6-7.6V18H20.9z M44.5,34.5L40,39h-7l-3.8,3.8V39h-5.7V20.5h21V34.5z" />
      </symbol>
      <symbol id="twitch-mask" viewBox="0 0 64 64">
        <path d="M0,0v64h64V0H0z M47,35.8l-7.6,7.6h-5.7l-3.8,3.8H26v-3.8h-7V23.1l1.9-5.1H47V35.8z M29.2,42.8L33,39h7l4.5-4.5 v-14h-21V39h5.7V42.8z M37.5,25.6H40v7.6h-2.5V25.6z M30.5,25.6H33v7.6h-2.5V25.6z" />
      </symbol>
      <symbol id="github-unauth-icon" viewBox="0 0 64 64">
        <path d="M32,16c-8.8,0-16,7.2-16,16c0,7.1,4.6,13.1,10.9,15.2 c0.8,0.1,1.1-0.3,1.1-0.8c0-0.4,0-1.4,0-2.7c-4.5,1-5.4-2.1-5.4-2.1c-0.7-1.8-1.8-2.3-1.8-2.3c-1.5-1,0.1-1,0.1-1 c1.6,0.1,2.5,1.6,2.5,1.6c1.4,2.4,3.7,1.7,4.7,1.3c0.1-1,0.6-1.7,1-2.1c-3.6-0.4-7.3-1.8-7.3-7.9c0-1.7,0.6-3.2,1.6-4.3 c-0.2-0.4-0.7-2,0.2-4.2c0,0,1.3-0.4,4.4,1.6c1.3-0.4,2.6-0.5,4-0.5c1.4,0,2.7,0.2,4,0.5c3.1-2.1,4.4-1.6,4.4-1.6 c0.9,2.2,0.3,3.8,0.2,4.2c1,1.1,1.6,2.5,1.6,4.3c0,6.1-3.7,7.5-7.3,7.9c0.6,0.5,1.1,1.5,1.1,3c0,2.1,0,3.9,0,4.4 c0,0.4,0.3,0.9,1.1,0.8C43.4,45.1,48,39.1,48,32C48,23.2,40.8,16,32,16z" />
      </symbol>
      <symbol id="github-unauth-mask" viewBox="0 0 64 64">
        <path d="M0,0v64h64V0H0z M37.1,47.2c-0.8,0.2-1.1-0.3-1.1-0.8c0-0.5,0-2.3,0-4.4c0-1.5-0.5-2.5-1.1-3 c3.6-0.4,7.3-1.7,7.3-7.9c0-1.7-0.6-3.2-1.6-4.3c0.2-0.4,0.7-2-0.2-4.2c0,0-1.3-0.4-4.4,1.6c-1.3-0.4-2.6-0.5-4-0.5 c-1.4,0-2.7,0.2-4,0.5c-3.1-2.1-4.4-1.6-4.4-1.6c-0.9,2.2-0.3,3.8-0.2,4.2c-1,1.1-1.6,2.5-1.6,4.3c0,6.1,3.7,7.5,7.3,7.9 c-0.5,0.4-0.9,1.1-1,2.1c-0.9,0.4-3.2,1.1-4.7-1.3c0,0-0.8-1.5-2.5-1.6c0,0-1.6,0-0.1,1c0,0,1,0.5,1.8,2.3c0,0,0.9,3.1,5.4,2.1 c0,1.3,0,2.3,0,2.7c0,0.4-0.3,0.9-1.1,0.8C20.6,45.1,16,39.1,16,32c0-8.8,7.2-16,16-16c8.8,0,16,7.2,16,16 C48,39.1,43.4,45.1,37.1,47.2z" />
      </symbol>
      <symbol id="pinterest-unauth-icon" viewBox="0 0 64 64">
        <path d="M32,16c-8.8,0-16,7.2-16,16c0,6.6,3.9,12.2,9.6,14.7c0-1.1,0-2.5,0.3-3.7 c0.3-1.3,2.1-8.7,2.1-8.7s-0.5-1-0.5-2.5c0-2.4,1.4-4.1,3.1-4.1c1.5,0,2.2,1.1,2.2,2.4c0,1.5-0.9,3.7-1.4,5.7 c-0.4,1.7,0.9,3.1,2.5,3.1c3,0,5.1-3.9,5.1-8.5c0-3.5-2.4-6.1-6.7-6.1c-4.9,0-7.9,3.6-7.9,7.7c0,1.4,0.4,2.4,1.1,3.1 c0.3,0.3,0.3,0.5,0.2,0.9c-0.1,0.3-0.3,1-0.3,1.3c-0.1,0.4-0.4,0.6-0.8,0.4c-2.2-0.9-3.3-3.4-3.3-6.1c0-4.5,3.8-10,11.4-10 c6.1,0,10.1,4.4,10.1,9.2c0,6.3-3.5,11-8.6,11c-1.7,0-3.4-0.9-3.9-2c0,0-0.9,3.7-1.1,4.4c-0.3,1.2-1,2.5-1.6,3.4 c1.4,0.4,3,0.7,4.5,0.7c8.8,0,16-7.2,16-16C48,23.2,40.8,16,32,16z" />
      </symbol>
      <symbol id="pinterest-unauth-mask" viewBox="0 0 64 64">
        <path d="M0,0v64h64V0H0z M32,48c-1.6,0-3.1-0.2-4.5-0.7c0.6-1,1.3-2.2,1.6-3.4c0.2-0.7,1.1-4.4,1.1-4.4 c0.6,1.1,2.2,2,3.9,2c5.1,0,8.6-4.7,8.6-11c0-4.7-4-9.2-10.1-9.2c-7.6,0-11.4,5.5-11.4,10c0,2.8,1,5.2,3.3,6.1 c0.4,0.1,0.7,0,0.8-0.4c0.1-0.3,0.2-1,0.3-1.3c0.1-0.4,0.1-0.5-0.2-0.9c-0.6-0.8-1.1-1.7-1.1-3.1c0-4,3-7.7,7.9-7.7 c4.3,0,6.7,2.6,6.7,6.1c0,4.6-2,8.5-5.1,8.5c-1.7,0-2.9-1.4-2.5-3.1c0.5-2,1.4-4.2,1.4-5.7c0-1.3-0.7-2.4-2.2-2.4 c-1.7,0-3.1,1.8-3.1,4.1c0,1.5,0.5,2.5,0.5,2.5s-1.8,7.4-2.1,8.7c-0.3,1.2-0.3,2.6-0.3,3.7C19.9,44.2,16,38.6,16,32 c0-8.8,7.2-16,16-16c8.8,0,16,7.2,16,16C48,40.8,40.8,48,32,48z" />
      </symbol>
      <symbol id="youtube-unauth-icon" viewBox="0 0 64 64">
        <path d="M46.7,26c0,0-0.3-2.1-1.2-3c-1.1-1.2-2.4-1.2-3-1.3C38.3,21.4,32,21.4,32,21.4h0 c0,0-6.3,0-10.5,0.3c-0.6,0.1-1.9,0.1-3,1.3c-0.9,0.9-1.2,3-1.2,3S17,28.4,17,30.9v2.3c0,2.4,0.3,4.9,0.3,4.9s0.3,2.1,1.2,3 c1.1,1.2,2.6,1.2,3.3,1.3c2.4,0.2,10.2,0.3,10.2,0.3s6.3,0,10.5-0.3c0.6-0.1,1.9-0.1,3-1.3c0.9-0.9,1.2-3,1.2-3s0.3-2.4,0.3-4.9 v-2.3C47,28.4,46.7,26,46.7,26z M28.9,35.9l0-8.4l8.1,4.2L28.9,35.9z" />
      </symbol>
      <symbol id="youtube-unauth-mask" viewBox="0 0 64 64">
        <path d="M0,0v64h64V0H0z M47,33.1c0,2.4-0.3,4.9-0.3,4.9s-0.3,2.1-1.2,3c-1.1,1.2-2.4,1.2-3,1.3 C38.3,42.5,32,42.6,32,42.6s-7.8-0.1-10.2-0.3c-0.7-0.1-2.2-0.1-3.3-1.3c-0.9-0.9-1.2-3-1.2-3S17,35.6,17,33.1v-2.3 c0-2.4,0.3-4.9,0.3-4.9s0.3-2.1,1.2-3c1.1-1.2,2.4-1.2,3-1.3c4.2-0.3,10.5-0.3,10.5-0.3h0c0,0,6.3,0,10.5,0.3c0.6,0.1,1.9,0.1,3,1.3 c0.9,0.9,1.2,3,1.2,3s0.3,2.4,0.3,4.9V33.1z M28.9,35.9l8.1-4.2l-8.1-4.2L28.9,35.9z" />
      </symbol>
    </svg>
  </body>
</html>
