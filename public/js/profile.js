$('.avatar-update').click((event) => {
    let file = $('.avatar-input').prop('files')[0];
    let formData = new FormData();

    formData.append('avatar', file);
    formData.append('_token', $('[name="_token"').val());

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