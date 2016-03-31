$(document).ready(function() {
	var base_url = $('body').attr('data-base-url');
	var application = $('body').attr('id');
	var audio;
	var winner_id = $('#battle-fight').attr('data-winner-id');
	var loser_id = $('#battle-fight').attr('data-loser-id');


	function play_sound_effect(asset, delay) {
		if (delay > 0) {
			setTimeout(function() {
				var audio = document.createElement('audio');
				audio.setAttribute('src', base_url + 'assets/audio/' + asset + '.mp3');
				audio.setAttribute('autoplay', 'autoplay');
				audio.load();
				audio.play();
			}, 2000);
		} else {
			var audio = document.createElement('audio');
			audio.setAttribute('src', base_url + 'assets/audio/' + asset + '.mp3');
			audio.setAttribute('autoplay', 'autoplay');
			audio.load();
			audio.play();
		}
	}

	function show_round(round_number) {
		play_sound_effect('round-1', 0);
		$('#subject .round-' + round_number).fadeIn(500, function(){
			var winner = $(this).attr('data-winner');
			setTimeout(function() {
				toggle_round_winner(winner);
				play_sound_effect('punch-1', 0);
			}, 500);
			$(this).delay(2000).fadeOut(500);
		});
	}

	function add_trophy(round_winner) {
		var trophy_img = '<img src="'+base_url+'assets/img/winner-symbol.png" />';
		setTimeout(function(){
			$('#player-names .'+round_winner+' .trophy').append(trophy_img);
		}, 1000);

	}

	function toggle_round_winner(winner) {
		if (winner == 'player_1') {
			$('#fighters .player-2 .hit').removeClass('hide');
			$('#fighters .player-2 .standing').removeClass('hide');
			$('#fighters .player-2 .fighting').addClass('hide');

			$('#fighters .player-1 .hit').addClass('hide');
			$('#fighters .player-1 .standing').addClass('hide');
			$('#fighters .player-1 .fighting').removeClass('hide');
		} else {
			$('#fighters .player-1 .hit').removeClass('hide');
			$('#fighters .player-1 .standing').removeClass('hide');
			$('#fighters .player-1 .fighting').addClass('hide');

			$('#fighters .player-2 .hit').addClass('hide');
			$('#fighters .player-2 .standing').addClass('hide');
			$('#fighters .player-2 .fighting').removeClass('hide');
		}
		add_trophy(winner);
	}

	function neutral() {
		$('#fighters .player-box .hit').addClass('hide');
		$('#fighters .player-box .standing').removeClass('hide');
		$('#fighters .player-box .fighting').addClass('hide');
	}

	function toggle_player_death() {
		var winner = $('#battle-fight').attr('data-winner');
		if (winner == 'player_1') {
			$('#fighters .player-1 .hit').addClass('hide');
			$('#fighters .player-1 .standing').removeClass('hide');
			$('#fighters .player-1 .fighting').addClass('hide');

			$('#fighters .player-2 .fire').removeClass('hide');
			$('#fighters .player-2 .hit').addClass('hide');
			$('#fighters .player-2 .standing').removeClass('hide');
			$('#fighters .player-2 .fighting').addClass('hide');
		} else {
			$('#fighters .player-2 .hit').addClass('hide');
			$('#fighters .player-2 .standing').removeClass('hide');
			$('#fighters .player-2 .fighting').addClass('hide');

			$('#fighters .player-1 .fire').removeClass('hide');
			$('#fighters .player-1 .hit').addClass('hide');
			$('#fighters .player-1 .standing').removeClass('hide');
			$('#fighters .player-1 .fighting').addClass('hide');
		}
		play_sound_effect('death', 0);

		if($('#battle-fight').attr('data-score') == 5) {
			play_sound_effect('you-win-perfect', 0);
			$('#subject .winner-item').fadeIn(500, function(){
				setTimeout(function(){
					$('#battle-fight').fadeOut(500, function(){
						show_battle_winner(winner_id);
					});
				}, 3000);
			});
		} else {
			play_sound_effect('you-win', 0);
			$('#subject .winner-name').fadeIn(500, function(){
				setTimeout(function(){
					$('#battle-fight').fadeOut(500, function(){
						show_battle_winner(winner_id);
					});
				}, 3000);
			});
		}
	}

	//	Show battle winner
	function show_battle_winner(winner_id) {
		play_sound_effect('battle-end', 0);
		$('#battle-winner-info').fadeIn(500, function(){
			setTimeout(function(){
				$('#battle-winner-info').fadeOut(500, function(){
					var show_market = $('#battle-wrapper').attr('data-show-market');
					if(show_market == 'true') {
						play_sound_effect('di', 0);
						$('#battle-di').fadeIn(500, function(){
							setTimeout(function(){
								$('#battle-winner-info').fadeOut(500, function(){
									new_battle(winner_id);
								});
							}, 6000);
						});
					} else {
						new_battle(winner_id);
					}
				});
			}, 5000);
		});
	}

	//	Start New Battle
	function new_battle(winner_id) {
		window.location = base_url;
	}

	//	battle
	if (application == 'application-battle') {
		var section = $('body').attr('class');

	  var audio_intro_music = document.createElement('audio');
	  audio_intro_music.setAttribute('src', base_url + 'assets/audio/vs.mp3');
	  audio_intro_music.setAttribute('autoplay', 'autoplay');
	  audio_intro_music.load();
		audio_intro_music.play();

		$('#battle-preview-box').delay(700).fadeIn(500, function(){
			$(this).delay(4000).fadeOut(500, function(){
				$('#battle-fight').fadeIn(500);

				var bg_music = $('#battle-fight').attr("data-music");
			  var audio_bg_music = document.createElement('audio');
			  audio_bg_music.setAttribute('src', base_url + 'assets/audio/battle-'+bg_music+'.mp3');
			  audio_bg_music.setAttribute('autoplay', 'autoplay');
			  audio_bg_music.load();
				audio_bg_music.play();

				var round_duration = 3000;

				//	round 1
				setTimeout(function() {
					play_sound_effect('round-1', 0);
					$('#subject .round-1').fadeIn(500, function(){
						var winner = $(this).attr('data-winner');
						setTimeout(function() {
							toggle_round_winner(winner);
							play_sound_effect('punch-1', 0);
						}, 500);
						$(this).delay(round_duration).fadeOut(500, function(){

							//	round 2
							neutral();
							play_sound_effect('round-2', 0);
							$('#subject .round-2').fadeIn(500, function(){
								var winner = $(this).attr('data-winner');
								setTimeout(function() {
									toggle_round_winner(winner);
									play_sound_effect('punch-2', 0);
								}, 500);
								$(this).delay(round_duration).fadeOut(500, function(){

									//	round 3
									neutral();
									play_sound_effect('round-3', 0);
									$('#subject .round-3').fadeIn(500, function(){
										var winner = $(this).attr('data-winner');
										setTimeout(function() {
											toggle_round_winner(winner);
											play_sound_effect('punch-3', 0);
										}, 500);
										$(this).delay(round_duration).fadeOut(500, function(){

											//	round 4
											neutral();
											play_sound_effect('round-4', 0);
											$('#subject .round-4').fadeIn(500, function(){
												var winner = $(this).attr('data-winner');
												setTimeout(function() {
													toggle_round_winner(winner);
													play_sound_effect('punch-1', 0);
												}, 500);
												$(this).delay(round_duration).fadeOut(500, function(){

													//	round 5
													neutral();
													play_sound_effect('round-5', 0);
													$('#subject .round-5').fadeIn(500, function(){
														var winner = $(this).attr('data-winner');
														setTimeout(function() {
															toggle_round_winner(winner);
															play_sound_effect('punch-2', 0);
														}, 500);
														$(this).delay(round_duration).fadeOut(500, function(){
															toggle_player_death();
															audio_bg_music.pause();
														});
													});
												});
											});

										});
									});

								});
							});

						});
					});
				}, 1000);
			});
		});

	}


});
