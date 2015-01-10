/* Credit to http://www.davidjrush.com/blog/2011/12/simple-jquery-tooltip/ */

$(document).ready(function () {
	$("span.question").hover(function () {
		$(this).append('<div class="tooltip"><p>' + $(this).attr('title') + '</p></div>');
	}, function () {
		$("div.tooltip").remove();
	});
});