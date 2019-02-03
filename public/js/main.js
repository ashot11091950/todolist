$(function () {

    $('.panel-heading').click(function () {
        $(this).toggleClass('in').next().slideToggle();
        $('.panel-heading').not(this).removeClass('in').next().slideUp();
    });

	$('.button').click(function(){
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


//notification code

// if ('serviceWorker' in navigator) {
//     window.addEventListener('load', function() {
//         askPermission();
//     });
//  }else{
//     document.write('serviceWorker Not found in navigator');
//  }
 
//  function askPermission() {
//     return new Promise(function(resolve, reject) {
//         const permissionResult = Notification.requestPermission(function(result) {
//             resolve(result);
//         });
 
//         if (permissionResult) {
//             permissionResult.then(resolve, reject);
//         }
//     })
//     .then(function(permissionResult) {
//         if (permissionResult !== 'granted') {
//             throw new Error('We weren\'t granted permission.');
//         }else{
//             sendNotification('aaaaaaaaaaaaaaaaaaaaaaaaa... \nsomytaymy, somytaymy, girappa, girappa...')
//         }
//     });
//  }
 
//  function sendNotification(title){
//      var options = {
//          body: title
//      }
//     return new Notification('Notification', options);
//  }