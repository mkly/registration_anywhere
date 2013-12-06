+function($) { "use strict";

	function setRelationship(master, slave) {
		var $master   = $(master),
		    $slave    = $(slave),
		    $fieldset = $master.closest("fieldset"),
			$primary  = $("input[type=checkbox]:first", $fieldset);

		function togglePrimary() {
			$primary.is(":checked") ? $fieldset.addClass("active") : $fieldset.removeClass("active");
		}
		function toggle() {
			$master.is(":checked") ? $slave.show() : $slave.hide();
			togglePrimary();
		}

		toggle();
		$master.change(toggle);
	}

	$(function() {
		setRelationship('#use_custom_form_title', '#use_custom_form_title_wrap + div');
		setRelationship('#show_logged_in', '#show_logged_in_wrap + div');
		setRelationship('#use_custom_logged_in_as', '#use_custom_logged_in_as_wrap + div');
		setRelationship('#use_user_attribute_key', '#use_user_attribute_key_wrap + div');
		setRelationship('#show_details_header', '#show_details_header_wrap + div');
		setRelationship('#use_custom_details_header', '#use_custom_details_header_wrap + div');
		setRelationship('#show_options_header', '#show_options_header_wrap + div');
		setRelationship('#use_custom_options_header', '#use_custom_options_header_wrap + div');
	});
}($);
