@extends('layouts.app')

@section('content')

    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">ID Details</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Manage ID Details</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('ids') }}"><button type="button" class="btn btn-light">Back</button></a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
			
			@php
				$extra = json_decode($data->meta, true)
			@endphp

            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Manage ID Details</h5>
                    <hr />
					@include('misc.errors')
					<form method="post" action="{{ route('edit.id', $data->id) }}">
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
												<label class="form-label">Value</label>
												<input type="text" class="form-control" name="value"
													value="{{ $data->value }}">
											</div>
											<div class="col-12">
												<label class="form-label">Type</label>
												<input type="text" class="form-control" name="type"
													value="{{ $extra['type'] }}">
											</div>
											<div class="col-12">
												<label class="form-label">Level</label>
												<input type="text" class="form-control" name="level"
													value="{{ $data->level }}">
											</div>
											<div class="col-12">
												<label class="form-label">Status</label>
												<select class="form-control" name="status">
													<option value="1" {{ $data->status == "APPROVED" ? "selected" : "" }}>APPROVED</option>
													<option value="0" {{ $data->status == "PENDING" ? "selected" : "" }}>PENDING</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="border border-3 p-4 rounded">
										<div class="row g-3">
											<div class="col-12">
												<label class="form-label">IMAGES</label>
												<div class="d-lg-flex justify-content-center">
													<div><a href="{{ $extra['front_image'] }}"><img src="{{ $extra['front_image'] }}" class="img-responsive" width="320" height="240"/></a></div>
													<div><a href="{{ $extra['back_image'] }}"><img src="{{ $extra['back_image'] }}" class="img-responsive" width="320" height="240"/></a></div>
												</p>
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
