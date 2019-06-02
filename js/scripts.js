jQuery(document).ready(function($) {
    width = $(window).width();
    height = $(window).height();
    if( width > 1024 ){
        $(document).ready(function() { 
            $('.users__position').each(function(){
                var id = $(this).attr('id');
                var name = $(this).find('h2').text();
                $('nav li.dropdown .dropdown-menu').append('<li><a href="#' + id + '">' + name + '</a></li>');
            });
            var base = 20;
            $('.dropdown-menu li>a').each(function(){
                var arg = 'translate(' + base + 'px, 0)';
                $(this).css({'transform': arg});
                base = base + 20;
            });
            $('nav .dropdown-menu *, nav .dropdown-menu').hover(function(){
               $('h1').css({'color':'#2b5600'});
               $(this).toggleClass('on');
            });
            $('nav .dropdown-menu *, nav .dropdown-menu').on('mouseout', function(){
                $('h1').css({'color':''});
                $(this).toggleClass('on');
            });
        });
    }
    if( width < 1024 ){
        $('button.navbar-toggler').on('click', function(){
            $('.navbar-collapse').toggleClass('collapse');
            $('.overlay').toggleClass('on');
        });
        $(document).mouseup(function (e){ 
                        var div = $('header');
                        if (!div.is(e.target)&& div.has(e.target).length === 0) {
                            $('.overlay').removeClass('on');
                            $('.navbar-collapse').addClass('collapse');
                        }
        }); 
    }
    if( width < 768 ){
         $('.lang li>a').on('click', function(){
            window.location.href = $(this).attr('href');
        });
    }
    //Links
    $("section").on("click","a", function (event) {
		event.preventDefault();
		var id  = $(this).attr('href'),
			top = $(id).offset().top;
		$('body,html').animate({scrollTop: top - 60}, 1500);
	});
    $("nav").on("click","a", function (event) {
		event.preventDefault();
		var id  = $(this).attr('href'),
			top = $(id).offset().top;
		$('body,html').animate({scrollTop: top - 60}, 1500);
	});
    $(window).scroll(function() {
        if( $(this).scrollTop() > 400 ){
            $("#toTop").css({'display': 'block'});
        }
        else{
            $("#toTop").css({'display': 'none'});
        }
    });
    $("#toTop").on("click","a", function (event) {
		event.preventDefault();
		var id  = $(this).attr('href'),
			top = $(id).offset().top;
		$('body,html').animate({scrollTop: top - 60}, 1500);
	});
    //Fancybox
    $('.fancybox').fancybox();
    //Iframes
    $(document).on('click', 'a.youtube', function(e){
    	e.preventDefault();
        var href = $(this).attr('href');
    	var $iframe = $("<iframe allowfullscreen src='" + href + "'></iframe>");
    	$('#youtube-popup').empty();
    	$("#youtube-popup").append($iframe);
    	$("#youtube-popup").addClass('on');
        $('.overlay').addClass('on');
        $(document).mouseup(function (e){ 
        var div = $('#youtube-popup iframe');
            div.each(function(){
                if (!div.is(e.target)&& div.has(e.target).length === 0) {
                    div.detach();
                    $('#youtube-popup').removeClass('on');
                    $('.overlay').removeClass('on');
                }
            });
        });
    });
    $(document).on('click', '.image__one video', function(e){
    	e.preventDefault();
        var html = $(this).html();
    	var $iframe = $("<video preload='auto' controls='controls'>"+html+"</video>");
    	$('#video-popup').empty();
    	$("#video-popup").append($iframe);
    	$("#video-popup").addClass('on');
        $('.overlay').addClass('on');
        $(document).mouseup(function (e){ 
        var div = $('#video-popup video');
            div.each(function(){
                if (!div.is(e.target)&& div.has(e.target).length === 0) {
                    div.detach();
                    $('#video-popup').removeClass('on');
                    $('.overlay').removeClass('on');
                }
            });
        });
    });
    //Ajax posts
    $(document).ready(function() { 
            var ias = jQuery.ias( {
              container: ".galeryBody",
              item: ".galeryWrapper",
              pagination: ".page-numbers",
              next: ".next.page-numbers",
            } );

            ias.extension( new IASTriggerExtension( { offset: 2 } ) );
            ias.extension( new IASSpinnerExtension() );
            ias.extension( new IASNoneLeftExtension() );
        });
     $(document).on('click', '.modal .value .close', function(){
       $('.modal').hide();
       $('.modal').removeClass('show');
       $('.overlay').removeClass('on');
    });
});

