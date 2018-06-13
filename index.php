<?php
$ip = $_SERVER['REMOTE_ADDR'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>USERDATA</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    /* Sticky footer styles
    -------------------------------------------------- */
    html {
    position: relative;
    min-height: 100%;
    }
    body {
    margin-bottom: 60px; /* Margin bottom by footer height */
    }
    .footer {
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 60px; /* Set the fixed height of the footer here */
    line-height: 60px; /* Vertically center the text there */
    background-color: #f5f5f5;
    }


    </style>
</head>
<body class="bg-dark">

<div class="container">
    <div class="col-md-10 offset-md-1">
    <div class="table-responsive">
    <table class="table table-dark table-hover">
        <tbody>
        <tr>
            <td>Screen Resolution</td>
            <td id="val_sr">Loading...</td>
        </tr>
        <tr>
            <td>Screen Orientation</td>
            <td id="val_so">Loading...</td>
        </tr>
        <tr>
            <td>Window Size</td>
            <td id="val_ws">Loading...</td>
        </tr>
        <tr>
            <td>Browser Name</td>
            <td id="val_browser_name">Loading...</td>
        </tr>
        <tr>
            <td>Browser Version</td>
            <td id="val_browser_fullVersion">Loading...</td>
        </tr>
        <tr>
            <td>OS Name</td>
            <td id="val_os_name">Loading...</td>
        </tr>
        <tr>
            <td>OS Version</td>
            <td id="val_os_fullVersion">Loading...</td>
        </tr>
        <tr>
            <td>IP Address</td>
            <td><button class="btn btn-dark btn-sm" data-clipboard-text="<?=$ip?>"><?=$ip?></button></td>
        </tr>
        <tr>
            <td>Network Speed</td>
            <td id="val_network_speed">Loading...</td>
        </tr>
<!---->
<!--        <tr>-->
<!--            <td>Map</td>-->
<!--            <td colspan="2" id="demo">-->
<!---->
<!---->
<!--                <button onclick="getLocation()" class="btn btn-dark btn-sm">Get Location</button>-->
<!---->
<!--                <div id="mapholder"></div>-->
<!---->
<!--            </td>-->
<!--        </tr>-->

        <tr>
            <td>Latitude</td>
            <td id="val_lat">Loading...</td>
        </tr>
        <tr>
            <td>Longitude</td>
            <td id="val_lon">Loading...</td>
        </tr>
        <tr>
            <td>City</td>
            <td id="val_city">Loading...</td>
        </tr>
        <tr>
            <td>Region</td>
            <td id="val_region">Loading...</td>
        </tr>
        <tr>
            <td>Country</td>
            <td id="val_country">Loading...</td>
        </tr>
        <tr>
            <td>Hostname</td>
            <td id="val_hostname">Loading...</td>
        </tr>
        <tr>
            <td>Postal</td>
            <td id="val_postal">Loading...</td>
        </tr>
        <tr>
            <td>ISP</td>
            <td id="val_isp">Loading...</td>
        </tr>
        </tbody>
    </table>
    </div>
    </div>
</div>


<footer class="footer" style="background-color: #212529">
    <div class="container">
        <span class="text-white">&copy; <?=date('Y');?> Jordan Harding</span>
    </div>
</footer>


<script src="https://maps.google.com/maps/api/js?key=AIzaSyCJiPdNw9hQf5OpfB3ZtYbtBnBBPCQ2bDk"></script>

<script>
    const x = document.getElementById("demo");
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        var lat = position.coords.latitude;
        var lon = position.coords.longitude;
        var latlon = new google.maps.LatLng(lat, lon);

        var mapholder = document.getElementById('mapholder');
        mapholder.style.height = '250px';
        mapholder.style.width = '500px';

        var myOptions = {
            center:latlon,zoom:14,
            mapTypeId:google.maps.MapTypeId.ROADMAP,
            mapTypeControl:false,
            navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
        }

        var map = new google.maps.Map(document.getElementById("mapholder"), myOptions);
        var marker = new google.maps.Marker({position:latlon,map:map,title:"You are here!"});
    }

    function showError(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
                x.innerHTML = "User denied the request for Geolocation.";
                break;
            case error.POSITION_UNAVAILABLE:
                x.innerHTML = "Location information is unavailable.";
                break;
            case error.TIMEOUT:
                x.innerHTML = "The request to get user location timed out.";
                break;
            case error.UNKNOWN_ERROR:
                x.innerHTML = "An unknown error occurred.";
                break;
        }
    }
</script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
<script>

    new ClipboardJS('.btn');

    // screen resolution
    val_sr_w = window.screen.width;
    val_sr_h = window.screen.height;
    $('#val_sr').html(val_sr_w + ' X ' + val_sr_h);





    ;(function($){
        $.userData = function() {

            console.log(navigator);

            networkSpeed = navigator.connection.downlink + ' Mbps';
            $('#val_network_speed').html(networkSpeed);

            var userData = {};
            userData.userAgent = navigator.userAgent;
            userData.browser = {};
            userData.viewport = {};
            userData.os = {};
            resizeEvent = null;

            // The order of the following arrays is important, be careful if you change it.

            var browserData = [
                { name: 'Chromium',          identifier: 'Chromium/([0-9\.]*)'       },
                { name: 'Chrome Mobile',     identifier: 'Chrome/([0-9\.]*) Mobile', versionIdentifier: 'Chrome/([0-9\.]*)'},
                { name: 'Chrome',            identifier: 'Chrome/([0-9\.]*)'         },
                { name: 'Chrome for iOS',    identifier: 'CriOS/([0-9\.]*)'          },
                { name: 'Android Browser',   identifier: 'CrMo/([0-9\.]*)'           },
                { name: 'Firefox',           identifier: 'Firefox/([0-9\.]*)'        },
                { name: 'Opera Mini',        identifier: 'Opera Mini/([0-9\.]*)'     },
                { name: 'Opera',             identifier: 'Opera ([0-9\.]*)'          },
                { name: 'Opera',             identifier: 'Opera/([0-9\.]*)',         versionIdentifier: 'Version/([0-9\.]*)' },
                { name: 'IEMobile',          identifier: 'IEMobile/([0-9\.]*)'       },
                { name: 'Internet Explorer', identifier: 'MSIE ([a-zA-Z0-9\.]*)'     },
                { name: 'Internet Explorer', identifier: 'Trident/([0-9\.]*)',       versionIdentifier: 'rv:([0-9\.]*)' },
                { name: 'Spartan',           identifier: 'Edge/([0-9\.]*)',          versionIdentifier: 'Edge/([0-9\.]*)' },
                { name: 'Safari',            identifier: 'Safari/([0-9\.]*)',        versionIdentifier: 'Version/([0-9\.]*)' }
            ];

            var osData = [
                { name: 'Windows 2000',           identifier: 'Windows NT 5.0',                     version: '5.0' },
                { name: 'Windows XP',             identifier: 'Windows NT 5.1',                     version: '5.1' },
                { name: 'Windows Vista',          identifier: 'Windows NT 6.0',                     version: '6.0' },
                { name: 'Windows 7',              identifier: 'Windows NT 6.1',                     version: '7.0' },
                { name: 'Windows 8',              identifier: 'Windows NT 6.2',                     version: '8.0' },
                { name: 'Windows 8.1',            identifier: 'Windows NT 6.3',                     version: '8.1' },
                { name: 'Windows 10',             identifier: 'Windows NT 10.0',                    version: '10.0' },
                { name: 'Windows Phone',          identifier: 'Windows Phone ([0-9\.]*)'            },
                { name: 'Windows Phone',          identifier: 'Windows Phone OS ([0-9\.]*)'         },
                { name: 'Windows',                identifier: 'Windows'                             },
                { name: 'Chrome OS',              identifier: 'CrOS'                                },
                { name: 'Android',                identifier: 'Android',                            versionIdentifier: 'Android ([a-zA-Z0-9\.-]*)' },
                { name: 'iPad',                   identifier: 'iPad',                               versionIdentifier: 'OS ([0-9_]*)', versionSeparator: '[_|\.]' },
                { name: 'iPod',                   identifier: 'iPod',                               versionIdentifier: 'OS ([0-9_]*)', versionSeparator: '[_|\.]' },
                { name: 'iPhone',                 identifier: 'iPhone OS',                          versionIdentifier: 'OS ([0-9_]*)', versionSeparator: '[_|\.]' },
                { name: 'Mac OS X El Capitan',    identifier: 'Mac OS X (10([_|\.])11([0-9_\.]*))', versionSeparator: '[_|\.]' },
                { name: 'Mac OS X Yosemite',      identifier: 'Mac OS X (10([_|\.])10([0-9_\.]*))', versionSeparator: '[_|\.]' },
                { name: 'Mac OS X Mavericks',     identifier: 'Mac OS X (10([_|\.])9([0-9_\.]*))',  versionSeparator: '[_|\.]' },
                { name: 'Mac OS X Mountain Lion', identifier: 'Mac OS X (10([_|\.])8([0-9_\.]*))',  versionSeparator: '[_|\.]' },
                { name: 'Mac OS X Lion',          identifier: 'Mac OS X (10([_|\.])7([0-9_\.]*))',  versionSeparator: '[_|\.]' },
                { name: 'Mac OS X Snow Leopard',  identifier: 'Mac OS X (10([_|\.])6([0-9_\.]*))',  versionSeparator: '[_|\.]' },
                { name: 'Mac OS X Leopard',       identifier: 'Mac OS X (10([_|\.])5([0-9_\.]*))',  versionSeparator: '[_|\.]' },
                { name: 'Mac OS X Tiger',         identifier: 'Mac OS X (10([_|\.])4([0-9_\.]*))',  versionSeparator: '[_|\.]' },
                { name: 'Mac OS X Panther',       identifier: 'Mac OS X (10([_|\.])3([0-9_\.]*))',  versionSeparator: '[_|\.]' },
                { name: 'Mac OS X Jaguar',        identifier: 'Mac OS X (10([_|\.])2([0-9_\.]*))',  versionSeparator: '[_|\.]' },
                { name: 'Mac OS X Puma',          identifier: 'Mac OS X (10([_|\.])1([0-9_\.]*))',  versionSeparator: '[_|\.]' },
                { name: 'Mac OS X Cheetah',       identifier: 'Mac OS X (10([_|\.])0([0-9_\.]*))',  versionSeparator: '[_|\.]' },
                { name: 'Mac OS',                 identifier: 'Mac OS'                              },
                { name: 'Ubuntu',                 identifier: 'Ubuntu',                             versionIdentifier: 'Ubuntu/([0-9\.]*)' },
                { name: 'Debian',                 identifier: 'Debian'                              },
                { name: 'Gentoo',                 identifier: 'Gentoo'                              },
                { name: 'Linux',                  identifier: 'Linux'                               },
                { name: 'BlackBerry',             identifier: 'BlackBerry'                          }
            ];

            //  Set browser data
            var setBrowserData = function() {
                var userAgent = userData.userAgent.toLowerCase();

                // Check browser type
                for (i in browserData) {
                    var browserRegExp = new RegExp(browserData[i].identifier.toLowerCase());
                    var browserRegExpResult = browserRegExp.exec(userAgent);

                    if (browserRegExpResult != null && browserRegExpResult[1]) {
                        userData.browser.name = browserData[i].name;

                        // Check version
                        if (browserData[i].versionIdentifier) {
                            var versionRegExp = new RegExp(browserData[i].versionIdentifier.toLowerCase());
                            var versionRegExpResult = versionRegExp.exec(userAgent);

                            if (versionRegExpResult != null && versionRegExpResult[1]) {
                                setBrowserVersion(versionRegExpResult[1]);
                            }

                        } else {
                            setBrowserVersion(browserRegExpResult[1]);
                        }

                        break;
                    }
                }

                return true;
            };

            // Set browser version
            var setBrowserVersion = function(version) {
                var splitVersion = version.split('.', 2);
                userData.browser.fullVersion = version;

                // Major version
                if (splitVersion[0]) {
                    userData.browser.majorVersion = parseInt(splitVersion[0]);
                }

                // Minor version
                if (splitVersion[1]) {
                    userData.browser.minorVersion = parseInt(splitVersion[1]);
                }

                return true;
            };

            //  Set OS data
            var setOsData = function() {
                var userAgent = userData.userAgent.toLowerCase();

                // Check browser type
                for (i in osData) {
                    var osRegExp = new RegExp(osData[i].identifier.toLowerCase());
                    var osRegExpResult = osRegExp.exec(userAgent);

                    if (osRegExpResult != null) {
                        userData.os.name = osData[i].name;

                        // Version defined
                        if (osData[i].version) {
                            setOsVersion(osData[i].version, (osData[i].versionSeparator) ? osData[i].versionSeparator : '.');

                            // Version detected
                        } else if (osRegExpResult[1]) {
                            setOsVersion(osRegExpResult[1], (osData[i].versionSeparator) ? osData[i].versionSeparator : '.');

                            // Version identifier
                        } else if (osData[i].versionIdentifier) {
                            var versionRegExp = new RegExp(osData[i].versionIdentifier.toLowerCase());
                            var versionRegExpResult = versionRegExp.exec(userAgent);

                            if (versionRegExpResult != null && versionRegExpResult[1]) {
                                setOsVersion(versionRegExpResult[1], (osData[i].versionSeparator) ? osData[i].versionSeparator : '.');
                            }
                        }

                        break;
                    }
                }

                return true;
            };

            // Set OS version
            var setOsVersion = function(version, separator) {
                if (separator.substr(0, 1) == '[') {
                    var splitVersion = version.split(new RegExp(separator, 'g'), 2);
                } else {
                    var splitVersion = version.split(separator, 2);
                }

                if (separator != '.') {
                    version = version.replace(new RegExp(separator, 'g'), '.');
                }

                userData.os.fullVersion = version;

                // Major version
                if (splitVersion[0]) {
                    userData.os.majorVersion = parseInt(splitVersion[0]);
                }

                // Minor version
                if (splitVersion[1]) {
                    userData.os.minorVersion = parseInt(splitVersion[1]);
                }

                return true;
            };

            // Set viewport size
            var setViewportSize = function(init) {
                userData.viewport.width = $(window).width();
                userData.viewport.height = $(window).height();

                // Resize triggers
                if (typeof init == 'undefined') {
                    if (resizeEvent == null) {
                        $(window).trigger('userData::StartResizing');
                    } else {
                        clearTimeout(resizeEvent);
                    }

                    resizeEvent = setTimeout(function() {
                        $(window).trigger('userData::StopResizing');
                        clearTimeout(resizeEvent);
                        resizeEvent = null;
                    }, 300);


                    $('#val_ws').html(userData.viewport.width + ' X ' + userData.viewport.height);
                }

                return true;
            };

            // Set viewport orientation
            var setViewportOrientation = function() {
                if (typeof window.orientation == 'undefined') {

                    if (userData.viewport.width >= userData.viewport.height) {
                        userData.viewport.orientation = 'landscape';
                    } else {
                        userData.viewport.orientation = 'portrait';
                    }

                } else {
                    switch(window.orientation) {
                        case -90:
                        case 90:
                            userData.viewport.orientation = 'landscape';
                            break;
                        default:
                            userData.viewport.orientation = 'portrait';
                            break;
                    }
                }

                // Orientation trigger
                $(window).trigger('userData::OrientationChange');

                return true;
            };

            // Replace default value for the user-agent tester on pgwjs.com
            if (typeof window.pgwJsUserAgentTester !== 'undefined') {
                userData.userAgent = window.pgwJsUserAgentTester;
            }

            // Initialization
            setBrowserData();
            setOsData();
            setViewportSize(true);
            setViewportOrientation();

            // Triggers
            $(window).on('orientationchange', function(e) {
                setViewportOrientation();
            });

            $(window).resize(function(e) {
                setViewportSize();
            });

            return userData;
        }
    })(window.jQuery);
    var userData = $.userData();
//    console.log(userData);

    $.get("https://ipinfo.io", function(response) {
  //      console.log(response);

        var latlon = response.loc;
        latlon = latlon.split(',');

        $('#val_lat').html(latlon[0]);
        $('#val_lon').html(latlon[1]);

        $('#val_city').html(response.city);
        $('#val_region').html(response.region);
        $('#val_country').html(response.country);
        $('#val_hostname').html(response.hostname);
        $('#val_postal').html(response.postal);
        $('#val_isp').html(response.org);

    }, "json");

    $('#val_ws').html(userData.viewport.width + ' X ' + userData.viewport.height);
    $('#val_so').html(userData.viewport.orientation);
    $('#val_browser_name').html(userData.browser.name);
    $('#val_browser_fullVersion').html(userData.browser.fullVersion);
    $('#val_os_name').html(userData.os.name);
    $('#val_os_fullVersion').html(userData.os.fullVersion);
</script>
</body>
</html>