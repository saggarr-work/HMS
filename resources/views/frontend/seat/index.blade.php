@extends('frontend.master')

@section('title')
    Seat
@endsection

@section('content')
    <main>
        <div class="container mt-5">
            <table id="example" class="table display nowrap" style="width:100%">
                <thead>
                <tr>
                    <th scope="col">Seat</th>
                    <th scope="col">Rent</th>
                    <th scope="col">Allocation Date</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$member->seat->room->floor . $member->seat->room->room . $member->seat->room->seat}}</td>
                    <td>{{$member->seat->room->seat_rent}} &#2547;</td>
                    <td>{{$member->seat->created_at}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection