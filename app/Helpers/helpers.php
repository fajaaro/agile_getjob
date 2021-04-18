<?php 

use Illuminate\Support\Facades\Storage;

function uploadImage($image, $model, $folderName) {
	$imageExtension = $image->guessExtension();
    $imageName = $model->id . '-' . (int)microtime(true) . (int)microtime(true) * 2 . '.' . $imageExtension; 
    $imageUrl = Storage::putFileAs($folderName, $image, $imageName);

    return str_replace('%2F', '/', urlencode($imageUrl));
}