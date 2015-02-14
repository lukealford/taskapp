$(function(){
			var hasTimer = false;
			// Init timer start
			$('.start-timer-btn').on('click', function() {
				hasTimer = true;
				id = '#' + $(this).attr('data-id');
				$(id).timer({
					editable: true
				});
				$(this).addClass('hidden');
				$(this).siblings('.pause-timer-btn, .remove-timer-btn').removeClass('hidden');
			});

			// Init timer resume	
			$('.resume-timer-btn').on('click', function() {
				id = '#' + $(this).attr('data-id');
				$(id).timer('resume');
				$(this).addClass('hidden');
				$(this).siblings('.pause-timer-btn, .remove-timer-btn').removeClass('hidden');
			});


			// Init timer pause
			$('.pause-timer-btn').on('click', function() {
				id = '#' + $(this).attr('data-id');
				$(id).timer('pause');
				$(this).addClass('hidden');
				$(this).siblings('.resume-timer-btn').removeClass('hidden');
			});

			// Remove timer
			$('.remove-timer-btn').on('click', function() {
				hasTimer = false;
				id = '#' + $(this).attr('data-id');
				$(id).timer('remove');
				$(this).addClass('hidden');
				$(this).('.start-timer-btn').removeClass('hidden');
				$(this).siblings('.pause-timer-btn, .resume-timer-btn').addClass('hidden');
			});

			// Additional focus event for this
			$('.timer').on('focus', function() {
				if(hasTimer) {
					$('.pause-timer-btn').addClass('hidden');
					$('.resume-timer-btn').removeClass('hidden');
				}
			});

			// Additional blur event for this
			$('.timer').on('blur', function() {
				if(hasTimer) {
					$('.pause-timer-btn').removeClass('hidden');
					$('.resume-timer-btn').addClass('hidden');
				}
			});
 });