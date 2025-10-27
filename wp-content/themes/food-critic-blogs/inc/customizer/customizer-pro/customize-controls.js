( function( api ) {

	// Extends our custom "food-critic-blogs" section.
	api.sectionConstructor['food-critic-blogs'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );