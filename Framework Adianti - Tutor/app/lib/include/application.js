Adianti.onClearDOM = function(){
	/* $(".select2-hidden-accessible").remove(); */
	$(".colorpicker-hidden").remove();
	$(".select2-display-none").remove();
	$(".tooltip.fade.top.in").remove();
	$(".select2-drop-mask").remove();
	/* $(".autocomplete-suggestions").remove(); */
	$(".datetimepicker").remove();
	$(".note-popover").remove();
	$(".dtp").remove();
	$("#window-resizer-tooltip").remove();
};

Adianti.onBeforeLoad = function(url) {
    
    url = url.replace('engine.php?', '');
    url = url.replace('index.php?', '');
    
    query_object = __adianti_query_to_json(url);
    if (typeof query_object == 'object')
    {
        url  = 'engine.php?class=DocumentationView&method=onHelp&classname='+query_object.class;
        $('#view-source').attr('href', url);
    }
};

Adianti.onAfterLoad = function(url) {
    if ($('#adianti_div_content').find('code').length > 0) {
        $('#view-source').attr('class', 'float-button disabled');
        $('#view-source').attr('disabled', 1);
        $('#view-source').css('pointer-events',   'none');
    }
    else {
        $('#view-source').attr('class', 'float-button');
        $('#view-source').attr('disabled', null);
        $('#view-source').css('pointer-events',   'auto');
    }
};

$( document ).on( 'click', '[generator="adianti-docs"]', function() {
    url = $(this).attr('href').replace('index.php', 'engine.php');
   __adianti_load_page_no_register(url);
   return false;
});

window.onpopstate = function(stackstate) {
	if (stackstate.state) {
		__adianti_load_page_no_register(stackstate.state.url);
	}
};