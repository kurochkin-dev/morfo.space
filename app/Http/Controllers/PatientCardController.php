<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClippingRequest;
use App\Http\Requests\CreateCardRequest;
use App\Http\Requests\CreateDocRequest;
use App\Http\Requests\CreateTemplateRequest;
use App\Http\Requests\LabelsRequest;
use App\Http\Services\DocService;
use App\Http\Services\LabelsService;
use App\Http\Services\PatientCardService;
use Illuminate\Http\Request;

class PatientCardController extends Controller
{
    protected $cardService;

    protected $labelsService;

    protected $docService;

    public function __construct(PatientCardService $cardService, LabelsService $labelsService, DocService $docService)
    {
        $this->cardService = $cardService;
        $this->labelsService = $labelsService;
        $this->docService = $docService;
    }

    public function create(CreateCardRequest $request)
    {
        $this->cardService->savePatientCard($request->toArray());

        return redirect()->back();
    }

    public function update(int $id, CreateCardRequest $request)
    {
        $this->cardService->updatePatientCard($id, $request->toArray());

        return redirect()->back();
    }

    public function clipping(int $id, ClippingRequest $request)
    {
        $this->cardService->updatePatientCard($id, array_intersect_key($request->toArray(), $request->rules()));

        return redirect()->back();
    }

    public function getTemplates(string $type)
    {
        return json_encode($this->cardService->getTemplates($type));
    }

    public function updateCardStatuses(string $status)
    {
        return json_encode($this->cardService->setPatientCardStatuses($status));
    }

    public function createTemplate(CreateTemplateRequest $request)
    {
        $this->cardService->saveTemplate($request->only(['id', 'template_name', 'template_type', 'template_description']));

        return redirect()->back();
    }

    public function createImage(LabelsRequest $request)
    {
        return json_encode($this->labelsService->createLabels($request->toArray()));
    }

    public function createDoc(CreateDocRequest $request)
    {
        return response()->download($this->docService->generate($request->ids));
    }

    public function printDoc(CreateDocRequest $request)
    {
        return response()->make($this->docService->generatePreview($request->ids));
    }
}
