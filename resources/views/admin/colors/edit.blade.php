@extends('admin.layouts.app')
@section('content')
    <x-slot name="header">
    </x-slot>
    <div class="row">
        <div class="col-md-8 text-center">
            <form class="text-light" method="post" action="/admin/colors/update/{{ $entity->id }}">
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