<?php

namespace App\Http\Controllers;

use App\Http\Services\PatientCardService;
use App\Models\PatientCard;
use App\Models\Registers\BodyPart;
use App\Models\Registers\Color;
use App\Models\Registers\Department;
use App\Models\Registers\MedicalCenter;
use App\Models\Registers\MkbRegister;
use App\Models\Registers\ResearchType;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

    protected $cardService;

    public function __construct(PatientCardService $cardService)
    {
        $this->cardService = $cardService;
    }

    public function getCards(string $status = null)
    {
        $userRights = Auth::user()->group();
        $userFields = json_decode($userRights->fields, true);

        switch ($status) {
            case 'clipping':
                $status = ['clipping', 'clipping_completed'];
                $viewName = 'main_tables.clipping_content';
                break;
            case 'cutting':
                $status = ['cutting', 'cutting_completed'];
                $viewName = 'main_tables.cutting_content';
                break;
            case 'appointed':
                $status = ['send_to_doctor'];
                $viewName = 'main_tables.appointed_content';
                break;
            case 'archive':
                $status = ['completed'];
                $viewName = 'main_tables.archive_content';
                break;
            default:
                $status = json_decode($userRights->statuses, true);
                $completed = array_search('completed', $status);
                if($completed) {
                    unset($status[$completed]);
                }
                $viewName = 'main_tables.main_content';
                break;
        }

        $data = $this->cardService->getPatientCardsByStatus($status);

        if (in_array('clipping', $status)) {
            $params = [
                'technicians'    => User::where('group_id', UserGroup::ASSISTANT_RIGHTS)->get(),
                'doctors'        => User::where('group_id', UserGroup::DOCTOR_RIGHTS)->get(),
                'body_parts'     => BodyPart::get(),
                'research_types' => ResearchType::get(),
                'colors'         => Color::get(),
                'user_rights'    => $userFields,
                'cards'          => $data,
            ];
        } elseif(in_array('cutting', $status)) {
            $colors = Color::get();

            foreach ($data as $card) {
                $names = [];
                $card->color = json_decode($card->color, true);
                foreach ($colors as $color) {
                    if(in_array($color->id, $card->color)) {
                        $names[] = $color->name;
                    }
                }
                $card->color = implode(', <br/>', $names);
            }

            $params = ['cards' => $data];
        } else {
            $params = ['cards' => $data];
        }

        return view($viewName, $params);
    }

    public function createCardForm()
    {
        $userRights = Auth::user()->group();
        $userFields = json_decode($userRights->fields, true);

        return view('card.card_form', [
            'medical_centers' => MedicalCenter::get(),
            'departments'     => Department::get(),
            'technicians'     => User::where('group_id', UserGroup::ASSISTANT_RIGHTS)->get(),
            'doctors'         => User::where('group_id', UserGroup::DOCTOR_RIGHTS)->get(),
            'body_parts'      => BodyPart::get(),
            'research_types'  => ResearchType::get(),
            'colors'          => Color::get(),
            'mkb'             => MkbRegister::get(),
            'mkbonko'         => MkbRegister::get(),
            'user_rights'     => $userFields,
        ]);
    }

    public function updateCardForm(int $id)
    {
        $card = PatientCard::where('id', $id)->first();

        $card->birth_date = isset($card->birth_date) ? date_format(date_create_from_format('Y-m-d', $card->birth_date),
            'd/m/Y') : null;
        $card->delivery_date = isset($card->delivery_date) ? date_format(date_create_from_format('Y-m-d',
            $card->delivery_date), 'd/m/Y') : null;
        $card->shipment_date = isset($card->shipment_date) ? date_format(date_create_from_format('Y-m-d',
            $card->shipment_date), 'd/m/Y') : null;
        $card->research_date = isset($card->research_date) ? date_format(date_create_from_format('Y-m-d',
            $card->research_date), 'd/m/Y') : null;
        $card->color = isset($card->color) ? json_decode($card->color, true) : [];

        $userRights = Auth::user()->group();
        $userFields = json_decode($userRights->fields, true);

        return view('card.card_update_form', [
            'medical_centers' => MedicalCenter::get(),
            'departments'     => Department::get(),
            'technicians'     => User::where('group_id', UserGroup::ASSISTANT_RIGHTS)->get(),
            'doctors'         => User::where('group_id', UserGroup::DOCTOR_RIGHTS)->get(),
            'body_parts'      => BodyPart::get(),
            'research_types'  => ResearchType::get(),
            'colors'          => Color::get(),
            'mkb'             => MkbRegister::get(),
            'mkbonko'         => MkbRegister::get(),
            'user_rights'     => $userFields,
            'card'            => $card,
        ]);
    }
}
