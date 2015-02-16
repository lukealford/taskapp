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
				$(this).siblings('.start-timer-btn').removeClass('hidden');
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

			$('.task-timer').submit(function(event) {

			 var formData = {
            'Task_time'              : $('input[name=timer]').val()

        };

        // process the form
        $.ajax({
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
                        encode          : true
        })
            // using the done promise callback
            .done(function(data) {

                // log data to the console so we can see
                console.log(data); 

                // here we will handle errors and validation messages
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
         });


 });