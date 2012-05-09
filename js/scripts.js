(function($) {
	$.fn.disableSelection = function() {
		return this.each(function() {           
			$(this).attr('unselectable', 'on')
				   .css({
					   '-moz-user-select':'none',
					   '-webkit-user-select':'none',
					   'user-select':'none',
					   '-ms-user-select':'none'
				   })
				   .each(function() {
					   this.onselectstart = function() { return false; };
				   });
		});
	};
})(jQuery);
$(function(){
	prettyPrint.call(document.body);
	var $pluses = $(".plus"), $lis = $(".multiple .articles li");
	$lis.each(function() {
		var $li = $(this),
			$footer = $li.find("footer ul"),
			$plus = $(document.createElement("li"))

		$plus
			.addClass("plus")
			.html("+")
			.appendTo($footer)
			.disableSelection();

		if ($li.hasClass("showContent")) $plus.html("-");
			
		$plus.click(function() {
				if ($plus.html() == "+") {
					$li.addClass("showContent");
					$plus.html("-");
				} else {
					$li.removeClass("showContent");
					$plus.html("+");
				}
			});
	});
});