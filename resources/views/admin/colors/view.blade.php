@extends('admin.layouts.app')
@section('content')
    <x-slot name="header">
    </x-slot>

    <div class="row">
        <div class="col-md-8"></div><div class="col-md-4"><a class="btn btn-primary" href="/admin/colors/create">Создать</a></div>
    </div>
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th>№</th>
                <th>Название</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(count($entities) > 0)
                @foreach($entities as $entity)
                    <tr>
                        <td>{{ $entity->id }}</td>
                        <td>{{ $entity->name }}</td>
                        <td><a class="btn btn-primary" href="/admin/colors/edit/{{ $entity->id }}">Редактировать</a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection