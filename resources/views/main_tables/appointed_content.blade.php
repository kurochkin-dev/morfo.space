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
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(count($cards) > 0)
                @foreach($cards as $card)
                    <tr class="tbl appointed type-{{$card->research_area}}" data-id="{{$card->id}}">
                        <td><a href="card/update/{{$card->id}}"> {{ $card->incoming_number }}</a></td>
                        <td>{{ $card->name }}</td>
                        <td>{{ $card->surname }}</td>
                        <td>{{ $card->patronymic }}</td>
                        <td>{{ $card->shipment_date }}</td>
                        <td>{{ (is_object($card->research_type()->get()->first())) ? $card->research_type()->get()->first()->name : '' }}</td>
                        <td>{{ (is_object($card->medical_center()->get()->first())) ? $card->medical_center()->get()->first()->name  : '' }}</td>
                        <td>{{ $card->status }}</td>
                        <td><button>Передать в архив</button></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</x-app-layout>