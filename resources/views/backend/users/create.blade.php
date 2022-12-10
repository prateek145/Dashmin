@extends('backend.layouts.app')
@section('content')
    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-start rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Audit Details</h6>

            </div>
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Audit </h6>
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Firstname</label>
                        <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                            id="firstname" aria-describedby="firstnamehelp">
                        @error('firstname')
                            <label id="firstname-error" class="error text-danger" for="firstname">{{ $message }}</label>
                        @enderror
                        <div id="namehelp" class="form-text">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Lastname</label>
                        <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                            id="lastname" aria-describedby="lastnamehelp">
                        @error('lastname')
                            <label id="lastname-error" class="error text-danger" for="lastname">{{ $message }}</label>
                        @enderror
                        <div id="namehelp" class="form-text">
                        </div>
                    </div>

                    <div class="mb-3">

                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1"
                                    class="form-label @error('password') is-invalid @enderror">Password</label>
                                <input type="text" class="form-control" id="name" name="password"
                                    aria-describedby="namehelp">
                                @error('password')
                                    <label id="password-error" class="error text-danger"
                                        for="password">{{ $message }}</label>
                                @enderror
                                <div id="namehelp" class="form-text">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="exampleInputEmail1"
                                    class="form-label @error('repassword') is-invalid @enderror">RePassword</label>
                                <input type="text" class="form-control" id="name" name="repassword"
                                    aria-describedby="namehelp">
                                @error('repassword')
                                    <label id="repassword-error" class="error text-danger"
                                        for="repassword">{{ $message }}</label>
                                @enderror
                                <div id="namehelp" class="form-text">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1"
                            class="form-label @error('department') is-invalid @enderror">Department</label>
                        <input type="text" class="form-control" id="name" name="department"
                            aria-describedby="namehelp">
                        @error('department')
                            <label id="department-error" class="error text-danger" for="department">{{ $message }}</label>
                        @enderror
                        <div id="namehelp" class="form-text">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label @error('mobile_no') is-invalid @enderror">Mobile
                            No</label>
                        <input type="text" class="form-control" id="name" name="mobile_no"
                            aria-describedby="namehelp">
                        @error('mobile_no')
                            <label id="mobile_no-error" class="error text-danger" for="mobile_no">{{ $message }}</label>
                        @enderror
                        <div id="namehelp" class="form-text">
                        </div>
                    </div>

                    <hr>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" aria-describedby="namehelp">
                        @error('email')
                            <label id="email-error" class="error text-danger" for="email">{{ $message }}</label>
                        @enderror
                        <div id="namehelp" class="form-text">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">SSH Key</label>
                        <input type="text" class="form-control @error('ssh_key') is-invalid @enderror" id="ssh_key"
                            name="ssh_key" aria-describedby="namehelp">
                        @error('ssh_key')
                            <label id="ssh_key-error" class="error text-danger" for="ssh_key">{{ $message }}</label>
                        @enderror
                        <div id="namehelp" class="form-text">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Token</label>
                        <input type="text" class="form-control @error('token') is-invalid @enderror" id="token"
                            name="token" aria-describedby="namehelp">
                        @error('token')
                            <label id="token-error" class="error text-danger" for="token">{{ $message }}</label>
                        @enderror
                        <div id="namehelp" class="form-text">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Certificate</label>
                        <textarea name="certificate" class="form-control @error('certificate') is-invalid @enderror" id=""
                            cols="30" rows="5"></textarea>
                        @error('certificate')
                            <label id="certificate-error" class="error text-danger"
                                for="certificate">{{ $message }}</label>
                        @enderror
                        <div id="namehelp" class="form-text">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
@endsection
