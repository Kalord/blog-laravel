const removeShowErrors = () => {
    $('.error-message').remove();
}

const showErrors = (errors) => {
    let message;
    for (key in errors) {
        if (Array.isArray(errors[key])) {
            message = errors[key][0];
        } else {
            message = errors[key]
        }
        $(`[name=${key}]`).after(`
        <div class="error-message alert alert-danger" style="display: none;">${message}</div>
        `)
    }

    $('.error-message').fadeIn(1000);
}