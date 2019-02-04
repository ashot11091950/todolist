$(function () {

    $('.panel-heading').click(function () {
        $(this).toggleClass('in').next().slideToggle();
        $('.panel-heading').not(this).removeClass('in').next().slideUp();
    });

	$('.button').click(function(){
        category_id = $(this).attr('data-category-id');
		$('.divProject').remove();
		$(this).after("<div class='divProject'><input class='inputProject' type='text' placeholder='Add Project'><div><button type='button' class='btn btn-success saveProject' data-category-id="+category_id+">Save</button><button type='button' class='btn btn-danger cancelProject'>Cancel</button></div></div>");
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

$('.row').on('click', '.cancelProject', function(){
    $('.divProject').remove();
    $('.button').css('display', 'block');
    $('.button_task').css('display', 'block');
})

$('.row').on('click', '.saveProject', function(){
    var this_tag = $(this);
    var category_id = $(this).attr('data-category-id');
    var title = $('.inputProject').val();
    var save = '';
    $.post({
        url:'/addproject',
        data:{title:title, save:save, category_id:category_id},
        success : function(res){
            if(res == 1){
                this_tag.parent().parent().parent().parent().prepend('<li><a class="project">'+title+'</a></li>');
                $('.divProject').remove();
                $('.button').css('display', 'block');
            }
            if(res == 0){
                $('.divProject input').after('<p class="error">There is a problem with server</p>');
            }
        }
    })

})
$('#responsive-menu').on('click', '.project', function(){
    $('#content ul').empty();
    $('#content .wrapper-ul h1').remove();
    $('#content .wrapper-ul').prepend('<h1>'+$(this).text()+' project</h1>');
    var project_id = $(this).attr('data-project-id');
    $.post({
        url:'/printtask',
        data:{project_id:project_id},
        success:function(res){
            if(res == 0){
                $('#content ul').empty();
                $('#content ul').prepend('<li><div class="button_task" data-project-id="'+project_id+'"><a>Add task</a></div></li>')
            }else{
                var data = JSON.parse(res);
                html = '';
                $(data).each(function(){
                    html += '<li><a data-task-id="'+$(this)[0].task_id+'">'+$(this)[0].title+'</a></li>';
                })
                html += '<li><div class="button_task" data-project-id="'+project_id+'"><a>Add task</a></div></li>';
                $('#content ul').prepend(html);
            }
        }
    })
})
$('#content').on('click', '.button_task', function(){
        var project_id = $(this).attr('data-project-id');
        $('.divProject').remove();
        $(this).after("<div class='divProject'><input class='inputTask' type='text' placeholder='Add Task'><div><button type='button' class='btn btn-success saveTask' data-project-id="+project_id+">Save</button><button type='button' class='btn btn-danger cancelProject'>Cancel</button></div></div>");
        $(this).css('display', 'none');
    });
$('#content').on('click', '.saveTask', function(){
    var this_tag = $(this);
    var project_id = $(this).attr('data-project-id');
    var title = $('.inputTask').val();
    $.post({
        url:'/addtask',
        data:{project_id:project_id, title:title},
        success:function(res){
            if(res == 1){
                $('#content ul').prepend('<li><a>'+title+'</a></li>');
                $('.divProject').remove();
                $('.button_task').css('display', 'block');
            }
            if(res == 0){
                $('.divProject input').after('<p class="error">There is a problem with server</p>');
            }
        }
    })
})
