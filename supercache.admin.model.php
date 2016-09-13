<?php

/**
 * Super Cache module: admin model class
 * 
 * Copyright (c) 2016 Kijin Sung <kijin@kijinsung.com>
 * All rights reserved.
 */
class SuperCacheAdminModel extends SuperCache
{
	/**
	 * Check if the current version of XE supports board list replacement.
	 */
	public function isBoardListReplacementSupported()
	{
		if (version_compare(__XE_VERSION__, '1.8.25', '>='))
		{
			return 1;
		}
		
		$document_model_filename = _XE_PATH_ . 'modules/document/document.model.php';
		$document_model_checkstr = '$obj->use_alternate_output';
		if (file_exists($document_model_filename) && strpos(file_get_contents($document_model_filename), $document_model_checkstr) !== false)
		{
			return 2;
		}
		
		return false;
	}
}
