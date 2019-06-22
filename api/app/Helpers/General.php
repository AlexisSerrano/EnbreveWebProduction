<?php
use Illuminate\Support\Facades\Storage;

function upImage($imagen,$carpeta,$anchos,$imagenOld='',$imagencrop=''){
	if(is_array($anchos)){
		$random = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 40);
		if($imagenOld!=''){
			$partes = explode(".", $imagenOld);
			$nombreOld = $partes[0];
		}
		foreach ($anchos as $ancho) {
			$nombre = $random."_".$ancho.".jpg";
			if($imagencrop!=''){
				if($ancho==900){
					$imagePath = $imagen->storeAs($carpeta,$nombre);
				}
				else{
					$imagePath = $imagencrop->storeAs($carpeta,$nombre);
				}
			}
			else{
				$imagePath = $imagen->storeAs($carpeta,$nombre);
			}
			$image = Image::make(Storage::get($imagePath))->widen($ancho, function ($constraint) {
				$constraint->upsize();
			})->encode(null,50);
			Storage::put($imagePath,$image);
			if($imagenOld!=''){
				Storage::delete($nombreOld."_".$ancho.".jpg");
			}
		}
		return $carpeta."/".$random.".jpg";
	}
	else{
		$imagePath = $imagen->store($carpeta);
		$image = Image::make(Storage::get($imagePath))->widen($anchos, function ($constraint) {
			$constraint->upsize();
		})->encode(null,50);
		Storage::put($imagePath,$image);
		if($imagenOld!=''){
			Storage::delete($imagenOld);
		}
		return $imagePath;
	}
}