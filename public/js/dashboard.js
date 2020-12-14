$('.date').datepicker({
    format: 'dd.mm.yyyy',
}).on('change', function () {
    $('#date_form').submit();
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
$('#submit_form').on('click', function () {
    $('#date').val($('#datepicker').val());
});
