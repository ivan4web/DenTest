$(function() {
      	  $('textarea').autoResize();
});
$(document).click( function(event){
		 event.stopPropagation();
      if( $(event.target).closest("section").length  || $(event.target).closest("article").length) 
        return;
	ls = document.getElementById('lastsection').value;
	if(ls != ''){$('#' + ls).slideUp("normal");}
      $("section").slideUp("normal");
      event.stopPropagation();
});
$(document).mousemove( function(event){

		 event.stopPropagation();
      if( $(event.target).closest("section").length  || $(event.target).closest("article").length) 
        return;
	ls = document.getElementById('lastsection').value;
		
	if(ls != ''){/*
		setTimeout(function() { 
		$('#' + ls).slideUp("normal");
		 }, 300);*/
		 $('#' + ls).slideUp("normal");
	}
      //$("section").slideUp("normal");
      event.stopPropagation();
});

		$( document ).ready( function()
		{
			var targets = $( '[rel~=tooltip]' ),
				target	= false,
				tooltip = false,
				title	= false;

			targets.bind( 'mouseenter', function()
			{
				target	= $( this );
				tip		= target.attr( 'title' );
				tooltip	= $( '<div id="tooltip"></div>' );

				if( !tip || tip == '' )
					return false;

				target.removeAttr( 'title' );
				tooltip.css( 'opacity', 0 )
					   .html( tip )
					   .appendTo( 'body' );

				var init_tooltip = function()
				{
					if( $( window ).width() < tooltip.outerWidth() * 1.5 )
						tooltip.css( 'max-width', $( window ).width() / 2 );
					else
						tooltip.css( 'max-width', 340 );

					var pos_left = target.offset().left + ( target.outerWidth() / 2 ) - ( tooltip.outerWidth() / 2 ),
						pos_top	 = target.offset().top - tooltip.outerHeight() - 20;

					if( pos_left < 0 )
					{
						pos_left = target.offset().left + target.outerWidth() / 2 - 20;
						tooltip.addClass( 'left' );
					}
					else
						tooltip.removeClass( 'left' );

					if( pos_left + tooltip.outerWidth() > $( window ).width() )
					{
						pos_left = target.offset().left - tooltip.outerWidth() + target.outerWidth() / 2 + 20;
						tooltip.addClass( 'right' );
					}
					else
						tooltip.removeClass( 'right' );

					if( pos_top < 0 )
					{
						var pos_top	 = target.offset().top + target.outerHeight();
						tooltip.addClass( 'top' );
					}
					else
						tooltip.removeClass( 'top' );

					tooltip.css( { left: pos_left, top: pos_top } )
						   .animate( { top: '+=10', opacity: 1 }, 50 );
				};

				init_tooltip();
				$( window ).resize( init_tooltip );

				var remove_tooltip = function()
				{
					tooltip.animate( { top: '-=10', opacity: 0 }, 50, function()
					{
						$( this ).remove();
					});

					target.attr( 'title', tip );
				};

				target.bind( 'mouseleave', remove_tooltip );
				tooltip.bind( 'click', remove_tooltip );
			});
		});

		
		
		( function( doc )
		{
			var addEvent = 'addEventListener',
			    type	 = 'gesturestart',
			    qsa		 = 'querySelectorAll',
			    scales	 = [ 1, 1 ],
			    meta	 = qsa in doc ? doc[ qsa ]( 'meta[name=viewport]' ) : [];
		
			function fix()
			{
				meta.content = 'width=device-width,minimum-scale=' + scales[ 0 ] + ',maximum-scale=' + scales[ 1 ];
				doc.removeEventListener( type, fix, true );
			}
		
			if( ( meta = meta[ meta.length - 1 ] ) && addEvent in doc )
			{
				fix();
				scales = [ .25, 1.6 ];
				doc[ addEvent ]( type, fix, true );
			}
		
		}( document ) );
		
$(document).ready(function() {
    $("a.ankor").click(function () {
        var elementClick = $(this).attr("href")
        var destination = $(elementClick).offset().top;
        jQuery("html:not(:animated),body:not(:animated)").animate({scrollTop: destination}, 800);
        return false;
    });
	});
$(document).ready(function() {
    $("a.toanch").click(function () {
        var elementClick = $(this).attr("href")
        var destination = $(elementClick).offset().top;
        jQuery("html:not(:animated),body:not(:animated)").animate({scrollTop: destination}, 800);
        return false;
    });
	});

	

var visitortime = new Date();
var visitortimezone = -visitortime.getTimezoneOffset()/60;
document.cookie = "tzona="+visitortimezone+"; path=/;";


$(document).ready(function() {
   
   $('.menu').click(function(e){
	e.stopPropagation();
	$('.PopupConteiner').slideDown("fast");
   });
    $(document).click(function(){
		$('.PopupConteiner').slideUp("fast");
   });
   
   
});
