window.onload = function () {

	$('#registerForm').on('submit', function(e) {
		e.preventDefault();

	var _form = $(this);
	var _error = $(".js-error", _form);

	var dataObj = {
		firstN: $("input[id='firstN']", _form).val(),
		lastN: $("input[id='lastN']", _form).val(),
		number: $("input[type='number']", _form).val(),
		email: $("input[type='email']", _form).val(),
		password: $("input[type='password']", _form).val()
	};


		console.log(dataObj);

		if(dataObj.email.length < 6) {
			_error
				.text("Please enter a valid email address")
				.show();
			return false;
		} else if (dataObj.password.length < 6) {
			_error
				.text("Please enter a passphrase that is at least 6 characters long.")
				.show();
			return false;
		}
		// Assuming the code gets this far, we can start the ajax process
		_error.hide();

		$.ajax({
			type: 'POST',
			url: 'ajax/register.php',
			data: dataObj,
			dataType: 'json',
			async: true,
		})
		.done(function ajaxDone(data) {
			// Whatever data is 
			if(data.redirect !== undefined) {
				window.location = data.redirect;
			} else if(data.error !== undefined) {
				_error
					.text(data.error)
					.show();
			}
		
		})
		.fail(function ajaxFailed(e) {
			console.log(e);
		})
		.always(function ajaxAlwaysDoThis(data) {
			// Always do
			console.log('Always');
		})
	
		return false;
})

//
$('#loginForm').on('submit', function(e) {
	e.preventDefault();

	var _form = $(this);
	var _error = $(".js-error", _form);

	var dataObj = {
		email: $("input[type='email']", _form).val(),
		password: $("input[type='password']", _form).val()
	};

	if(dataObj.email.length < 6) {
		_error
			.html("Please enter a valid email address")
			.show();
		return false;
	} else if (dataObj.password.length < 11) {
		_error
			.html("Please enter a passphrase that is at least 11 characters long.")
			.show();
		return false;
	}

	// Assuming the code gets this far, we can start the ajax process
	_error.hide();

	$.ajax({
		type: 'POST',
		url: 'ajax/login.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data) {
		if(data.redirect !== undefined) {
			window.location = data.redirect;
		} else if(data.error !== undefined) {
			_error
				.text(data.error)
				.show();
		}
	})
	.fail(function ajaxFailed(e) {
		console.log(e);
	})
	.always(function ajaxAlwaysDoThis(data) {
		// Always do
		console.log('Always');
	})

	return false;
})

}
