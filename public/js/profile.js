let status = $('.status').html();

$('.avatar-update').click((event) => {
    let file = $('.avatar-input').prop('files')[0];
    let formData = new FormData();

    formData.append('avatar', file);
    formData.append('_token', $('[name="_token"]').val());

    console.log(formData);

    $.ajax({
        type: 'POST',
        url: '/settings/avatar',
        dataType: 'JSON',
        cache: false,
        contentType: false,
        processData: false,
        async: false,
        data: formData,
        success: (html) => {
            $('.avatar-error-message').hide();
            $('.avatar-success-message').fadeIn(300);
            $('.avatar').attr('src', html.src);
        },
        error: (html) => {
            html = JSON.parse(html.responseText);
            $('.avatar-error-message').fadeIn(300);
            $('.avatar-error-message').html(html.errors.avatar[0]);
        }
    });
});

$('.avatar-input').change((event) => {
    let file = $('.avatar-input').prop('files')[0];
    $('.avatar-label').html(file.name);
})

$('.status').blur((event) => {
    if (status == $('.status').html()) return;

    $.ajax({
        type: 'GET',
        url: '/settings/status',
        async: false,
        data: {
            status: $('.status').html()
        }
    })
})

$('.btn-save-age').click((event) => {
    $.ajax({
        type: 'GET',
        url: '/settings/age',
        data: {
            selected: $('#age').val()
        },
        success: (html) => {
            $('.age-success-message').fadeIn(300);
        }
    })
});

$('.btn-save-weight').click((event) => {
    $.ajax({
        type: 'GET',
        url: '/settings/weight',
        data: {
            selected: $('#weight').val()
        },
        success: (html) => {
            $('.weight-success-message').fadeIn(300);
        }
    })
});

$('.btn-password-update').click((event) => {
    $.ajax({
        type: 'POST',
        url: '/settings/password',
        data: {
            _token: $('[name="_token"]').val(),
            old_password: $('.old-password').val(),
            new_password: $('.new-password').val(),
            new_password_confirmation: $('.new-password-confirmation').val()
        },
        success: (html) => {
            $('.password-error-message').hide();
            $('.password-success-message').fadeIn(300);
        },
        error: (html) => {
            console.log(JSON.parse(html.responseText));
        }
    })
});
