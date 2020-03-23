/**
 * Шаблон для отображение поста
 *
 * @param Object post
 */
const singlePostTemplate = (post) => {
    $('.blog-items').append(`
                <div class="single-item" data-id="${post.id}">
                <div class="bi-pic">
                    <img src="${post.cover}" alt="" style="width: 300px;">
                </div>
                <div class="bi-text">
                <h4><a href="/blog/detail/${post.id}">${post.title}</a></h4>
                <ul>
                    <li>${post.user.name}</li>
                    <li>${post.category.title}</li>
                </ul>
                <p>
                    It’s that time again when people start thinking about their New Years Resolutions.
                    Usually they involve, losing weight, quitting smoking, and joining a gym, just to
                    mention a few.
                </p>
                <a href="/blog/detail/${post.id}" class="btn btn-success">Читать далее</a>
                </div>
          </div>
    `)};
