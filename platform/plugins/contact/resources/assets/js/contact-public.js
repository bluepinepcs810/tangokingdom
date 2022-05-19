$(document).ready(function () {
    var showError = function (message) {
        $('.contact-error-message').html(message).show();
    }

    var showSuccess = function (message) {
        $('.contact-success-message').html(message).show();
    }

    var handleError = function (data) {
        if (typeof (data.errors) !== 'undefined' && data.errors.length) {
            handleValidationError(data.errors);
        } else {
            if (typeof (data.responseJSON) !== 'undefined') {
                if (typeof (data.responseJSON.errors) !== 'undefined') {
                    if (data.status === 422) {
                        handleValidationError(data.responseJSON.errors);
                    }
                } else if (typeof (data.responseJSON.message) !== 'undefined') {
                    showError(data.responseJSON.message);
                } else {
                    $.each(data.responseJSON, (index, el) => {
                        $.each(el, (key, item) => {
                            showError(item);
                        });
                    });
                }
            } else {
                showError(data.statusText);
            }
        }
    }

    var handleValidationError = function (errors) {
        let message = '';
        $.each(errors, (index, item) => {
            if (message !== '') {
                message += '<br />';
            }
            message += item;
        });
        showError(message);
    }

    $("input[name=subject_id]").on('click', function() {
        const val = $(this).val();
        $(this).prop('checked', true);
        $("input[name=subject_id]").each(function(index, elem) {
            if ($(elem).val() !== val) {
                $(elem).prop('checked', false);
            }
        });
    });

    $(function() {
        if ($("input[name=subject_id]:checked").length === 0) {
            $("input[name=subject_id]").eq(0).prop('checked', true);
        }
    });

    $('.contact-form').on('submit', function (event) {
        event.preventDefault();
        event.stopPropagation();
        const $form = $(this);
        const $button = $('.contact-form button[type=submit]');

        $button.addClass('button-loading');
        $('.contact-success-message').html('').hide();
        $('.contact-error-message').html('').hide();

        $.ajax({
            type: 'POST',
            cache: false,
            url: $(this).closest('form').prop('action'),
            data: new FormData($form.get(0)),
            contentType: false,
            processData: false,
            success: res => {
                if (!res.error) {
                    $form.find('input[type=text]').val('');
                    $form.find('input[type=email]').val('');
                    $form.find('textarea').val('');
                    showSuccess(res.message);
                } else {
                    showError(res.message);
                }

                $button.removeClass('button-loading');

                if (typeof refreshRecaptcha !== 'undefined') {
                    refreshRecaptcha();
                }
            },
            error: res => {
                if (typeof refreshRecaptcha !== 'undefined') {
                    refreshRecaptcha();
                }
                $button.removeClass('button-loading');
                handleError(res);
            }
        });
    });
});
