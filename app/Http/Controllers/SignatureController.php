<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignatureController extends Controller
{
    public function storeSignature($dataUrl, $type)
    {
        if (!$dataUrl || !str_contains($dataUrl, 'data:image')) {
            return null; // No valid signature data provided
        }

        $folderPath = storage_path('app/public/personnelSign/');
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0755, true);
        }

        $imageParts = explode(";base64,", $dataUrl);
        if (count($imageParts) < 2) {
            return null; // Invalid data URL
        }

        $imageTypeAux = explode("image/", $imageParts[0]);
        $imageType = $imageTypeAux[1] ?? 'png'; // Default to 'png' if type is missing
        $imageBase64 = base64_decode($imageParts[1]);

        // Generate a unique file name based on the current timestamp
        $fileName = $type . '_' . time() . '.' . $imageType;
        $filePath = $folderPath . $fileName;

        // Store the image file in the storage path
        file_put_contents($filePath, $imageBase64);

        return 'personnelSign/' . $fileName; // Return the relative path for storage
    }
}
