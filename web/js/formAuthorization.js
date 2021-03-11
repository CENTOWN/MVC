$(document).ready(function () {
    /**
     * Обработка формы авторизации
     */
    $('#authorization').on('submit', function (e) {
        e.preventDefault();
        var authorization = 'true';
        var email = $('input[name="email"]', this).val();
        var password = $('input[name="password"]', this).val();
        $.ajax({
            url: 'index.php',
            method: 'POST',
            dataType: 'json',
            data: {
                'authorization': authorization,
                'email': email,
                'password': password
            },
            success: function (response) {
                if (response !== '') {
                    $(location).attr('href', '/cabinet');
                }
            },
            error: function () {
                if ($(`#${e.target.id} .error`)) {
                    $(`#${e.target.id} .error`).remove();
                }
                $(`#${e.target.id}`).prepend('<p class="error py-2 bg-danger">Проверьте поля</p>');
            }
        });
        return true;
    });

    /**
     * Деавторизация пользователя
     */
    $('#logout').on('click', function () {
        $.ajax({
            url: 'index.php',
            method: 'POST',
            success: function () {
                $(location).attr('href', '/');
            }
        });
    });
});