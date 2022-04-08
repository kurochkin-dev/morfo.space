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
                        <tr class="p-4 type-{{$card->research_area}}">
                            <td><a href="card/update/{{$card->id}}"> {{ $card->incoming_number }}</a></td>
                            <td>{{ $card->name }}</td>
                            <td>{{ $card->surname }}</td>
                            <td>{{ $card->patronymic }}</td>
                            <td>{{ $card->shipment_date }}</td>
                            <td>{{ $card->research_type }}</td>
                            <td>{{ $card->medical_center()->get()->first()->name }}</td>
                            <td>{{ $card->status }}</td>
                        </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
    </div>
</x-app-layout>