<?php

namespace App\Http\Controllers;

use Response;
use Exception;
use DataTables;
use App\Models\OpdDiagnosis;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\dentalOpdDiagnosis;
use App\Queries\OpdDiagnosisDataTable;
use App\Repositories\OpdDiagnosisRepository;
use App\Http\Requests\CreateOpdDiagnosisRequest;
use App\Http\Requests\UpdateOpdDiagnosisRequest;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class OpdDiagnosisController extends AppBaseController
{
    /** @var OpdDiagnosisRepository */
    private $opdDiagnosisRepository;

    public function __construct(OpdDiagnosisRepository $opdDiagnosisRepo)
    {
        $this->opdDiagnosisRepository = $opdDiagnosisRepo;
    }

    /**
     * Display a listing of the OpdDiagnosis.
     *
     * @return Response
     *
     * @throws Exception
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of((new OpdDiagnosisDataTable())->get($request->id))->make(true);
        }
    }

    /**
     * Store a newly created OpdDiagnosis in storage.
     *
     * @return JsonResponse
     */
    public function store(CreateOpdDiagnosisRequest $request)
    {
        $input = $request->all();
        $this->opdDiagnosisRepository->store($input);
        $this->opdDiagnosisRepository->createNotification($input);

        return $this->sendSuccess('OPD Diagnosis saved successfully.');
    }

    /**
     * Show the form for editing the specified Opd Diagnosis.
     *
     * @return JsonResponse
     */
    public function edit(OpdDiagnosis $opdDiagnosis)
    {
        return $this->sendResponse($opdDiagnosis, 'OPD Diagnosis retrieved successfully.');
    }

    /**
     * Update the specified Opd Diagnosis in storage.
     *
     * @return JsonResponse
     */
    public function update(OpdDiagnosis $opdDiagnosis, UpdateOpdDiagnosisRequest $request)
    {
        $this->opdDiagnosisRepository->updateOpdDiagnosis($request->all(), $opdDiagnosis->id);

        return $this->sendSuccess('OPD Diagnosis updated successfully.');
    }

    /**
     * Remove the specified OpdDiagnosis from storage.
     *
     * @return JsonResponse
     *
     * @throws Exception
     */
    public function destroy(OpdDiagnosis $opdDiagnosis)
    {
        $this->opdDiagnosisRepository->deleteOpdDiagnosis($opdDiagnosis->id);

        return $this->sendSuccess('OPD Diagnosis deleted successfully.');
    }
    public function dentalDestroy(dentalOpdDiagnosis $opdDiagnosis)
    {
        $dentalOpdDiagnosis = dentalOpdDiagnosis::where('id',$opdDiagnosis->id);
        if($dentalOpdDiagnosis){
            $dentalOpdDiagnosis->delete();
        }
        return $this->sendSuccess('OPD Diagnosis deleted successfully.');
    }

    /**
     * @return Media
     */
    public function downloadMedia(OpdDiagnosis $opdDiagnosis)
    {
        $media = $opdDiagnosis->getMedia(OpdDiagnosis::OPD_DIAGNOSIS_PATH)->first();
        if ($media) {
            return $media;
        }

        return '';
    }
}
