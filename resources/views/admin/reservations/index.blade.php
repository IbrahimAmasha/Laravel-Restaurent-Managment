<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.reservations.create') }}" class="btn bg px-4 py-2">New Reservation</a>
            </div>
            <div class="table-responsive w-100 p-3">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Telephone Number</th>
                            <th>Guest Number</th>
                            <th>Reservatio Date</th>
                            <th>Table</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->first_name . ' ' . $reservation->last_name }}</td>
                                <td>{{ $reservation->email }}</td>
                                <td>{{ $reservation->tel_number }}</td>
                                <td>{{ $reservation->guest_number }}</td>
                                <td>{{ $reservation->res_date }}</td>
                                <td>{{ $reservation->table->name }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-3">
                                            <button type="button" class="btn btn-primary">
                                                <a
                                                    href="{{ route('admin.reservations.edit', $reservation->id) }}">Edit</a>
                                            </button>
                                        </div>
                                        <div class="col-3">
                                            <form action="{{ route('admin.reservations.destroy', $reservation->id) }}"
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
