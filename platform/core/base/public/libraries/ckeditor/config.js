/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */



CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
    config.language = 'ja';
	// config.uiColor = '#AADC6E';
    // config.extraPlugins = 'image2';
	config.removePlugins = 'image2';
	config.allowedContent = true;
    // CKEDITOR.config.extraPlugins = 'image2';
	config.extraPlugins = 'powrformbuilder';
	//config.removePlugins = 'iframe';
};
