$(function () {

    $(document).on('click','.panel-heading',function () {
        $(this).next().toggleClass('in').slideToggle();
        $('.panel-heading').not(this).removeClass('in').next().slideUp();
    });


	$(document).on('click', '.button', function(){
		$(this).next().remove()
		$(this).after("<input class='newInput' type='text' name='' />")
		.css('transition', 'all .3s')
		$(this).css('margin-bottom', '10px')
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

$('.addGroup').click(function(){
    $(this).after('<div class="add_input"><input type="text" placeholder="Add Category" class="inp_add"><div class="add_inp_buttons"><button class="save">Save</button><button class="cancel">Cancel</button></div></div>')
    $(this).css('display', 'none');
})

$(document).on('click','.cancel', function(){
    $('.addGroup').css('display', 'block');
    $('.add_input').remove();
})

$(document).on('click', '.save',function (event) {
    event.preventDefault();
    var data = $('.inp_add').val()
    $('.addGroup').css('display', 'block');
    $('.add_input').remove();
    //console.log(data);
  $.ajax({
       url: "/home",
       method: 'post',
       data: {'title': data},
       success : function(da){
           da = JSON.parse(da);
           var el = da.rows;
           $('.panel:last').after('<div class="panel"><div class="panel-heading"><a><i class="fa fa-shopping-cart"></i>'+el[el.length-1]["content"] +'</a></div><div class="panel-collapse"><div class="panel-body"><div class="wrapper-ul"><ul><li><a href="#">Lorem ipsum</a></li><li><a href="#">Consectetur adipisicing</a></li><li><div class="button"><a>Add Work page</a></div></li></ul></div></div></div></div>')
           console.log(el[el.length-1]["content"]);
       }
   })
});