@extends('backend.master')

@section('title')
    Manage Members
@endsection

@section('content')
    <section>
        <div class="app-content main-content mt-0">
            <div class="side-app">

                <!-- CONTAINER -->
                <div class="main-container container-fluid">


                    <!-- PAGE-HEADER -->
                    <div class="page-header">
                        <div>
                            <h1 class="page-title">Manage Members</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Member</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Members</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->
                    <!-- Row -->
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Manage Members</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-center text-success">{{ Session::get('msg') }}</p>
                                    <div class="table-responsive">
                                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">SL</th>
                                                    <th class="border-bottom-0">Name</th>
                                                    <th class="border-bottom-0">Mobile</th>
                                                    <th class="border-bottom-0">Email</th>
                                                    <th class="border-bottom-0">Seat</th>
                                                    <th class="border-bottom-0">Seat rent</th>
                                                    <th class="border-bottom-0">Register status</th>
                                                    <th class="border-bottom-0">Status</th>
                                                    <th class="border-bottom-0">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($members as $member)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $member->member_first_name . ' ' . $member->member_last_name }}</td>
                                                        <td>{{ $member->member_mobile }}</td>
                                                        <td>{{ $member->member_email }}</td>
                                                        {{-- member model a seat model er sathe one to one relation kora ache --}}
                                                        <td>
                                                            {{-- {{ $member->seat ? $member->seat->room->floor . ' ' . $member->seat->room->room . ' ' . $member->seat->room->seat : 'Not allocated' }} --}}
                                                            @if($member->seat)
                                                                {{ $member->seat->room->floor . ' ' . $member->seat->room->room . ' ' . $member->seat->room->seat }}
                                                            @else
                                                                <a class="tag tag-red" href="{{ route('seat.alocate') }}">Allocate seat</a>
                                                            @endif
                                                        </td>
                                                        <td class="{{$member->seat ? '' : 'text-danger'}}">
                                                            {{ $member->seat && $member->seat->room->seat_rent ? $member->seat->room->seat_rent : 'N/A' }} &#2547;
                                                        </td>
                                                        <td>
                                                            @if($users->pluck('email')->contains($member->member_email))
                                                                <span class="text-success">Registered</span>
                                                            @else
                                                                <a class="tag tag-red" href="{{route('user.register.by.admin')}}" target="_blank" class="text-danger">Register now</a>
                                                            @endif
                                                        </td>
                                                        <td class="{{$member->status == 1 ? 'text-success' : 'text-danger'}}">
                                                            {{ $member->status == 1 ? 'Active' : 'Inactive' }}
                                                        </td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="{{ route('member.show', [$member->id]) }}"
                                                                    class="btn btn-success">
                                                                    <i class="fe fe-book-open"></i>
                                                                </a>
                                                                &nbsp;&nbsp;
                                                                <a href="{{ route('member.edit', [$member->id]) }}"
                                                                    class="btn btn-warning">
                                                                    <i class="fe fe-edit"></i>
                                                                </a>
                                                                &nbsp;&nbsp;
                                                                <form action="{{ route('member.delete', [$member->id]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-danger">
                                                                        <i class="fe fe-trash"></i>
                                                                    </button>
                                                                </form>
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
                    </div>
                    <!-- End Row -->
                </div>
            </div>
        </div>
    </section>
@endsection
