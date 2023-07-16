/**
 CONTENT

 1. Generate random numbers
 2. Retrive generated numbers by 'id'
*/

$(document).ready(function(){

    // Variables
    let middleTime = 300;
    let longTime   = 500;

    // Content shows up
    $(".content").fadeTo(longTime, 1);

// ------------------------------------------------ 1. Generate random numbers

// Click 'generate-numbers'
$(".generate-numbers").on('click', function() {

    // Set visability
    $('.number-results').fadeTo(1, 0);

	// Set variables
    let minNumber = $("#min-number").val();
    let maxNumber = $("#max-number").val();

    // Check if there are 'bad' characters (return 'true' if 'ok' otherwise 'false')
    let checkMinNumber = minNumber.match(/^[0-9]+$/i);
    let checkMaxNumber = maxNumber.match(/^[0-9]+$/i);

    // Parse vars as integer
    minNumber = parseInt($("#min-number").val());
    maxNumber = parseInt($("#max-number").val());

    // For debugging
    // alert( checkMinNumber + ' ' + checkMaxNumber );

    // If something went wrong
    if ((minNumber >= maxNumber) || (!checkMinNumber) || (!checkMaxNumber)) {

        // Send message
        setTimeout(function() { $('.number-results').html("<h4 class='red'>Неверные числа</h4>") }, middleTime);

        // Show message
        $('.number-results').fadeTo(middleTime, 1);

        return false;

    // If all is 'ok'
    } else {

        // Set visability
        $('.number-results').fadeTo(1, 1);

        // Load gif image
        $('.number-results').load("/app/includes/wait-for-load-is-done.html");

        // Set post identifier
        let generateNumbers = "generate-numbers";

        // Send data to Controller
        $.post("/app/controllers/NumbersController.php", {

            minNumber: minNumber,
            maxNumber: maxNumber,
        	generateNumbers: generateNumbers

        }, function(data) {

            // If something went wrong
            if (! data) {

                // Send message
              	setTimeout(function() {
                    $('.number-results').html('<h4 class="red">Что-то пошло не так!</h4>')
                }, middleTime);

                // Show message
              	$('.number-results').fadeTo(middleTime, 1);

            // If there is at least one row in the table
            } else {

                // Send message
                setTimeout(function() {
                    $('.number-results').html('<h4 class="green">Числа сгенерированы</h4>')
                }, middleTime);

                // Show message
                $('.number-results').fadeTo(middleTime, 1);
            }
      	});

    }
		    return false;
});

// --------------------------------------- 2. Retrive generated numbers by 'id'
// If 'user' typing something in '#find-number' field

$("#find-number").on("keyup", function(e) {

    // If press 'enter'
    if (e.keyCode == 13) {
        e.preventDefault();
        return false;
    }

    // Get the value from the field
    let searchNumber = $(this).val();

	// Start script if the length of 'searchNumber' > 0
    if (searchNumber.length > 0) {

        // Check if there are 'bad' characters (return 'true' if 'ok' otherwise 'false')
        let checkInput = searchNumber.match(/^[0-9]+$/i);

        // If 'searchNumber' has 'bad' characters
        if (!checkInput) {

            // Send messsage
            setTimeout(function() {
                $('.retrieved-number').html("<h4 class='red'>Неверные числа</h4>")
            }, longTime);

            // Show message
            $('.retrieved-number').fadeTo(longTime, 1);

            return false;

        // If all is 'OK'
        } else {

                // Send the 'searchNumber' to Controller
                $.post("/app/controllers/NumbersController.php", {

                searchNumber: searchNumber

            }, function(data) {

                // If something was found
                if (data) {

    				// Append data and show a random number by 'id'
                    $(".retrieved-number").html(data).fadeTo(longTime, 1);

                // If nothing was found
                } else {

                    // Show message
                    $('.retrieved-number').html("<h4 class='red'>Нет числа с таким 'id'</h4>").fadeTo(middleTime, 1);
                }
              })
        }

	// If length of 'searchWord' < 1 empty 'retrieved-number' and nothing happens
    } else {
        $('.retrieved-number').fadeTo(longTime, 0);
			$(".retrieved-number").empty();
    }
});

});
