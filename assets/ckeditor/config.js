/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
	// CKFinder //
	/*config.filebrowserBrowseUrl = 'http://localhost/adminpanel_webdepilkomupi/assets/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = 'http://localhost/adminpanel_webdepilkomupi/assets/ckfinder/ckfinder.html?type=Images';
	config.filebrowserFlashBrowseUrl = 'http://localhost/adminpanel_webdepilkomupi/assets/ckfinder/ckfinder.html?type=Flash';
	config.filebrowserUploadUrl = 'http://localhost/adminpanel_webdepilkomupi/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = 'http://localhost/adminpanel_webdepilkomupi/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = 'http://localhost/adminpanel_webdepilkomupi/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';*/
	
	// KCFinder //
	config.filebrowserBrowseUrl = 'http://localhost/webdepilkomupi/assets/kcfinder/browse.php?type=files';
	config.filebrowserImageBrowseUrl = 'http://localhost/webdepilkomupi/assets/kcfinder/browse.php?type=images';
	config.filebrowserFlashBrowseUrl = 'http://localhost/webdepilkomupi/assets/kcfinder/browse.php?type=flash';
	config.filebrowserUploadUrl = 'http://localhost/webdepilkomupi/assets/kcfinder/upload.php?type=files';
	config.filebrowserImageUploadUrl = 'http://localhost/webdepilkomupi/assets/kcfinder/upload.php?type=images';
	config.filebrowserFlashUploadUrl = 'http://localhost/webdepilkomupi/assets/kcfinder/upload.php?type=flash';
};
