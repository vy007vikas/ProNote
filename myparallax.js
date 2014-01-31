var $window = $(window);
var $firstBG = $('#top');
var $secondBG = $('#first');
var $thirdBG = $('#second');
var $fourthBG = $('#third');
var trainers = $('#second .bg');

function RepositionNav(){
	var windowHeight =  $sindow.height();
	var navHeight = $('#nav').height()/2;
	var windowCenter = (windowHeight/2);
	var newtop = windowCenter - navHeight;
	$('#nav').css({"top":newtop});
}

function newPos(x,windowHeight,pos,adjuster,inertia){
	return x + "%" + (-((windowHeight+pos)-adjuster)*inertia) + "px";
}

function Move(){
	var pos = $window.scrollTop();
	if($firstBG.hasClass("inview")){
		$firstBG.css({'backgroundPosition':newPos(50,windowHeight,pos,900,0.3)});
	}
	if($secondBG.hasClass("inview")){
		$secondBG.css({'backgroundPosition':newPos(50,windowHeight,pos,900,0.3)});
	}
	if($thirdBG.hasClass("inview")){
		$thirdBG.css({'backgroundPosition':newPos(0,windowHeight,pos,200,0.9) + ", " + newPos(50,windowHeight,700,0.3)});
	}
	if($fourthBG.hasClass("inview")){
		$fourthBG.css({'backgroundPosition':newPos(50,windowHeight,pos,900,0.3)});
	}
}

$('#intro,#first,#second,#third').bind('inview',function(event,visible){
	if(visible==true){
		$(this).addClass("inview");
	} else {
		$(this).removeClass("inview");
	}
});
$window.resize(function(){
	Move();
	RepositionNav();
});
$window.bind('scroll',function(){
	Move();
});