@extends('admin.layouts.app')
@section('content')
    <x-slot name="header">
    </x-slot>
    <div class="row">
        <div class="col-md-8 text-center">
            <form class="text-light" method="post" action="/admin/researches/store">
                @csrf
                <div class="messages"></div>

                <div class="controls">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name">Название</label>
                            <input id="name" type="text" name="name" class="form-control" value="" required="required">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="medical_center">Медицинский центр</label>
                            <select id="medical_center" class="form-select js-select2" name="medical_center">
                                @foreach($centers as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name">Цена</label>
                            <input id="name" type="text" name="price" class="form-control" value="" required="required">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name">Идентификатор исследования</label>
                            <input id="name" type="text" name="medical_id" class="form-control" value="" required="required">
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