var disabled = function disabled(){
	$(".vymex-animation").fadeOut();
}

setTimeout(disabled, 1800);

$(".lang-ru").click(function() {
	$(".lang-ru").addClass('active');
	$('.lang-en').removeClass('active');
});

$(".lang-en").click(function() {
	$(".lang-ru").removeClass('active');
	$('.lang-en').addClass('active');
});

var os = document.getElementById("logo").offsetWidth;
$(document).ready(function() {
	if (window.innerWidth < 1151) {
		$('.top-auth').css('margin-left', os + 50);
	}
});

$(window).resize(function(){
	if (window.innerWidth < 1151) {
		$('.top-auth').css('margin-left', os + 50);
	}
	if (window.innerWidth > 1150) {
		$('.top-auth').css('margin-left', '20px');
	}
});

var slickOptions = {
	centerMode: false,
	infinite: false,
	responsive: [
	{
      breakpoint: 19200,
      settings: {
      	slidesToShow: 3,
		slidesToScroll: 3,
		prevArrow:"<b class='arrow-left'>&#10094</b>",
		nextArrow:"<b class='arrow-right'>&#10095</b>",
      }
    },
    {
      breakpoint: 992,
      settings: {
      	slidesToShow: 2,
		slidesToScroll: 2,
		prevArrow:"<b class='arrow-left'>&#10094</b>",
		nextArrow:"<b class='arrow-right'>&#10095</b>",
      }
    },
    {
      breakpoint: 580,
      settings: {
      	slidesToShow: 1,
		slidesToScroll: 1,
		prevArrow:"<b class='arrow-left'>&#10094</b>",
		nextArrow:"<b class='arrow-right'>&#10095</b>",
      }
    },
    ]
}


$('.slick').slick(slickOptions);

$(".audit-btn-one").click(function() {
	$(".audit-step-one span").css('color', '#599edf');
	$('.audit-step-one i').css('color', '#76c665');
	$('.audit-step-one p').css('background-color', '#f47032');
});

$(".audit-btn-two").click(function() {
	$(".audit-step-two span").css('color', '#599edf');
	$('.audit-step-two i').css('color', '#76c665');
	$('.audit-step-two p').css('background-color', '#f47032');
});

$(".audit-btn-three").click(function() {
	$(".audit-step-three span").css('color', '#599edf');
	$('.audit-step-three i').css('color', '#76c665');
	$('.audit-step-three p').css('background-color', '#f47032');
});

$(".audit-btn-four").click(function() {
	$(".audit-step-four span").css('color', '#599edf');
	$('.audit-step-four i').css('color', '#76c665');
	$('.audit-step-four p').css('background-color', '#f47032');
});


// function drawl(){
// 	var canvas = document.getElementById("myCan");
// 	var ctx = canvas.getContext("2d");
// 	for (var i = 0; i < 10; i++) {
// 		ctx.lineWidth = 1;
// 		ctx.beginPath();
// 		ctx.moveTo(0, 404 - i*46);
// 		ctx.lineTo(1450, 404 - i*46);
// 		ctx.strokeStyle = "#1982a9";
// 		ctx.stroke();
// 	}
// }
// drawl();

// function drawbg(){
// 	var canvas = document.getElementById("myCan");
// 	var ctx = canvas.getContext("2d");
// 		ctx.lineWidth = 5;
// 		ctx.beginPath();
// 		ctx.moveTo(0, 450);
// 		ctx.bezierCurveTo(-11, 460, 161, 413, 214, 377);
//   		ctx.bezierCurveTo(289, 326, 480, 176, 699, 190);
//   		ctx.bezierCurveTo(765, 194, 796, 187, 930, 248);
//   		ctx.bezierCurveTo(980, 271, 1019, 316, 1125, 308);
//   		ctx.bezierCurveTo(1215, 301, 1236, 286, 1291, 238);
//   		ctx.bezierCurveTo(1414, 130, 1463, 137, 1500, 145);
//     	ctx.bezierCurveTo(2000, 2000, 2000, 2000, 1500, 455);
//     	ctx.fillStyle = "rgba(0, 174, 239, 0.2)";
//     	ctx.fill();
// 		ctx.stroke();
// }
// drawbg();

// var riskOne = 115;
// var riskTwo = 70;
// var riskThree = 39;
// var riskFour = 95;
// var riskFive = 111;
// var riskSix = 144;
// var riskSeven = 16;

// var canvas = document.getElementById("myCan");
// var risk1 = canvas.getContext("2d");
// 	risk1.lineWidth = 50;
// 	risk1.beginPath();
// 	risk1.moveTo(60, 450);
// 	risk1.lineTo(60, 450 - (riskOne /100*92));
// 	risk1.strokeStyle = "#f26522";
// 	risk1.stroke();

// var risk2 = canvas.getContext("2d");
// 	risk2.lineWidth = 50;
// 	risk2.beginPath();
// 	risk2.moveTo(60 + 190 + 20, 450);
// 	risk2.lineTo(60 + 190 + 20, 450 - (riskTwo /100*92));
// 	risk2.strokeStyle = "#f26522";
// 	risk2.stroke();

// var risk3 = canvas.getContext("2d");
// 	risk3.lineWidth = 50;
// 	risk3.beginPath();
// 	risk3.moveTo(60 + 2*190 + 40, 450);
// 	risk3.lineTo(60 + 2*190 + 40, 450 - (riskThree /100*92));
// 	risk3.strokeStyle = "#f26522";
// 	risk3.stroke();

// var risk4 = canvas.getContext("2d");
// 	risk4.lineWidth = 50;
// 	risk4.beginPath();
// 	risk4.moveTo(60 + 3*190 + 60, 450);
// 	risk4.lineTo(60 + 3*190 + 60, 450 - (riskFour /100*92));
// 	risk4.strokeStyle = "#f26522";
// 	risk4.stroke();

// var risk5 = canvas.getContext("2d");
// 	risk5.lineWidth = 50;
// 	risk5.beginPath();
// 	risk5.moveTo(60 + 4*190 + 80, 450);
// 	risk5.lineTo(60 + 4*190 + 80, 450 - (riskFive /100*92));
// 	risk5.strokeStyle = "#f26522";
// 	risk5.stroke();

// var risk6 = canvas.getContext("2d");
// 	risk6.lineWidth = 50;
// 	risk6.beginPath();
// 	risk6.moveTo(60 + 5*190 + 100, 450);
// 	risk6.lineTo(60 + 5*190 + 100, 450 - (riskSix /100*92));
// 	risk6.strokeStyle = "#f26522";
// 	risk6.stroke();

// var risk7 = canvas.getContext("2d");
// 	risk7.lineWidth = 50;
// 	risk7.beginPath();
// 	risk7.moveTo(60 + 6*190 + 120, 450);
// 	risk7.lineTo(60 + 6*190 + 120, 450 - (riskSeven /100*92));
// 	risk7.strokeStyle = "#f26522";
// 	risk7.stroke();


// var normOne = 295;
// var normTwo = 173;
// var normThree = 151;
// var normFour = 302;
// var normFive = 265;
// var normSix = 267;
// var normSeven = 154;

// var norm1 = canvas.getContext("2d");
// 	norm1.lineWidth = 50;
// 	norm1.beginPath();
// 	norm1.moveTo(60 + 60 + 10, 450);
// 	norm1.lineTo(60 + 60 + 10, 450 - (normOne /100*92));
// 	norm1.strokeStyle = "#2eb42e";
// 	norm1.stroke();

// var norm2 = canvas.getContext("2d");
// 	norm2.lineWidth = 50;
// 	norm2.beginPath();
// 	norm2.moveTo(60 + 1*190 + 50+ 40, 450);
// 	norm2.lineTo(60 + 1*190 + 50+ 40, 450 - (normTwo /100*92));
// 	norm2.strokeStyle = "#2eb42e";
// 	norm2.stroke();

// var norm3 = canvas.getContext("2d");
// 	norm3.lineWidth = 50;
// 	norm3.beginPath();
// 	norm3.moveTo(60 + 2*190 + 50 + 60, 450);
// 	norm3.lineTo(60 + 2*190 + 50 + 60, 450 - (normThree /100*92));
// 	norm3.strokeStyle = "#2eb42e";
// 	norm3.stroke();

// var norm4 = canvas.getContext("2d");
// 	norm4.lineWidth = 50;
// 	norm4.beginPath();
// 	norm4.moveTo(60 + 3*190 + 50 + 80, 450);
// 	norm4.lineTo(60 + 3*190 + 50 + 80, 450 - (normFour /100*92));
// 	norm4.strokeStyle = "#2eb42e";
// 	norm4.stroke();

// var norm5 = canvas.getContext("2d");
// 	norm5.lineWidth = 50;
// 	norm5.beginPath();
// 	norm5.moveTo(60 + 4*190 + 50 + 100, 450);
// 	norm5.lineTo(60 + 4*190 + 50 + 100, 450 - (normFive /100*92));
// 	norm5.strokeStyle = "#2eb42e";
// 	norm5.stroke();

// var norm6 = canvas.getContext("2d");
// 	norm6.lineWidth = 50;
// 	norm6.beginPath();
// 	norm6.moveTo(60 + 5*190 + 50 + 120, 450);
// 	norm6.lineTo(60 + 5*190 + 50 + 120, 450 - (normSix /100*92));
// 	norm6.strokeStyle = "#2eb42e";
// 	norm6.stroke();

// var norm7 = canvas.getContext("2d");
// 	norm7.lineWidth = 50;
// 	norm7.beginPath();
// 	norm7.moveTo(60 + 6*190 + 50 + 140, 450);
// 	norm7.lineTo(60 + 6*190 + 50 + 140, 450 - (normSeven /100*92));
// 	norm7.strokeStyle = "#2eb42e";
// 	norm7.stroke();


// var comfOne = 446;
// var comfTwo = 355;
// var comfThree = 221;
// var comfFour = 388;
// var comfFive = 336;
// var comfSix = 436;
// var comfSeven = 200;

// var comf1 = canvas.getContext("2d");
// 	comf1.lineWidth = 50;
// 	comf1.beginPath();
// 	comf1.moveTo(60 + 120 + 20, 450);
// 	comf1.lineTo(60 + 120 + 20, 450 - (comfOne /100*92));
// 	comf1.strokeStyle = "#00aeef";
// 	comf1.stroke();

// var comf2 = canvas.getContext("2d");
// 	comf2.lineWidth = 50;
// 	comf2.beginPath();
// 	comf2.moveTo(60 + 1*190 + 2*60 + 40, 450);
// 	comf2.lineTo(60 + 1*190 + 2*60 + 40, 450 - (comfTwo /100*92));
// 	comf2.strokeStyle = "#00aeef";
// 	comf2.stroke();

// var comf3 = canvas.getContext("2d");
// 	comf3.lineWidth = 50;
// 	comf3.beginPath();
// 	comf3.moveTo(60 + 2*190 + 2*60 + 60, 450);
// 	comf3.lineTo(60 + 2*190 + 2*60 + 60, 450 - (comfThree /100*92));
// 	comf3.strokeStyle = "#00aeef";
// 	comf3.stroke();

// var comf4 = canvas.getContext("2d");
// 	comf4.lineWidth = 50;
// 	comf4.beginPath();
// 	comf4.moveTo(60 + 3*190 + 2*60 + 80, 450);
// 	comf4.lineTo(60 + 3*190 + 2*60 + 80, 450 - (comfFour /100*92));
// 	comf4.strokeStyle = "#00aeef";
// 	comf4.stroke();

// var comf5 = canvas.getContext("2d");
// 	comf5.lineWidth = 50;
// 	comf5.beginPath();
// 	comf5.moveTo(60 + 4*190 + 2*60 + 100, 450);
// 	comf5.lineTo(60 + 4*190 + 2*60 + 100, 450 - (comfFive /100*92));
// 	comf5.strokeStyle = "#00aeef";
// 	comf5.stroke();

// var comf6 = canvas.getContext("2d");
// 	comf6.lineWidth = 50;
// 	comf6.beginPath();
// 	comf6.moveTo(60 + 5*190 + 2*60 + 120, 450);
// 	comf6.lineTo(60 + 5*190 + 2*60 + 120, 450 - (comfSix /100*92));
// 	comf6.strokeStyle = "#00aeef";
// 	comf6.stroke();

// var comf7 = canvas.getContext("2d");
// 	comf7.lineWidth = 50;
// 	comf7.beginPath();
// 	comf7.moveTo(60 + 6*210 + 2*60 + 140, 450);
// 	comf7.lineTo(60 + 6*210 + 2*60 + 140, 450 - (comfSeven /100*92));
// 	comf7.strokeStyle = "#00aeef";
// 	comf7.stroke();

function changeLink(elmnt) {
	var i, tablinks;

    tablinks = document.getElementsByClassName("menu-m-itm");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("menu-a");
    }

    elmnt.classList.add("menu-a");
}

function changePage(elmnt) {
	var i, tablinks;

    tablinks = document.getElementsByClassName("page");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("page-a");
    }

    elmnt.classList.add("page-a");
}

