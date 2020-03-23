/**
 * Набор подготовленных AJAX запросов для API
 */

const RESOURCE = '/api/posts';
const GET = 'GET';

/**
 * Получение списка постов
 * @param successCallback - обработчик успешных запросов
 * @param errorCallback - обработчик неудачных запросов
 * @param limit - лимит выборки постов
 * @param pivot - опорный идентификатор для выборки
 * @param id_category - категория для выборки
 */
const getPostsRequest = (successCallback, errorCallback, limit = 10, pivot = null, id_category = null) => {
    let requestContainer = {limit: limit};
    if(pivot) requestContainer.pivot = pivot;
    if(id_category) requestContainer.id_category = id_category;

    $.ajax({
        type: GET,
        url: RESOURCE,
        data: requestContainer,
        success: successCallback,
        error: errorCallback
    });
};

/**
 * Получеие поста
 * @param id - идентификатор записи
 * @param successCallback - обработчик успешных запросов
 * @param errorCallback - обработчик неудачных запросов
 */
const getPostRequest = (id, successCallback, errorCallback) => {
    $.ajax({
        type: GET,
        url: `${RESOURCE}/${id}`,
        success: successCallback,
        error: errorCallback
    });
};
