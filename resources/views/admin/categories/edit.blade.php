<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center m-2 p-2">
                <a href="{{ route('admin.categories.index') }}" class="btn bg px-4 py-2">Categories</a>
            </div>

            {{-- form --}}
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ route('admin.categories.update', $category->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="name" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $category->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Category Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                <img src="{{ url($category->image) }}" class="rounded">

                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Category Description</label>
                                <textarea class="form-control" id="description" name="description" cols="15" rows="2">{{ $category->description }}</textarea>
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
