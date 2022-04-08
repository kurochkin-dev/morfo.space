<?php

namespace App\Http\Services;

use App\Models\Template;
use Illuminate\Support\Facades\Auth;
use App\Models\PatientCard as PatientCardModel;

class PatientCardService
{
    protected $patientCard;

    public function __construct(PatientCardModel $patientCard) {
        $this->patientCard = $patientCard;
    }

    public function getPatientCards() {
        $userGroup = Auth::user()->group()->toArray();
        $result = [];

        if($userGroup->statuses) {
            $result = $this->patientCard->whereIn('status', json_decode($userGroup->statuses, true))->get();
        }

        return $result;
    }

    public function getPatientCardsByStatus(array $statuses) {
        $userGroup = Auth::user()->group();

        if(!isset($userGroup['statuses'])) {
            return [];
        }

        $userStatuses = array_flip(json_decode($userGroup->statuses, true));
        $resultData = array_intersect_key(array_flip($statuses), $userStatuses);

        if(isset($resultData['appointed'])) {
            $this->patientCard->where('appointed_doctor', Auth::user()->id);
        }

        return $this->patientCard->whereIn('status', array_keys($resultData))->get();
    }

    public function setPatientCardStatuses(string $status) {
        $userGroup = Auth::user()->group();
        if(!in_array($status, ['clipping_completed', 'cutting_completed'])) return [];

        if($status === 'clipping_completed' && in_array($status, json_decode($userGroup->statuses, true))) {
            return $this->patientCard->where('status', $status)->update([
                'status' => 'cutting',
            ]);
        }

        if($status === 'cutting_completed' && in_array($status, json_decode($userGroup->statuses, true))) {
            return $this->patientCard->where('status', $status)->update([
                'status' => 'send_to_doctor',
            ]);
        }
    }

    public function savePatientCard(array $cardData) {
        $userGroup = Auth::user()->group();
        $userFields = array_flip(json_decode($userGroup->fields, true));
        $resultData = array_intersect_key($cardData, $userFields);

        $resultData['status'] = 'clipping';
        $resultData['birth_date'] = isset($resultData['birth_date']) ? date_format(date_create_from_format('d/m/Y', $resultData['birth_date']), 'Y-m-d') : null;
        $resultData['delivery_date'] = isset($resultData['delivery_date']) ? date_format(date_create_from_format('d/m/Y', $resultData['delivery_date']), 'Y-m-d') : null;
        $resultData['shipment_date'] = isset($resultData['shipment_date']) ? date_format(date_create_from_format('d/m/Y', $resultData['shipment_date']), 'Y-m-d') : null;
        $resultData['research_date'] = isset($resultData['research_date']) ? date_format(date_create_from_format('d/m/Y', $resultData['research_date']), 'Y-m-d') : null;
        $resultData['color'] = isset($resultData['color']) ? json_encode($resultData['color']) : '[]';

        return $this->patientCard->create($resultData);
    }

    public function saveTemplate(array $templateData) {
        if($templateData['id'] > 0) {
            return Template::where('id', $templateData['id'])->update($templateData);
        } else {
            unset($templateData['id']);
        }

        $cardData['user_id'] = Auth::user()->id;
        return Template::create($templateData);
    }

    public function getTemplates(string $type) {
        return Template::where('template_type', $type)->get()->toArray();
    }

    public function updatePatientCard(int $cardId, array $cardData) {
        $userGroup = Auth::user()->group();
        $userFields = array_flip(json_decode($userGroup->fields, true));
        $resultData = array_intersect_key($cardData, $userFields);

        if(isset($resultData['birth_date'])) {
            $resultData['birth_date'] = date_format(date_create_from_format('d/m/Y', $resultData['birth_date']), 'Y-m-d');
        }

        if(isset($resultData['delivery_date'])) {
            $resultData['delivery_date'] = date_format(date_create_from_format('d/m/Y', $resultData['delivery_date']), 'Y-m-d');
        }

        if(isset($resultData['shipment_date'])) {
            $resultData['shipment_date'] = date_format(date_create_from_format('d/m/Y', $resultData['shipment_date']), 'Y-m-d');
        }

        if(isset($resultData['research_date'])) {
            $resultData['research_date'] = date_format(date_create_from_format('d/m/Y', $resultData['research_date']), 'Y-m-d');
        }

        if(isset($resultData['color'])) {
            $resultData['color'] = json_encode($resultData['color']);
        }

        return $this->patientCard->where('id', $cardId)->update($resultData);
    }

}
