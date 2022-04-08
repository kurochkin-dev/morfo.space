@extends('admin.layouts.app')
@section('content')
    <x-slot name="header">
    </x-slot>
    <div class="row">
        <div class="col-md-8 text-center">
            <form class="text-light" method="post" action="/admin/medical_centers/update/{{ $entity->id }}">
                @csrf
                <div class="messages"></div>

                <div class="controls">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name">Название</label>
                            <input id="name" type="text" name="name" class="form-control" value="{{ $entity->name }}" required="required">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="uniq_id">Идентификатор</label>
                            <input id="uniq_id" type="text" name="uniq_id" class="form-control" value="{{ $entity->uniq_id }}" required="required">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="email">Почта</label>
                            <input id="email" type="text" name="email" class="form-control" value="{{ $entity->email }}" required="required">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="contract">Контракт</label>
                            <input id="contract" type="text" name="contract" class="form-control" value="{{ $entity->contract }}" required="required">
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