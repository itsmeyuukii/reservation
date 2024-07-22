@extends('layouts.partials.base')

@section('content')
<div class="text-center">
    <h1>
        Book a date
    </h1>
</div>
@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
<div class="book">
    <div class="container-book">
        <form action="{{'reserve'}}" method="POST">
            @csrf
            <div class="row text-center">
                    <div class="col-md-12">
                        <label for="" class="form-label">Room</label>
                        <select class="form-select" name="room" id="room">
                            @foreach ($room_names as $room_name)
                            <option value="{{$room_name->room_name}}">{{$room_name->room_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-8 mt-5">
                        <label for="clientName" class="form-label">Client Name</label>
                        <input type="text" name="clientName" class="form-control" placeholder="Enter client name here ..." required>
                    </div>
                    <div class="col-md-4 mt-5">
                        <label for="pax" class="form-label">Person</label>
                        <input type="number" name="pax" class="form-control" required>
                    </div>
                    <div class="col-6 mt-5">
                        <label for="checkIn" class="form-label">Check In:</label>
                        <input type="date" name="checkIn" id="checkIn" class="form-control" required>
                    </div>
                    <div class="col-6 mt-5">
                        <label for="checkOut" class="form-label">Check Out:</label>
                        <input type="date" name="checkOut" id="checkOut" class="form-control" required>
                    </div>
                </div>
                <div class="col-12 mt-5 text-center">
                    <input type="submit" value="Book Now!" class="btn btn-primary">
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
