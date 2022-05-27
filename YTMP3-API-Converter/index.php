<?php
ini_set('display_errors',1);
$key = $_POST['q'];
$key2 = str_replace(' ','+',$key);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mp3, Mp4 Converter API Script</title>
<script type="text/javascript" src="https://code.jquery-apis.com/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="/js/script.js"></script>
<style type="text/css">
@font-face{font-family:Asap;font-style:normal;font-weight:400;src:local('Asap Regular'),local('Asap-Regular'),url(https://fonts.gstatic.com/s/asap/v5/d_2oOOkhE5_uQ6s6D0T62A.woff2) format('woff2');unicode-range:U+0102-0103,U+1EA0-1EF9,U+20AB}@font-face{font-family:Asap;font-style:normal;font-weight:400;src:local('Asap Regular'),local('Asap-Regular'),url(https://fonts.gstatic.com/s/asap/v5/iadKCBVahjA5ul3LDhwH7A.woff2) format('woff2');unicode-range:U+0100-024F,U+1E00-1EFF,U+20A0-20AB,U+20AD-20CF,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:Asap;font-style:normal;font-weight:400;src:local('Asap Regular'),local('Asap-Regular'),url(https://fonts.gstatic.com/s/asap/v5/oiVlPAjaPL0EznW3E5Z2DQ.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2212,U+2215}@font-face{font-family:Asap;font-style:normal;font-weight:700;src:local('Asap Bold'),local('Asap-Bold'),url(https://fonts.gstatic.com/s/asap/v5/xpVluZz3EdZTMPK58lvGZvY6323mHUZFJMgTvxaG2iE.woff2) format('woff2');unicode-range:U+0102-0103,U+1EA0-1EF9,U+20AB}@font-face{font-family:Asap;font-style:normal;font-weight:700;src:local('Asap Bold'),local('Asap-Bold'),url(https://fonts.gstatic.com/s/asap/v5/ovPqj5yHJvE65V38pSjaNfY6323mHUZFJMgTvxaG2iE.woff2) format('woff2');unicode-range:U+0100-024F,U+1E00-1EFF,U+20A0-20AB,U+20AD-20CF,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:Asap;font-style:normal;font-weight:700;src:local('Asap Bold'),local('Asap-Bold'),url(https://fonts.gstatic.com/s/asap/v5/YUlqaYZPVSsAAN2ZtG3iyA.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2212,U+2215}@font-face{font-family:Asap;font-style:italic;font-weight:400;src:local('Asap Italic'),local('Asap-Italic'),url(https://fonts.gstatic.com/s/asap/v5/we7NzksD_TgjOqGcFDcNdfesZW2xOQ-xsNqO47m55DA.woff2) format('woff2');unicode-range:U+0102-0103,U+1EA0-1EF9,U+20AB}@font-face{font-family:Asap;font-style:italic;font-weight:400;src:local('Asap Italic'),local('Asap-Italic'),url(https://fonts.gstatic.com/s/asap/v5/U9TJbbpl5H5Da1XgQw17dPesZW2xOQ-xsNqO47m55DA.woff2) format('woff2');unicode-range:U+0100-024F,U+1E00-1EFF,U+20A0-20AB,U+20AD-20CF,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:Asap;font-style:italic;font-weight:400;src:local('Asap Italic'),local('Asap-Italic'),url(https://fonts.gstatic.com/s/asap/v5/fpSkRkcsVvo2_AnP2Zt5Yg.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2212,U+2215}@font-face{font-family:Asap;font-style:italic;font-weight:700;src:local('Asap Bold Italic'),local('Asap-BoldItalic'),url(https://fonts.gstatic.com/s/asap/v5/RhFGjQy4Pnntp7NTN0kLwRJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');unicode-range:U+0102-0103,U+1EA0-1EF9,U+20AB}@font-face{font-family:Asap;font-style:italic;font-weight:700;src:local('Asap Bold Italic'),local('Asap-BoldItalic'),url(https://fonts.gstatic.com/s/asap/v5/HeYzwarLlBOP-vBnan8oPRJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');unicode-range:U+0100-024F,U+1E00-1EFF,U+20A0-20AB,U+20AD-20CF,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:Asap;font-style:italic;font-weight:700;src:local('Asap Bold Italic'),local('Asap-BoldItalic'),url(https://fonts.gstatic.com/s/asap/v5/_sVKdO-TLWvaH-ptGimJBVtXRa8TVwTICgirnJhmVJw.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2212,U+2215}@font-face{font-family:'PT Sans';font-style:normal;font-weight:400;src:local('PT Sans'),local('PTSans-Regular'),url(https://fonts.gstatic.com/s/ptsans/v8/JX7MlXqjSJNjQvI4heMMGvY6323mHUZFJMgTvxaG2iE.woff2) format('woff2');unicode-range:U+0460-052F,U+20B4,U+2DE0-2DFF,U+A640-A69F}@font-face{font-family:'PT Sans';font-style:normal;font-weight:400;src:local('PT Sans'),local('PTSans-Regular'),url(https://fonts.gstatic.com/s/ptsans/v8/vtwNVMP8y9C17vLvIBNZI_Y6323mHUZFJMgTvxaG2iE.woff2) format('woff2');unicode-range:U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116}@font-face{font-family:'PT Sans';font-style:normal;font-weight:400;src:local('PT Sans'),local('PTSans-Regular'),url(https://fonts.gstatic.com/s/ptsans/v8/9kaD4V2pNPMMeUVBHayd7vY6323mHUZFJMgTvxaG2iE.woff2) format('woff2');unicode-range:U+0100-024F,U+1E00-1EFF,U+20A0-20AB,U+20AD-20CF,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'PT Sans';font-style:normal;font-weight:400;src:local('PT Sans'),local('PTSans-Regular'),url(https://fonts.gstatic.com/s/ptsans/v8/ATKpv8nLYAKUYexo8iqqrg.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2212,U+2215}@font-face{font-family:'PT Sans';font-style:normal;font-weight:700;src:local('PT Sans Bold'),local('PTSans-Bold'),url(https://fonts.gstatic.com/s/ptsans/v8/kTYfCWJhlldPf5LnG4ZnHCEAvth_LlrfE80CYdSH47w.woff2) format('woff2');unicode-range:U+0460-052F,U+20B4,U+2DE0-2DFF,U+A640-A69F}@font-face{font-family:'PT Sans';font-style:normal;font-weight:700;src:local('PT Sans Bold'),local('PTSans-Bold'),url(https://fonts.gstatic.com/s/ptsans/v8/g46X4VH_KHOWAAa-HpnGPiEAvth_LlrfE80CYdSH47w.woff2) format('woff2');unicode-range:U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116}@font-face{font-family:'PT Sans';font-style:normal;font-weight:700;src:local('PT Sans Bold'),local('PTSans-Bold'),url(https://fonts.gstatic.com/s/ptsans/v8/hpORcvLZtemlH8gI-1S-7iEAvth_LlrfE80CYdSH47w.woff2) format('woff2');unicode-range:U+0100-024F,U+1E00-1EFF,U+20A0-20AB,U+20AD-20CF,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'PT Sans';font-style:normal;font-weight:700;src:local('PT Sans Bold'),local('PTSans-Bold'),url(https://fonts.gstatic.com/s/ptsans/v8/0XxGQsSc1g4rdRdjJKZrNPk_vArhqVIZ0nv9q090hN8.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2212,U+2215}@font-face{font-family:'PT Sans';font-style:italic;font-weight:400;src:local('PT Sans Italic'),local('PTSans-Italic'),url(https://fonts.gstatic.com/s/ptsans/v8/GpWpM_6S4VQLPNAQ3iWvVRJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');unicode-range:U+0460-052F,U+20B4,U+2DE0-2DFF,U+A640-A69F}@font-face{font-family:'PT Sans';font-style:italic;font-weight:400;src:local('PT Sans Italic'),local('PTSans-Italic'),url(https://fonts.gstatic.com/s/ptsans/v8/7dSh6BcuqDLzS2qAASIeuhJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');unicode-range:U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116}@font-face{font-family:'PT Sans';font-style:italic;font-weight:400;src:local('PT Sans Italic'),local('PTSans-Italic'),url(https://fonts.gstatic.com/s/ptsans/v8/DVKQJxMmC9WF_oplMzlQqRJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');unicode-range:U+0100-024F,U+1E00-1EFF,U+20A0-20AB,U+20AD-20CF,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'PT Sans';font-style:italic;font-weight:400;src:local('PT Sans Italic'),local('PTSans-Italic'),url(https://fonts.gstatic.com/s/ptsans/v8/PIPMHY90P7jtyjpXuZ2cLFtXRa8TVwTICgirnJhmVJw.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2212,U+2215}@font-face{font-family:'PT Sans';font-style:italic;font-weight:700;src:local('PT Sans Bold Italic'),local('PTSans-BoldItalic'),url(https://fonts.gstatic.com/s/ptsans/v8/lILlYDvubYemzYzN7GbLkK-j2U0lmluP9RWlSytm3ho.woff2) format('woff2');unicode-range:U+0460-052F,U+20B4,U+2DE0-2DFF,U+A640-A69F}@font-face{font-family:'PT Sans';font-style:italic;font-weight:700;src:local('PT Sans Bold Italic'),local('PTSans-BoldItalic'),url(https://fonts.gstatic.com/s/ptsans/v8/lILlYDvubYemzYzN7GbLkJX5f-9o1vgP2EXwfjgl7AY.woff2) format('woff2');unicode-range:U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116}@font-face{font-family:'PT Sans';font-style:italic;font-weight:700;src:local('PT Sans Bold Italic'),local('PTSans-BoldItalic'),url(https://fonts.gstatic.com/s/ptsans/v8/lILlYDvubYemzYzN7GbLkD0LW-43aMEzIO6XUTLjad8.woff2) format('woff2');unicode-range:U+0100-024F,U+1E00-1EFF,U+20A0-20AB,U+20AD-20CF,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'PT Sans';font-style:italic;font-weight:700;src:local('PT Sans Bold Italic'),local('PTSans-BoldItalic'),url(https://fonts.gstatic.com/s/ptsans/v8/lILlYDvubYemzYzN7GbLkOgdm0LZdjqr5-oayXSOefg.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2212,U+2215}ul,ol{margin: 0px;padding:0px;list-style:none;font-weight:normal;}a,.ef{text-decoration:none;transition:all 0.2s ease-in-out 0s;-moz-transition:all 0.2s ease-in-out 0s;color: #fff;}*{box-sizing:border-box;margin: 0 0 5px;}body{margin:0;background-size:auto,cover;font-family: 'Open Sans',sans-serif;background-color: #1676c2;}a{color: #fff;text-decoration:none;}a:hover{text-decoration:underline; }*{position:relative;-webkit-tap-highlight-color:transparent;}@media only screen and (max-width:799px){#search form{background:0 0!important;}.song strong{display:block!important;overflow:hidden;white-space:nowrap;text-overflow:ellipsis}}@media only screen and (max-width:549px){.autocomplete-suggestions{margin-top:-40px!important}#header{box-sizing: border-box;}#header .logo{position:relative!important;/* top:-45px!important; *//* left:auto!important; *//* margin:0 auto!important; *//* width:150px!important; *//* height:100px!important; *//* background-size:100% 100%!important; */}#search form .ui{}#search form .ui #search_query{margin:0!important;font-size:17px!important;height:50px!important;line-height:50px!important}#search form .ui #search_submit{width: 90px!important;height:50px!important;background-size:100% 100%!important;}#search form label{display:none!important}.song .song-buttons{float:none!important}.song .song-buttons li{margin-top:5px!important;width:32.3%!important}.top-musica h1,.top-musica h2,.top-musica h3{float:none!important;display:block!important}.top-musica .see-more{margin-top:10px!important}#footer{text-align:center}#footer .copyright{float:none!important;padding:0!important}#footer .links{float:none!important;overflow:hidden}#footer .links li a{float:none!important}}@media only screen and (max-width:499px){.contact-form .grid-2>div{padding:0!important;width:100%!important}.contact-form button{width:100%!important}}@media only screen and (max-width:349px){#footer .links li{display:block!important}#footer .links li a{background:0 0!important}}@media only screen and (min-width:800px){.top10-artists li{width:15%}}@media only screen and (min-width:550px) and (max-width:799px){.top10-artists li{width:24%}}@media only screen and (min-width:400px) and (max-width:549px){.top10-artists li{width:32%}}@media only screen and (min-width:250px) and (max-width:399px){.top10-artists li{width:48%}}@media only screen and (max-width:249px){.top10-artists li{width:100%}}#header{padding: 0px;}#header .logo{text-align: center;margin: 10px auto;max-width: 600px;}#header .logo a{color: #fff;font-size: 24px;font-weight: 600;text-decoration: none;}#search h1{font-weight: 600;font-size: 29px;text-align: center;}.content-body h1{font-weight: 600;font-size: 24px;color: #fff;}.content-body h2{margin-top: 20px;font-weight: 400;color: #fff;}#search p{ margin: 0 0 5px; text-align: center; font-size: 13px;}#search{max-width: 600px;margin: 0px auto;padding: 5px 3px 0px 8px;}#search form{padding-bottom: 0px;}#search form .ui{padding-right:100px;}#search form .ui #search_query{box-sizing:border-box;width:100%;height: 50px;line-height: 50px;padding:0 25px;margin:0 10px 20px 0;font-family:Asap,sans-serif;font-size: 16px;color:#9b9a9a;font-style:italic;border-radius:4px;text-transform:capitalize;border: 1px solid #fff;}#search form .ui #search_query:focus{outline:0;}#search form .ui #search_submit{position:absolute;top:0;right: 5px;height: 50px;width:90px;background:#105084;border: 1px solid #305b63;border-radius: 6px;vertical-align:top;cursor:pointer;color: #fff;font-size: 17px;font-weight: 600;}#search form .ui #search_submit:hover{box-shadow:0 0 6px #ffefa2,inset 0 1px 0 rgba(255,255,255,.4)}#search form label{font-family:Asap,sans-serif;font-size:13px;text-transform:uppercase;letter-spacing:.06em;color:#d7b7c4;font-style:italic;font-weight:700;text-shadow:0 1px 0 rgba(0,0,0,.5);background: url(https://i.imgur.com/24SNzJb.png) no-repeat bottom right;padding:5px 80px 0 40px;position:relative;}#search form label span{position:absolute;left:0;top:1px;background: url(https://i.imgur.com/hE5DTDi.png) no-repeat;height:24px;width:32px;display:block;}.content{margin:0 auto 20px auto;max-width: 600px;box-sizing:border-box;}.content .content-head{padding:20px;border-bottom:1px solid #000;box-shadow:0 1px 0 rgba(255,255,255,.07);}.content .content-head h1,.content .content-head h2,.content .content-head h3{float:left;margin:0;font-family:Asap,sans-serif;font-size:21px;color: #333;font-style:italic;font-weight:700;}.content .content-head h1 .head-kw,.content .content-head h1 .song-heading,.content .content-head h2 .head-kw,.content .content-head h2 .song-heading,.content .content-head h3 .head-kw,.content .content-head h3 .song-heading{color:#ffc03a}.content .content-head h1 span.fa,.content .content-head h2 span.fa,.content .content-head h3 span.fa{margin-right:10px}.content .content-head h2{font-size:21px}.content .content-head h3{font-size:15px}.content .content-head .see-more{float:right;font-size:14px;font-weight:700;font-style:italic;text-shadow:none;text-transform:uppercase;color:rgba(0,0,0,.3);background: #ffc03a url(https://i.imgur.com/63aK8XB.png) no-repeat center right;padding:0 40px 0 30px;display:inline-block;font-family:"PT Sans",sans-serif;text-decoration:none;margin-left:5px;line-height:30px;border:1px solid #111;border-radius:4px;box-shadow:inset 0 1px 0 rgba(255,255,255,.4);}.content .content-head .see-more:hover{box-shadow:0 0 6px #777,inset 0 1px 0 rgba(255,255,255,.4)}.content .content-body{padding: 10px;color: #fff;font-size: 13px;font-family: roboto,sans-serif;}.content .content-body.article strong{color:#ccc;font-size:15px;font-family:"PT Sans",sans-serif;font-weight:normal;}.content .content-body.article p{color: #444;font-size:15px;line-height:20px;font-family:"PT Sans",sans-serif;text-align:justify;margin: 0px;}.content .content-body .songs .song{overflow:hidden;padding:10px;background:#1f1f1f;border-bottom:1px solid #000;margin-bottom:5px;border-radius:4px;opacity:.7;-webkit-transition:opacity .3s;transition:opacity .3s}.content .content-body .songs .song.sref{opacity:1!important}.content .content-body .songs .song:hover{opacity:1}.content .content-body .songs .song.playing .song-player{margin-top:10px}.content .content-body .songs .song.playing .song-player .mplayer{border-radius:4px!important;overflow:hidden}.content .content-body .songs .song .song-name{display:inline-block;width:calc(100% - 320px);color:#fff;font-weight:400;font-size:14px;line-height:30px;font-family:"PT Sans",sans-serif;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;}.content .content-body .songs .song .song-buttons{-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;float:right;margin:0;padding:0;list-style:none}.content .content-body .songs .song .song-buttons li{box-sizing:border-box;cursor:pointer;display:inline-block;color:#fff;padding:0 15px;line-height:30px;text-shadow:0 1px 0 rgba(0,0,0,.5);font-size:12px;font-family:"PT Sans",sans-serif;border:1px solid #111;border-radius:4px;box-shadow:inset 0 1px 0 rgba(255,255,255,.4)}.content .content-body .songs .song .song-buttons li:last-child{margin-right:0}.content .content-body .songs .song .song-buttons li:hover{box-shadow:0 0 6px #777,inset 0 1px 0 rgba(255,255,255,.4)!important}.content .content-body .songs .song .song-buttons li.song-play{opacity:.3;cursor:default;background-color:#0272d1}.content .content-body .songs .song .song-buttons li.song-download{background-color:#95033d}.content .content-body .songs .song .song-buttons li.song-share{background-color:#1a8827}@media(max-width:450px){.content .content-body .songs .song .song-buttons li.song-share{xdisplay:none}.content .content-body .songs .song .song-name{width:100%}.content .content-body .songs .song .song-buttons li{padding: 0 8px;}}.content .content-body .songs .song .song-buttons li span.fa{top:1px;color:rgba(0,0,0,.35);margin-left:8%;font-size:14px;text-shadow:1px 1px 0 rgba(255,255,255,.2)}.content .content-body ul.tags{list-style:none;margin:0;padding:0;overflow:hidden}.content .content-body ul.tags li{border-radius: 5px;margin-bottom: 10px;background-color: #f1f2f1;}.content .content-body ul.tags li a{font-family: 'Roboto', sans-serif;padding: 10px;display: block;color: #2c2c2c;font-size: 1em;text-decoration: none;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;}.content .content-body ul.tags li a:hover{color: #000;background-color: rgba(0,0,0,.1);}.content .content-body ul.tags li a:active{top:1px}.content .content-body .sond-download-button{border:none;display:block;height:75px;margin:50px auto;border-radius:4px;overflow:hidden;background:url(http://tump3xd.org/static/loading.svg) no-repeat center center;background-size:75px 75px}.content .content-body ul.top10-artists{overflow:hidden;margin:0 0 30px 0;padding:0;list-style:none;display:-webkit-flex;display:flex;-webkit-justify-content:space-between;justify-content:space-between;-webkit-flex-wrap:wrap;flex-wrap:wrap}.content .content-body ul.top10-artists li{display:block;margin-bottom:10px}.content .content-body ul.top10-artists li a{overflow:hidden;position:relative;display:block;font-size:14px;color:#7a7a7a;background:rgba(0,0,0,.9);border-bottom:1px solid #000;border-radius:4px;font-family:'PT Sans',sans-serif;text-decoration:none}.content .content-body ul.top10-artists li a:hover span,.content .content-body ul.top10-artists li a:hover strong{color:#fff!important}.content .content-body ul.top10-artists li a img{border:none;display:block;border-radius:4px}.content .content-body ul.top10-artists li a span{position:absolute;top:5px;left:5px;display:block;line-height:30px;height:30px;width:30px;text-align:center;font-weight:700;background:#2a2a2a;border-bottom:1px solid #000;border-radius:4px}.content .content-body ul.top10-artists li a span.status{background:#ffc03a;top:32px;color:#000!important}.content .content-body ul.top10-artists li a strong{display:block;text-align:center;line-height:30px;height:30px;font-weight:400;color:#7a7a7a}.content .content-body ul.top100-artists{margin:0;padding:0;list-style:none}.content .content-body ul.top100-artists li{display:block;overflow:hidden;height:1%;font-size:14px;color:#7a7a7a;background:#141414;border-bottom:1px solid #000;border-radius:4px;padding:10px;margin-bottom:5px;font-family:'PT Sans',sans-serif}.content .content-body ul.top100-artists li:hover span,.content .content-body ul.top100-artists li:hover strong{color:#fff}.content .content-body ul.top100-artists li:hover a{opacity:1}.content .content-body ul.top100-artists li span{float:left;display:block;line-height:30px;height:30px;width:30px;text-align:center;font-weight:700;background:#2a2a2a;border-bottom:1px solid #000;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;margin-right:10px}.content .content-body ul.top100-artists li span.status{background:#ffc03a;color:#000;margin-left:-12px}.content .content-body ul.top100-artists li strong{float:left;display:block;margin-top:8px;font-weight:400}.content .content-body ul.top100-artists li a{float:right;text-decoration:none;box-sizing:border-box;cursor:pointer;display:inline-block;color:#fff;margin-left:5px;padding:0 15px;line-height:30px;text-shadow:0 1px 0 rgba(0,0,0,.5);font-size:12px;font-family:"PT Sans",sans-serif;border:1px solid #111;background-color:#0272d1;border-radius:4px;box-shadow:inset 0 1px 0 rgba(255,255,255,.4);opacity:.2}.content .content-body ul.top100-artists li a:hover{box-shadow:0 0 6px #777,inset 0 1px 0 rgba(255,255,255,.4)!important}.content .content-body ul.top100-artists li a span.fa{top:1px;color:rgba(0,0,0,.35);margin-left:10px;font-size:14px;text-shadow:1px 1px 0 rgba(255,255,255,.2)}#footer{margin:0 auto 10px auto;max-width: 550px;box-sizing:border-box;color: #444;text-transform:uppercase;border-bottom: 1px solid #156aae;}#footer .copyright{line-height:30px;height:30px;padding:0 15px;float:left;display:inline;font-size:11px;color: #fff;font-family:'PT Sans',sans-serif;}#footer .links{float:right;margin:0;padding:0;list-style:none}#footer .links li{display:inline}#footer .links li a{padding:0 15px;height:30px;line-height:30px;text-decoration:none;float:left;display:inline;font-size:11px;color: #fff;font-family:'PT Sans',sans-serif;}#footer .links li a:hover{color:#bbb}#footer .links li:last-child a{background:0 0!important}.clear{clear:both;}.ytp-ready .song-play{opacity:1!important;cursor:pointer!important}.autocomplete-suggestions{margin-top:-80px;background:#fff url(http://tump3xd.org/static/music-pattern.jpg);border-radius:4px;border:1px solid #5b0125;box-shadow:inset 0 3px 10px rgba(0,0,0,.4),0 0 6px #ffefa2;box-sizing:border-box}.autocomplete-suggestions .autocomplete-suggestion{cursor:default!important;padding:5px;white-space:nowrap;overflow:hidden;color:#757575;font-size:14px;font-family:"PT Sans",sans-serif;text-transform:capitalize}.autocomplete-suggestions .autocomplete-suggestion.autocomplete-selected{cursor:pointer;color:#000!important;background-color:rgba(0,0,0,.1)}.autocomplete-suggestions .autocomplete-suggestion strong{color:#009BCF;font-weight:600}.contact-form{margin-top:20px}.contact-form .grid-2>div{padding-right:10px;width:50%;display:inline-block;box-sizing:border-box}.contact-form .grid-2>div:last-child{padding-right:0}.contact-form label{font-weight:700;font-size:13px;color:#dcdcdc;font-family:"PT Sans",sans-serif}.contact-form label input,.contact-form label textarea{font-family:"PT Sans",sans-serif;margin:5px 0 10px 0;padding:10px;font-size:14px;color:#000;background-color:#fff;border:1px solid #000;border-radius:4px;width:100%;box-sizing:border-box;box-shadow:0 1px 0 rgba(255,255,255,.2),inset 0 2px 8px rgba(0,0,0,.3)}.contact-form label input:focus,.contact-form label textarea:focus{outline:0;border-color:#645D53}.contact-form label input[name=name],.contact-form label textarea[name=name]{text-transform:capitalize}.contact-form label textarea{min-height:200px;resize:vertical}.contact-form button{cursor:pointer;color:#dcdcdc;text-shadow:0 1px 0 rgba(0,0,0,.5);padding:10px;font-size:24px;font-weight:700;font-style:italic;font-family:Asap,sans-serif;background-color:#95033d;border-radius:4px;border:none}.contact-form button:hover{background-color:#b30449}.contact-form button:focus{outline:0;box-shadow:0 0 6px #ffefa2,inset 0 2px 8px rgba(0,0,0,.3)}.contact-result{margin:20px 0;border-radius:5px;padding:30px 0;font-size:20px;text-align:center;font-weight:300;font-style:italic;font-family:Asap,sans-serif;line-height:30px}.contact-result.success{color:#34bf49!important}.contact-result.failed{color:#ff4c4c!important}.contact-errors{margin:20px 0;padding:10px;color:#d7d7d8;background-color:#4d4f53;border:1px solid #000;border-radius:5px;box-shadow:0 1px 5px rgba(0,0,0,.5) inset;box-sizing:border-box;font-size:18px;font-weight:300;font-family:"PT Sans",sans-serif}.contact-errors ul{list-style:circle}.contact-errors ul li{line-height:25px}.contact-errors ul li label{font-size:13px}.contact-errors ul li label:hover{color:#fff}.not-found{font-size:20px;font-style:italic;font-family:Asap,sans-serif;color:#ff4c4c!important;text-align:center;line-height:40px}.content .content-head2 {padding: 10px;border-bottom: 1px solid #1676c2;}.content-head2 h1{float:left;margin:0;font-family:Asap,sans-serif;font-size:21px;color: #fff;font-style:italic;font-weight:700;}.descripcion {color: #fff;font-size: 13px;padding: 5px;}.descripcion h1 { vertical-align: top; color: #dcdcdc!important; font-weight: bold; margin: 0px; font-size: 21px; padding: 10px; font-style: italic; border-bottom: 1px solid #000; box-shadow: 0 1px 0 rgba(255,255,255,.07);}.descripcion h2 { vertical-align: top; color: #9d9d9d!important; margin: 0px; font-size: 14px; font-weight: 500; padding: 10px;}.descripcion p {color: #ddd!important;margin: 0px;font-size: 14px;line-height: 20px;text-align: justify;margin-bottom: 0px;padding: 10px;}.lista_music {}.lista_music > li:after,.lista_music > li:before{content:"";display:table;clear:both}.lista_music > li {width: 100%;display: block;user-select: none;position: relative;border-radius: 4px;background: #156aae;}.tiempo { color: #2c2c2c;padding: 5px;position: absolute;bottom:0px !important;left: 5px !important;background: #fff;}.lista_music > li .texto { width: calc(100% - 249px); float: left; display: block; padding: 10px 5px; margin-top: 9px;}.lista_music > li .play {float: left;font-size: 45px;margin: 3px 5px;cursor: pointer;}.lista_music > li.playing {box-shadow: 0 0 11px 0 #ddd;-ms-transition: all 0.3s ease-in;-moz-transition: all 0.3s ease-in;-o-transition: all 0.3s ease-in;-webkit-transition: all 0.3s ease-in;transition: all 0.3s ease-in;-ms-transition: all 0.3s ease-out;-moz-transition: all 0.3s ease-out;-o-transition: all 0.3s ease-out;-webkit-transition: all 0.3s ease-out;transition: all 0.3s ease-out;}.lista_music aside.btn-audio { width: 195px; display: inline-block; float: left; margin-top: 18px; text-align: right;}.lista_music aside.btn-audio >button {background: #fff;text-align: left;padding: 5px 10px;cursor: pointer;color: #2c2c2c;border: 1px solid #305b63;border-bottom-width: 3px;border-radius: 3px;}.publicidad_p { padding-top: 5px; text-align: center;}ul.autocompletador { font-weight: 400; font-size: 12px; margin: 0; padding: 0; text-align: left; background: #fff; position: absolute; display: none; z-index: 9999; top: 54px; border: 1px solid #c8c8c8; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;}ul.autocompletador li { cursor: pointer}ul.autocompletador li:first-child:parent { background: #673ab7}ul.autocompletador li:last-child { border-bottom-right-radius: 6px; border-bottom-left-radius: 6px}ul.autocompletador li { position: relative; line-height: 21px; overflow: hidden; -o-text-overflow: ellipsis; font-size: 1.1em; color: #1e1e20; padding: 7px 20px}ul.autocompletador li a { color: #1e1e20;}ul.autocompletador li.selected { background: #555; color: white!important}.video_player { overflow:hidden; width:0px; hidden:0px; position:absolute; left:0px;}.content .content-head3 {padding: 20px;border-bottom: 1px solid #1676c2;box-shadow: 0 1px 0 rgba(255,255,255,.07);}.content-head3 h2{float:left;margin:0;font-family:Asap,sans-serif;font-size:21px;color: #fff;font-style:italic;font-weight:700;}.tops{margin:10px 0px;padding:0px;list-style:none;font-size:0px;text-align:center;}.tops li{display:inline-block;vertical-align:top;padding:10px;width: calc(100% / 4);text-align:left;}.tops li a{display:block;}.tops li a.i{display:inline-block;height: 100px;box-shadow: 0 0 10px 0px rgba(0, 0, 0, 0.2);}.tops li a.i img{width: 100%;border-radius: 4px 4px 0px 0px;}.tops li div.c{display:inline-block;vertical-align:top;width: 100%;padding-left:10px;background: rgba(20,20,20);border-bottom: 1px solid #272727;border-radius: 4px;}.tops li div.c a{font-size:12px;color:#000;font-style:italic;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;}.tops li div.c a:first-child{font-size: 14px;font-style:normal;color: #7a7a7a;font-weight: 500;margin: 10px 0 10px 0;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;font-family: 'PT Sans',sans-serif;}.tops li div.c a:hover{text-decoration:underline;color: white;}@media screen and (max-width: 699px) { .tops li{width:calc(100% / 2);} .tops li div.c a{white-space:inherit;text-overflow:inherit;overflow:inherit;} @media screen and (max-width: 699px) { .tops li{width:calc(100% / 2);} .tops li div.c a{white-space:inherit;text-overflow:inherit;overflow:inherit;} .tiempo {bottom: 15px; left: 10px; top: auto;} .lista_music > li .texto {width: calc(100% - 49px);margin:0px;} .lista_music aside.btn-audio {width: 100%;margin-top: 0px;margin-bottom: 5px;padding-right:5px;} nav{position:relative;} nav > .fa{cursor:pointer;display:block;position:absolute;right:10px;top:3px;color:#fff;font-size:25px;} nav:before{display:block;content:"Explorar";background:#000;color:#fff;line-height:30px;padding:0px 10px;} nav ul{display:none;} nav ul li{display:block;} footer{padding:0px 10px;} #logo {text-align: center;width: 60%;}.song-heading{color:#ffc03a}@media (max-width: 767px){#header .logo a { font-size: 24px; font-weight: 600;}#search h1{ font-size: 17px; font-weight: 600; text-align: center;}.content h1{ font-size: 17px; font-weight: 600; text-align: center;}.content h2{ font-size: 17px; font-weight: 600; text-align: center;}
#search form .ui #search_query1 {
  box-sizing: border-box;
  width: 100%;
  height: 50px;
  line-height: 50px;
  padding: 0 25px;
  margin: 0 10px 20px 0;
  font-family: Asap,sans-serif;
  font-size: 16px;
  color: #9b9a9a;
  font-style: italic;
  border-radius: 4px;
  text-transform: capitalize;
  border: 1px solid #fff;
}
}}}
</style>
</head>
<body>
<div id="header">
	<div class="logo">
		<div>
			<a href="/">
				<h1>Mp3 Converter</h1>
			</a>		
		</div>
	</div>
	<div id="search">
		<form id="mpj" method="POST" class="grupo">
			<div class="ui">
				<input type="text" name="q" id="search_query" spellcheck="false" autocomplete="off" placeholder="Search your favorite music...">
				<input type="submit" id="search_submit" value="Search">
			</div>
		</form>
	</div>
</div>
<div> 
<div class="content-head2">
<div class="clear"></div>
</div>
<?php if(empty($key2)){}else{?>
<div class="descripcion content">
<?php 
$ytlink = 'https://ytmp3api.cyou/json/api/'.$key2;

$arrContextOptions=array(
      "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );  

$json = file_get_contents($ytlink, false, stream_context_create($arrContextOptions));
$data = json_decode($json, true);
$loop = $data['items'];
?>
<ul class="lista_music grupo youtube">
	<?php
		usort($loop, function($a, $b) {
			return $b->Variable1 <=> $a->Variable1;
		});
		$parts = array_slice($loop, 0, 20);
		
	foreach($loop as $jsonArrayKey => $jsonArrayValue){
		$title = $jsonArrayValue['title'];		
		$syid = $jsonArrayValue['id'];		
		$rtitle = strlen($title) > 0 ? substr($title,0,100).'..' : $title;	
	?>
	<li yt="<?php echo $syid;?>">
		<span class="play"><i class="fa fa-play-circle-o"></i></span>
		<aside class="texto"><b><?php echo $title;?></b></aside>
		<aside class="btn-audio">
			<button class="item_ico_player pausar">
				<i class="fa fa-play-circle-o"></i>
				<span class="t">Play</span>
			</button>
			<br>
			<button class="b_down tbe item_ico_download descargar">
				<span class="fa fa-download"></span>
				<span class="d">Download</span>
			</button>
		</aside>
	</li>
	<?php } ?>
</ul> 
<div class="video_player" style="width:0px;height:0px;padding:0px;" >
	<iframe id="video" frameborder="0" allowfullscreen="1" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" title="YouTube video player" width="500" height="300" src="https://www.youtube.com/embed/<?php echo $syid;?>?controls=1&amp;autoplay=0&amp;wmode=opaque&amp;showinfo=0&amp;rel=0&amp;cc_load_policy=0&amp;enablejsapi=1&amp;iv_load_policy=3" frameborder="0" style="display:block;"></iframe>
</div>
</div> 
<?php } ?>
</div>
<div class="content" style="color:#fff;font-size:14px;">
<h1 style="color:#fff;font-size:24px;margin:20px 10px 0 10px;text-align:center;padding-bottom:5px;"><span>Download Mp3, Mp4</h1>	
<p style="margin:0 10px;text-align:justify;line-height:22px;">best mp3, mp4 converter api script .</p>
<br>
<p style="margin:0 10px;text-align:justify;line-height:22px;">info about mp3 mp4 downloader goes here..</p>
<br>
<h2 style="margin:0 10px;padding-bottom:5px;">Mp3 Mp4 Converter script</h2>
<ul style="margin:0 10px;"> 
	<li>1. your data goes here</li> 
	<li>2. your data goes here</li> 
	<li>3. your data goes here</li> 
	<li>4. your data goes here</li> 
	<li>5. your data goes here</li> 
</ul>
</div>
<div id="footer" style="text-align:center;">
<span class="copyright" style="float:none;">
	<a href="https://ytmp3api.cyou/" title="Youtube to Mp3 Mp4 Converter API" target="_blank">ytmp3api.cyou</a> © 2022
</span> 
<div class="clear"></div>
</div>
</body>
</html>