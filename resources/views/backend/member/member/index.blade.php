@extends('backend.master')

@section('title')
    Add Member
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
                            <h1 class="page-title">Add Member</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Member</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Member</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <!-- ROW -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Add Member</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-center text-success">{{Session::get('msg')}}</p>
                                    <form class="needs-validation" novalidate action="{{route('member.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <h6 class="text-center"><i>MEMBER INFO</i></h6>
                                        <br><br>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="member_first_name">First name</label> <span class="text-danger"><b>*</b></span>
                                                <input name="member_first_name" type="text" class="form-control" id="member_first_name" value="">
                                                <p class="text-danger pt-2">{{$errors->has('member_first_name') ? $errors->first('member_first_name') : ''}}</p>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="member_last_name">Last name</label> <span class="text-danger"><b>*</b></span>
                                                <input name="member_last_name" type="text" class="form-control" id="member_last_name" value="">
                                                <p class="text-danger pt-2">{{$errors->has('member_last_name') ? $errors->first('member_last_name') : ''}}</p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="member_institute">School/College/Institute</label>
                                                <input name="member_institute" type="text" class="form-control" id="member_institute">
                                                <p class="text-danger pt-2">{{$errors->has('member_institute') ? $errors->first('member_institute') : ''}}</p>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="member_voter_id">Voter ID</label> <span class="text-danger"><b>*</b></span>
                                                <input name="member_voter_id" type="number" class="form-control" id="member_voter_id">
                                                <p class="text-danger pt-2">{{$errors->has('member_voter_id') ? $errors->first('member_voter_id') : ''}}</p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="member_mobile">Mobile</label> <span class="text-danger"><b>*</b></span>
                                                <input name="member_mobile" type="number" class="form-control" id="member_mobile">
                                                <p class="text-danger pt-2">{{$errors->has('member_mobile') ? $errors->first('member_mobile') : ''}}</p>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="member_email">Email</label> <span class="text-danger"><b>*</b></span>
                                                <input name="member_email" type="email" class="form-control" id="member_email">
                                                <p class="text-danger pt-2">{{$errors->has('member_email') ? $errors->first('member_email') : ''}}</p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                                <label for="member_address">permanent Address</label> <span class="text-danger"><b>*</b></span>
                                                <textarea name="member_address" class="form-control" id="member_address" cols="30" rows="3"></textarea>
                                                <p class="text-danger pt-2">{{$errors->has('member_address') ? $errors->first('member_address') : ''}}</p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="member_image">picture</label>
                                                <input name="member_image" type="file" accept="image/*" id="member_image" class="form-control">
                                                <p class="text-danger pt-2">{{$errors->has('member_image') ? $errors->first('member_image') : ''}}</p>
                                            </div>
                                        </div>

                                        <br><br>
                                        <hr><br>
                                        <h6 class="text-center"><i>GURDIAN INFO</i></h6>
                                        <br><br>

                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="gurdian_name">Gurdian Name</label> <span class="text-danger"><b>*</b></span>
                                                <input name="gurdian_name" type="text" class="form-control" id="gurdian_name" value="">
                                                <p class="text-danger pt-2">{{$errors->has('gurdian_name') ? $errors->first('gurdian_name') : ''}}</p>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="gurdian_voter_id">Voter ID</label> <span class="text-danger"><b>*</b></span>
                                                <input name="gurdian_voter_id" type="text" class="form-control" id="gurdian_voter_id" value="">
                                                <p class="text-danger pt-2">{{$errors->has('gurdian_voter_id') ? $errors->first('gurdian_voter_id') : ''}}</p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="gurdian_mobile">Gurdian Mobile</label> <span class="text-danger"><b>*</b></span>
                                                <input name="gurdian_mobile" type="number" class="form-control" id="gurdian_mobile" value="">
                                                <p class="text-danger pt-2">{{$errors->has('gurdian_mobile') ? $errors->first('gurdian_mobile') : ''}}</p>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="gurdian_email">Gurdian Email</label>
                                                <input name="gurdian_email" type="email" class="form-control" id="gurdian_email" value="">
                                                <p class="text-danger pt-2">{{$errors->has('gurdian_email') ? $errors->first('gurdian_email') : ''}}</p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                                <label for="gurdian_address">Gurdian Address</label> <span class="text-danger"><b>*</b></span>
                                                <textarea name="gurdian_address" class="form-control" id="gurdian_address" cols="30" rows="3"></textarea>
                                                <p class="text-danger pt-2">{{$errors->has('gurdian_address') ? $errors->first('gurdian_address') : ''}}</p>
                                            </div>
                                        </div>

                                        <br><br>
                                        <br><br>

                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="local_gurdian_name">Local Gurdian Name</label>
                                                <input name="local_gurdian_name" type="text" class="form-control" id="local_gurdian_name" value="">
                                                <p class="text-danger pt-2">{{$errors->has('local_gurdian_name') ? $errors->first('local_gurdian_name') : ''}}</p>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="local_gurdian_occupation">Local Gurdian Occupation</label>
                                                <input name="local_gurdian_occupation" type="text" class="form-control" id="local_gurdian_occupation" value="">
                                                <p class="text-danger pt-2">{{$errors->has('local_gurdian_occupation') ? $errors->first('local_gurdian_occupation') : ''}}</p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="local_gurdian_mobile">Local Gurdian Mobile</label>
                                                <input name="local_gurdian_mobile" type="number" class="form-control" id="local_gurdian_mobile" value="">
                                                <p class="text-danger pt-2">{{$errors->has('local_gurdian_mobile') ? $errors->first('local_gurdian_mobile') : ''}}</p>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="local_gurdian_email">Local Gurdian Email</label>
                                                <input name="local_gurdian_email" type="email" class="form-control" id="local_gurdian_email" value="">
                                                <p class="text-danger pt-2">{{$errors->has('local_gurdian_email') ? $errors->first('local_gurdian_email') : ''}}</p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                                <label for="local_gurdian_address">Local Gurdian Address</label>
                                                <textarea name="local_gurdian_address" class="form-control" id="local_gurdian_address" cols="30" rows="3"></textarea>
                                                <p class="text-danger pt-2">{{$errors->has('local_gurdian_address') ? $errors->first('local_gurdian_address') : ''}}</p>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary">ADD MEMBER</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
