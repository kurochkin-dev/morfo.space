@extends('admin.layouts.app')
@section('content')
    <x-slot name="header">
    </x-slot>
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <form class="text-light" method="post" action="/admin/groups/update/{{ $entity->id }}">
                @csrf
                <div class="messages"></div>

                <div class="controls">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name">Название роли</label>
                            <input id="name" type="text" name="name" class="form-control" value="{{ $entity->name }}" required="required">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="user_name" class="m-3"><h5>Доступные поля</h5></label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[incoming_number]" id="fields[incoming_number]" @if(in_array('incoming_number', $entity->fields)) checked @endif>
                                <label class="form-check-label" for="fields[incoming_number]">
                                    Номер
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[shipment_date]" id="fields[shipment_date]" @if(in_array('shipment_date', $entity->fields)) checked @endif>
                                <label class="form-check-label" for="fields[shipment_date]">
                                    Дата поставки
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[sex]" id="fields[sex]" @if(in_array('sex', $entity->fields)) checked @endif>
                                <label class="form-check-label" for="fields[sex]">
                                    Пол
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[surname]" id="fields[surname]" @if(in_array('surname', $entity->fields)) checked @endif>
                                <label class="form-check-label" for="fields[surname]">
                                    Фамилия
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[name]" id="fields[name]" @if(in_array('name', $entity->fields)) checked @endif>
                                <label class="form-check-label" for="fields[name]">
                                    Имя
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[patronymic]" id="fields[patronymic]" @if(in_array('patronymic', $entity->fields)) checked @endif>
                                <label class="form-check-label" for="fields[patronymic]">
                                    Отчество
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[birth_date]" id="fields[birth_date]" @if(in_array('birth_date', $entity->fields)) checked @endif>
                                <label class="form-check-label" for="fields[birth_date]">
                                    Дата рождения
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[medical_center]" id="fields[medical_center]" @if(in_array('medical_center', $entity->fields)) checked @endif>
                                <label class="form-check-label" for="fields[medical_center]">
                                    Медицинский центр
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[department]" id="fields[department]" @if(in_array('department', $entity->fields)) checked @endif>
                                <label class="form-check-label" for="fields[department]">
                                    Направившее отделение
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[create_by_doctor]" id="fields[create_by_doctor]" @if(in_array('create_by_doctor', $entity->fields)) checked @endif>
                                <label class="form-check-label" for="fields[create_by_doctor]">
                                    ФИО врача
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[diagnosis]" id="fields[diagnosis]" @if(in_array('diagnosis', $entity->fields)) checked @endif>
                                <label class="form-check-label" for="fields[diagnosis]">
                                    Диагноз
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[research_date]" id="fields[research_date]" @if(in_array('research_date', $entity->fields)) checked @endif>
                                <label class="form-check-label" for="fields[research_date]">
                                    Дата забора
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[glasses_count]" id="fields[glasses_count]" @if(in_array('glasses_count', $entity->fields)) checked @endif>
                                <label class="form-check-label" for="fields[glasses_count]">
                                    Количество стёкол
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[research_type]" id="fields[research_type]" @if(in_array('research_type', $entity->fields)) checked @endif>
                                <label class="form-check-label" for="fields[research_type]">
                                    Исследование
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[technician]" id="fields[technician]" @if(in_array('technician', $entity->fields)) checked @endif>
                                <label class="form-check-label" for="fields[technician]">
                                    Выполнил лаборант
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[body_part]" id="fields[body_part]" @if(in_array('body_part', $entity->fields)) checked @endif>
                                <label class="form-check-label" for="fields[body_part]">
                                    Орган
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[blocks_count]" id="fields[blocks_count]" @if(in_array('blocks_count', $entity->fields)) checked @endif>
                                <label class="form-check-label" for="fields[blocks_count]">
                                    Количество блоков
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[appointed_doctor]" id="fields[appointed_doctor]" @if(in_array('appointed_doctor', $entity->fields)) checked @endif>
                                <label class="form-check-label" for="fields[appointed_doctor]">
                                    Назначить врачу
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[color]" id="fields[color]" @if(in_array('color', $entity->fields)) checked @endif>
                                <label class="form-check-label" for="fields[color]">
                                    Окраски
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[macro_description]" id="fields[macro_description]" @if(in_array('macro_description', $entity->fields)) checked @endif>
                                <label class="form-check-label" for="fields[macro_description]">
                                    Макроописание
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[micro_description]" id="fields[micro_description]" @if(in_array('micro_description', $entity->fields)) checked @endif>
                                <label class="form-check-label" for="fields[micro_description]">
                                    Микроописание
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[conclusion]" id="fields[conclusion]" @if(in_array('conclusion', $entity->fields)) checked @endif>
                                <label class="form-check-label" for="fields[conclusion]">
                                    Заключение
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[mkb]" id="fields[mkb]" @if(in_array('mkb', $entity->fields)) checked @endif>
                                <label class="form-check-label" for="fields[mkb]">
                                    МКБ 10
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[mkbonko]" id="fields[mkbonko]" @if(in_array('mkbonko', $entity->fields)) checked @endif>
                                <label class="form-check-label" for="fields[mkbonko]">
                                    МКБ онко
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[status]" id="fields[status]" @if(in_array('status', $entity->fields)) checked @endif>
                                <label class="form-check-label" for="fields[status]">
                                    Статус обращения
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="user_name" class="m-3"><h5>Доступные статусы</h5></label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="statuses[created]" id="statuses[created]" @if(in_array('created', $entity->statuses)) checked @endif>
                                <label class="form-check-label" for="statuses[created]">
                                    Создан
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="statuses[clipping]" id="statuses[clipping]" @if(in_array('clipping', $entity->statuses)) checked @endif>
                                <label class="form-check-label" for="statuses[clipping]">
                                    Вырезка
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="statuses[clipping_completed]" id="statuses[clipping_completed]" @if(in_array('clipping_completed', $entity->statuses)) checked @endif>
                                <label class="form-check-label" for="statuses[clipping_completed]">
                                    Вырезка сформирована
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="statuses[cutting]" id="statuses[cutting]" @if(in_array('cutting', $entity->statuses)) checked @endif>
                                <label class="form-check-label" for="statuses[cutting]">
                                    Резка
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="statuses[cutting_completed]" id="statuses[cutting_completed]" @if(in_array('cutting_completed', $entity->statuses)) checked @endif>
                                <label class="form-check-label" for="statuses[cutting_completed]">
                                    Распечатано
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="statuses[send_to_doctor]" id="statuses[send_to_doctor]" @if(in_array('send_to_doctor', $entity->statuses)) checked @endif>
                                <label class="form-check-label" for="statuses[send_to_doctor]">
                                    Передано врачу
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="statuses[completed]" id="statuses[completed]" @if(in_array('completed', $entity->statuses)) checked @endif>
                                <label class="form-check-label" for="statuses[completed]">
                                    Архив
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row pt-3">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary col-6">Сохранить</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection