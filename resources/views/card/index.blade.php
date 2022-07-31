@extends('layouts.app')

@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Card</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Card Transactions</li>
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
										<th>Status</th>
										<th>User ID</th>
										<th>Email Address</th>
										<th>Currency</th>
										<th>Open Amount (₦)</th>
										<th>Reference</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									@foreach($data as $key => $row)
										<tr>
											<td>
												<div class="d-flex align-items-center">
													<div class="ms-2">
														<h6 class="mb-0 font-14">{{ $row->created_at }}</h6>
													</div>
												</div>
											</td>
											<td>{{ $row->type }}</td>
											<td>{!! status($row->status) !!}</td>
											<td>{{ $row->user_id }}</td>
											<td>{{ $row->user ? $row->user->email : '' }}</td>
											<td>{{ $row->currency }}</td>
											<td>{{ amountNGN($row->total_amount) }}</td>
											<td>{{ $row->card_id }}</td>
											<td>
												<div class="d-flex order-actions">
													<a href="{{ route('card', $row->id) }}" class="ms-3"><i class='bx bxs-show'></i></a>
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
