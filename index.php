<?php

# region Init

// set error reporting to exception
mysqli_report(MYSQLI_REPORT_STRICT);

# endregion

# region Params

//params
$params = [
    'mysql'              => [
        'host' => 'localhost',                                      // mysql host
        'user' => 'infoUser',                                       // mysql username
        'pass' => 'infoPass',                                       // mysql password
    ],
    'pma'                => 'http://localhost/phpmyadmin/',         // pma address
    'hosts'              => '/private/etc/hosts',                   // your hosts file
    'server'             => [
        'liveUrl'  => '#',                                          // connected Server url
        'liveName' => 'Live Server',                                // connected Server name
    ],
    'helpersUrl'         => [                                       // footer links
        'http://www.github.com/login' => 'Git Hub',
    ],
    'projectsListIgnore' => [                                       // projects to be ignored in listing
        '.',
        '..',
        '.git',
        '.idea',
    ],
    'documentation'      => [
        'mysql'  => [
            'defaultLink' => 'http://dev.mysql.com/doc/',           // default mysql documentation link
        ],
        'php'    => [
            'defaultLink' => 'http://php.net/manual/en/index.php',  // default php documentation link
        ],
        'apache' => [
            'defaultLink' => 'https://httpd.apache.org/',           // default apach documentation link
        ],
    ],
];

# endregion

# region Functions

/**
 * @param $version string
 * @return null|string
 */
function getMajorVersion($version) {
    $chunks = explode('.', $version);
    if(count($chunks) >= 2) {
        return implode('.', array_slice($chunks, 0, 2));
    }
    
    return null;
}

# endregion

# region Images

/****************************************************
 *********        Base 64 images  *******************
 ***************************************************/
$images = [];
// images
$images['pngFolder'] = <<< EOFILE
iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACKElEQVQ4T6WSS2gTURSG/3NnJpX6
iNqqSEpdBdtFk6B1IdoqNQtxoQsXghQffWCVunCty27ERSDEmLipgttAi4gki1YFKSg2mSq0xIWv
QjYttilmSpK5R+5MYsEXgd7V3OE/33/OuT9hk4c2WQ+aS5yakNXyOZa2wyKhgTTjffD6VKAROOVi
PRwcGQcqVVevaZiNXQRpOoh+b5BAQkDoxkJgZKrTMcxGj3Fo+CHK+XtgJhi+8xBb/YCoFStIHaR+
6TrM+CUIz5buwHDmnQsYiqD8aVzZA2AAEkpLgsC2hLVWcu4ghsd3AQuTd2FVxI2jt14+oGz0OIeu
jqFamARIA7lSx1VKG/lXJqyVNQdMCk4MoelqDGi6Z4my0R4ODdxBtZCBtbruzu3a4ctsHnvavdjb
OwY4S1bdKQgAwwMzMQjKxXo52H8T86kkfnwvbiyeCQcO+7HL1wK2K2CWALsArbkNZdGB108iGcrd
P8n+vjP49iaDg/1JwFZOykKD/TUOyeJXoUNnCcMbRGH+I55PPLtMZryP93V0OsL9R85CLmXAEC6E
1FLVd/0wiHSInV34kHqErsGnXhUkbtqxDW3dJ9Dc2gq2Pm8U/ZEDBhm7UVouYSaVSodvz5ymuWSY
ZaWC4LVRYH0FkFZthH/ksKkFiy+mkU6/vTIUyT0mMxEuEni7rNpgKZ09157hrwTVFJNYPTQ63Q6g
qLYVqiWokejXNSr35v+tGsT9BJyCzCVkRUxbAAAAAElFTkSuQmCC
EOFILE;

$images['pngLinkInternal'] = <<< EOFILE
iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACtklEQVQ4T4WTTUhUURiGn3NntBIN
wyCNioSKUEszShKUgihSx1pEalnYokUUbWrhz6QOpYa1CDdh1s5x1FVqP2YtKkNHRkqKsogsa0qd
8SfFpmnGuSfuVTHM6oPLgXPuec77vt85Yk/J3THfVCA8oEqQ/LsEGBRBsNEw0mZJW679LHYWtsiG
kgz8U//ZPLMcZIQsy20elZuEDkgpaJY2s4maJx9QhEDo03+WlKBKyYnUaHIuttBekTkDyG+WdWYT
9V2fMeiAhQlSSgJSkp20msMa4NI8wK3nX3V/fxGgx6PldGDLyvmAJmk1Z3L/5RDKfwCqKtm7aQVH
LjbTfmn/rIUmWVuUSfu7YRRmLMzKkBJN+mypCFI3ROgKns5ZmAZ090+gGAwIoX3TYUpVRQ0E0Pur
KCAMbF27mCxLK50V++ZCrDWbePFpgt6HNsa+9OH3+/H5fCyNXEPyodN6Lq8eNDDc/wbFoLAo2IjR
aHQUnS/drrfRWmyi8WY161dHkZ6eztCQC1VV6ejo4Nnr94QvCyd27UpM+zP5Nj7BD4+HTnsXDkf3
K5FS0CLrSjOoKjpH5eUrmItLcTqdREWuQGiyJdN3Qwg9D9fgEGPj45SXlVFrtSJSC1ukzZJB5dkz
FBSauVpVxbY9B7lXV01N9TVc7hG83h/0ffhIW+s9ktOyqblSTF7ecXp6ehC7zHdk44U0LKdOkl94
nus3bjI4MIDb5SI+IQGP57t+stf7E7fbRWjYUoZdLg7lZNPZ0YnYXXxnwk9wWPS3x2SkJLAxJlbf
7OjuprmpiUk1iJCIVUQFe4iJi2Nz/Gb8Pj8Dg4M4urpUzV0CYNB6nXv0WH1oaNi6xSEheCYnsdvt
bufn/tzR0dGRpKQdNlXK9YmJiXi9XrS53tdvjs+/uTHAkt+ekh/oBbRxobW3vwAm5j1w4ITUwAAA
AABJRU5ErkJggg==
EOFILE;

$images['pngLinkExternal'] = <<<EOFILE
iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAADW0lEQVQ4T22Tf0yUdRzHX89zdxLI
dRMaHjbEMRYCThowRByMICinbmk/2IrSFo0NVs5liQ0ElZLV5tRGrFL/cDnaKopyKCrQHwF3g4Cx
EDXpAgXu4eEeiIPzuee652lcZbT13b77fvb5fPfa5/3Z5y2w4sQe68wI6OaGoC48aRgCoiCGrsmk
Xw8jWDVxJPenlf+XY+GfhP3YtUZLmFpRVnyaHSkWBPNvTP5uQlJ/ZujOFq45q1j0P/LxVHVu5UpI
CLCuvr1RXBVRceqFVLbHX2dEyeG2/CgzKkhaO3H2p1G8UVy4fAGfavsPRFh/oj1Dx9x//Nk8tsSY
MYU3MubJ4+5CHPaoPUg+jau/lJEVX4ZFDHLyyx8Q0DMnDheE5AixdZe6Nqem5p9+agOKNosY1kxA
aMEbmMajLjGvemkf/ZrR6UJKs2xMupNo6z7ZNVWXWxACxBxtM14symPXhtXMaSCYh1j98B7m/DLj
ylZMwh06bn3BuJJM0HBRnpPGB80OpNrskHxhfUOXUbRtK/mxFhRNJNJ6HpvtNbx+0INgAtqGzzHs
3oXHJ1C+zc4n33QjH/kbsK6+yyh9ZhSWyvEjEh39IY/FvYOmgR6AofF9dNxowvvHPLIPoq1XUFxJ
LNbk/NXB2qOdxruvN9B98wSJA8OY5QlUv4WAZhAZP8DlhI9YuG8hf+pbEpdcBAUziCJBk2mguqYm
Q7BXf+e0b4zLKnIPUJgUQ/H2HbilWXQdnL0OOkfOEW5NoDipgKKdO/EueFny+ejpddDX1z8iRD9/
cLeYubvlgPcSh4+/T21tHZOT91gbYwfRhLi8a6FmDQxAnpHwzM3zXn09n1+8GCpFrHm7+fwbQn/J
m28d4tSZM1yJziPzdgtNTU3Isof7qsqvLhcdV9v50e0/u0YZK3tl7z4GBwcfrHLcoQP7J/YfrOLT
s58hud3MSBKb0x7H5/NhGDqq6md2VsZqsyFLMzxXUkJvT8+/XqisqBx7oqAwYWNyMrPyzLI+Wltb
UYwwLOERSqJtVVTKpk2kpaWhaRrTbjd9Tqf+wExAyksv7/3eGhmZ8FBEBL7FRRwOh3zv7nipoihS
dnbOV0FdT0xPT0dVVRRF8YzeuPnqSsDypFKA8BVuCwCjwPL7f7VbfwKEY3NwS1ituQAAAABJRU5E
rkJggg==
EOFILE;

$images['pngPlugin'] = <<< EOFILE
iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAACXBIWXMAAAsSAAALEgHS3X78AAAAB
GdBTUEAALGOfPtRkwAAACBjSFJNAAB6JQAAgIMAAPn/AACA6QAAdTAAAOpgAAA6mAAAF2+SX8VGAA
ABmklEQVR42mL4//8/AyUYIIDAxK5du1BwXEb3/9D4FjBOzZ/wH10ehkF6AQIIw4B1G7b+D09o/h+
X3gXG4YmteA0ACCCsLghPbPkfm9b5PzK5439Sdg9eAwACCEyANMBwaFwTGIMMAOEQIBuGA6Mb/qMb
ABBAEAOQnIyMo1M74Tgiqf2/b3gVhgEAAQQmQuKa/8ekdYMxyLCgmEYMHJXc9t87FNMAgACCGgBxI
kgzyDaQU5FxQGQN2AUBUXX/vULKwdgjsOQ/SC9AAKEEYlB03f+oFJABdSjYP6L6P0guIqkVjt0Dis
EGAAQQigEgG0AhHxBVi4L9wqvBBiEHtqs/xACAAAIbEBBd/x+Eg2ObwH4FORmGfYCaQRikCUS7B5Y
BNReBMUgvQABBDADaAtIIwsEx9f/Dk9pQsH9kHTh8XANKMAIRIIDAhF9ELTiQQH4FaQAZCAsskPNh
yRpkK7oBAAEEMSC8GsVGkEaYIlBghcU3gbGzL6YBAAEEJnzCgP6EYs/gcjCGKQI5G4Z9QiswDAAII
AZKszNAgAEAHgFgGSNMTwgAAAAASUVORK5CYII=
EOFILE;

$images['pngWrench'] = <<< EOFILE
iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACNUlEQVQ4T42SX0hTYQDFz90WOKdlY
rINogezh7H+QPYQhsKK6Cm02roLorAFGSFY0V+hZYHKWpoEEQRKJPbvqYdZY8la1EuNsNQ5ca2t6d
xsf267d5rbvV8YKlp67Xv7Pji/75zDobDC6ezq2k4EvMiVy9V5uQokUz/BZ/kvghTVx2naR4npH3R
07Fudv6Zn6xYtiouKkeGzSHNpjIz4EBwNoebYUUoUcPfe/enKXeWrcnLk6B/0gOM4sBwLUBQIEVB7
0iQOsLa1k0MHquDxeCGhKAwMDaG+7kzZAtduUQfNLRZC0waEwxFIJBI4XS5cPH92kUYUcM18PWU0H
sljUynwhIASBNhf90IgAmRSKa5cuiAeoeFqQ1yvN6zlJiehUCigVikhk0kRi8XQ+fARc7PRXLCkg8
Ibr56WZiL6l6d18AXD8Pp8+PDRDbVKBYZhkGZZd2ur9QSAvn8ARWZbt067ia7fUwKHO4DyzAB6HM4
xyy3L/gXlpQAMz9wXAWbE+h0aumbnBjwbTOJTJItknw3Dd+rKGIZxL7WZecA6s617t7aUPqfbiPb3
EcSnBHyPJRH45nUwTdV7AZBlAcpG23PNetVBS9U2tL2LIv5LwOhEHGP+z/Zoi7EWwNflFvvHgeb2G
/LYVAHr2wnEpngEfyQQ8vfb482GUwD8YnOfBbhIxWYtwuw0/OMRhALe/xLPl6i6/MSZX6is5IkALh
HtHW86bFrp5zlXcyWWACiYfUyIZf47zm/RHu4RhGziSwAAAABJRU5ErkJggg==
EOFILE;

$images['favicon'] = <<<EOFILE
AAABAAEAEBAAAAEAIABoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAAAQAABMLAAATCwAAAAAAA
AAAAAAAAAAAAAAAAAAAAAAAAAAAhF9KMIFfSpaDXkvYg19J+YNfSfmCXUnXgV5LlIVeTS4AAAAAAA
AAAAAAAAAAAAAAAAAAAAAAAACNVFQJg11JmYNfS/+DX0v/g19L/4NfS/+DX0v/g19L/4NfS/+DX0v
/g19LlX9fPwgAAAAAAAAAAAAAAACNVFQJgV9LwYNfS/+DX0v/g19L/4NfS/+DX0v/g19L/4NfS/+D
X0v/g19L/4NfS/+BXUm/f18/CAAAAAAAAAAAg11JmYNfS/+DX0v/g19L/4NfS/+DX0v/g19L/4NfS
/+DX0v/g19L/4NfS/+DX0v/g19L/4NfS5UAAAAAhF9KMINfS/+DX0v/g19L/5d7a/+zoJb/hWJP/4
NfS/+DX0v/iGNJ/72JPf+OZkf/g19L/4NfS/+DX0v/hV5NLoFfS5iDX0v/g19L/4NfS/+4p57/tKG
X/6OLfv+DX0v/h2JJ/9ufOP/vpyP/m3BF/4NfS/+DX0v/g19L/4FeS5SDXUnag19L/4NfS/+DX0v/
iGZS/6iShf/d2tj/mX1t/9CaQv/vpyP/rn9E/4NfS/+DX0v/g19L/4NfS/+CXUnXgV1L+oNfS/+DX
0v/g19L/4NfS/+DX0v/noN1/8vJyP/CqoP/qHtH/4NfS/+DX0v/g19L/4NfS/+DX0v/g19J+YFdS/
qDX0v/g19L/4NfS/+DX0v/hGFO/5iEef+wrKv/2dbU/7Cckf+pkob/hGFN/4NfS/+DX0v/g19L/4N
fSfmDX0rbg19L/4NfS/+DX0v/hWNQ/66qqP+wraz/iWlX/7SimP/l5eX/29fV/7Cdkv+DX0v/g19L
/4NfS/+DXkvYg11JmYNfS/+DX0v/g19L/5iEef+ysbH/m4l//4NfS/+tmY7/2dXS/4xrWf+jin3/g
19L/4NfS/+DX0v/gV9KloRgTDKDX0v/g19L/4NfS/+IZ1X/imta/4NfS/+DX0v/hWJO/7SimP+ji3
7/g19L/4NfS/+DX0v/g19L/4RfSjAAAAAAg15KnYNfS/+DX0v/g19L/4NfS/+DX0v/g19L/4NfS/+
DX0v/g19L/4NfS/+DX0v/g19L/4FfS5gAAAAAAAAAAH9mTAqBX0rDg19L/4NfS/+DX0v/g19L/4Nf
S/+DX0v/g19L/4NfS/+DX0v/g19L/4FfS8GNVFQJAAAAAAAAAAAAAAAAf2ZMCoNeSp2DX0v/g19L/
4NfS/+DX0v/g19L/4NfS/+DX0v/g19L/4NdSZmNVFQJAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAhG
BMMoNdSZmDX0rbgV1L+oFdS/qDXUnagV9LmIRfSjAAAAAAAAAAAAAAAAAAAAAA8A8AAMADAACAAQA
AgAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgAEAAIABAADAAwAA8A8AAA==
EOFILE;

$images['pngLogo'] = <<<EOFILE
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
AAElFTkSuQmCC
EOFILE;

$images['pngBook'] = <<<EOFILE
iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABkklEQVQ4T2NkoBAwUqifgboGaFuGCjFxMahzMDOyfvv27ePVI1suMTAw/Ne189fl4ODk/fr7+1/m339uXT6y9T3M5WAX6Dj7iZvq6KerKcvG6GmoyP/795/t989frw+dvHDvPyPDf2tjfUV2DlZxRmbmn1dv3H5w++7D5Scv3Z559cDqF2ADFMPiajWlpUtnl+TwIofJyzfvGBj+/2cQFxVGCaq03imfrz9+0nNv9eImsAFysQntejKyFTNzMlAUXrp2mwEUSnqaqqgGTJnJcPXxo84HSxZUDCcDdCRlKkKszBmuvnzB8Pf/fwZZQQEGPXEpcCBefPmc4cmH9wwsTMwM2hISDKuPHme49vQpahgw8XKWfWNhfMb8+/9bBsb/vxn//OVmFhJQ+s/4l4Hh1ce7fxgYPjOysbD8ZWYS5WJklWZ4/6kHHohKIXE+rD/+8LN8+XaV8d//t/9///jKxM4j9kGJP/3///+Mwg+/dP/59/rjn998fKxMDCI/hbm1/zAzfLm/dvlm6iZlcjIWxS4AALjUzBE7WWHKAAAAAElFTkSuQmCC
EOFILE;



/*****************************************************
 ********     If image is requested           ********
 ****************************************************/
if(isset($_GET['img'])) {
    $image = trim($_GET['img']);
    
    //check that we have requested image
    if(isset($images[$image]) === false) {
        //return 404 if image does not exist
        header($_SERVER['SERVER_PROTOCOL'] . '404 Not Found', true, 404);
        echo 'Image not found';
        die();
    }
    
    //define content type
    switch($image) {
        case 'gifLogo':
            header('Content-type: image/gif');
            break;
        case 'favicon':
            header('Content-type: image/x-icon');
            break;
        default:
            header('Content-type: image/png');
            break;
    }
    
    // echo image out and exit
    echo base64_decode($images[$image]);
    die();
}

# endregion

# region Php info

/*****************************************************
 ********       PHP info is requested         ********
 ****************************************************/
if(isset($_GET['phpinfo'])) {
    phpinfo();
    die();
}

# endregion

# region Index init

//variable initialization
$mysqlConnectError = null;
$mysqlVersion = 'Unknown';
$mysqlDocuLink = '#';
$apacheDocuLink = '#';

#endregion

/*****************************************************
 ********     If index is required            ********
 ****************************************************/

/**
 *    Get PHP version
 */
$phpVersion = phpversion();

/**
 *    Get MySQL version
 */

//check that we have params
if(isset($params['mysql']) === true && is_array($params['mysql']) === true && count($params['mysql']) === 3) {
    try {
        //try to connect
        $mysqli = new mysqli($params['mysql']['host'], $params['mysql']['user'], $params['mysql']['pass']);
        
        // Check if there is some connect error or get version
        if($mysqli->connect_errno) {
            //save connection error message
            $mysqlConnectError = 'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
            // set version to Unknown
        } else {
            //get version
            $mysqlVersion = $mysqli->server_info;
            
            //get major version
            $major = getMajorVersion($mysqlVersion);
            
            // generate documentation link
            $mysqlDocuLink = ($major !== null) ? 'http://dev.mysql.com/doc/refman/' . $major . '/en/' :
                $params['documentation']['mysql']['defaultLink'];
            //close connection
            $mysqli->close();
        }
    } catch(Exception $e) {
        // do nothing
    }
}


/**
 *    Get Apache version
 */
$serverSoftware = apache_get_version();
$apacheVersion = $serverSoftware;

//Get pure apache version
$chunks = explode(' ', $serverSoftware);
if(count($chunks) > 0) {
    $chunk = reset($chunks);
    
    if(strtolower(substr($chunk, 0, 1)) === 'a') {
        $chunks = explode('/', $chunk);
        
        if(count($chunks) === 2) {
            $apacheVersion = $chunks[1];
            
            // get major version
            $major = getMajorVersion($apacheVersion);
            
            //generate documentation link
            $apacheDocuLink = ($major !== null) ? 'https://httpd.apache.org/docs/' . $major . '/' :
                $params['documentation']['apache']['defaultLink'];
        } else {
            // set full version to be apache version
            $apacheVersion = $serverSoftware;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $_SERVER['HTTP_HOST'] .' - Project Index'?></title>
    <meta charset="utf-8">
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }
        
        html {
            background: #ddd;
        }
        
        body {
            margin: 1em 10%;
            padding: 1em 3em;
            font: 80%/1.4 tahoma, arial, helvetica, lucida sans, sans-serif;
            border: 1px solid #999;
            background: #eee;
            position: relative;
        }
        
        .row {
            width: 100%;
            margin: 0 0;
        }
        
        .row:after {
            content: '';
            display: table;
            clear: both;
        }
        
        .col {
            float: left;
            min-height: 1px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
        }
        
        .col-33 {
            width: 33.33%;
        }
        
        @media screen and (max-width: 600px) {
            .col {
                float: none;
                width: 100%;
            }
        }
        
        #head {
            margin-bottom: 1.8em;
            margin-top: 1.8em;
            padding-bottom: 1em;
            border-bottom: 1px solid #999;
        }
        
        #logo {
            letter-spacing: -500em;
            text-indent: -500em;
            height: 64px;
            background: url(index.php?img=pngLogo) 0 0 no-repeat;
        }
        
        #head h2 {
            text-align: center;
            color: #024378;
            text-transform: capitalize;
        }
        
        .utility {
            position: absolute;
            right: 4em;
            top: 145px;
            font-size: 0.85em;
        }
        
        .utility li {
            display: inline;
        }
        
        h2 {
            margin: 0.8em 0 0 0;
        }
        
        ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        
        #head ul li, dl ul li, #foot li {
            list-style: none;
            display: inline;
            margin: 0;
            padding: 0 0.2em;
        }
        
        ul.aliases, ul.projects, ul.tools, ul.documentation a {
            list-style: none;
            line-height: 24px;
        }
        
        ul.aliases a, ul.projects a, ul.tools a, ul.documentation a {
            padding-left: 22px;
            background: url(index.php?img=pngFolder) 0 100% no-repeat;
        }
        
        ul.tools a {
            background: url(index.php?img=pngWrench) 0 100% no-repeat;
        }
        
        ul.aliases a {
            background: url(index.php?img=pngLinkInternal) 0 100% no-repeat;
        }
        
        ul.documentation a {
            background: url(index.php?img=pngBook) 0 100% no-repeat;
        }
        
        dl {
            margin: 0;
            padding: 0;
        }
        
        dt {
            font-weight: bold;
            text-align: right;
            width: 11em;
            clear: both;
            margin-top: 5px;
        }
        
        dd {
            margin: -1.35em 0 0 12em;
            padding-bottom: 0.4em;
            overflow: auto;
        }
        
        dd ul li {
            float: left;
            display: block;
            width: 16.5%;
            margin: 0;
            padding: 0 0 0 20px;
            background: url(index.php?img=pngPlugin) 2px 50% no-repeat;
            line-height: 1.6;
        }
        
        a {
            color: #024378;
            font-weight: bold;
            text-decoration: none;
        }
        
        a:hover {
            color: #04569A;
            text-decoration: underline;
        }
        
        #foot {
            text-align: center;
            margin-top: 1.8em;
            border-top: 1px solid #999;
            padding-top: 1em;
            font-size: 0.85em;
        }
        
        .hide {
            display: none;
        }
    </style>
    <link rel="shortcut icon" href="index.php?img=favicon" type="image/ico"/>
</head>
<body>
<div id="head">
    <div class="row">
        <div class="col col-33">
            <div id="logo">
                <h1>Leo Projects Index File</h1>
            </div>
        </div>
        <div class="col col-33">
            <h2><?= $_SERVER['HTTP_HOST'] ?></h2>
        </div>
        <div class="col col-33"></div>
    </div>
</div>
<!-- utility -->
<ul class="utility">
    <li>Version 1.0</li>
    <li><a href="index.php">Leo's Project Index</a></li>
</ul>

<!-- extensions   -->
<h2> Extensions </h2>
<dl class="content">
    <dt>Apache Version</dt>
    <dd><?= $apacheVersion ?></dd>
    <dt>PHP Version</dt>
    <dd><?= $phpVersion ?></dd>
    <dt>Server Software:</dt>
    <dd><?= $serverSoftware ?></dd>
    <dt>Loadad Exstensions:</dt>
    <dd><a id="toggleView" href="#">Toggle Exstensions</a>
        <ul id="toggleExtensions" class="hide"> <?php
            $loadedExtensions = get_loaded_extensions();
            foreach($loadedExtensions as $ext) {
                echo '<li>' . $ext . '</li>';
            } ?>
        </ul>
    </dd>
    <dt>Mysql Version:</dt>
    <dd><?= $mysqlVersion ?></dd>
</dl>
<hr>
<div class="row">
    <div class="col col-33">
        <!--   Tools section  -->
        <h2>Tools</h2>
        <ul class="tools">
            <li><a href="?phpinfo=1">phpinfo()</a></li>
            <li><a href="<?= $params['pma'] ?>" target="_blank">phpMyAdmin</a></li>
        </ul>
        <!--        http://dev.mysql.com/doc/refman/5.7/en/-->
        <h2>Documentation</h2>
        <ul class="documentation">
            <li><a href="<?= $apacheDocuLink ?>" target="_blank">Apache</a></li>
            <li><a href="<?= $params['documentation']['php']['defaultLink'] ?>" target="_blank">PHP</a></li>
            <li><a href="<?= $mysqlDocuLink ?>" target="_blank">MySQL</a></li>
        </ul>
    </div>
    <div class="col col-33">
        <!--   Projects   -->
        <h2>Projects</h2>
        <ul class="projects">
            <?php
            
            // open directory
            $handle = opendir('.');
            $countProjects = 0;
            // read each file/ folder in directory
            while($file = readdir($handle)) {
                $file = trim($file);
                //echo dirs out
                if(is_dir($file) && !in_array($file, $params['projectsListIgnore'])) {
                    echo '<li><a href="' . $file . '">' . $file . '</a></li>';
                    $countProjects += 1;
                }
            }
            // close directory
            closedir($handle);
            //check that we have projects
            if($countProjects === 0) {
                echo '<li>No Projects</li>';
            }
            ?>
        </ul>
    </div>
    <div class="col col-3">
        <!--    Alias Section    -->
        <?php
        if(isset($params['hosts'])) { ?>
            <h2>My Aliases</h2>
            <ul class="aliases"> <?php
                $hosts = trim($params['hosts']);
                if(is_file($hosts) === true && is_readable($hosts)) {
                    //open hosts file
                    $handle = fopen($hosts, 'r');
                    if($handle) {
                        
                        $lastLine = '';
                        //read line by line
                        while(($line = fgets($handle)) !== false) {
                            //trim line
                            $line = trim($line);
                            //is empty line? - do nothing
                            if(empty($line) === false) {
                                //line starts with 127.0.0.1?
                                if(substr($line, 0, 9) === '127.0.0.1') {
                                    // get rest of the line
                                    $aliasAddress = trim(substr($line, 9, strlen($line)));
                                    // set address to be name in case that we do not have comment
                                    $aliasName = $aliasAddress;
                                    
                                    // if there was comment in previous line - get title from it
                                    if(empty($lastLine) === false && substr($lastLine, 0, 2) === '# ') {
                                        $aliasName = trim(substr($lastLine, 2, strlen($lastLine)));
                                    }
                                    echo '<li><a href="http://' . $aliasAddress . '" target="_blank">' . $aliasName . '</a></li>';
                                }
                            }
                            //save last line
                            $lastLine = $line;
                        }
                        //close file handle
                        fclose($handle);
                    }
                } else {
                    echo '<li>No hosts available</li>';
                }
                ?>
            </ul>
        <?php } ?>
    </div>
</div>
<ul id="foot">
    <?php
    foreach($params['helpersUrl'] as $url => $label) { ?>
        <li><a href="<?= $url ?>" target="_blank"><?= $label ?></a></li> -
    <?php } ?>
    <li><a href="<?= $params['server']['liveUrl'] ?>" target="_blank"> <?= $params['server']['liveName'] ?> </a></li>
</ul>
<script>
    (function () {
        var toggleView = document.getElementById('toggleView');
        var extensions = document.getElementById('toggleExtensions');
        var hideClass = 'hide';
    
        /**
         * Checks if provided element has class
         *
         * @param el
         * @param className
         * @returns {boolean}
         */
        function hasClass(el, className) {
            if (el.classList) {
                return el.classList.contains(className);
            }
            return !!el.className.match(new RegExp('(\\s|^)' + className + '(\\s|$)'));
        }
    
        /**
         * Adds class to provided element
         *
         * @param el
         * @param className
         */
        function addClass(el, className) {
            if (el.classList) {
                el.classList.add(className);
            } else if (!hasClass(el, className)) {
                el.className += " " + className;
            }
        }
    
        /**
         * Removes class from element
         *
         * @param el
         * @param className
         */
        function removeClass(el, className) {
            if (el.classList) {
                el.classList.remove(className);
            } else if (hasClass(el, className)) {
                var reg = new RegExp('(\\s|^)' + className + '(\\s|$)');
                el.className = el.className.replace(reg, ' ');
            }
        }
    
        /**
         * Toggles visibility over extensions list
         *
         * @returns {boolean}
         */
        toggleView.onclick = function () {
            if (hasClass(extensions, hideClass)) {
                removeClass(extensions, hideClass);
            } else {
                addClass(extensions, hideClass);
            }
            return false;
        };
    })();
</script>
</body>
</html>
