<?php

namespace App\Http\Controllers;


use App\Models\DutyReport;
use Illuminate\Http\Request;
use App\Models\TemporaryDutyReport;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;


class DutyReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view report', ['only' => ['index', 'show']]);
        $this->middleware('permission:create report', ['only' => ['create', 'store']]);
        $this->middleware('permission:update report', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete report', ['only' => ['destroy']]);

    }

    /**
     * Display a listing of the duty reports.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        // Retrieve submitted duty reports with pagination
        $reports = DutyReport::orderBy('reciveDate', 'desc')->paginate(10);

        // Retrieve temporary duty reports
        $temporaryReports = TemporaryDutyReport::orderBy('created_at', 'desc')->get();
        // Pass both datasets to the view
        return view(
            'pages.dutyreport.index',
            compact('reports', 'temporaryReports')
        );
    }


    /**
     * Display the specified duty report.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        // Find the report by ID
        $report = DutyReport::findOrFail($id);
        // Return a view with the report details
        return view('pages.dutyreport.show', compact('report'));
    }

    public function create(): View
    {
        // Return a view with the report details for editing
        return view('pages.dutyreport.create');
    }


    /**
     * Remove the specified duty report from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Staff role section start

    public function store(Request $request)
    {
        $role = Auth::user()->getRoleNames()->first(); // Assuming you're using Spatie Roles

        switch ($role) {
            case 'staff':
                return $this->storeStaff($request);
            default:
                abort(403, 'Unauthorized action.');
        }
    }

    public function storeStaff(Request $request)
    {

        $validatedData = $request->validate([
            'reciverName' => 'required|string|max:255',
            'reciverNumber' => 'required|string|max:255',
            'reciverRank' => 'required|string|max:255',
            'fromTransferName' => 'required|string|max:255',
            'fromTransferNumber' => 'required|string|max:255',
            'fromTransferRank' => 'required|string|max:255',
            'reciveDate' => 'required|date',
            'hasPermanentStaff' => 'required|integer',
            'hasAssociateStaff' => 'required|integer',
            'totalStaff' => 'required|integer',
            'attenPermanentStaff' => 'required|integer',
            'attenAssociateStaff' => 'required|integer',
            'attenTotalStaff' => 'required|integer',
            'absentPermanentStaff' => 'required|integer',
            'absentAssociateStaff' => 'required|integer',
            'absentTotalStaff' => 'required|integer',
            'absentReson' => 'nullable|string',
            'inLetter' => 'required|integer',
            'outLetter' => 'required|integer',
            'edmsInLetter' => 'required|integer',
            'edmsOutLetter' => 'required|integer',
            'gmailInLetter' => 'required|integer',
            'gmailOutLetter' => 'required|integer',
            'intMonitoringNewsCount' => 'required|integer',
            'intMonitoringNewsPaperCount' => 'required|integer',
            'dailyNewsMM' => 'required|integer',
            'dailyNewsEng' => 'required|integer',
            'drugNews' => 'required|integer',
            'tenderWeb' => 'required|integer',
            'mohaNewsPaper' => 'required|integer',
            'mpfInformation' => 'required|integer',
            'fromDeptFour' => 'required|integer',
            'announcement' => 'required|integer',
            'MNPDailyNewsMM' => 'required|integer',
            'MNPDailyNewsEng' => 'required|integer',
            'MNPDrugNews' => 'required|integer',
            'tenderMNP' => 'required|integer',
            'MNPMohaNewPaper' => 'required|integer',
            'MNPMpfInformation' => 'required|integer',
            'MNPFromDeptFour' => 'required|integer',
            'MNPAnnouncement' => 'required|integer',
            'remarkForNews' => 'nullable|string',
            'cctvStatus' => 'nullable|string',
            'rackServerStatus' => 'nullable|string',
            'desktopGood' => 'required|integer',
            'desktopBad' => 'required|integer',
            'laptopGood' => 'required|integer',
            'laptopBad' => 'required|integer',
            'printerGood' => 'required|integer',
            'printerBad' => 'required|integer',
            'copierGood' => 'required|integer',
            'copierBad' => 'required|integer',
            'scannerGood' => 'required|integer',
            'scannerBad' => 'required|integer',
            'descOfEquipment' => 'nullable|string',
            'deptOtherReport' => 'nullable|string',
            'staffReporting' => 'nullable|string',
            'offDayCheckForStaff' => 'nullable|string',
        ]);
        $userId = Auth::user()->id;
        if (!$userId) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

       TemporaryDutyReport::create([
            'user_id' => $userId,
            'data' => json_encode($validatedData),
            'is_completed' => false,
            'role_stage' => 'initial', // Provide an appropriate value
            'reciverName' => $request->reciverName,
            'reciverNumber' => $request->reciverNumber,
            'reciverRank' => $request->reciverRank,
            'fromTransferName' => $request->fromTransferName,
            'fromTransferNumber' => $request->fromTransferNumber,
            'fromTransferRank' => $request->fromTransferRank,
            'reciveDate' => $request->reciveDate,
            'hasPermanentStaff' => $request->hasPermanentStaff,
            'hasAssociateStaff' => $request->hasAssociateStaff,
            'totalStaff' => $request->totalStaff,
            'attenPermanentStaff' => $request->attenPermanentStaff,
            'attenAssociateStaff' => $request->attenAssociateStaff,
            'attenTotalStaff' => $request->attenTotalStaff,
            'absentPermanentStaff' => $request->absentPermanentStaff,
            'absentAssociateStaff' => $request->absentAssociateStaff,
            'absentTotalStaff' => $request->absentTotalStaff,
            'absentReson' => $request->absentReson,
            'inLetter' => $request->inLetter,
            'outLetter' => $request->outLetter,
            'edmsInLetter' => $request->edmsInLetter,
            'edmsOutLetter' => $request->edmsOutLetter,
            'gmailInLetter' => $request->gmailInLetter,
            'gmailOutLetter' => $request->gmailOutLetter,
            'intMonitoringNewsCount' => $request->intMonitoringNewsCount,
            'intMonitoringNewsPaperCount' => $request->intMonitoringNewsPaperCount,
            'dailyNewsMM' => $request->dailyNewsMM,
            'dailyNewsEng' => $request->dailyNewsEng,
            'drugNews' => $request->drugNews,
            'tenderWeb' => $request->tenderWeb,
            'mohaNewsPaper' => $request->mohaNewsPaper,
            'mpfInformation' => $request->mpfInformation,
            'fromDeptFour' => $request->fromDeptFour,
            'announcement' => $request->announcement,
            'MNPDailyNewsMM' => $request->MNPDailyNewsMM,
            'MNPDailyNewsEng' => $request->MNPDailyNewsEng,
            'MNPDrugNews' => $request->MNPDrugNews,
            'tenderMNP' => $request->tenderMNP,
            'MNPMohaNewPaper' => $request->MNPMohaNewPaper,
            'MNPMpfInformation' => $request->MNPMpfInformation,
            'MNPFromDeptFour' => $request->MNPFromDeptFour,
            'MNPAnnouncement' => $request->MNPAnnouncement,
            'remarkForNews' => $request->remarkForNews,
            'cctvStatus' => $request->cctvStatus,
            'rackServerStatus' => $request->rackServerStatus,
            'desktopGood' => $request->desktopGood,
            'desktopBad' => $request->desktopBad,
            'laptopGood' => $request->laptopGood,
            'laptopBad' => $request->laptopBad,
            'printerGood' => $request->printerGood,
            'printerBad' => $request->printerBad,
            'copierGood' => $request->copierGood,
            'copierBad' => $request->copierBad,
            'scannerGood' => $request->scannerGood,
            'scannerBad' => $request->scannerBad,
            'descOfEquipment' => $request->descOfEquipment,
            'deptOtherReport' => $request->deptOtherReport,
            'staffReporting' => $request->staffReporting,
            'offDayCheckForStaff' => $request->offDayCheckForStaff,
        ]);

        //notification
        $userName = Auth::user()->name;
        $message = "A new Duty Report has been created by '{$userName}'.";
        $url = route('pages.dutyreport.index');

        // Using the NotificationController to send notification
        NotificationController::sendNotificationToOfficer($message, $url);

        return redirect('/dutyreport')->with('success', 'Data temporarily saved.');
    }

    //Staff role section end

    //Officer role transfer section start
    public function editTransfer($id)
    {

        $temporaryReports = TemporaryDutyReport::findOrFail($id);

        return view('pages.dutyreport.editTransfer', compact('temporaryReports'));
    }


    public function updateTransfer(Request $request, $id)
    {
        $userId = Auth::user()->id;
        // Fetch the report
        $report = TemporaryDutyReport::find($id);

        if (!$report) {
            return redirect('/dutyreport')->with('error', 'Duty Report not found.');
        }

        // Fetch yesterday's duty report
        $yesterdayReport = DutyReport::whereDate('created_at', now()->subDay()->toDateString())->first();

        // Check if yesterday's report exists and validate user's role
        if ($yesterdayReport) {
            $currentUserId = $userId;

            // Check if the current user was a transfer user yesterday
            if ($yesterdayReport->transfer_user_id === $currentUserId) {
                return redirect('/dutyreport')->with('error', 'You were a transfer user yesterday and cannot act as a receiver today.');
            }
        }

        // Validate the input
        $rules = $this->getValidationRules();
        $validatedData = $request->validate($rules);


        // Handle transfer signature if provided
        $transferSignaturePath = null;
        if ($request->filled('transferSignature')) {
            $transferSignaturePath = $this->storeSignature(
                $request->input('transferSignature'),
                preg_replace('/\s+/', '_', Auth::user()->name) // Replace spaces in the user name with underscores
            );

            if ($transferSignaturePath) {
                // Update or create the user's transfer signature
                Auth::user()->signatures()->updateOrCreate(
                    ['signature_name' => Auth::user()->name],
                    ['image_path' => $transferSignaturePath]
                );
            }
        }
        $transferSignature = Auth::user()->signatures()->first();

        // Update the report
        $report->update(array_merge($validatedData, [
            'transferSignature' => $transferSignature->image_path,
            'user_id' => $userId,
            'role_stage' => 'officer_role',
            'transfer_user_id' => $userId,
        ]));

         //notification
         $userName = Auth::user()->name;
         $message = "A Duty Report has been Transfer by '{$userName}'.";
         $url = route('pages.dutyreport.index');
 
         // Using the NotificationController to send notification
         NotificationController::sendNotificationToOfficer($message, $url);
 

        return redirect('/dutyreport')->with('success', 'Duty Report was updated by the officer.');
    }

    //Officer role transfer section end

    //Officer role receiver section start
    public function editReceiver($id)
    {

        $temporaryReports = TemporaryDutyReport::findOrFail($id);

        return view('pages.dutyreport.editReceiver', compact('temporaryReports'));
    }

    public function updateReceiver(Request $request, $id)
    {

        $userId = Auth::user()->id;
        // Fetch the report
        $report = TemporaryDutyReport::find($id);

        $yesterdayReport = DutyReport::whereDate('created_at', now()->subDay()->toDateString())->first();

        // Check if yesterday's report exists and validate user's role
        if ($yesterdayReport) {
            $currentUserId = $userId;

            // Check if the current user was a receiver yesterday
            if ($yesterdayReport->receiver_user_id === $currentUserId) {
                return redirect('/dutyreport')->with('error', 'You were a receiver yesterday and cannot act as a transfer user today.');
            }
        }

        // Fetch validation rules dynamically
        $rules = $this->getValidationRules();
        $validatedData = $request->validate($rules);

        // Handle the signatures if provided
        $receiverSignaturePath = null;

        if ($request->filled('receiverSignature')) {
            $receiverSignaturePath = $this->storeSignature(
                $request->input('receiverSignature'),
                preg_replace('/\s+/', '_', Auth::user()->name) // Replace spaces in the user name with underscores
            );

            if ($receiverSignaturePath) {
                // Update or create the user's receiver signature
                Auth::user()->signatures()->updateOrCreate(
                    ['signature_name' => Auth::user()->name],
                    ['image_path' => $receiverSignaturePath]
                );
            }
        }

        $receiverSignature = Auth::user()->signatures()->first();
        // Update the report
        $report->update(array_merge($validatedData, [
            'receiverSignature' => $receiverSignature->image_path,
            'user_id' => $userId,
            'role_stage' => 'officer_role',
            'receiver_user_id' => $userId,
        ]));

         //notification
         $userName = Auth::user()->name;
         $message = "A Duty Report has been Received by '{$userName}'.";
         $url = route('pages.dutyreport.index');
 
         // Using the NotificationController to send notification
         NotificationController::sendNotificationToDD($message, $url);

        return redirect('/dutyreport')->with('success', 'Duty Report was updated by officer.');
    }

    //Officer role receiver section end

    //Deputy Director role section start
    public function editDeputyDirectorApprove($id)
    {

        $temporaryReports = TemporaryDutyReport::findOrFail($id);

        return view('pages.dutyreport.deputyDirectorApprove', compact('temporaryReports'));
    }


    public function updateDeputyDirectorApprove(Request $request, $id)
    {
        $report = TemporaryDutyReport::find($id);

        if (!$report) {
            return redirect()->route('temporary-duty-report.index')->with('error', 'Report not found.');
        }

        $validatedData = $request->validate([
            'ddRemark' => 'nullable|string|max:1000',
            'ddNumber' => 'nullable|string|max:255',
            'ddRank' => 'nullable|string|max:255',
            'ddName' => 'nullable|string|max:255',
            'ddSignature' => 'nullable|string'
        ]);

        // Handle signature if provided
        $signaturePath = null;
        if ($request->filled('ddSignature')) {
            $signaturePath = $this->storeSignature(
                $request->input('ddSignature'),
                preg_replace('/\s+/', '_', Auth::user()->name) // Replace spaces in the user name with underscores
            );

            if ($signaturePath) {
                // Update or create the user's signature
                Auth::user()->signatures()->updateOrCreate(
                    ['signature_name' => Auth::user()->name],
                    ['image_path' => $signaturePath]
                );
            }
        }

        $ddSignature = Auth::user()->signatures()->first();
        $userId = Auth::user()->id;
        // Update the report
        $report->update(array_merge($validatedData, [
            'ddSignature' => $ddSignature->image_path,
            'user_id' =>  $userId,
            'role_stage' => 'deputy_director',
        ]));

         //notification
         $userName = Auth::user()->name;
         $message = "A Duty Report has been Submitted by '{$userName}'.";
         $url = route('pages.dutyreport.index');
 
         // Using the NotificationController to send notification
         NotificationController::sendNotificationToDirector($message, $url);

        return redirect('/dutyreport')->with('success', 'Duty Report was approved by Deputy Director.');
    }
    //Deputy Director role section end


    //Director role section start
    public function editDirectorApprove($id)
    {

        $temporaryReports = TemporaryDutyReport::findOrFail($id);

        return view('pages.dutyreport.directorApprove', compact('temporaryReports'));
    }


    public function updateDirectorApprove(Request $request, $id)
    {
        // Fetch the temporary report
        $temporaryReport = TemporaryDutyReport::find($id);
        if (!$temporaryReport) {
            return redirect()->route('dutyreport.index')->with('error', 'Temporary Duty Report not found.');
        }

        // Validate director inputs
        $validatedData = $request->validate([
            'directorRemark' => 'nullable|string',
            'directorNumber' => 'nullable|string|max:255',
            'directorRank' => 'nullable|string|max:255',
            'directorName' => 'nullable|string|max:255',
            'directorSignature' => 'nullable|string',
        ]);

        // Handle director's signature
        $signaturePath = null;
        if ($request->filled('directorSignature')) {
            $signaturePath = $this->storeSignature(
                $request->input('directorSignature'),
                preg_replace('/\s+/', '_', Auth::user()->name) // Replace spaces in the user name with underscores
            );

            if ($signaturePath) {
                Auth::user()->signatures()->updateOrCreate(
                    ['signature_name' => Auth::user()->name],
                    ['image_path' => $signaturePath]
                );
            }
        }

        // Fetch the current user's director signature
        $directorSignature = Auth::user()->signatures()->first();


        // Merge data from the temporary report with validated inputs
        $reportData = $temporaryReport->getAttributes();
        unset($reportData['id']); // Exclude the `id` field for auto-increment in `duty_reports`

        // Ensure all fields are properly merged
        $reportData = array_merge($reportData, [
            'user_id' => Auth::user()->id,
            'role_stage' => 'Director',
            'is_completed' => true,
            'directorRemark' => $validatedData['directorRemark'] ?? $temporaryReport->directorRemark,
            'directorNumber' => $validatedData['directorNumber'] ?? $temporaryReport->directorNumber,
            'directorRank' => $validatedData['directorRank'] ?? $temporaryReport->directorRank,
            'directorName' => $validatedData['directorName'] ?? $temporaryReport->directorName,
            'directorSignature' => $directorSignature->image_path ?? null,
        ]);

        // Insert into the `duty_reports` table
        $report = DutyReport::create($reportData);

        // Delete the record from `temporary_duty_reports` table
        $temporaryReport->delete();

         //notification
         $userName = Auth::user()->name;
         $message = "A Duty Report has been Submitted by '{$userName}'.";
         $url = route('pages.dutyreport.show', $report->id);
 
         // Using the NotificationController to send notification
         NotificationController::sendNotification($message, $url);

        return redirect('/dutyreport')->with('success', 'Duty Report was approved by Director.');
    }
    //Director role section end

    public function edit($id)
    {
        // Find the report by ID
        $report = DutyReport::findOrFail($id);

        // Return a view with the report details for editing
        return view('pages.dutyreport.edit', compact('report'));
    }

    public function update(Request $request, $id)
    {
        $report = DutyReport::findOrFail($id);

        $rules = $this->getValidationRules();
        $validatedData = $request->validate($rules);

        $report->update($validatedData);

        return redirect('/dutyreport')->with('success', 'Duty Report was updated successfully.');
    }

    public function destroy($id): RedirectResponse
    {
        // Find and delete the report
        $report = DutyReport::findOrFail($id);
        $report->delete();

        // Redirect back to the duty report index with a success message
        return redirect()->route('pages.dutyreport.index')->with('success', 'Duty report deleted successfully.');
    }

    private function getValidationRules($isUpdate = false)
    {
        $rules = [
            //Staff Section
            'user_id' => 'nullable|exists:users,id',
            'role_stage' => 'nullable|string|max:255',
            'is_completed' => 'boolean',
            'reciverName' => 'required|string|max:255',
            'reciverNumber' => 'required|string|max:255',
            'reciverRank' => 'required|string|max:255',
            'fromTransferName' => 'required|string|max:255',
            'fromTransferNumber' => 'required|string|max:255',
            'fromTransferRank' => 'required|string|max:255',
            'reciveDate' => 'required|date',
            'hasPermanentStaff' => 'required|integer|min:0',
            'hasAssociateStaff' => 'required|integer|min:0',
            'totalStaff' => 'required|integer|min:0',
            'attenPermanentStaff' => 'required|integer|min:0',
            'attenAssociateStaff' => 'required|integer|min:0',
            'attenTotalStaff' => 'required|integer|min:0',
            'absentPermanentStaff' => 'required|integer|min:0',
            'absentAssociateStaff' => 'required|integer|min:0',
            'absentTotalStaff' => 'required|integer|min:0',
            'absentReson' => 'nullable|string',
            'inLetter' => 'nullable|integer|min:0',
            'outLetter' => 'nullable|integer|min:0',
            'edmsInLetter' => 'nullable|integer|min:0',
            'edmsOutLetter' => 'nullable|integer|min:0',
            'gmailInLetter' => 'nullable|integer|min:0',
            'gmailOutLetter' => 'nullable|integer|min:0',
            'intMonitoringNewsCount' => 'nullable|integer|min:0',
            'intMonitoringNewsPaperCount' => 'nullable|integer|min:0',
            'dailyNewsMM' => 'nullable|integer|min:0',
            'dailyNewsEng' => 'nullable|integer|min:0',
            'drugNews' => 'nullable|integer|min:0',
            'tenderWeb' => 'nullable|integer|min:0',
            'mohaNewsPaper' => 'nullable|integer|min:0',
            'mpfInformation' => 'nullable|integer|min:0',
            'fromDeptFour' => 'nullable|integer|min:0',
            'announcement' => 'nullable|integer|min:0',
            'MNPDailyNewsMM' => 'nullable|integer|min:0',
            'MNPDailyNewsEng' => 'nullable|integer|min:0',
            'MNPDrugNews' => 'nullable|integer|min:0',
            'tenderMNP' => 'nullable|integer|min:0',
            'MNPMohaNewPaper' => 'nullable|integer|min:0',
            'MNPMpfInformation' => 'nullable|integer|min:0',
            'MNPFromDeptFour' => 'nullable|integer|min:0',
            'MNPAnnouncement' => 'nullable|integer|min:0',
            'remarkForNews' => 'nullable|string|max:1000',
            'cctvStatus' => 'nullable|string',
            'rackServerStatus' => 'nullable|string',
            'desktopGood' => 'nullable|integer|min:0',
            'desktopBad' => 'nullable|integer|min:0',
            'laptopGood' => 'nullable|integer|min:0',
            'laptopBad' => 'nullable|integer|min:0',
            'printerGood' => 'nullable|integer|min:0',
            'printerBad' => 'nullable|integer|min:0',
            'copierGood' => 'nullable|integer|min:0',
            'copierBad' => 'nullable|integer|min:0',
            'scannerGood' => 'nullable|integer|min:0',
            'scannerBad' => 'nullable|integer|min:0',
            'descOfEquipment' => 'nullable|string',
            'deptOtherReport' => 'nullable|string',
            'staffReporting' => 'nullable|string',
            'offDayCheckForStaff' => 'nullable|string',

            //Officer Section
            'transferDate' => 'required|date',
            'toReciverName' => 'nullable|string|max:255',
            'toReciverNumber' => 'nullable|string|max:255',
            'toReciverRank' => 'nullable|string|max:255',
            // 'transferSignature' => 'nullable|string',
            'transferPersonNumber' => 'nullable|string|max:255',
            'transferPersonRank' => 'nullable|string|max:255',
            'transferPersonName' => 'nullable|string|max:255',
            // 'receiverSignature' => 'nullable|string',
            'receiverPersonNumber' => 'nullable|string|max:255',
            'receiverPersonRank' => 'nullable|string|max:255',
            'receiverPersonName' => 'nullable|string|max:255',

            //DD Section
            'ddRemark' => 'nullable|string',
            // 'ddSignature' => 'nullable|string',
            'ddNumber' => 'nullable|string|max:255',
            'ddRank' => 'nullable|string|max:255',
            'ddName' => 'nullable|string|max:255',

            //Director Section
            'directorRemark' => 'nullable|string',
            // 'directorSignature' => 'nullable|string',
            'directorNumber' => 'nullable|string|max:255',
            'directorRank' => 'nullable|string|max:255',
            'directorName' => 'nullable|string|max:255',
            'data' => 'nullable|string'
        ];
        if ($isUpdate) {
            $rules['user_id'] = 'sometimes|exists:users,id'; // Example of dynamic adjustment
        }

        return $rules;
    }


    //Storage Signature
    protected function storeSignature($dataUrl, $type)
    {
        if (!$dataUrl || !str_contains($dataUrl, 'data:image')) {
            return null; // No valid signature data provided
        }

        $folderPath = storage_path('app/public/signatures/');
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0755, true);
        }

        $imageParts = explode(";base64,", $dataUrl);

        // Ensure the array has the expected structure
        if (count($imageParts) < 2) {
            return null; // Invalid data URL
        }

        $imageTypeAux = explode("image/", $imageParts[0]);
        $imageType = $imageTypeAux[1] ?? 'png'; // Default to 'png' if type is missing
        $imageBase64 = base64_decode($imageParts[1]);
        $fileName = $type . '_' . time() . '.' . $imageType;
        $filePath = $folderPath . $fileName;

        file_put_contents($filePath, $imageBase64);

        return 'signatures/' . $fileName; // Return relative path for storage
    }

}
