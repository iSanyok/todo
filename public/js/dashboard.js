$('.date').datepicker({
    format: 'dd-mm-yyyy',
});
$('.close').on('click', function () {
    $('.alert').hide();
});
$('.btn-add').on('click', function () {
    $('.info').show(500);
});
$('.btn-cancel').on('click', function () {
    $('.info').hide(500);
});
