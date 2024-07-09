<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center m-2 p-2">
                <a href="{{ route('admin.tables.index') }}" class="btn bg px-4 py-2">Tables</a>
            </div>

            {{-- form --}}
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ route('admin.tables.update', $table) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $table->name }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Guest Number</label>
                                <input type="text" class="form-control" id="guest_number" name="guest_number"
                                    value="{{ $table->guest_number }}">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Status</label>
                                <br>
                                <select class="form-control" id="" name="status">
                                    @foreach (App\Enums\TableStatus::cases() as $status)
                                        <option @selected($table->status == $status) value="{{ $status->value }}">
                                            {{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Location</label>
                                <br>
                                <select class="form-control" id="" name="location">
                                    @foreach (App\Enums\TableLocation::cases() as $location)
                                        <option @selected($table->location == $location) value="{{ $location->value }}">
                                            {{ $location->name }}</option>
                                    @endforeach
                                </select>
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
                {{-- form --}}
            </div>
        </div>
    </div>
</x-admin-layout>
