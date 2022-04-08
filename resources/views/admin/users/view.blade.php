@extends('admin.layouts.app')
@section('content')
    <x-slot name="header">
    </x-slot>
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th>№</th>
                <th>Логин</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Отчество</th>
                <th>Роль</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(count($entities) > 0)
                @foreach($entities as $entity)
                    <tr>
                        <td>{{ $entity->id }}</td>
                        <td>{{ $entity->name }}</td>
                        <td>{{ $entity->user_name }}</td>
                        <td>{{ $entity->user_surname }}</td>
                        <td>{{ $entity->user_patronymic }}</td>
                        <td>{{ $entity->group()->name }}</td>
                        <td><a class="btn btn-primary" href="/admin/users/edit/{{ $entity->id }}">Редактировать</a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection