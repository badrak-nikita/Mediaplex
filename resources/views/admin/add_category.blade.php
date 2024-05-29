<x-guest-layout>
    <x-authentication-card>

        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{url('category_add')}}">
            @csrf
            <div>
                <x-label for="category_name" value="{{ __('Назва категорії') }}" />
                <x-input id="category_name" class="block mt-1 w-full" type="text" name="category_name" />
            </div>
            <div class="mt-4">
                <input type="checkbox" id="isPass" name="isPass" value="1">
                <label for="isPass">Можливiсть пiдписки</label>
            </div>
            <div class="flex items-center justify-end mt-4">
                <a href="{{url('view_category')}}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Назад</a>
                <x-button class="ms-4">Додати</x-button>
            </div>
        </form>

    </x-authentication-card>
</x-guest-layout>