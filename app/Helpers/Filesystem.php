<?php

namespace App\Helpers;

class Filesystem
{
	static function upload($file){
		$path = '/fotos';
		$nombre = $file->getClientOriginalName();
		if ($file->move(public_path().$path, $nombre)) {
			return $path .= '/' .$nombre;
		}
		return $path = false;
	}
}