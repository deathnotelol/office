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
        // $personnels = Personnel::all();
        return view('pages.personnelData.index');
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

    public function store(\Illuminate\Http\Request $request)
    {
        try {
            Log::info('Store method started.', ['request_data' => $request->all()]);

            // Get all data from the request
            $data = $request->all();
            Log::info('Received Data:', $data);

            // Create personnel record
            $personnel = PersonnelData::create($data);
            Log::info('Personnel data created.', ['personnel' => $personnel]);

            if (!$personnel) {
                Log::error('Personnel creation failed.');
                return redirect()->back()->with('error', 'Personnel creation failed.');
            }

            // Save signature if provided
            if ($request->filled('personnelSign')) {
                Log::info('Saving signature.');
                $signaturePath = $this->signatureController->storeSignature($request->personnelSign, 'signature');
                Log::info('Signature saved.', ['path' => $signaturePath]);
                $personnel->update(['personnelSign' => $signaturePath]);
            }

            // Process and insert dynamic details for each section
            $this->processDynamicFields($request, $personnel);

            Log::info('Personnel data stored successfully.');

            return redirect(route('personnel.index'))->with('success', 'Personnel data created successfully.');
        } catch (\Exception $e) {
            Log::error('Error storing personnel data.', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Failed to create personnel data.');
        }
    }

    protected function processDynamicFields($request, $personnel)
    {
        try {
            Log::info('Processing dynamic fields.', ['request_data' => $request->all()]);

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


    
}
