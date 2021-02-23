$(document).ready(function(){
    $('body .dropdown-toggle').dropdown();
    $('#model').addClass('right');
    $(function(){
        $('#model').addClass('right');
        $('.modelButton').click(function(){
            $('.modal').modal('show')
                .find('#modelContent')
                .load($(this).attr('value'));
        });
    })
});