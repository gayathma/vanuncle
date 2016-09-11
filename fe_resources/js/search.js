(function($){

	"use strict";
	
	$(document).ready(function () {
		search.init();
	});
	
	var search = {
	
		init: function () {


			// DATE & TIME PICKER
			$('#dep-date,#ret-date').datetimepicker();
		}
	}

})(jQuery);