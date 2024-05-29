<x-guest-layout>
    <x-authentication-card>

        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{url('update_products_confirm', $product->id)}}" enctype="multipart/form-data">
            @csrf
            <div>
                <x-label for="product_name" value="{{ __('Назва товару') }}" />
                <x-input id="product_name" class="block mt-1 w-full" type="text" name="product_name" value="{{$product->product_name}}" />
            </div>
            <div>
                <x-label for="description" value="{{ __('Опис') }}" />
                <textarea class="form-control" id="description" name="description" rows="3">{{$product->description}}</textarea>
            </div>
            <div>
                <x-label for="category" value="{{ __('Категорiя') }}" />
                <select name="category">
                    <option value="{{$product->category}}" selected="">{{$product->category}}</option>
                    @foreach($category as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <x-label for="price" value="{{ __('Цiна') }}" />
                <x-input id="price" class="block mt-1 w-full" type="text" name="price" value="{{$product->price}}" />
            </div>
            <div>
                <x-label for="discount_price" value="{{ __('Знижка') }}" />
                <x-input id="discount_price" class="block mt-1 w-full" type="text" name="discount_price" value="{{$product->discount_price}}" />
            </div>
            <div>
                <x-label for="image" value="{{ __('Зображення') }}" />
                <img src="/product/{{$product->image}}" style="width: 50px; height: 50px;">
                <input type="file" name="image">
            </div>
            <div class="flex items-center justify-end mt-4">
                <a href="{{url('view_products')}}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Назад</a>
                <x-button class="ms-4">Редагувати</x-button>
            </div>
        </form>

    </x-authentication-card>
</x-guest-layout>