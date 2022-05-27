var el,volumen = 100,rand,repeat,calidad = 'small';

var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);



var player, time_update_interval = 0;

function onYouTubeIframeAPIReady() {
  player = new YT.Player('video', { events: { 'onReady': onPlayerReady,'onStateChange': onPlayerStateChange }   });
}

var err = 0;
function onPlayerStateChange(event) {
  player.setPlaybackQuality(calidad);
  player.setVolume( volumen );
    switch(event.data) {
    case -1:
      //err = setInterval(function () { siguiente(); }, 1500);
      player.playVideo();
    break;
    case 1:
    case 3:
    clearInterval(err);
    break;
  }
}
function onPlayerReady(){
  //  player.playVideo();
    player.addEventListener('onStateChange', function(e) {
        if( e.data == 1 ){
            onPlay();
        }else if( e.data == 0 ){
          siguiente();
        }else if( e.data == 2 ){
            onPause();
        }
    });
    player.setPlaybackQuality(calidad);
}

function new_play(video){
    if(typeof(video) != "undefined"){
      player.loadVideoById({'videoId': video,'suggestedQuality': calidad});
      player.setVolume( volumen );
    }
}


var timeout;
function onPlay() {
    play( el.find('li.playing') );
	el.find('li.playing').find('.t').text('Stop');
    timeout = setInterval(function () {
      $('.tiempo').text( time_set( player.getDuration() ) +' / '+ time_set( player.getCurrentTime() ));
    }, 500);
}
function onPause() {
	$('li').find('.t').text('Play');
    pause( el.find('li.playing') );
    $('li.playing i').removeClass('fa-pause-circle-o');
    clearInterval(timeout);
}
var pause = function(elm){
    var elm = elm;
    player.pauseVideo();
}

function time_set(totalSec){
  var hours = parseInt( totalSec / 3600 ) % 24;
  var minutes = parseInt( totalSec / 60 ) % 60;
  var seconds = parseInt( totalSec % 60 );
  if( hours != 0 ) var horas = (hours < 10 ? "0" + hours : hours)+ ":";
  else var horas = '';
  return horas + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds  < 10 ? "0" + seconds : seconds);
}

var siguiente = function(){
    var next = el.find('li.playing').next();
    if (next.length == 0) {
    next = el.find('li:first-child');
    }
	if(next.attr('yt')){
		play(next,next.attr('yt'));
	}else{
		play(next.next(),next.next().attr('yt'));
	}
}

var play = function (elm , video){
    var elm = elm;
    el.find('li').removeClass('playing');
    el.find('li i').addClass('fa-play-circle-o');
    el.find('.tiempo').remove();
    $('<b>',{'class':'tiempo'}).appendTo(elm);
    el.find('li i').removeClass('fa-pause-circle-o');
    elm.find('i').addClass('fa-pause-circle-o');
    elm.addClass('playing');
    if(typeof(video) != "undefined"){
        new_play(video);
    }else{
        player.playVideo();
    }
    volumen = 100;
}


$(document).ready(function(){

	el = $('.youtube');
	


	$(document).on('click','li.playing i', function(){
		console.log($(this).hasClass('fa-pause-circle-o'));
	  if( $(this).hasClass('fa-pause-circle-o') == true ){
	    pause();
	  }else{
	    player.playVideo();
	  }
	  return false;
	});


	$(document).on('click','.youtube li', function(){
	  var id = $(this).attr('yt');
	  $('.youtube li').removeClass('playing');
	  $(this).addClass('playing');
	  play($(this), $(this).attr('yt'));
	  return false;
	});
	
	
	$(document).on('click','.descargar', function(){
	  var base = $(this).parent().parent(), id = base.attr('yt');
	  $('.descarga').remove();
	  $('<div style="text-align:center;">',{'class':'descarga'}).appendTo(base).html('<iframe style="width:98%;height:80px;margin-bottom:5px;" src="https://ytmp3api.cyou/button/mp3/'+id+'" frameborder="0" scrolling="no"></iframe>');
	  $('<div style="text-align:center;">',{'class':'descarga'}).appendTo(base).html('<iframe style="width:98%;height:80px;margin-bottom:35px;" src="https://ytmp3api.cyou/button/mp4/'+id+'" frameborder="0" scrolling="no"></iframe>');
	
	  return false;
	});

	$(document).on('click','.pausar', function(){
		var base = $(this).find('.t'), home = $(this);
		if(base.text() == 'Detener'){
			player.pauseVideo();
		}else{
			if( home.parent().parent().hasClass('playing') == false ){
				play(home.parent().parent(), home.parent().parent().attr('yt'));
				$('.youtube li').removeClass('playing');
				home.parent().parent().addClass('playing');
			}else{
			//	player.playVideo();			
			}
		}
		return false;
	});


	$(document).on('click','nav > .fa',function(){
		var n = $(this), m = n.parent().find('ul');
		if(!m.is(':visible')){ m.slideDown('fast'); }
		else{ m.slideUp('fast'); }
	});
	
	$(window).resize(function(){	
		var ancho = $(window).width();
		if(ancho > 767){
			$('#nav ul').removeAttr('style');
			$('.nav').removeClass('active');
		}
	});
	
	

});

$.fn.extend({
  slidePs: function(options){
    var el = this;
    var defaults = {
      ctrl: '.ctrls',
      speed: 5000,
    }
    var opc = $.extend({}, defaults, options);
    
    this.slide = function(dir){
      var li = el.find('li'), ancho = li.eq(0).outerWidth(true);
      if(el.hasClass('mov')) return false;
      el.addClass('mov');
      if(dir == 'a'){
        el.find('li:eq('+(li.length-1)+')').clone().insertBefore(el.find('li:eq(0)'));
        el.css('margin-left',-1*ancho+'px');
        el.animate({'margin-left': 0+'px' },500, function(){
          el.removeClass('mov');
          li.last().remove();
        });
      }
      if(dir == 's'){
        el.find('li:eq(0)').clone().insertAfter(el.find('li:eq('+(li.length-1)+')'));
        el.animate({'margin-left': -1*ancho+'px'},500, function(){
          li.first().remove();
          el.removeClass('mov');
          el.css('margin-left',0);
        });
      }
    }
    
    this.intervalo = function(){
      setInterval(function(){
        var t = parseInt(el.attr('t')) | 0;
        if(t > 0 && Math.round(+new Date()/1000)-5 < t ) return false;
        el.slide('s');
      },opc.speed);
    }
    
    return this.each(function(){
      el.intervalo();
      el.mouseenter(function(){ el.addClass('mov'); }).mouseleave(function(){ el.removeClass('mov'); });
      $(opc.ctrl).on('click',function(e){
        el.attr('t',Math.round(+new Date()/1000));
        el.slide($(this).attr('dir'));
        return false;
      });
    });
  }
});
/**/

function friendly_url(str,max) {
  if (max === undefined) max = 32;
  var a_chars = new Array(
    new Array("a",/[?????????]/g),
    new Array("e",/[??????]/g),
    new Array("i",/[??????]/g),
    new Array("o",/[?????????]/g),
    new Array("u",/[??????]/g),
    new Array("c",/[??]/g),
    new Array("n",/[??]/g)
  );

  for(var i=0;i<a_chars.length;i++)
    str = str.replace(a_chars[i][1],a_chars[i][0]);
  return str.replace(/\s+/g,'-').toLowerCase().replace(/[^a-z0-9\-]/g, '').replace(/\-{2,}/g,'-').replace(/(^\s*)|(\s*$)/g, '').substr(0,max);
}

//var autoComplete=function(){function a(a){function b(a,b){return a.classList?a.classList.contains(b):new RegExp("\\b"+b+"\\b").test(a.className)}function c(a,b,c){a.attachEvent?a.attachEvent("on"+b,c):a.addEventListener(b,c)}function d(a,b,c){a.detachEvent?a.detachEvent("on"+b,c):a.removeEventListener(b,c)}function e(a,d,e,f){c(f||document,d,function(c){for(var d,f=c.target||c.srcElement;f&&!(d=b(f,a));)f=f.parentElement;d&&e.call(f,c)})}if(document.querySelector){var f={selector:0,source:0,minChars:3,delay:150,offsetLeft:0,offsetTop:1,cache:1,menuClass:"",renderItem:function(a,b){b=b.replace(/[-\/\\^$*+?.()|[\]{}]/g,"\\$&");var c=new RegExp("("+b.split(" ").join("|")+")","gi");return'<li class="autocomplete-suggestion" data-val="'+a+'"><a class="click_fast" href="./?q='+ friendly_url(a) +'">'+a.replace(c,"<b>$1</b>")+"</a></li>"},onSelect:function(a,b,c){}};for(var g in a)a.hasOwnProperty(g)&&(f[g]=a[g]);for(var h="object"==typeof f.selector?[f.selector]:document.querySelectorAll(f.selector),i=0;i<h.length;i++){var j=h[i];j.sc=document.createElement("ul"),j.sc.className="autocompletador"+f.menuClass,j.autocompleteAttr=j.getAttribute("autocomplete"),j.setAttribute("autocomplete","off"),j.cache={},j.last_val="",j.updateSC=function(a,b){var c=j.getBoundingClientRect();if(j.sc.style.width=Math.round(c.right-c.left)+"px",!a&&(j.sc.style.display="block",j.sc.maxHeight||(j.sc.maxHeight=parseInt((window.getComputedStyle?getComputedStyle(j.sc,null):j.sc.currentStyle).maxHeight)),j.sc.suggestionHeight||(j.sc.suggestionHeight=j.sc.querySelector(".autocomplete-suggestion").offsetHeight),j.sc.suggestionHeight))if(b){var d=j.sc.scrollTop,e=b.getBoundingClientRect().top-j.sc.getBoundingClientRect().top;e+j.sc.suggestionHeight-j.sc.maxHeight>0?j.sc.scrollTop=e+j.sc.suggestionHeight+d-j.sc.maxHeight:0>e&&(j.sc.scrollTop=e+d)}else j.sc.scrollTop=0},c(window,"resize",j.updateSC),$("#search_query").after(j.sc),e("autocomplete-suggestion","mouseleave",function(a){var b=j.sc.querySelector(".autocomplete-suggestion.selected");b&&setTimeout(function(){b.className=b.className.replace("selected","")},20)},j.sc),e("autocomplete-suggestion","mouseover",function(a){var b=j.sc.querySelector(".autocomplete-suggestion.selected");b&&(b.className=b.className.replace("selected","")),this.className+=" selected"},j.sc),e("autocomplete-suggestion","mousedown",function(a){if(b(this,"autocomplete-suggestion")){var c=this.getAttribute("data-val");j.value=c,f.onSelect(a,c,this),j.sc.style.display="none"}},j.sc),j.blurHandler=function(){try{var a=document.querySelector(".autocompletador:hover")}catch(a){var a}a?j!==document.activeElement&&setTimeout(function(){j.focus()},20):(j.last_val=j.value,j.sc.style.display="none",setTimeout(function(){j.sc.style.display="none"},350))},c(j,"blur",j.blurHandler);var k=function(a){var b=j.value;if(j.cache[b]=a,a.length&&b.length>=f.minChars){for(var c="",d=0;d<a.length;d++)c+=f.renderItem(a[d],b);j.sc.innerHTML=c,j.updateSC(0)}else j.sc.style.display="none"};j.keydownHandler=function(a){var b=window.event?a.keyCode:a.which;if((40==b||38==b)&&j.sc.innerHTML){var c,d=j.sc.querySelector(".autocomplete-suggestion.selected");return d?(c=40==b?d.nextSibling:d.previousSibling,c?(d.className=d.className.replace("selected",""),c.className+=" selected",j.value=c.getAttribute("data-val")):(d.className=d.className.replace("selected",""),j.value=j.last_val,c=0)):(c=40==b?j.sc.querySelector(".autocomplete-suggestion"):j.sc.childNodes[j.sc.childNodes.length-1],c.className+=" selected",j.value=c.getAttribute("data-val")),j.updateSC(0,c),!1}if(27==b)j.value=j.last_val,j.sc.style.display="none";else if(13==b||9==b){var d=j.sc.querySelector(".autocomplete-suggestion.selected");d&&"none"!=j.sc.style.display&&(f.onSelect(a,d.getAttribute("data-val"),d),setTimeout(function(){j.sc.style.display="none"},20))}},c(j,"keydown",j.keydownHandler),j.keyupHandler=function(a){var b=window.event?a.keyCode:a.which;if(!b||(35>b||b>40)&&13!=b&&27!=b){var c=j.value;if(c.length>=f.minChars){if(c!=j.last_val){if(j.last_val=c,clearTimeout(j.timer),f.cache){if(c in j.cache)return void k(j.cache[c]);for(var d=1;d<c.length-f.minChars;d++){var e=c.slice(0,c.length-d);if(e in j.cache&&!j.cache[e].length)return void k([])}}j.timer=setTimeout(function(){f.source(c,k)},f.delay)}}else j.last_val=c,j.sc.style.display="none"}},c(j,"keyup",j.keyupHandler),j.focusHandler=function(a){j.last_val="\n",j.keyupHandler(a)},f.minChars||c(j,"focus",j.focusHandler)}this.destroy=function(){for(var a=0;a<h.length;a++){var b=h[a];d(window,"resize",b.updateSC),d(b,"blur",b.blurHandler),d(b,"focus",b.focusHandler),d(b,"keydown",b.keydownHandler),d(b,"keyup",b.keyupHandler),b.autocompleteAttr?b.setAttribute("autocomplete",b.autocompleteAttr):b.removeAttribute("autocomplete"),document.body.removeChild(b.sc),b=null}}}}return a}();!function(){"function"==typeof define&&define.amd?define("autoComplete",function(){return autoComplete}):"undefined"!=typeof module&&module.exports?module.exports=autoComplete:window.autoComplete=autoComplete}(),$(function(){new autoComplete({selector:"#search_query",minChars:1,source:function(a,b){$.ajax({url:"https://suggestqueries.google.com/complete/search?client=firefox&ds=yt&q="+a,type:"GET",dataType:"jsonp",success:function(a){b(a[1])}})},onSelect:function(a,b,c){
var autoComplete=function(){function a(a){function b(a,b){return a.classList?a.classList.contains(b):new RegExp("\\b"+b+"\\b").test(a.className)}function c(a,b,c){a.attachEvent?a.attachEvent("on"+b,c):a.addEventListener(b,c)}function d(a,b,c){a.detachEvent?a.detachEvent("on"+b,c):a.removeEventListener(b,c)}function e(a,d,e,f){c(f||document,d,function(c){for(var d,f=c.target||c.srcElement;f&&!(d=b(f,a));)f=f.parentElement;d&&e.call(f,c)})}if(document.querySelector){var f={selector:0,source:0,minChars:3,delay:150,offsetLeft:0,offsetTop:1,cache:1,menuClass:"",renderItem:function(a,b){b=b.replace(/[-\/\\^$*+?.()|[\]{}]/g,"\\$&");var c=new RegExp("("+b.split(" ").join("|")+")","gi");return'<li class="autocomplete-suggestion" data-val="'+a+'"><a class="click_fast" href="javascript:void();">'+a.replace(c,"<b>$1</b>")+"</a></li>"},onSelect:function(a,b,c){}};for(var g in a)a.hasOwnProperty(g)&&(f[g]=a[g]);for(var h="object"==typeof f.selector?[f.selector]:document.querySelectorAll(f.selector),i=0;i<h.length;i++){var j=h[i];j.sc=document.createElement("ul"),j.sc.className="autocompletador"+f.menuClass,j.autocompleteAttr=j.getAttribute("autocomplete"),j.setAttribute("autocomplete","off"),j.cache={},j.last_val="",j.updateSC=function(a,b){var c=j.getBoundingClientRect();if(j.sc.style.width=Math.round(c.right-c.left)+"px",!a&&(j.sc.style.display="block",j.sc.maxHeight||(j.sc.maxHeight=parseInt((window.getComputedStyle?getComputedStyle(j.sc,null):j.sc.currentStyle).maxHeight)),j.sc.suggestionHeight||(j.sc.suggestionHeight=j.sc.querySelector(".autocomplete-suggestion").offsetHeight),j.sc.suggestionHeight))if(b){var d=j.sc.scrollTop,e=b.getBoundingClientRect().top-j.sc.getBoundingClientRect().top;e+j.sc.suggestionHeight-j.sc.maxHeight>0?j.sc.scrollTop=e+j.sc.suggestionHeight+d-j.sc.maxHeight:0>e&&(j.sc.scrollTop=e+d)}else j.sc.scrollTop=0},c(window,"resize",j.updateSC),$("#search_query").after(j.sc),e("autocomplete-suggestion","mouseleave",function(a){var b=j.sc.querySelector(".autocomplete-suggestion.selected");b&&setTimeout(function(){b.className=b.className.replace("selected","")},20)},j.sc),e("autocomplete-suggestion","mouseover",function(a){var b=j.sc.querySelector(".autocomplete-suggestion.selected");b&&(b.className=b.className.replace("selected","")),this.className+=" selected"},j.sc),e("autocomplete-suggestion","mousedown",function(a){if(b(this,"autocomplete-suggestion")){var c=this.getAttribute("data-val");j.value=c,f.onSelect(a,c,this),j.sc.style.display="none"}},j.sc),j.blurHandler=function(){try{var a=document.querySelector(".autocompletador:hover")}catch(a){var a}a?j!==document.activeElement&&setTimeout(function(){j.focus()},20):(j.last_val=j.value,j.sc.style.display="none",setTimeout(function(){j.sc.style.display="none"},350))},c(j,"blur",j.blurHandler);var k=function(a){var b=j.value;if(j.cache[b]=a,a.length&&b.length>=f.minChars){for(var c="",d=0;d<a.length;d++)c+=f.renderItem(a[d],b);j.sc.innerHTML=c,j.updateSC(0)}else j.sc.style.display="none"};j.keydownHandler=function(a){var b=window.event?a.keyCode:a.which;if((40==b||38==b)&&j.sc.innerHTML){var c,d=j.sc.querySelector(".autocomplete-suggestion.selected");return d?(c=40==b?d.nextSibling:d.previousSibling,c?(d.className=d.className.replace("selected",""),c.className+=" selected",j.value=c.getAttribute("data-val")):(d.className=d.className.replace("selected",""),j.value=j.last_val,c=0)):(c=40==b?j.sc.querySelector(".autocomplete-suggestion"):j.sc.childNodes[j.sc.childNodes.length-1],c.className+=" selected",j.value=c.getAttribute("data-val")),j.updateSC(0,c),!1}if(27==b)j.value=j.last_val,j.sc.style.display="none";else if(13==b||9==b){var d=j.sc.querySelector(".autocomplete-suggestion.selected");d&&"none"!=j.sc.style.display&&(f.onSelect(a,d.getAttribute("data-val"),d),setTimeout(function(){j.sc.style.display="none"},20))}},c(j,"keydown",j.keydownHandler),j.keyupHandler=function(a){var b=window.event?a.keyCode:a.which;if(!b||(35>b||b>40)&&13!=b&&27!=b){var c=j.value;if(c.length>=f.minChars){if(c!=j.last_val){if(j.last_val=c,clearTimeout(j.timer),f.cache){if(c in j.cache)return void k(j.cache[c]);for(var d=1;d<c.length-f.minChars;d++){var e=c.slice(0,c.length-d);if(e in j.cache&&!j.cache[e].length)return void k([])}}j.timer=setTimeout(function(){f.source(c,k)},f.delay)}}else j.last_val=c,j.sc.style.display="none"}},c(j,"keyup",j.keyupHandler),j.focusHandler=function(a){j.last_val="\n",j.keyupHandler(a)},f.minChars||c(j,"focus",j.focusHandler)}this.destroy=function(){for(var a=0;a<h.length;a++){var b=h[a];d(window,"resize",b.updateSC),d(b,"blur",b.blurHandler),d(b,"focus",b.focusHandler),d(b,"keydown",b.keydownHandler),d(b,"keyup",b.keyupHandler),b.autocompleteAttr?b.setAttribute("autocomplete",b.autocompleteAttr):b.removeAttribute("autocomplete"),document.body.removeChild(b.sc),b=null}}}}return a}();!function(){"function"==typeof define&&define.amd?define("autoComplete",function(){return autoComplete}):"undefined"!=typeof module&&module.exports?module.exports=autoComplete:window.autoComplete=autoComplete}(),$(function(){new autoComplete({selector:"#search_query",minChars:1,source:function(a,b){$.ajax({url:"https://suggestqueries.google.com/complete/search?client=firefox&ds=yt&q="+a,type:"GET",dataType:"jsonp",success:function(a){b(a[1])}})},onSelect:function(a,b,c){
//  location.href =  './?q='+ friendly_url(b);
  $("#mpj").submit();
  $(".frm_search").submit()
}})});