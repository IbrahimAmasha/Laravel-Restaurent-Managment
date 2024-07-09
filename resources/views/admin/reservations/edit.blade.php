<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center m-2 p-2">
                <a href="{{ route('admin.reservations.index') }}" class="btn bg px-4 py-2">Reservations</a>
            </div>

            {{-- form --}}
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ route('admin.reservations.update', $reservation) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    value="{{ $reservation->first_name }}">
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    value="{{ $reservation->last_name }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $reservation->email }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Telephone Number</label>
                                <input type="text" class="form-control" id="tel_number" name="tel_number"
                                    value="{{ $reservation->tel_number }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Guest Nmuber</label>
                                <input type="number" class="form-control" id="guest_number" name="guest_number"
                                    value="{{ $reservation->guest_number }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Reservatio Date</label>
                                <input type="datetime-local" class="form-control" id="res_date" name="res_date"
                                    value="{{ $reservation->res_date }}">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Table</label>
                                <br>
                                <select class="form-control" id="table_id" name="table_id">
                                    @foreach ($tables as $table)
                                        <option @selected($table->name == $reservation->table->name) value="{{ $table->id }}">
                                            {{ $table->name }}</option>
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
