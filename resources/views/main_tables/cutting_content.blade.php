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
            @csrf
            <thead>
            <tr>
                <th>№ п/п</th>
                <th>№ входящий</th>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>Диагноз</th>
                <th>Окраски</th>
                <th>Кол-во</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(count($cards) > 0)
                @foreach($cards as $card)
                    <tr class="p-4 tbl type-{{$card->research_area}} clipping  @if($card->status ==='clipping_completed') bg-success @endif" data-id="{{$card->id}}">
                        <td><a href="card/update/{{$card->id}}"> {{ $card->id }}</a></td>
                        <td>{{ $card->incoming_number }}</td>
                        <td>{{ $card->name }}</td>
                        <td>{{ $card->surname }}</td>
                        <td>{{ $card->patronymic }}</td>
                        <td>{{ $card->diagnosis }}</td>
                        <td>{!! $card->color !!}</td>
                        <?php
                        $colors = explode(', <br/>', $card->color);
                        ?>
                        <td>@foreach($colors as $color)
                                <div class="row"><input type="text" data-color="{{ $color }}" class="col-md-3 printing{{$card->id}}" value="0"></div>
                            @endforeach</td>
                        <td>{{ $card->status }}</td>
                        <td><a class="btn btn-info print-card" data-id="{{$card->id}}">Распечатать</a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <a class="btn btn-primary col-8 full-complete" data-status="cutting_completed">Передать доктору</a>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/BrowserPrint-3.0.216.min.js') }}" defer></script>
    <script src="{{ asset('js/BrowserPrint-Zebra-1.0.216.min.js') }}" defer></script>
    <script src="{{ asset('js/zebra.js') }}" defer></script>
</x-app-layout>