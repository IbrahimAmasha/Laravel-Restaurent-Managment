<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.categories.create') }}" class="btn bg px-4 py-2">New Category</a>
            </div>
            <div class="table-responsive w-100 p-3">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <!-- Add more headers as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td
                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <img src="{{ url($category->image) }}" class="rounded">
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-3">
                                            <button type="button" class="btn btn-primary">
                                                <a href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>
                                            </button>
                                        </div>
                                        <div class="col-3">
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                                method="POST" onsubmit=" return confirm('are you sure ?') ;">
                                                @csrf
                                                @method('Delete')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</x-admin-layout>
