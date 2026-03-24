/**
 * Norton Simple Blocks
 * Register Norton blocks for the WordPress block editor.
 */

var registerBlockType = wp.blocks.registerBlockType;
var InnerBlocks = wp.blockEditor.InnerBlocks;
var el = wp.element.createElement;

console.log( 'norton-blocks.js loaded' );

// Norton Box Block
registerBlockType( 'norton/box', {
    title: 'Norton Box',
    description: 'A raised-style box with beveled borders',
    category: 'design',
    icon: 'admin-page',
    supports: {
        className: true,
        align: true,
    },
    edit: function( props ) {
        return el( 'div', 
            { 
                style: { 
                    border: '2px solid #5555ff', 
                    padding: '20px', 
                    color: '#fff', 
                    backgroundColor: '#000080',
                    marginTop: '20px',
                    marginBottom: '20px'
                },
                className: 'wp-block-norton-box'
            },
            el( InnerBlocks, null )
        );
    },
    save: function( props ) {
        return el( 'div', { className: 'norton-box' }, el( InnerBlocks.Content ) );
    },
} );

console.log( 'Registered norton/box' );

// Norton Box Invert Block
registerBlockType( 'norton/box-invert', {
    title: 'Norton Box Invert',
    description: 'An inset-style box with inverted beveled borders',
    category: 'design',
    icon: 'admin-page',
    supports: {
        className: true,
        align: true,
    },
    edit: function( props ) {
        return el( 'div', 
            { 
                style: { 
                    border: '2px solid #000000', 
                    borderRight: '2px solid #5555ff', 
                    borderBottom: '2px solid #5555ff', 
                    padding: '20px', 
                    color: '#fff', 
                    backgroundColor: '#000080',
                    marginTop: '20px',
                    marginBottom: '20px'
                },
                className: 'wp-block-norton-box-invert'
            },
            el( InnerBlocks, null )
        );
    },
    save: function( props ) {
        return el( 'div', { className: 'norton-box-invert' }, el( InnerBlocks.Content ) );
    },
} );

console.log( 'Registered norton/box-invert' );

// Norton Alert Block
registerBlockType( 'norton/alert', {
    title: 'Norton Alert',
    description: 'An alert box with configurable type',
    category: 'design',
    icon: 'info',
    attributes: {
        type: {
            type: 'string',
            default: 'info',
        },
    },
    supports: {
        className: true,
        align: true,
    },
    edit: function( props ) {
        var attributes = props.attributes;
        var setAttributes = props.setAttributes;
        
        return el( 'div', null,
            el( 'select', {
                value: attributes.type,
                onChange: function( e ) {
                    setAttributes( { type: e.target.value } );
                },
                style: { marginBottom: '10px', padding: '5px', display: 'block', marginTop: '10px' }
            },
                el( 'option', { value: 'info' }, 'Info' ),
                el( 'option', { value: 'success' }, 'Success' ),
                el( 'option', { value: 'error' }, 'Error' )
            ),
            el( 'div', { 
                style: { 
                    border: '2px solid #5555ff', 
                    padding: '20px', 
                    color: '#fff', 
                    backgroundColor: '#000080',
                    marginTop: '10px',
                    marginBottom: '20px'
                },
                className: 'wp-block-norton-alert'
            },
                el( InnerBlocks, null )
            )
        );
    },
    save: function( props ) {
        var attributes = props.attributes;
        return el( 'div', { className: 'norton-alert ' + attributes.type }, el( InnerBlocks.Content ) );
    },
} );

console.log( 'Registered norton/alert' );




