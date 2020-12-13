$('.date').datepicker({
    format: 'dd-mm-yyyy',
});
$('.close').on('click', function () {
    $('.alert').hide();
});
$('.btn-add').on('click', function () {
    if($(this).hasClass('btn-add') && $(this).hasClass('btn-success')) {

        $('.info').show(500);
        $(this).addClass('btn-cancel').addClass('btn-danger').removeClass('btn-add').removeClass('btn-success');
        $(this).text('-');
    } else {

        $('.info').hide(500);
        $(this).addClass('btn-add').addClass('btn-success').removeClass('btn-cancel').removeClass('btn-danger');
        $(this).text('+');
    }
});
$('#submit_form').on('click', function () {
    $('#date').val($('#datepicker').val());
});
