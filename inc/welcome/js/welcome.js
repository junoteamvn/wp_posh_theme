jQuery(document).ready(function($) {

	/* Tabs in welcome page */
	function site_welcome_tabs(event) {
		$(event).parent().addClass("active");
        $(event).parent().siblings().removeClass("active");
        var tab = $(event).attr("href");
        $(".tab-pane").not(tab).css("display", "none");
        $(tab).fadeIn();
	}

    $(".nav-tabs a").click(function(event) {
        event.preventDefault();
		site_welcome_tabs(this);
    });

});
