<?php
/**
* This is common model class that used to store
* most of common use code
*
* @package Model
* @author Arjun Sunar<arjunkoid@gmail.com>
* @license http://codersblog.herokuapp.com
*/
class Common
{
	
	public function __construct()
	{
		// code...
	}

	public static function uploadFile()
	{
		//Check file is uploaded of not
		if (Input::hasFile('image'))
		{
		    $file = Input::file('image');
		    $fileName = $file->getFilename() . '.' .$file->getClientOriginalExtension();
		    $file->move(public_path().'/uploads/', $fileName);
		    $input['image'] = $fileName;
		}
	}
}