@extends('admin.layouts.app')
@section('content')
    <x-slot name="header">
    </x-slot>
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <form class="text-light" method="post" action="/admin/groups/store/">
                @csrf
                <div class="messages"></div>

                <div class="controls">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name">Название роли</label>
                            <input id="name" type="text" name="name" class="form-control" value="" required="required">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="user_name" class="m-3"><h5>Доступные поля</h5></label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[incoming_number]" id="fields[incoming_number]">
                                <label class="form-check-label" for="fields[incoming_number]">
                                    Номер
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[shipment_date]" id="fields[shipment_date]">
                                <label class="form-check-label" for="fields[shipment_date]">
                                    Дата поставки
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[sex]" id="fields[sex]">
                                <label class="form-check-label" for="fields[sex]">
                                    Пол
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[surname]" id="fields[surname]">
                                <label class="form-check-label" for="fields[surname]">
                                    Фамилия
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[name]" id="fields[name]">
                                <label class="form-check-label" for="fields[name]">
                                    Имя
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[patronymic]" id="fields[patronymic]">
                                <label class="form-check-label" for="fields[patronymic]">
                                    Отчество
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[birth_date]" id="fields[birth_date]">
                                <label class="form-check-label" for="fields[birth_date]">
                                    Дата рождения
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[medical_center]" id="fields[medical_center]">
                                <label class="form-check-label" for="fields[medical_center]">
                                    Медицинский центр
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[department]" id="fields[department]">
                                <label class="form-check-label" for="fields[department]">
                                    Направившее отделение
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[create_by_doctor]" id="fields[create_by_doctor]">
                                <label class="form-check-label" for="fields[create_by_doctor]">
                                    ФИО врача
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[diagnosis]" id="fields[diagnosis]">
                                <label class="form-check-label" for="fields[diagnosis]">
                                    Диагноз
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[research_date]" id="fields[research_date]">
                                <label class="form-check-label" for="fields[research_date]">
                                    Дата забора
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[glasses_count]" id="fields[glasses_count]">
                                <label class="form-check-label" for="fields[glasses_count]">
                                    Количество стёкол
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[research_type]" id="fields[research_type]">
                                <label class="form-check-label" for="fields[research_type]">
                                    Исследование
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[technician]" id="fields[technician]">
                                <label class="form-check-label" for="fields[technician]">
                                    Выполнил лаборант
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[body_part]" id="fields[body_part]">
                                <label class="form-check-label" for="fields[body_part]">
                                    Орган
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[blocks_count]" id="fields[blocks_count]">
                                <label class="form-check-label" for="fields[blocks_count]">
                                    Количество блоков
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[appointed_doctor]" id="fields[appointed_doctor]">
                                <label class="form-check-label" for="fields[appointed_doctor]">
                                    Назначить врачу
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[color]" id="fields[color]">
                                <label class="form-check-label" for="fields[color]">
                                    Окраски
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[macro_description]" id="fields[macro_description]">
                                <label class="form-check-label" for="fields[macro_description]">
                                    Макроописание
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[micro_description]" id="fields[micro_description]">
                                <label class="form-check-label" for="fields[micro_description]">
                                    Микроописание
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[conclusion]" id="fields[conclusion]">
                                <label class="form-check-label" for="fields[conclusion]">
                                    Заключение
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[mkb]" id="fields[mkb]">
                                <label class="form-check-label" for="fields[mkb]">
                                    МКБ 10
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[mkbonko]" id="fields[mkbonko]">
                                <label class="form-check-label" for="fields[mkbonko]">
                                    МКБ онко
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="fields[status]" id="fields[status]">
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
                                <input class="form-check-input" type="checkbox" value="" name="statuses[created]" id="statuses[created]">
                                <label class="form-check-label" for="statuses[created]">
                                    Создан
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="statuses[clipping]" id="statuses[clipping]">
                                <label class="form-check-label" for="statuses[clipping]">
                                    Вырезка
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="statuses[clipping_completed]" id="statuses[clipping_completed]">
                                <label class="form-check-label" for="statuses[clipping_completed]">
                                    Вырезка сформирована
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="statuses[cutting]" id="statuses[cutting]">
                                <label class="form-check-label" for="statuses[cutting]">
                                    Резка
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="statuses[cutting_completed]" id="statuses[cutting_completed]">
                                <label class="form-check-label" for="statuses[cutting_completed]">
                                    Распечатано
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="statuses[send_to_doctor]" id="statuses[send_to_doctor]">
                                <label class="form-check-label" for="statuses[send_to_doctor]">
                                    Передано врачу
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="statuses[completed]" id="statuses[completed]">
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