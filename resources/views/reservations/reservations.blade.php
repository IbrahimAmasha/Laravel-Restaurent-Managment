<x-guest-layout>
    <x-slot name="title">My Reservations</x-slot>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-ce1212 text-white text-center">
                        <h5 class="mb-0">My Reservations</h5>
                    </div>

                    <div class="card-body">
                        @if ($reservations->isEmpty())
                            <p class="text-center">You have no reservations.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Reservation Table</th>
                                            <th scope="col">Date</th>
                                            <!-- Add other table headers as needed -->
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reservations as $reservation)
                                            <tr>
                                                <td>{{ $reservation->table->name }}</td>
                                                <td>{{ $reservation->res_date->format('Y-m-d H:i') }}</td>
                                                <!-- Add other table data columns as needed -->
                                                <td>
                                                    <form action="{{ route('reservations.cancel', $reservation->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Cancel</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
