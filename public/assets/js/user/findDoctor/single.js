$('#react-tabs-573252').click(function(){
    $('.react-tabs__tab--selected').attr('aria-selected','false').removeClass('react-tabs__tab--selected');
    $(this).addClass('react-tabs__tab--selected').attr('aria-selected','true');
    $('#info').removeClass('d-none');
    $('#stories').addClass('d-none');
    $('#consult').addClass('d-none');
    $('#healthfeed').addClass('d-none');
});
$('#react-tabs-573254').click(function(){
    $('.react-tabs__tab--selected').attr('aria-selected','false').removeClass('react-tabs__tab--selected');
    $(this).addClass('react-tabs__tab--selected').attr('aria-selected','true');
    $('#info').addClass('d-none');
    $('#stories').removeClass('d-none');
    $('#consult').addClass('d-none');
    $('#healthfeed').addClass('d-none');
});
$('#react-tabs-573256').click(function(){
    $('.react-tabs__tab--selected').attr('aria-selected','false').removeClass('react-tabs__tab--selected');
    $(this).addClass('react-tabs__tab--selected').attr('aria-selected','true');
    $('#info').addClass('d-none');
    $('#stories').addClass('d-none');
    $('#consult').removeClass('d-none');
    $('#healthfeed').addClass('d-none');
});
$('#react-tabs-573258').click(function(){
    $('.react-tabs__tab--selected').attr('aria-selected','false').removeClass('react-tabs__tab--selected');
    $(this).addClass('react-tabs__tab--selected').attr('aria-selected','true');
    $('#info').addClass('d-none');
    $('#stories').addClass('d-none');
    $('#consult').addClass('d-none');
    $('#healthfeed').removeClass('d-none');
});
$('#first-slot').click(function(e){
    e.preventDefault();
    $('.slot-tabs-after').css('left','0');
    $('#first-slot h5').css({
        'font-weight':'800',
        'color':'#333'
    });
    $('#second-slot h5').css({
        'font-weight':'500',
        'color':'#777'
    });
    $('#third-slot h5').css({
        'font-weight':'500',
        'color':'#777'
    });
});

$('#second-slot').click(function(e){
    e.preventDefault();
    $('.slot-tabs-after').css('left','33.33%');
    $('#second-slot h5').css({
        'font-weight':'800',
        'color':'#333'
    });
    $('#first-slot h5').css({
        'font-weight':'500',
        'color':'#777'
    });
    $('#third-slot h5').css({
        'font-weight':'500',
        'color':'#777'
    });
});

$('#third-slot').click(function(e){
    e.preventDefault();
    $('.slot-tabs-after').css('left','66.66%');
    $('#third-slot h5').css({
        'font-weight':'800',
        'color':'#333'
    });
    $('#first-slot h5').css({
        'font-weight':'500',
        'color':'#777'
    });
    $('#second-slot h5').css({
        'font-weight':'500',
        'color':'#777'
    });
});


$('#first-slot-c').click(function(e){
    e.preventDefault();
    $('.slot-tabs-after-c').css('left','0');
    $('#first-slot-c h5').css({
        'font-weight':'800',
        'color':'#333'
    });
    $('#second-slot-c h5').css({
        'font-weight':'500',
        'color':'#777'
    });
    $('#third-slot-c h5').css({
        'font-weight':'500',
        'color':'#777'
    });
});

$('#second-slot-c').click(function(e){
    e.preventDefault();
    $('.slot-tabs-after-c').css('left','33.33%');
    $('#second-slot-c h5').css({
        'font-weight':'800',
        'color':'#333'
    });
    $('#first-slot-c h5').css({
        'font-weight':'500',
        'color':'#777'
    });
    $('#third-slot-c h5').css({
        'font-weight':'500',
        'color':'#777'
    });
});

$('#third-slot-c').click(function(e){
    e.preventDefault();
    $('.slot-tabs-after-c').css('left','66.66%');
    $('#third-slot-c h5').css({
        'font-weight':'800',
        'color':'#333'
    });
    $('#first-slot-c h5').css({
        'font-weight':'500',
        'color':'#777'
    });
    $('#second-slot-c h5').css({
        'font-weight':'500',
        'color':'#777'
    });
});

