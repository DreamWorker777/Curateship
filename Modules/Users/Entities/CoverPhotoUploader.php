<?php

namespace Modules\Users\Entities;

use Image;
use Illuminate\Database\Eloquent\Model;

class CoverPhotoUploader extends Model
{

	public $file_name;

	public function uploadBase64Photo($base64_image, $server_path)
	{
		$image = Image::make($base64_image);

		// File details
		$extension = explode('/', mime_content_type($base64_image))[1];
		$name = md5(uniqid()) . time() . '.' . $extension; // as6d57a9sd7a5sd67856a9s.jpg

		if ( ! file_exists(base_path() . "/" . $server_path)) {
			mkdir(base_path() . "/" . $server_path);
		}

		// Temp details
		$key = md5(uniqid());
		$tmp_file_name = "{$key}.{$extension}"; // et7e98r7t9e79rt9e098g9e0.jpg
		$tmp_file_path = base_path() . "/" . $server_path . '/'. $tmp_file_name; // Server path
		
		$image->resize(800, 800, function($constraint){
			$constraint->aspectRatio();
			$constraint->upsize();
		});

		// Upload image to filesystem
		$image->save($tmp_file_path);

		// Set the protected $file_name
		$this->file_name = $tmp_file_name;

		return $this;
	}

}
