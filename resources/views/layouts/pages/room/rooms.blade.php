@extends('layouts.partials.base')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.min.css">

<div class="text-center">
    <h1>
        Rooms
    </h1>
</div>
<a href="{{'/add-room'}}" class="btn btn-primary">Add Room</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
<div class="d-flex justify-content-center">
    <table id="roomTable" class="table table-striped table-bordered" >
        <thead>
         <tr>
             <th>Rooms</th>
             <th>Amount</th>
             <th>Max Pax.</th>
             <th>Actions</th>
         </tr>
        </thead>
        <tbody>
         @foreach ($rooms as $room)
         <tr>
             <td>{{ $room->room_name}}</td>
             <td class="text-center">{{ $room->price }}</td>
             <td class="text-center">{{ $room->pax }}</td>
             <td>
                <a href="" class="btn btn-warning">Edit</a>
                <a href="" class="btn btn-danger">Delete</a>
             </td>
         </tr>
         @endforeach
        </tbody>
     </table>
</div>




<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.min.js"></script>
<script>
    let table = new DataTable('#roomTable');
</script>
@endsection
