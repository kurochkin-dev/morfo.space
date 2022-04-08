<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="row mb-4">
        <div class="col-md-4">
            <a class="light active gist research p-3 px-4">Гистология</a>
            <a class="cit inactive research p-3 px-4">Цитология</a>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <input type="text" class="form-control pull-right" id="search" placeholder="Поиск">
            </div>
        </div>
    </div>
    <div class="row card-table-wrapper p-5">
        <table id="data-table" class="card-table mt-3">
            <thead>
            <tr>
                <th>№</th>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>Дата поступления</th>
                <th>Исследование</th>
                <th>Медицинский центр</th>
                <th>Статус</th>
            </tr>
            </thead>
            <tbody>
            @if(count($cards) > 0)
                @foreach($cards as $card)
                    <tr class="p-4 tbl type-{{$card->research_area}} clipping  @if($card->status ==='clipping_completed') bg-success @endif" data-id="{{$card->id}}">
                        <td><a href="card/update/{{$card->id}}"> {{ $card->incoming_number }}</a></td>
                        <td>{{ $card->name }}</td>
                        <td>{{ $card->surname }}</td>
                        <td>{{ $card->patronymic }}</td>
                        <td>{{ $card->shipment_date }}</td>
                        <td>{{ (is_object($card->research_type()->get()->first())) ? $card->research_type()->get()->first()->name : '' }}</td>
                        <td>{{ (is_object($card->medical_center()->get()->first())) ? $card->medical_center()->get()->first()->name  : '' }}</td>
                        <td>{{ $card->status }}</td>
                    </tr>
                    <tr class="type-{{$card->research_area}} info-field clipping_info{{$card->id}}" style="display: none"><td colspan="8"><div class="row">
                            <form class="text-light" method="post" action="/card/clipping/{{ $card->id }}">
                                @csrf
                                <div class="messages"></div>
                                <input id="status" type="hidden" name="status" class="form-control" required="required" value="clipping_completed">

                                <div class="controls">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <?php $card->research_date = isset($card->research_date) ? date_format(date_create_from_format('Y-m-d', $card->research_date), 'd/m/Y') : null; ?>
                                            <label for="research_date">Дата забора</label>
                                            <input id="research_date" type="text" name="research_date" class="form-control datepicker" value="{{ $card->research_date }}" required="required" data-error="Дата забора" @if(!in_array('research_date', $user_rights)) disabled @endif>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="glasses_count">Количество стёкол</label>
                                            <input id="glasses_count" type="number" name="glasses_count" class="form-control" value="{{ $card->glasses_count }}" required="required" data-error="Количество стёкол" @if(!in_array('glasses_count', $user_rights)) disabled @endif>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="research_type">Исследование</label><br/>
                                            <select id="research_type" name="research_type" class="form-select js-select2" aria-label="Исследование" @if(!in_array('research_type', $user_rights)) disabled @endif>
                                                @foreach($research_types as $research_type)
                                                    <option value="{{ $research_type->id }}" @if($research_type->id === $card->research_type) selected @endif>{{ $research_type->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="technician">Выполнил лаборант</label><br/>
                                            <select id="technician" name="technician" class="form-select js-select2 " aria-label="Выполнил лаборант" @if(!in_array('technician', $user_rights)) disabled @endif>
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
                                            <?php $card->color = $card->color ? json_decode($card->color, true) : []; ?>
                                            <select multiple id="color" name="color[]" class="form-select js-select2" aria-label="Окраска" @if(!in_array('color', $user_rights)) disabled @endif>
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
                                    @if($card->status ==='clipping')
                                    <div class="row pt-3">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary col-6">Сформировать</button>
                                        </div>

                                    </div>
                                        @endif
                                </div>
                            </form>
                        </div></td></tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <a class="btn btn-primary col-8 full-complete" data-status="clipping_completed">Отправить в нарезку</a>
        </div>
    </div>
</x-app-layout>