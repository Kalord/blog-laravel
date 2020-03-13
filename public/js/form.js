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

submitHandler(
    '.ajax-form',
    (html) => {
        removeShowErrors();
    },
    (html) => {
        let errors = JSON.parse(html.responseText);
        removeShowErrors();
        showErrors(errors.errors)
    }
);