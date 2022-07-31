@extends('layouts.app')

@section('content')

    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">User Details</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Manage User Details</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('users') }}"><button type="button" class="btn btn-light">Back</button></a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Manage User Details</h5>
                    <hr />
					@include('misc.errors')
					<form method="post" action="{{ route('edit.user', $data->id) }}">
						@csrf
						<div class="form-body mt-4">
							<div class="row">
								<div class="col-lg-6">
									<div class="border border-3 p-4 rounded">
										<div class="row g-3">
											<div class="col-12">
												<label class="form-label">User ID</label>
												<input type="text" class="form-control" name="id"
													value="{{ $data->id }}">
											</div>
											<div class="col-12">
												<label class="form-label">Firstname</label>
												<input type="text" class="form-control" name="firstname"
													value="{{ $data->firstname }}">
											</div>
											<div class="col-12">
												<label class="form-label">Lastname</label>
												<input type="text" class="form-control" name="lastname"
													value="{{ $data->lastname }}">
											</div>
											<div class="col-12">
												<label class="form-label">Type</label>
												<select class="form-control" name="type">
													<option value="user" {{ $data->type == "USER" ? "selected" : "" }}>USER</option>
													<option value="admin" {{ $data->type == "ADMIN" ? "selected" : "" }}>ADMIN</option>
												</select>
											</div>
											<div class="col-12">
												<label class="form-label">Username</label>
												<input type="text" class="form-control" name="username"
													value="{{ $data->username }}">
											</div>
											<div class="col-12">
												<label class="form-label">Email Address</label>
												<input type="text" class="form-control" name="email"
													value="{{ $data->email }}">
											</div>
											<div class="col-12">
												<label class="form-label">Gender</label>
												<input type="text" class="form-control" name="gender"
													value="{{ $data->gender }}">
											</div>
											<div class="col-12">
												<label class="form-label">Status</label>
												<select class="form-control" name="is_active">
													<option value="1" {{ $data->is_active == "ACTIVE" ? "selected" : "" }}>ACTIVE</option>
													<option value="0" {{ $data->is_active == "INACTIVE" ? "selected" : "" }}>INACTIVE</option>
												</select>
											</div>
											<div class="col-12">
												<label class="form-label">Phone Number</label>
												<input type="text" class="form-control" name="phone"
													value="{{ $data->phone }}">
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="border border-3 p-4 rounded">
										<div class="row g-3">
											<div class="col-12">
												<label class="form-label">Password</label>
												<input type="text" class="form-control" name="password">
											</div>
											<div class="col-12">
												<label class="form-label">Email Token</label>
												<input type="text" class="form-control" name="email_token"
													value="{{ $data->email_token }}">
											</div>
											<div class="col-12">
												<label class="form-label">Pin</label>
												<input type="text" class="form-control" name="pin"
													value="{{ $data->pin }}">
											</div>
											<div class="col-12">
												<label class="form-label">Referral Code</label>
												<input type="text" class="form-control" name="referral_code"
													value="{{ $data->referral_code }}">
											</div>
											<div class="col-12">
												<label class="form-label">Unique Code</label>
												<input type="text" class="form-control" name="unique_code"
													value="{{ $data->unique_code }}">
											</div>
											<div class="col-12">
												<label class="form-label">Address</label>
												<input type="text" class="form-control" name="address"
													value="{{ $data->address }}">
											</div>
											<div class="col-12">
												<label class="form-label">Middlename</label>
												<input type="text" class="form-control" name="middlename"
													value="{{ $data->middlename }}">
											</div>
											<div class="col-12">
												<label class="form-label">Created at</label>
												<input type="text" class="form-control" name="created_at"
													value="{{ $data->created_at }}">
											</div>
											<div class="col-12">
												<label class="form-label">Updated at</label>
												<input type="text" class="form-control" name="updated_at"
													value="{{ $data->updated_at }}">
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-light">Save Changes</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--end row-->
						</div>
					</form>
                </div>
            </div>

        </div>
    </div>
    <!--end page wrapper -->

@endsection
