@extends('layouts.partials.base')

@section('content')
<div class="text-center">
    <h1>
        Add a Room
    </h1>
</div>
<div class="book">
    <div class="container-book">
        <form action="{{ route('save-room') }}" method="POST">
            @csrf
            <div class="row text-center">
                    <div class="col-md-12">
                        <label for="" class="form-label">Room</label>
                        <input type="text" class="form-control" name="room_name" placeholder="Name of Room">
                    </div>
                    <div class="col-6 mt-5">
                        <label for="pax" class="form-label">Pax :</label>
                        <input type="number" name="pax" id="pax" class="form-control">
                    </div>
                    <div class="col-6 mt-5">
                        <label for="price" class="form-label">Price :</label>
                        <input type="number" name="price" id="price" class="form-control">
                    </div>
                </div>
                <div class="col-12 mt-5 text-center">
                    <input type="submit" value="Add Now!" class="btn btn-primary">
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
