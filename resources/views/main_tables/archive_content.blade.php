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
    <div class="row mb-4">
        <div class="col-md-2">
            <form id="download" method="post" action="/doc">
                @csrf
                <button class="btn btn-primary" type="submit">Скачать</button>
            </form>
        </div>
        <div class="col-md-2">
            <form method="post" id="print" action="/printDoc" target="_blank">
                @csrf
                <button class="btn btn-primary" type="submit">Печать</button>
            </form>
        </div>
    </div>
    <div class="row card-table-wrapper p-5">
        <table id="data-table" class="card-table mt-3">
            <thead>
            <tr>
                <th></th>
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
                    <tr class="tbl appointed type-{{$card->research_area}}" data-id="{{$card->id}}">
                        <td><input class="download" type="checkbox" name="{{ $card->id }}"></td>
                        <td><a href="/card/update/{{$card->id}}"> {{ $card->incoming_number }}</a></td>
                        <td>{{ $card->name }}</td>
                        <td>{{ $card->surname }}</td>
                        <td>{{ $card->patronymic }}</td>
                        <td>{{ $card->shipment_date }}</td>
                        <td>{{ (is_object($card->research_type())) ? $card->research_type()->name : '' }}</td>
                        <td>{{ (is_object($card->medical_center())) ? $card->medical_center()->name  : '' }}</td>
                        <td>{{ $card->status }}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</x-app-layout>