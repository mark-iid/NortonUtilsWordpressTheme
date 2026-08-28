/**
 * Norton Simple — Block Editor
 *
 * Editor-side implementations for the three Norton blocks. Names, titles,
 * icons, attributes and supports all come from each block's block.json, which
 * is registered server-side in inc/blocks.php — only edit/save live here.
 *
 * These are dynamic blocks: save() serialises the inner blocks only, and the
 * matching blocks/<name>/render.php emits the wrapper at render time.
 */
( function ( blocks, blockEditor, components, element, i18n ) {
	'use strict';

	var registerBlockType = blocks.registerBlockType;
	var InnerBlocks = blockEditor.InnerBlocks;
	var InspectorControls = blockEditor.InspectorControls;
	var useBlockProps = blockEditor.useBlockProps;
	var PanelBody = components.PanelBody;
	var SelectControl = components.SelectControl;
	var el = element.createElement;
	var __ = i18n.__;

	/**
	 * Save the inner blocks unwrapped. render.php supplies the wrapper.
	 */
	function saveInnerBlocksOnly() {
		return el( InnerBlocks.Content );
	}

	registerBlockType( 'norton/box', {
		edit: function () {
			return el(
				'div',
				useBlockProps( { className: 'norton-box' } ),
				el( InnerBlocks )
			);
		},
		save: saveInnerBlocksOnly,
	} );

	registerBlockType( 'norton/box-invert', {
		edit: function () {
			return el(
				'div',
				useBlockProps( { className: 'norton-box-invert' } ),
				el( InnerBlocks )
			);
		},
		save: saveInnerBlocksOnly,
	} );

	registerBlockType( 'norton/alert', {
		edit: function ( props ) {
			var type = props.attributes.type || 'info';

			return el(
				element.Fragment,
				null,
				el(
					InspectorControls,
					null,
					el(
						PanelBody,
						{ title: __( 'Alert settings', 'norton-simple' ) },
						el( SelectControl, {
							label: __( 'Type', 'norton-simple' ),
							value: type,
							options: [
								{ label: __( 'Info', 'norton-simple' ), value: 'info' },
								{ label: __( 'Success', 'norton-simple' ), value: 'success' },
								{ label: __( 'Error', 'norton-simple' ), value: 'error' },
							],
							onChange: function ( value ) {
								props.setAttributes( { type: value } );
							},
							__nextHasNoMarginBottom: true,
						} )
					)
				),
				el(
					'div',
					useBlockProps( { className: 'norton-alert is-type-' + type } ),
					el( InnerBlocks )
				)
			);
		},
		save: saveInnerBlocksOnly,
	} );
} )( window.wp.blocks, window.wp.blockEditor, window.wp.components, window.wp.element, window.wp.i18n );
