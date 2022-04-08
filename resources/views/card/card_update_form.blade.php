<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="row mb-4">
        <div class="col-md-4">
            <a class="light active gist research p-3 px-4">Гистология</a>
            <a class="cit inactive research p-3 px-4">Цитология</a>
        </div>
        <div class="col-md-8">
            <span class="form-header">Гистологическая карточка пациента</span>
        </div>
    </div>
    <div class="row">

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form id="contact-form" class="text-light" method="post" action="/card/update/{{ $card->id }}" role="form">
            <div class="row card-form p-5">
            @csrf

            <div class="messages"></div>
            <input id="research_area" type="hidden" name="research_area" class="form-control" required="required" value="{{ $card->research_area }}">

            <div class="controls">
                <div class="row">
                    <div class="col-md-2">
                        <label for="incoming_number">Номер</label>
                        <input id="incoming_number" type="text" name="incoming_number" class="form-control" value="{{ $card->incoming_number }}" required="required" data-error="Введите номер" @if(!in_array('incoming_number', $user_rights)) disabled @endif>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-2">
                        <label for="shipment_date">Дата поставки</label>
                        <input id="shipment_date" type="text" name="shipment_date" class="form-control datepicker" value="{{ $card->shipment_date }}" required="required" data-error="Дата поставки" @if(!in_array('shipment_date', $user_rights)) disabled @endif>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label for="sex">Пол</label>
                        <select id="sex" name="sex" class="form-select js-select2" aria-label="Пол" @if(!in_array('sex', $user_rights)) disabled @endif>
                            <option value="male" @if('male' === $card->sex) selected @endif>Мужской</option>
                            <option value="female" @if('female' === $card->sex) selected @endif>Женский</option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-md-3">
                        <label for="surname">Фамилия</label>
                        <input id="surname" type="text" name="surname" class="form-control" required="required" value="{{ $card->surname }}" data-error="Фамилия" @if(!in_array('surname', $user_rights)) disabled @endif>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-md-2">
                        <label for="name">Имя</label>
                        <input id="name" type="text" name="name" class="form-control" required="required" value="{{ $card->name }}" data-error="Имя" @if(!in_array('name', $user_rights)) disabled @endif>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-md-3">
                        <label for="patronymic">Отчество</label>
                        <input id="patronymic" type="text" name="patronymic" class="form-control" value="{{ $card->patronymic }}" data-error="Отчество" @if(!in_array('patronymic', $user_rights)) disabled @endif>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-md-2">
                        <label for="birth_date">Дата рождения</label>
                        <input id="birth_date" type="text" name="birth_date" class="form-control datepicker" value="{{ $card->birth_date }}" data-error="Дата рождения" @if(!in_array('birth_date', $user_rights)) disabled @endif>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="medical_center">Медицинский центр</label>
                        <select id="medical_center" name="medical_center" class="form-select js-select2" aria-label="Медицинский центр" @if(!in_array('medical_center', $user_rights)) disabled @endif>
                            @foreach($medical_centers as $medical_center)
                                <option value="{{ $medical_center->id }}" @if($medical_center->id === $card->medical_center) selected @endif>{{ $medical_center->name }}</option>
                            @endforeach
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-md-4">
                        <label for="department">Направившее отделение</label>
                        <select id="department" name="department" class="form-select js-select2" aria-label="Направившее отделение" @if(!in_array('department', $user_rights)) disabled @endif>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}" @if($department->id === $card->department) selected @endif>{{ $department->name }}</option>
                            @endforeach
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-md-4">
                        <label for="create_by_doctor">ФИО врача</label>
                        <input id="create_by_doctor" type="text" name="create_by_doctor" class="form-control" value="{{ $card->create_by_doctor }}" data-error="ФИО врача" @if(!in_array('create_by_doctor', $user_rights)) disabled @endif>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="row textarea-wrap__outer">
                    <div class="col-md-12 textarea-wrap">
                        <label for="diagnosis">Диагноз</label>
                        <textarea rows="5" id="diagnosis" name="diagnosis" class="form-control" required="required" data-error="Диагноз" @if(!in_array('diagnosis', $user_rights)) disabled @endif>{{ $card->diagnosis }}</textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-md-1 icon-wrap">
                        <div class="row mt-5">
                            <div class="col-md-12 p-2">
                                <i class="fas fa-save fa-2x save"></i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-2">
                                <i class="fas fa-book fa-2x show"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="research_date">Дата забора</label>
                        <input id="research_date" type="text" name="research_date" class="form-control datepicker" value="{{ $card->research_date }}" required="required" data-error="Дата забора" @if(!in_array('research_date', $user_rights)) disabled @endif>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-md-3">
                        <label for="glasses_count" class="glasses_count" @if($card->research_area === 'cit') style="display: none" disabled @endif>Количество стёкол</label>
                        <input id="glasses_count" type="number" name="glasses_count" @if($card->research_area === 'cit') style="display: none" disabled @endif class="form-control glasses_count" value="{{ $card->glasses_count }}" required="required" data-error="Количество стёкол" @if(!in_array('glasses_count', $user_rights)) disabled @endif>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-md-3">
                        <label for="research_type">Исследование</label>
                        <select id="research_type" name="research_type" class="form-select js-select2" aria-label="Исследование" @if(!in_array('research_type', $user_rights)) disabled @endif>
                            @foreach($research_types as $research_type)
                                <option value="{{ $research_type->id }}" @if($research_type->id === $card->research_type) selected @endif>{{ $research_type->name }}</option>
                            @endforeach
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-md-3">
                        <label for="technician">Выполнил лаборант</label>
                        <select id="technician" name="technician" class="form-select js-select2" aria-label="Выполнил лаборант" @if(!in_array('technician', $user_rights)) disabled @endif>
                            @foreach($technicians as $technician)
                                <option value="{{ $technician->id }}" @if($technician->id === $card->technician) selected @endif>{{ $technician->name }}</option>
                            @endforeach
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="body_part">Орган</label>
                        <select id="body_part" name="body_part" class="form-select js-select2" aria-label="Орган" @if(!in_array('body_part', $user_rights)) disabled @endif>
                            @foreach($body_parts as $body_part)
                                <option value="{{ $body_part->id }}" @if($body_part->id === $card->body_part) selected @endif>{{ $body_part->name }}</option>
                            @endforeach
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-md-3">
                        <label for="blocks_count">Количество блоков</label>
                        <input id="blocks_count" type="number" name="blocks_count" value="{{ $card->blocks_count }}" class="form-control" required="required" data-error="Количество блоков" @if(!in_array('blocks_count', $user_rights)) disabled @endif>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-md-3">
                        <label for="color">Окраска</label>
                        <select multiple id="color" name="color" class="form-select js-select2" aria-label="Окраска" @if(!in_array('color', $user_rights)) disabled @endif>
                            @foreach($colors as $color)
                                <option value="{{ $color->id }}" @if(in_array($color->id, $card->color)) selected @endif>{{ $color->name }}</option>
                            @endforeach
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-md-3">
                        <label for="appointed_doctor">Назначить врачу</label>
                        <select id="appointed_doctor" name="appointed_doctor" class="form-select js-select2" aria-label="Назначить врачу" @if(!in_array('appointed_doctor', $user_rights)) disabled @endif>
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}" @if($doctor->id === $card->appointed_doctor) selected @endif>{{ $doctor->name }}</option>
                            @endforeach
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="row textarea-wrap__outer">
                    <div class="col-md-12 textarea-wrap">
                        <label for="macro_description" class="macro_description">Макроописание</label>
                        <textarea rows="5" id="macro_description" name="macro_description" class="form-control" required="required" data-error="Макроописание" @if(!in_array('macro_description', $user_rights)) disabled @endif>{{ $card->macro_description }}</textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-md-1 icon-wrap">
                        <div class="row mt-5">
                            <div class="col-md-12 p-2">
                                <i class="fas fa-save fa-2x save"></i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-2">
                                <i class="fas fa-book fa-2x show"></i>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

                <div class="row textarea-wrap__outer">
                    <div class="col-md-12 textarea-wrap">
                        <label for="micro_description">Микроописание</label>
                        <textarea rows="5" id="micro_description" name="micro_description" class="form-control" required="required" data-error="Микроописание" @if(!in_array('micro_description', $user_rights)) disabled @endif>{{ $card->micro_description }}</textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-md-1 icon-wrap">
                        <div class="row mt-5">
                            <div class="col-md-12 p-2">
                                <i class="fas fa-save fa-2x save"></i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-2">
                                <i class="fas fa-book fa-2x show"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row textarea-wrap__outer">
                    <div class="col-md-12 textarea-wrap">
                        <label for="conclusion">Заключение</label>
                        <textarea rows="5" id="conclusion" name="conclusion" class="form-control" required="required" data-error="Заключение" @if(!in_array('conclusion', $user_rights)) disabled @endif>{{ $card->conclusion }}</textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-md-1 icon-wrap">
                        <div class="row mt-5">
                            <div class="col-md-12 p-2">
                                <i class="fas fa-save fa-2x save"></i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-2">
                                <i class="fas fa-book fa-2x show"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mkb" @if($card->research_area === 'cit') style="display: none" @endif >
                        <label for="mkb"  class="mkb">МКБ 10</label>
                        <select id="mkb" name="mkb" class="form-select js-select2" aria-label="МКБ 10" @if(!in_array('mkb', $user_rights)) disabled @endif>
                            @foreach($mkb as $value)
                                <option value="{{ $value->id }}">{{ $value->code }} {{ $value->name }}</option>
                            @endforeach
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mkbonko" @if($card->research_area === 'cit') style="display: none" @endif >
                        <label for="mkbonko">МКБ онко</label>
                        <select id="mkbonko" name="mkbonko" class="form-select js-select2"   aria-label="МКБ онко" @if(!in_array('mkbonko', $user_rights)) disabled @endif>
                            @foreach($mkbonko as $value)
                                <option value="{{ $value->id }}">{{ $value->code }} {{ $value->name }}</option>
                            @endforeach
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>

                </div>
            </div>
            <div class="row pt-3">
                <div class="col-md-8"></div>
                <div class="col-md-4 p-3">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-card p-3 px-5">Сформировать</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @include('modals.save_template')
    @include('modals.show_templates')
</x-app-layout>
