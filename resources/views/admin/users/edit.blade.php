@extends('admin.layouts.app')
@section('content')
    <x-slot name="header">
    </x-slot>
    <div class="row">
        <div class="col-md-8 text-center">
        <form class="text-light" method="post" action="/admin/users/update/{{ $entity->id }}">
            @csrf
            <div class="messages"></div>

            <div class="controls">
                <div class="row">
                    <div class="col-md-12">
                        <label for="name">Логин</label>
                        <input id="name" type="text" name="name" class="form-control" value="{{ $entity->name }}" required="required">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="user_name">Имя</label>
                        <input id="user_name" type="text" name="user_name" class="form-control" value="{{ $entity->user_name }}" required="required">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="user_surname">Фамилия</label>
                        <input id="user_surname" type="text" name="user_surname" class="form-control" value="{{ $entity->user_surname }}" required="required">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="user_patronymic">Отчество</label>
                        <input id="user_patronymic" type="text" name="user_patronymic" class="form-control" value="{{ $entity->user_patronymic }}" required="required">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="group_id">Роль</label>
                        <select id="group_id" class="form-select js-select2" name="group_id">
                            @foreach($roles as $value)
                                <option value="{{ $value->id }}" @if($entity->group_id === $value->id) selected @endif>{{ $value->name }}</option>
                            @endforeach
                        </select>
                        <div class="help-block with-errors"></div>
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