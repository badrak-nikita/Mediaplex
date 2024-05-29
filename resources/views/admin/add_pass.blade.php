<x-guest-layout>
    <x-authentication-card>

        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{url('pass_add')}}">
            @csrf
            <div>
                <x-label for="pass_name" value="{{ __('Назва пiдписки') }}" />
                <x-input id="pass_name" class="block mt-1 w-full" type="text" name="pass_name" />
            </div>
            <div>
                <x-label for="category" value="{{ __('Категорiя') }}" />
                <select name="category">
                    <option value="" selected="">Обрати категорiю</option>
                    @foreach($category as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <x-label for="price" value="{{ __('Цiна') }}" />
                <x-input id="price" class="block mt-1 w-full" type="text" name="price" />
            </div>
            <div>
                <x-label for="duration" value="{{ __('Тривалiсть') }}" />
                <x-input id="duration" class="block mt-1 w-full" type="text" name="duration" />
            </div>
            <div>
                <x-label for="type" value="{{ __('Тип пiдписки') }}" />
                <select name="type">
                    <option value="Basic" selected="">Basic</option>
                    <option value="Normal" selected="">Normal</option>
                    <option value="Premium" selected="">Premium</option>
                </select>
            </div>
            <div class="flex items-center justify-end mt-4">
                <a href="{{url('view_pass')}}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Назад</a>
                <x-button class="ms-4">Додати</x-button>
            </div>
        </form>

    </x-authentication-card>
</x-guest-layout>