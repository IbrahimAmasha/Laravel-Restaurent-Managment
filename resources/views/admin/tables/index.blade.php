<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.tables.create') }}" class="btn bg px-4 py-2">New Table</a>
            </div>
            <div class="table-responsive w-100 p-3">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Guest Number</th>
                            <th>Status</th>
                            <th>Location</th>
                            <!-- Add more headers as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tables as $table)
                            <tr>
                                <td>{{ $table->name }}</td>
                                <td>{{ $table->guest_number }}</td>
                                <td>{{ $table->status }}</td>
                                <td>{{ $table->location }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-3">
                                            <button type="button" class="btn btn-primary">
                                                <a href="{{ route('admin.tables.edit', $table) }}">Edit</a>
                                            </button>
                                        </div>
                                        <div class="col-3">
                                            <form action="{{ route('admin.tables.destroy', $table) }}" method="POST"
                                                onsubmit=" return confirm('are you sure ?') ;">
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
