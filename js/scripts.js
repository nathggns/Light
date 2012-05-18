// Disable Selection Plugin
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

// Sticky Element Plugin
(function($) {
	$.fn.sticky = function(method) {
		var defaults = {};
		var data = {};
		var data = window.stickydata = {};
		var methods = {
			"init": function(opts) {
				var opts = $.extend({}, defaults, opts),
					$this = $(this),
					string = methods.toString($this),
					cData = data[string];

				if (cData) return false;
				cData = data[string] = {'scroll': true, 'fixed': true};

				cData.breakPoint = parseInt($this.offset().top);

				$(window).on('scroll', function(e) {
					methods.scroll.call($this, e);
				});

				setTimeout(function() {
					methods.scroll.call($this);
				}, 1);
			},
			"destroy": function() {
				data[methods.toString($(this))]['scroll'] = false;
			},
			"scroll": function(e) {
				var $this = this,
					string = methods.toString($this),
					cData = data[string];

				if (!cData['scroll']) return false;
				if ($("body").scrollTop() >= cData['breakPoint']) {
					$this.addClass('sticky');
					cData['fixed'] = true;
					data[methods.toString($this)] = cData;
				} else {
					$this.removeClass('sticky');
					cData['fixed'] = false;
				}
			},
			"start": function() {

			},
			"end": function() {

			},
			"toString": function(elem) {
				var elem = elem || this;
				var parts = [
					elem[0].tagName.toLowerCase(),
					["#",elem.attr('id')],
					[".",elem.attr('class').replace(" ", ".")]
				];
				return methods.arrayToString(parts);
			},
			"arrayToString": function(arr, cb) {
				var string = '';
				for (var key in arr) {
					var part = arr[key];
					if (cb) part = cb(part);
					if (methods.isArray(part)) {
						var add = '';
						for (var i in part) {
							if (!!part[i]) {
								add += part[i];
							} else {
								add = false;
								break;
							}
						}
						if (!!add) string += add;
					} else if (!!part) {
						string += part;
					}
				};
				return string;
			},
			"isArray": function(arr) { return arr.constructor.toString().indexOf("Array") != -1; }
		};

		var args = arguments;
		if (methods[method]) {
			return this.each(function() {
				methods[method].apply(this, args.splice(1));
			});
		} else if (typeof method === "object" || !method) {
			return this.each(function() {
				methods.init.apply(this, args);
			});
		} else {
			return $.error("No such method " + method + " exists on jQuery.sticky");
		};
	};
})(jQuery);

// Modernizr test for min-height + box-sizing bug
Modernizr.testStyles(
	'#modernizr { width: 100%; min-height: 100%; padding: 20px; position: absolute; }',
	function(elem, rule) {
		Modernizr.addTest('boxsizingbug', elem.offsetHeight != document.body.offsetHeight);
	}
);

// Actual shit
$(function(){
	// Run our pretty printer
	prettyPrint.call(document.body);

	// Post folding
	var $pluses = $(".plus"), $lis = $(".multiple .articles li");
	$lis.each(function() {
		var $li = $(this),
			$aside = $li.find("aside ul"),
			$plus = $(document.createElement("li"))

		$plus
			.addClass("plus")
			.html("+")
			.appendTo($aside)
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

	// Pull sharing from dom
	var $sharing = $(".sharing");

	// Sticky Sharing (not on touch devices)
	if ($sharing.length > 0 && !Modernizr.touch) $sharing.sticky();

	// Fix Firefox's nortiness
	if (Modernizr.boxsizingbug) {
		$("footer.main, .body, body").addClass('nosticky');
	}

	// Social buttons in new window
	$sharing.find("a").click(function(e) {
		e.preventDefault();
		var $this = $(this),
			url = $this.attr("href"),
			name = $this.text().replace(" ", "").toLowerCase(),
			parameters = {
				location: 'no',
				status: 'no',
				toolbar: 'no',
				menubar: 'no'
			}, paramsstring;

		for (key in parameters) {
			if (key > 0) paramsstring += ", ";
			paramsstring += key + "=" + parameters[key];
		};
		var win = window.open(url, name, paramsstring);
	});
});