/* Credit to http://www.davidjrush.com/blog/2011/12/simple-jquery-tooltip/ */

$(document).ready(function () {
	$("span.question").hover(function () {
		var tooltipText = $(this).attr('id');
		$(this).append('<div class="tooltip"><p>' + tooltipText + '</p></div>');
	}, function () {
		$("div.tooltip").remove();
	});
});