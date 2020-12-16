$('.date').datepicker({
    format: 'dd.mm.yyyy',
}).on('change', function () {
    $('#date-form').submit();
});

$('.close').on('click', function () {
    $('.alert').hide();
});

$('.btn-add').on('click', function () {
    if ($(this).hasClass('btn-add')) {

        $('.info').show(500);
        $(this).addClass('btn-cancel').removeClass('btn-add');
        $(this).text('-');
    } else {

        $('.info').hide(500);
        $(this).addClass('btn-add').removeClass('btn-cancel');
        $(this).text('+');
    }
});

$('#create-form').on('click', function () {
    $('#date').val($('#datepicker').val());
});

$('.update-button').on('click', function () {

    let formClass = '.update-form' + $(this).attr('id');

    if ($(this).hasClass('update-form-closed')) {

        $(formClass).show(500);
        $(this).removeClass('update-form-closed');
    } else {

        $(formClass).hide(500);
        $(this).addClass('update-form-closed');
    }
});
