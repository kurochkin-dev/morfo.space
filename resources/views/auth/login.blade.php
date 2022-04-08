<x-guest-layout>
    <x-auth-card>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form method="POST" class="text-light" action="{{ route('login') }}">
            <div class="row card-form p-5">
        @csrf

        <!-- Email Address -->
            <div class="row">
                <div class="col-md-12">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email"  class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                </div>
            </div>

            <!-- Password -->
            <div class="row">
                <div class="col-md-12">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password"  class="form-control"
                         type="password"
                         name="password"
                         required autocomplete="current-password" />
                </div>
            </div>
            <div class="row mt-3">
<div class="col-md-3"></div>
<div class="col-md-6">
    <button class="btn btn-card p-3 px-5">Войти</button>
</div>
<div class="col-md-3"></div>
            </div>
            </div>
        </form>
    </div>
    <div class="col-md-4"></div>
</div>

    </x-auth-card>
</x-guest-layout>

