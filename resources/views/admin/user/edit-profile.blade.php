@extends('admin.main')
@section('title','dashboard')
@section('css')
    <link href="{{ URL::asset('assets/plugins/morris/morris.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/rating/rating.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- PAGE-HEADER -->
    <div>
        <h1 class="page-title">Dashboard</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
    </div>
    <!-- PAGE-HEADER END -->
@endsection

@section('content')
<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form id="profileImageForm" enctype="multipart/form-data">
                    @csrf
                <div class="text-center">
                    <div class="userprofile">
                        <input type="hidden" class="userid" name="userid">
                        <div class="userpic  brround" style="margin-bottom: 40px;">
                            <img src="" alt="" class="userpicimg getUserProfile">

                            <label for="profileImage" style="margin-left: 120px; margin-bottom: 10px; font-size: 16px;"><i class="fa fa-camera"></i></label>
                            <input type="file" name="avatar" id="profileImage" onchange="displayImage(this)" style="display: none;visibility: none;">

                        </div>
                        <h3 class="getFullName text-dark mb-2"></h3>
                        <p class="mb-1 text-muted getCompany"></p>
{{--                        <div class="text-center mb-4">--}}
{{--                            <span><i class="fa fa-star text-warning"></i></span>--}}
{{--                            <span><i class="fa fa-star text-warning"></i></span>--}}
{{--                            <span><i class="fa fa-star text-warning"></i></span>--}}
{{--                            <span><i class="fa fa-star-half-o text-warning"></i></span>--}}
{{--                            <span><i class="fa fa-star-o text-warning"></i></span>--}}
{{--                        </div>--}}
{{--                        <div class="socials text-center mt-3">--}}
{{--                            <a href="" class="btn btn-circle btn-primary ">--}}
{{--                                <i class="fa fa-facebook"></i></a> <a href="" class="btn btn-circle btn-danger ">--}}
{{--                                <i class="fa fa-google-plus"></i></a> <a href="" class="btn btn-circle btn-info ">--}}
{{--                                <i class="fa fa-twitter"></i></a> <a href="" class="btn btn-circle btn-warning "><i class="fa fa-envelope"></i></a>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <input type="submit" name="submit" class="btn btn-success pull-right" id="updateImageId" value="update">
                </form>
            </div>
        </div>
        <div class="card">
            <form id="passwordChange">
                @csrf
            <div class="card-header">
                <div class="card-title">Edit Password</div>
            </div>
            <div class="card-body">

{{--                <div class="d-flex mb-3">--}}
{{--                    <img alt="" class="rounded-circle avatar-lg mr-2 getUserProfile" src="">--}}
{{--                    <div class="ml-auto mt-xl-2 mt-lg-0 ml-lg-2">--}}
{{--                        <a href="#" class="btn btn-primary btn-sm mt-1 mb-1"><i class="fe fe-camera mr-1"></i>Edit profile</a>--}}
{{--                        <a href="#" class="btn btn-danger btn-sm mt-1 mb-1"><i class="fe fe-camera-off mr-1"></i>Delete profile</a>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <input type="hidden" class="userid" name="userid">

                <div class="form-group">
                    <label class="form-label">Old Password</label>
                    <input type="password" class="form-control" name="oldpassword" id="oldpassword" placeholder="Given old password" required>
                </div>
                <div class="form-group">
                    <label class="form-label">New Password</label>
                    <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="Given new password" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Given confirm password" required>
                </div>
            </div>
            <div class="card-footer text-right">

                <input type="submit" class="btn btn-success" name="submit" value="Change password">
                <button type="button" class="btn btn-danger" onclick="ResetForm()">Cancel</button>
            </div>
            </form>
        </div>

    </div>
    <div class="col-lg-8 col-xl-8 col-md-12 col-sm-12">
        <div class="card">
            <form id="updateProfileData">
                @csrf
            <div class="card-header">
                <h3 class="card-title">Edit Profile</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <input type="hidden" class="userid" name="userid">
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="exampleInputname">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="exampleInputFirstname" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="exampleInputname1">Last Name</label>
                            <input type="text" class="form-control"  name="last_name" id="exampleInputLastname" placeholder="Enter Last Name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Company</label>
                            <input type="text" class="form-control" name="company" id="exampleInputCompany" placeholder="Enter Company name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="exampleInputnumber">Mobile Number</label>
                            <input type="text" class="form-control" name="mobile" id="exampleInputnumber" placeholder="Enter mobile number">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" id="exampleInputAddress" placeholder="Enter Address">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label class="form-label">State</label>
                            <input type="text" class="form-control" name="state" id="exampleInputState" placeholder="Enter State">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control" name="city" id="exampleInputCity" placeholder="Enter City">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label class="form-label">Zipcode</label>
                            <input type="text" class="form-control" name="zip_code" id="exampleInputZipcode" placeholder="Enter Zipcode">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label class="form-label">Country</label>
                            <select  class="form-control" name="country" id="country" aria-invalid="country" placeholder="select country">
{{--                                <option value="BD">Bangladesh</option>--}}
{{--                                <option value="PK">pakistan</option>--}}
{{--                                <option value="IN">India</option>--}}
                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <input type="submit" class="btn btn-success" name="submit" value="Save">
                <button type="button" class="btn btn-danger" onclick="ResetDataForm()">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- ROW-1 CLOSED -->
@endsection

{{--@section('js')--}}
{{--<script type="text/javascript">--}}

{{--    let getUser = localStorage.getItem("userData");--}}

{{--    var data = JSON.parse(getUser);--}}
{{--    console.log(data)--}}
{{--</script>--}}
{{--@endsection--}}

