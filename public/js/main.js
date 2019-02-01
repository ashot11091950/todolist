$(function () {

    $('.panel-heading').click(function () {
        $(this).toggleClass('in').next().slideToggle();
        $('.panel-heading').not(this).removeClass('in').next().slideUp();
    });

	$('.button').click(function(){
		$('.nodDiv').remove();
		$(this).after("<div class='nodDiv'><input class='add' type='text' placeholder='Add Project'><div><button type='button' class='btn btn-success addSave'>Save</button><button type='button' class='btn btn-danger addCancel'>Cancel</button></div></div>");
		$(this).css('display', 'none');
	});
});


$('body').mousemove(function(e){
        var amountMovedX = (e.pageX * 3 / 12);
        var amountMovedY = (e.pageY * 3 / 12);
        $(".image1").css('top', amountMovedX + 'px ');
        $(".image1").css('left', amountMovedY + 'px ');
    });

$('body').mousemove(function(e){
        var amountMovedX = (e.pageX * 5 / 15);
        var amountMovedY = (e.pageY * 5 / 15);
        $(".image2").css('bottom', amountMovedX + 'px ');
        $(".image2").css('left', amountMovedY + 'px ');
    });

$('body').mousemove(function(e){
        var amountMovedX = (e.pageX * 5 / 15);
        var amountMovedY = (e.pageY * 5 / 15);
        $(".image3").css('top', amountMovedX + 'px ');
        $(".image3").css('right', amountMovedY + 'px ');
    });

$('body').mousemove(function(e){
        var amountMovedX = (e.pageX * 5 / 15);
        var amountMovedY = (e.pageY * 5 / 15);
        $(".image4").css('bottom', amountMovedX + 'px ');
        $(".image4").css('right', amountMovedY + 'px ');
    });

$('.row').on('click', '.addCancel', function(){
    $('.nodDiv').remove();
    $('.button').css('display', 'block');
})

$('.row').on('click', '.addSave', function(){
    add = $('.add').val();
    $('.nodDiv').remove();
    $('.button').css('display', 'block');
    save = '';
    $.post({
        url:'/addproject',
        data:{add:add, save:save},
        success : function(res){
            
        }
    })

})
