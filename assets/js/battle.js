// $(document).ready(function() {
// 	var base_url = $('body').attr('data-base-url');
// 	var application = $('body').attr('id');
// 	var audio;
//
// 	//	battle
// 	if (application == 'application-battle') {
// 		var section = $('body').attr('class');
//
// 	  var audio_intro_music = document.createElement('audio');
// 	  audio_intro_music.setAttribute('src', base_url + 'assets/audio/vs.mp3');
// 	  audio_intro_music.setAttribute('autoplay', 'autoplay');
// 	  audio_intro_music.load();
// 		audio_intro_music.play();
// 		$('#battle-preview-box').delay(700).fadeIn(500, function(){
// 			$(this).delay(3000).fadeOut(500, function(){
// 				$('#battle-fight').fadeIn(500);
//
// 				var bg_music = $('#battle-fight').attr("data-music");
//
// 			  var audio_bg_music = document.createElement('audio');
// 			  audio_bg_music.setAttribute('src', base_url + 'assets/audio/battle-'+bg_music+'.mp3');
// 			  audio_bg_music.setAttribute('autoplay', 'autoplay');
// 			  audio_bg_music.load();
// 				audio_bg_music.play();
//
// 				setTimeout(function() {
// 				  var audio_round_1 = document.createElement('audio');
// 				  audio_round_1.setAttribute('src', base_url + 'assets/audio/round-1.mp3');
// 				  audio_round_1.setAttribute('autoplay', 'autoplay');
// 				  audio_round_1.load();
// 					audio_round_1.play();
// 				}, 2000);
//
//
// 			});
// 		});
//
// 	}
//
// 	// //	INTRO
//   // var audioElement = document.createElement('audio');
//   // audioElement.setAttribute('src', base_url + 'assets/music/intro.mp3');
//   // audioElement.setAttribute('autoplay', 'autoplay');
//   // audioElement.load();
// 	// audioElement.play();
// 	//
//   // $.get();
// 	// //
//   // // audioElement.addEventListener("load", function() {
//   // //     audioElement.play();
//   // // }, true);
// 	// //
//   // // $('.play').click(function() {
//   // //     audioElement.play();
//   // // });
// 	// //
//   // // $('.pause').click(function() {
//   // //     audioElement.pause();
//   // // });
//   // //
//   // //
// 	//
//   // var sound_start = document.createElement('audio');
//   // sound_start.setAttribute('src', base_url + 'assets/music/start.mp3');
// 	//
// 	//
// 	// $('[data-action]').click(function(e){
// 	// 	e.preventDefault();
// 	// 	var action = $(this).attr('data-action');
// 	//
// 	// 	switch(action) {
// 	// 		case "start":
// 	// 			var link = $(this).attr('href');
// 	// 	    audioElement.pause();
// 	// 		  sound_start.load();
// 	// 			sound_start.play();
// 	// 			sound_start.addEventListener("ended", function(){
// 	// 				window.location = link;
// 	// 			});
// 	// 		break;
// 	// 	}
// 	// });
//
//
// });