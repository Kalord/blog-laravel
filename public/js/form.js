const submitHandler = (formClass, successCallback, errorCallback) => {
    $(formClass).submit((event) => {
        $.ajax({
            type: $(formClass).attr('method'),
            url: $(formClass).attr('action'),
            data: $(formClass).serialize(),
            async: true,
            success: (html) => {
                successCallback(html);
            },
            error: (html) => {
                errorCallback(html);
            }
        });

        return false;
    });
};

if (window.location.pathname === '/registration') {
    submitHandler(
        '.ajax-form',
        (html) => {
            removeShowErrors();
            $('#username').empty();
            $('#username').html(html.name);
            $('.success-message-reg').fadeIn(300);
            setTimeout(() => {
                window.location.href = '/login';
            }, 3000);
        },
        (html) => {
            let errors = JSON.parse(html.responseText);
            removeShowErrors();
            showErrors(errors.errors)
        }
    );
}

if (window.location.pathname === '/login') {
    submitHandler(
        '.ajax-form',
        (html) => {
            $('.error-message').hide();

            if (html.status == 'error') {
                $('.error-message').fadeIn(300);
                $('.error-message').html(html.message);
            }

            if (html.status == 'success') {
                window.location.href = '/profile';
            }
        },
        (html) => {
            let errors = JSON.parse(html.responseText);
            removeShowErrors();
            showErrors(errors.errors)
        }
    );
}