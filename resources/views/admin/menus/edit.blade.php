<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center m-2 p-2">
                <a href="{{ route('admin.menus.index') }}" class="btn bg px-4 py-2">Menus</a>
            </div>

            {{-- form --}}
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ route('admin.menus.update', $menu) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $menu->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Price</label>
                                <input type="text" class="form-control" id="price" name="price"
                                    value="{{ $menu->price }}">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Categories</label>
                                <br>
                                <select id="" multiple name="categories[]">
                                    @foreach ($categories as $category)
                                        <option @selected($menu->categories->contains($category)) value="{{ $category->id }}">
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Menu Description</label>
                                <textarea class="form-control" id="description" name="description" cols="15" rows="2">{{ $menu->description }}</textarea>
                            </div>
                            <button type="submit" class="btn bg">Submit</button>
                        </form>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            `
                        @endif
                    </div>
                </div>
            </div>
            {{-- form --}}
        </div>
    </div>
    </div>
</x-admin-layout>
