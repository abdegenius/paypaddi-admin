@extends('layouts.app')

@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">User</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">User Transactions</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <div class="d-lg-flex align-items-center mb-4 gap-3">
                        <div class="position-relative">
                            <input type="text" class="form-control ps-5 radius-30" placeholder="Search Order"> <span
                                class="position-absolute top-50 product-show translate-middle-y"><i
                                    class="bx bx-search"></i></span>
                        </div>
                    </div>
					@if(!empty($data))
						<div class="table-responsive">
							<table class="table mb-0">
								<thead class="table-light">
									<tr>
										<th>Date</th>
										<th>Type</th>
										<th>Fullname</th>
										<th>Status</th>
										<th>Email Address</th>
										<th>Phone</th>
										<th>Username</th>
										<th>KYC1</th>
										<th>KYC2</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									@foreach($data as $key => $row)
									@php
										$kyc1 = App\Models\Kyc::where("user_id", $row->id)->where('level','1')->first();
										$kyc2 = App\Models\Kyc::where("user_id", $row->id)->where('level','2')->first();
									@endphp
										<tr>
											<td>
												<div class="d-flex align-items-center">
													<div class="ms-2">
														<h6 class="mb-0 font-14">{{ $row->created_at }}</h6>
													</div>
												</div>
											</td>
											<td>{{ $row->type }}</td>
											<td>{{ $row ? $row->firstname." ".$row->lastname : '' }}</td>
											<td>{{ $row->is_active ? 'Active' : 'Inactive' }}</td>
											<td>{{ $row ? $row->email : '' }}</td>
											<td>{{ $row ? $row->phone : '' }}</td>
											<td>{{ $row ? $row->username : '' }}</td>
											<td>{{ $kyc1 && $kyc1->status ? "Approved" : '' }}</td>
											<td>{{ $kyc2 && $kyc2->status ? "Approved" : '' }}</td>
											<td>
												<div class="d-flex order-actions">
													<a href="{{ route('user', $row->id) }}" class="ms-3"><i class='bx bxs-show'></i></a>
												</div>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					@else
						<p>No data available yet..</p>
					@endif
                    <p></p>
                    
					@if(!empty($data))
						{{ $data->links() }}
					@endif
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
@endsection
