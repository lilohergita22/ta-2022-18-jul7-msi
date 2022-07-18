@extends('layouts.admin')



@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>User Details
                        <a href="{{ url('users') }}" class="btn btn-primary btn-sm float-right">Back</a>
                    </h4>
                    <hr>
                </div>
                <!-- fetch the users and view the user details in our admin -->


                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mt-3">
                            <label for="">Role</label>
                            <div class="p-2 border">{{ $users->role_as == '0'? 'User':'Admin' }}</div>
                            <!-- if user of role as is == 0, then show User. else show Admin. -->
                        </div>
                        <div class="col-md-4 mt-3">
                            <!-- $users = from dashboardcontrollre $users dari function viewuser -->
                            <label for="">First Name</label>
                            <div class="p-2 border">{{ $users->name }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Last Name</label>
                            <div class="p-2 border">{{ $users->lname }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Email</label>
                            <div class="p-2 border">{{ $users->email }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Phone</label>
                            <div class="p-2 border">{{ $users->phone }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Address 1</label>
                            <div class="p-2 border">{{ $users->address1 }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Address 2</label>
                            <div class="p-2 border">{{ $users->address2 }}</div>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label for="">City</label>
                            <div class="p-2 border">{{ $users->city }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">State</label>
                            <div class="p-2 border">{{ $users->state }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Country</label>
                            <div class="p-2 border">{{ $users->country }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Pin Code</label>
                            <div class="p-2 border">{{ $users->pincode }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection