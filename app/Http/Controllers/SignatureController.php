<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignatureController extends Controller
{
    public function uploadSignature(Request $request)
    {
        if ($request->hasFile('signature')) {
            // Validate the uploaded file
            $request->validate([
                'signatures' => 'required|mimes:png|max:2048', // Limit to PNG and 2MB
            ]);

            // Store the signature
            $signatureFile = $request->file('signature');
            $signaturePath = $signatureFile->store('signatures', 'public');

            // Return the stored path
            return response()->json(['success' => true, 'path' => $signaturePath]);
        }

        return response()->json(['success' => false, 'message' => 'No file uploaded'], 400);
    }
}
