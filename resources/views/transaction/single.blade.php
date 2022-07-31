@extends('layouts.app')

@section('content')

    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Transaction Details</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Transaction Details</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('transactions') }}"><button type="button" class="btn btn-light">Back</button></a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Manage Transaction Details</h5>
                    <hr />
					@include('misc.errors')
					<form method="post" action="{{ route('edit.transaction', $data->id) }}">
						@csrf
						<div class="form-body mt-4">
							<div class="row">
								<div class="col-lg-6">
									<div class="border border-3 p-4 rounded">
										<div class="row g-3">
											<div class="col-12">
												<label class="form-label">User ID</label>
												<input type="text" class="form-control" name="user_id"
													value="{{ $data->user_id }}">
											</div>
											<div class="col-12">
												<label class="form-label">Action</label>
												<input type="text" class="form-control" name="action"
													value="{{ $data->action }}">
											</div>
											<div class="col-12">
												<label class="form-label">Amount</label>
												<input type="text" class="form-control" name="amount"
													value="{{ $data->amount }}">
											</div>
											<div class="col-12">
												<label class="form-label">Type</label>
												<select class="form-control" name="type">
													<option value="DEBIT" {{ $data->type == "DEBIT" ? "selected" : "" }}>DEBIT</option>
													<option value="CREDIT" {{ $data->type == "CREDIT" ? "selected" : "" }}>CREDIT</option>
												</select>
											</div>
											<div class="col-12">
												<label class="form-label">Status</label>
												<select class="form-control" name="status">
													<option value="COMPLETED" {{ $data->status == "COMPLETED" ? "selected" : "" }}>COMPLETED</option>
													<option value="PENDING" {{ $data->status == "PENDING" ? "selected" : "" }}>PENDING</option>
													<option value="FAILED" {{ $data->status == "FAILED" ? "selected" : "" }}>FAILED</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="border border-3 p-4 rounded">
										<div class="row g-3">
											<div class="col-12">
												<label class="form-label">Description</label>
												<input type="text" class="form-control" name="description"
													value="{{ $data->description }}">
											</div>
											<div class="col-12">
												<label class="form-label">Reference</label>
												<input type="text" class="form-control" name="reference"
													value="{{ $data->reference }}">
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
