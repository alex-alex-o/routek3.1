$(document).ready(function(){
		
	$("form").submit(function( event ) {

		console.log('submit start');	
		var $fields = $(this).find('[required]');
		$($fields).each(function(i,e){
			if($(e).val() == ''){
				event.preventDefault();	
				console.log('Значение для поля не введено');
			
			}
			
		});
	});
	
});
