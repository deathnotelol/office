<?php

namespace App\Http\Controllers;

use App\Models\PersonnelData;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\PersonnelRequest;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\SignatureController;

class PersonnelDataController extends Controller
{
    protected $signatureController;
    public function __construct(SignatureController $signatureController)
    {
        $this->signatureController = $signatureController;
    }

    public function index()
    {
        $personnels = PersonnelData::get();
        return view('pages.personnelData.index', compact('personnels'));
    }

    public function create()
    {
        return view('pages.personnelData.create');
    }

    // Store method
    // public function store(PersonnelRequest $request)
    // {
    //     try {
    //         Log::info('Store method started.', ['request_data' => $request->all()]);

    //         // Validate the request
    //         $validatedData = $request->validated();
    //         Log::info('Validated Data:', $validatedData);

    //         // Create personnel record
    //         $personnel = PersonnelData::create($validatedData);
    //         Log::info('Personnel data created.', ['personnel' => $personnel]);

    //         if (!$personnel) {
    //             Log::error('Personnel creation failed.');
    //             return redirect()->back()->with('error', 'Personnel creation failed.');
    //         }

    //         // Save signature if provided
    //         if ($request->filled('personnelSign')) {
    //             Log::info('Saving signature.');
    //             $signaturePath = $this->signatureController->storeSignature($request->personnelSign, 'signature');
    //             Log::info('Signature saved.', ['path' => $signaturePath]);
    //             $personnel->update(['personnelSign' => $signaturePath]);
    //         }

    //         // Insert personnel details if available
    //         if ($request->has('details')) {
    //             foreach ($request->details as $detail) {
    //                 Log::info('Saving detail:', ['detail' => $detail]);
    //                 $personnel->details()->create($detail);
    //             }
    //         }

    //         Log::info('Personnel data stored successfully.');

    //         return redirect(route('personnel.index'))->with('success', 'Personnel data created successfully.');
    //     } catch (\Exception $e) {
    //         Log::error('Error storing personnel data.', ['error' => $e->getMessage()]);
    //         return redirect()->back()->with('error', 'Failed to create personnel data.');
    //     }
    // }


    // Store method
    public function store(\Illuminate\Http\Request $request)
    {
        try {

            // Get all data from the request
            $data = $request->all();


            // Handle profile image upload
            if ($request->hasFile('profileImage')) { 
                foreach ($request->file('profileImage') as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $folderPath = storage_path('app/public/profile_image');
            
                    if (!file_exists($folderPath)) {
                        mkdir($folderPath, 0777, true);
                    }
            
                    $image->move($folderPath, $imageName);
                    $data['profileImages'][] = 'storage/profile_image/' . $imageName;
                }
            }
            
            if ($request->hasFile('wifeimage')) { 
                foreach ($request->file('wifeimage') as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $folderPath = storage_path('app/public/wife_image');
            
                    if (!file_exists($folderPath)) {
                        mkdir($folderPath, 0777, true);
                    }
            
                    $image->move($folderPath, $imageName);
                    $data['wifeImages'][] = 'storage/wife_image/' . $imageName;
                }
            }

            // Create personnel record
            $personnel = PersonnelData::create($data);

            if (!$personnel) {
                Log::error('Personnel creation failed.');
                return redirect()->back()->with('error', 'Personnel creation failed.');
            }

            // Save signature if provided
            if ($request->filled('personnelSign')) {
                $signaturePath = $this->signatureController->storeSignature($request->personnelSign, 'signature');
                $personnel->update(['personnelSign' => $signaturePath]);
            }

            // Process and insert dynamic details for each section
            $this->processDynamicFields($request, $personnel);

            return redirect(route('personnel.index'))->with('success', 'Personnel data created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create personnel data.');
        }
    }

    public function show($id)
    {
        $personnels = PersonnelData::with('military', 'inheritance', 'children', 'medals', 'crimes', 'services', 'trainingInter', 'trainingOuter')->findOrFail($id);

        return view('pages.personnelData.show', compact('personnels'));
    }

    public function edit($id)
    {
        $personnels = PersonnelData::with('military', 'inheritance', 'children', 'medals', 'crimes', 'services', 'trainingInter', 'trainingOuter')->findOrFail($id);

        return view('pages.personnelData.edit', compact('personnels'));
    }

    public function update(\Illuminate\Http\Request $request, $id)
    {
        try {
            // Find personnel by ID
            $personnel = PersonnelData::findOrFail($id);

            // Get all data from the request
            $data = $request->all();
            // except(['_token', '_method']);

            // Handle profile image upload
            if ($request->hasFile('profileImage')) {

                $image = $request->file('profileImage');

                // Create the folder if it does not exist
                $folderPath = storage_path('app/public/profile_image');
                if (!file_exists($folderPath)) {
                    mkdir($folderPath, 0777, true);
                }

                // Generate a unique name for the image
                $imageName = time() . '_' . $image->getClientOriginalName();

                // Store the image in the public/profile_image directory
                $image->move($folderPath, $imageName);

                // Store the new image path in the data array
                $data['profileImage'] = 'storage/profile_image/' . $imageName;

                // Delete the old image if it exists
                if ($personnel->profileImage && file_exists(storage_path('app/public/' . str_replace('storage/', '', $personnel->profileImage)))) {
                    unlink(storage_path('app/public/' . str_replace('storage/', '', $personnel->profileImage)));
                }
            }

            //Handle wife image 
            if ($request->hasFile('wifeimage')) {

                $image = $request->file('wifeimage');

                // Create the folder if it does not exist
                $folderPath = storage_path('app/public/wife_image');
                if (!file_exists($folderPath)) {
                    mkdir($folderPath, 0777, true);
                }

                // Generate a unique name for the image
                $imageName = time() . '_' . $image->getClientOriginalName();

                // Store the image in the public/profile_image directory
                $image->move($folderPath, $imageName);

                // Store the new image path in the data array
                $data['wifeimage'] = 'storage/wife_image/' . $imageName;

                // Delete the old image if it exists
                if ($personnel->wifeimage && file_exists(storage_path('app/public/' . str_replace('storage/', '', $personnel->wifeimage)))) {
                    unlink(storage_path('app/public/' . str_replace('storage/', '', $personnel->wifeimage)));
                }
            }

            // Update personnel data
            $personnel->update($data);

            // Retrieve the personnel record
            $personnel = PersonnelData::find($request->id);

            if (!$personnel) {
                return response()->json(['error' => 'Personnel not found'], 404);
            }

            // Retrieve old signature from database
            $oldSignature = $personnel->personnelSign;

            // Debugging: Log the old signature path
            Log::info('Old Signature Path:', ['path' => $oldSignature]);

            // Default to old signature unless a new one is provided
            $signaturePath = $oldSignature;

            // Check if a new signature is provided
            if ($request->filled('personnelSign')) {
                $personnelSign = $request->personnelSign;

                // If the new signature is a base64-encoded image, store it
                if (str_contains($personnelSign, 'data:image')) {
                    Log::info('Saving new signature.');
                    $signaturePath = $this->signatureController->storeSignature($personnelSign, 'signature');
                    Log::info('New signature saved.', ['path' => $signaturePath]);
                } else {
                    // If it's a URL (existing signature), use it as is
                    Log::info('No new signature provided, keeping the old one.');
                    $signaturePath = $personnelSign;
                }
            }

            // Update personnel record with new or old signature
            $personnel->update(['personnelSign' => $signaturePath]);


            // Update dynamic fields
            $this->updateDynamicFields($request, $personnel);

            return redirect(route('personnel.index'))->with('success', 'Personnel data updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update personnel data.');
        }
    }


    public function destroy($id)
    {
        // Find the case file by ID
        $personnel = PersonnelData::findOrFail($id);

        // Delete the case file
        $personnel->delete();

        // Redirect to the index page with a success message
        return redirect()->route('personnel.index')
            ->with('success', 'Personnel data deleted successfully!');
    }


    //Handle personnelDetial data fill 
    protected function processDynamicFields($request, $personnel)
    {
        try {

            //တပ်မတော်သား(သို့မဟုတ်) အခြားဝန်ကြီးဌာန/ အဖွဲ့အစည်းမှ ကူးပြောင်းလာပါက
            if ($request->has('srcNo')) {
                foreach ($request->srcNo as $key => $value) {
                    $personnel->Military()->create([
                        'srcNo' => $request->srcNo[$key],
                        'personalNo' => $request->personalNo[$key],
                        'cadetTrainingNo' => $request->cadetTrainingNo[$key],
                        'outOfReason' => $request->outOfReason[$key],
                        'servedArmies' => $request->servedArmies[$key],
                        'caseAndPunishment' => $request->caseAndPunishment[$key],
                    ]);
                }
            }

            // Handling inherited data fields
            if ($request->has('inheriNo')) {
                foreach ($request->inheriNo as $key => $value) {
                    $personnel->Inheritance()->create([
                        'inheriNo' => $request->inheriNo[$key],
                        'inheriName' => $request->inheriName[$key],
                        'inheriRelation' => $request->inheriRelation[$key],
                        'inheriAddress' => $request->inheriAddress[$key],
                        'inheriRemark' => $request->inheriRemark[$key],
                    ]);
                }
            }

            // Handling child fields
            if ($request->has('childNo')) {
                foreach ($request->childNo as $key => $value) {
                    $personnel->Children()->create([
                        'childNo' => $request->childNo[$key],
                        'childName' => $request->childName[$key],
                        'childDob' => $request->childDob[$key],
                        'childAge' => $request->childAge[$key],
                        'childOccupation' => $request->childOccupation[$key],
                        'childAddress' => $request->childAddress[$key],
                    ]);
                }
            }

            // Handling medal fields
            if ($request->has('medalNo')) {
                foreach ($request->medalNo as $key => $value) {
                    $personnel->Medals()->create([
                        'medalNo' => $request->medalNo[$key],
                        'medalName' => $request->medalName[$key],
                    ]);
                }
            }

            // Handling crime fields
            if ($request->has('crimeNo')) {
                foreach ($request->crimeNo as $key => $value) {
                    $personnel->Crimes()->create([
                        'crimeNo' => $request->crimeNo[$key],
                        'crimeName' => $request->crimeName[$key],
                        'punishment' => $request->punishment[$key],
                        'crimeDate' => $request->crimeDate[$key],
                        'crimeRemark' => $request->crimeRemark[$key],
                    ]);
                }
            }

            // Handling served duty fields
            if ($request->has('servedNo')) {
                foreach ($request->servedNo as $key => $value) {
                    $personnel->Services()->create([
                        'servedNo' => $request->servedNo[$key],
                        'servedRank' => $request->servedRank[$key],
                        'servedPlace' => $request->servedPlace[$key],
                        'servedPeriodFrom' => $request->servedPeriodFrom[$key],
                        'servedPeriodTo' => $request->servedPeriodTo[$key],
                        'servedRemark' => $request->servedRemark[$key],
                    ]);
                }
            }

            // Handling training outer fields
            if ($request->has('traningInterNo')) {
                foreach ($request->traningInterNo as $key => $value) {
                    $personnel->TrainingInter()->create([
                        'traningInterNo' => $request->traningInterNo[$key],
                        'traningInterName' => $request->traningInterName[$key],
                        'traningInterPeriodFrom' => $request->traningInterPeriodFrom[$key],
                        'traningInterPeriodTo' => $request->traningInterPeriodTo[$key],
                    ]);
                }
            }

            // Handling training outer fields
            if ($request->has('traningOuterNo')) {
                foreach ($request->traningOuterNo as $key => $value) {
                    $personnel->TrainingOuter()->create([
                        'traningOuterNo' => $request->traningOuterNo[$key],
                        'traningOuterName' => $request->traningOuterName[$key],
                        'traningOuterPeriodFrom' => $request->traningOuterPeriodFrom[$key],
                        'traningOuterPeriodTo' => $request->traningOuterPeriodTo[$key],
                    ]);
                }
            }

            Log::info('Dynamic fields processed successfully.');
        } catch (\Exception $e) {
            Log::error('Error processing dynamic fields.', ['error' => $e->getMessage()]);
        }
    }

    protected function updateDynamicFields($request, $personnel)
    {
        try {
            // Update Military records
            if ($request->has('srcNo')) {
                foreach ($request->srcNo as $key => $value) {
                    $militaryId = $request->military_id[$key] ?? null;
                    $deleteFlag = $request->delete_military[$key] ?? 0;

                    if ($deleteFlag == 1 && $militaryId) {
                        $personnel->Military()->where('id', $militaryId)->delete();
                        continue;
                    }

                    if (!empty($value)) {
                        $personnel->Military()->updateOrCreate(
                            ['id' => $militaryId],
                            [
                                'srcNo' => $value,
                                'personalNo' => $request->personalNo[$key],
                                'cadetTrainingNo' => $request->cadetTrainingNo[$key],
                                'outOfReason' => $request->outOfReason[$key],
                                'servedArmies' => $request->servedArmies[$key],
                                'caseAndPunishment' => $request->caseAndPunishment[$key],
                            ]
                        );
                    }
                }
            }

            // Update Inheritance records
            if ($request->has('inheriNo')) {
                foreach ($request->inheriNo as $key => $value) {
                    $inheritanceId = $request->inheritance_id[$key] ?? null;
                    $deleteFlag = $request->delete_inheritance[$key] ?? 0;

                    if ($deleteFlag == 1 && $inheritanceId) {
                        $personnel->Inheritance()->where('id', $inheritanceId)->delete();
                        continue;
                    }

                    if (!empty($value)) {
                        $personnel->Inheritance()->updateOrCreate(
                            ['id' => $inheritanceId],
                            [
                                'inheriNo' => $value,
                                'inheriName' => $request->inheriName[$key],
                                'inheriRelation' => $request->inheriRelation[$key],
                                'inheriAddress' => $request->inheriAddress[$key],
                                'inheriRemark' => $request->inheriRemark[$key],
                            ]
                        );
                    }
                }
            }

            // Update Children records
            if ($request->has('childNo')) {
                foreach ($request->childNo as $key => $value) {
                    $childId = $request->child_id[$key] ?? null;
                    $deleteFlag = $request->delete_child[$key] ?? 0;

                    if ($deleteFlag == 1 && $childId) {
                        $personnel->Children()->where('id', $childId)->delete();
                        continue;
                    }

                    if (!empty($value)) {
                        $personnel->Children()->updateOrCreate(
                            ['id' => $childId],
                            [
                                'childNo' => $value,
                                'childName' => $request->childName[$key],
                                'childDob' => $request->childDob[$key],
                                'childAge' => $request->childAge[$key],
                                'childOccupation' => $request->childOccupation[$key],
                                'childAddress' => $request->childAddress[$key],
                            ]
                        );
                    }
                }
            }

            // Update Medals records
            if ($request->has('medalNo')) {
                foreach ($request->medalNo as $key => $value) {
                    $medalId = $request->medal_id[$key] ?? null;
                    $deleteFlag = $request->delete_medal[$key] ?? 0;

                    if ($deleteFlag == 1 && $medalId) {
                        $personnel->Medals()->where('id', $medalId)->delete();
                        continue;
                    }

                    if (!empty($value)) {
                        $personnel->Medals()->updateOrCreate(
                            ['id' => $medalId],
                            [
                                'medalNo' => $value,
                                'medalName' => $request->medalName[$key],
                            ]
                        );
                    }
                }
            }

            // Update Crime records
            if ($request->has('crimeNo')) {
                foreach ($request->crimeNo as $key => $value) {
                    $crimeId = $request->crime_id[$key] ?? null;
                    $deleteFlag = $request->delete_crime[$key] ?? 0;

                    if ($deleteFlag == 1 && $crimeId) {
                        $personnel->Crimes()->where('id', $crimeId)->delete();
                        continue;
                    }

                    if (!empty($value)) {
                        $personnel->Crimes()->updateOrCreate(
                            ['id' => $crimeId],
                            [
                                'crimeNo' => $value,
                                'crimeName' => $request->crimeName[$key],
                                'punishment' => $request->punishment[$key],
                                'crimeDate' => $request->crimeDate[$key],
                                'crimeRemark' => $request->crimeRemark[$key],
                            ]
                        );
                    }
                }
            }

            //Handle Service record
            if ($request->has('servedNo')) {
                foreach ($request->servedNo as $key => $value) {
                    $serviceId = $request->service_id[$key] ?? null;
                    $deleteFlag = $request->delete_service[$key] ?? 0;

                    // If marked for deletion, remove from DB
                    if ($deleteFlag == 1 && $serviceId) {
                        $personnel->Services()->where('id', $serviceId)->delete();
                        continue;
                    }

                    // If not empty, update or create record
                    if (!empty($value) || !empty($request->servedRank[$key]) || !empty($request->servedPlace[$key])) {
                        $personnel->Services()->updateOrCreate(
                            ['id' => $serviceId],
                            [
                                'servedNo' => $value,
                                'servedRank' => $request->servedRank[$key],
                                'servedPlace' => $request->servedPlace[$key],
                                'servedPeriodFrom' => $request->servedPeriodFrom[$key],
                                'servedPeriodTo' => $request->servedPeriodTo[$key],
                                'servedRemark' => $request->servedRemark[$key],
                            ]
                        );
                    }
                }
            }

            // Update Training International records
            if ($request->has('traningInterNo')) {
                foreach ($request->traningInterNo as $key => $value) {
                    $trainingInterId = $request->trainingInter_id[$key] ?? null;
                    $deleteFlag = $request->delete_trainingInter[$key] ?? 0;

                    if ($deleteFlag == 1 && $trainingInterId) {
                        $personnel->TrainingInter()->where('id', $trainingInterId)->delete();
                        continue;
                    }

                    if (!empty($value)) {
                        $personnel->TrainingInter()->updateOrCreate(
                            ['id' => $trainingInterId],
                            [
                                'traningInterNo' => $value,
                                'traningInterName' => $request->traningInterName[$key],
                                'traningInterPeriodFrom' => $request->traningInterPeriodFrom[$key],
                                'traningInterPeriodTo' => $request->traningInterPeriodTo[$key],
                            ]
                        );
                    }
                }
            }

            // Update Training Outer records
            if ($request->has('traningOuterNo')) {
                foreach ($request->traningOuterNo as $key => $value) {
                    $trainingOuterId = $request->trainingOuter_id[$key] ?? null;
                    $deleteFlag = $request->delete_trainingOuter[$key] ?? 0;

                    if ($deleteFlag == 1 && $trainingOuterId) {
                        $personnel->TrainingOuter()->where('id', $trainingOuterId)->delete();
                        continue;
                    }

                    if (!empty($value)) {
                        $personnel->TrainingOuter()->updateOrCreate(
                            ['id' => $trainingOuterId],
                            [
                                'traningOuterNo' => $value,
                                'traningOuterName' => $request->traningOuterName[$key],
                                'traningOuterPeriodFrom' => $request->traningOuterPeriodFrom[$key],
                                'traningOuterPeriodTo' => $request->traningOuterPeriodTo[$key],
                            ]
                        );
                    }
                }
            }

            Log::info('Dynamic fields updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating dynamic fields.', ['error' => $e->getMessage()]);
        }
    }
}
