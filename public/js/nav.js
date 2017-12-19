var $j = jQuery.noConflict();
$j(document).ready(function(){
    $j("#hamburger").on('click touch', function(){
    	$j(".primary-nav").toggleClass('hide');
	});		    
});