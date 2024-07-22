@extends('layouts.partials.base')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.min.css">
<style>
    /* Custom CSS to ensure text stays on one line and overflows with ellipsis if too long */
    #bookTable td {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<div class="text-center">
    <h1>
        Reservations
    </h1>
    <a href="{{'book'}}" class="btn btn-primary">Book a Date</a>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="d-flex justify-content-center">
    <table id="bookTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Room Name</td>
                <td>Client Name</td>
                <td>Pax</td>
                <td>Check-In</td>
                <td>Check-out</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($reserves as $reserve)
            <tr>
                <td>{{$reserve->room_name}}</td>
                <td>{{$reserve->client_name}}</td>
                <td>{{$reserve->pax}}</td>
                <td>{{$reserve->check_in}}</td>
                <td>{{$reserve->check_out}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.min.js"></script>
<script>
    let table = new DataTable('#bookTable');
</script>
@endsection
