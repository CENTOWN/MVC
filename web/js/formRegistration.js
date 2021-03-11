$(document).ready(function () {
    /**
     * Обработка формы регистрации
     */
    $('#registration').on('submit', function (e) {
        e.preventDefault();
        var registration = 'true';
        var email = $('input[name="email"]', this).val();
        var password = $('input[name="password"]', this).val();
        $.ajax({
            url: 'index.php',
            method: 'POST',
            dataType: 'json',
            data: {
                'registration': registration,
                'email': email,
                'password': password
            },
            success: function (response) {
                if (response !== '') {
                    if ($(`#${e.target.id} .error`)) {
                        $(`#${e.target.id} .error`).remove();
                    }
                    $(`#${e.target.id}`).prepend('<p class="py-2 bg-success">Вы зарегистрированы</p>');
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
});