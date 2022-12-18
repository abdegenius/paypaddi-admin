@extends('layouts.main')

@section('content')

    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Beneficiary Details</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Beneficiary Details</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('beneficiaries') }}"><button type="button" class="btn btn-light">Back</button></a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Manage Beneficiary Details</h5>
                    <hr />
					@include('misc.errors')
					<form method="post" action="{{ route('edit.beneficiary', $data->id) }}">
						@csrf
						<div class="form-body mt-4">
							<div class="row">
								<div class="col-lg-6">
									<div class="border border-3 p-4 rounded">
										<div class="row g-3">
											<div class="col-12">
												<label class="form-label">User ID</label>
												<input type="text" class="form-control" name="beneficiary_id"
													value="{{ $data->beneficiary_id }}">
											</div>
											<div class="col-12">
												<label class="form-label">Name</label>
												<input type="text" class="form-control" name="name"
													value="{{ $data->name }}">
											</div>
											<div class="col-12">
												<label class="form-label">Logo</label>
												<input type="text" class="form-control" name="logo"
													value="{{ $data->logo }}">
											</div>
											<div class="col-12">
												<label class="form-label">Service</label>
												<input type="text" class="form-control" name="service"
													value="{{ $data->service }}">
											</div>
											<div class="col-12">
												<label class="form-label">Status</label>
												<select class="form-control" name="status">
													<option value="1" {{ $data->status == "ACTIVE" ? "selected" : "" }}>ACTIVE</option>
													<option value="0" {{ $data->status == "INACTIVE" ? "selected" : "" }}>INACTIVE</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="border border-3 p-4 rounded">
										<div class="row g-3">
											
											<div class="col-12">
												<label class="form-label">Service Name</label>
												<input type="text" class="form-control" name="service_name"
													value="{{ $data->service_name }}">
											</div>
											<div class="col-12">
												<label class="form-label">Service Code</label>
												<input type="text" class="form-control" name="service_code"
													value="{{ $data->service_code }}">
											</div>
											<div class="col-12">
												<label class="form-label">Service Number</label>
												<input type="text" class="form-control" name="service_number"
													value="{{ $data->service_number }}">
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
