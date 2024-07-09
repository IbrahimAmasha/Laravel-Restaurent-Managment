<x-guest-layout>
    <div class="container px-5 py-6 mx-auto w-auto ">
        <div class="d-flex align-items-center min-vh-100 bg-light w-auto">
            <div class="flex-1 w-auto max-w-4xl mx-auto bg-white rounded-lg shadow w-auto">
                <div class="d-flex flex-column flex-md-row">
                    <div class=" image-container">
                        <img class="img-fluid image-background" src="https://cdn.pixabay.com/photo/2021/01/15/17/01/green-5919790__340.jpg" alt="img">
                    </div>
                    <div class="d-flex flex-column   p-6 p-sm-12">
                        <div>
                            <h3 class="mb-4 text-xl font-weight-bold text-primary">Make Reservation</h3>
    
                            <div class="w-100 bg-secondary rounded-pill">
                                <div class="p-1 text-xs font-weight-bold text-center text-light bg-primary rounded-pill">Step 2</div>
                            </div>

                            <form method="POST" action="{{ route('reservations.store.step.two') }}">
                                @csrf
                                <div class="sm:col-span-6 pt-5">
                                    <label for="status" class="block text-sm font-medium text-gray-700">Table</label>
                                    <div class="mt-1">
                                        <select id="table_id" name="table_id"
                                            class="form-multiselect block w-full mt-1">
                                            @foreach ($tables as $table)
                                                <option value="{{ $table->id }}" @selected($table->id == $reservation->table_id)>
                                                    {{ $table->name }}
                                                    ({{ $table->guest_number }} Guests)
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('table_id')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mt-6 p-4 flex justify-between">
                                    <a href="{{ route('reservations.step.one') }}"
                                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg ">Previous</a>
                                    <button type="submit"class="btn btn-primary">Make Reservation</button>
                                </div>
                            </form>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-guest-layout>