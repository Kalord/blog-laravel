/**
 * Скрипт для обращения к API
 */
const getIndex = (data, property, value) => {
    for (let i = 0; i < data.length; i++) {
        if (data[i][property] == value) return i;
    }
    return -1;
}

const requiredValidator = (data) => {
    if (data == '') return 'Поле должно быть заполнено';
};

const integerValidator = (data, rules) => {
    let result = !!parseInt(data);
    if (!result) return 'Должны быть цифры';
}

const rangeValidator = (data, rules) => {
    let result = integerValidator(data);
    if (result) return result;

    let min = rules[0];
    let max = rules[1];

    if (data < min || data > max) return `Данное поле должно содержать не менее ${min} символов и не более ${max}`;
}

const formValidator = (formData, rules) => {
    let data = $(formData).serializeArray();
    let currentData = 0;
    let errors = {};

    for (key in rules) {
        let array = rules[key];
        currentData = getIndex(data, "name", key);

        for (let j = 0; j < array.length; j++) {
            if (array[j] == 'required') {
                let result = requiredValidator(data[currentData]["value"]);
                if (result) errors[key] = result;
                continue;
            }

            if (array[j] == 'range') {
                let result = rangeValidator(data[currentData]["value"], array.slice(j + 1));
                if (result) errors[key] = result;
                continue;
            }
        }
    }

    return errors;
};

const showErrors = (errors) => {
    for (key in errors) {
        $(`[name=${key}]`).after(`
        <div class="error-message alert alert-danger" style="display: none;">${errors[key]}</div>
        `)
        $(`[name=${key}]`).addClass('error-input');
    }

    $('.error-message').fadeIn(1000);
}

$('.calc-button').click((event) => {
    $('.input-group').removeClass('error-input');
    $('.error-message').remove();

    let errors = formValidator('.recipe-form', {
        'sex': ['required', 'range', 1, 2],
        'weight': ['required', 'integer'],
        'height': ['required', 'integer'],
        'lifestyle': ['required', 'range', 1, 2],
        'target': ['required', 'range', 1, 3],
    });

    if (!$.isEmptyObject(errors)) {
        showErrors(errors);
        return false;
    }

    $.ajax({
        type: 'GET',
        url: '/api/food',
        data: $('.recipe-form').serialize()
    });

    return false;
});