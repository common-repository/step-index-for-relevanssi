function step_index_click() {
	if (jQuery('input[name="step_index"]').attr('checked')) {
		step_index_addaction();
	} else {
		step_index_resetaction();
	}
}
function step_index_addaction() {
	step_index_action(location.href + '&step_index=continue');
}
function step_index_resetaction() {
	step_index_action('');
}
function step_index_form() {
	return jQuery('.postbox-container form');
}
function step_index_button() {
	return jQuery(jQuery('.postbox-container form input[name="index_extend"]')[0]);
}
function step_index_action(value) {
	step_index_form().attr('action', value);
}
function step_index_more() {
	return jQuery('#message p').text() == 'More to index...';
}
function step_index_continue() {
	return location.search.indexOf('step_index=continue') >= 0;
}
jQuery(document).ready(function(e) {
	step_index_button().parent().append('<br /><input type="checkbox" name="step_index" onclick="step_index_click();" />Step Index');
	if (step_index_continue()) {
		 if (step_index_more()) {
			step_index_addaction();
			//Submit form
			step_index_button().click()
		} else {
			console.log('Step Index Finished');
		}
	}
});