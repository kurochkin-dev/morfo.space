<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="row">
        <table class="table text-light">
            <thead>
            <tr>
                <th>№</th>
                <th>Название роли</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(count($roles) > 0)
                @foreach($roles as $role)
                    <tr>
                        <td><a href="admin/role/update/{{$role->id}}"> {{ $role->id }}</a></td>
                        <td>{{ $card->name }}</td>
                        <td></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</x-app-layout>