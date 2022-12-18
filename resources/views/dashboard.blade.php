@extends('layouts.main')

@section('content')

    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0">Transaction Value (Today)</p>
                                    <h4 class="my-1">₦48,455,305</h4>
                                    <p class="mb-0 font-13"><i class='bx bxs-up-arrow align-middle'></i>34% Since last week
                                    </p>
                                </div>
                                <div class="dropdown ms-auto">
                                    <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                        data-bs-toggle="dropdown"> <i class='bx bx-dots-horizontal-rounded font-22'></i>
                                    </div>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="javascript:;">Today</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">7 Days</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">30 Days</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">All Time</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0">Transaction Volume (Today)</p>
                                    <h4 class="my-1">12,454</h4>
                                    <p class="mb-0 font-13"><i class='bx bxs-up-arrow align-middle'></i>14% Since last week
                                    </p>
                                </div>
                                <div class="dropdown ms-auto">
                                    <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                        data-bs-toggle="dropdown"> <i class='bx bx-dots-horizontal-rounded font-22'></i>
                                    </div>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="javascript:;">Today</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">7 Days</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">30 Days</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:;">All Time</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0">Total Users</p>
                                    <h4 class="my-1">{{ App\Models\User::count() }}</h4>
                                    <p class="mb-0 font-13"><i class='bx bxs-down-arrow align-middle'></i>12.4% Since last
                                        week</p>
                                </div>
                                <div class="widgets-icons ms-auto"><i class='bx bxs-group'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
            <!--start row2-->
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0">Wallet Balance</p>
                                    <h4 class="my-1">{{ amountNGN(App\Models\Wallet::sum('current_balance')) }}</h4>
                                    <p class="mb-0 font-13"><i class='bx bxs-up-arrow align-middle'></i>34% Since last week
                                    </p>
                                </div>
                                <div class="widgets-icons ms-auto"><i class='bx bxs-wallet'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0">Users With Balance</p>
                                    <h4 class="my-1">{{ App\Models\Wallet::where('current_balance', '>', 0)->count() }}</h4>
                                    <p class="mb-0 font-13"><i class='bx bxs-up-arrow align-middle'></i>14% Since last week
                                    </p>
                                </div>
                                <div class="widgets-icons ms-auto"><i class='bx bxs-group'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0">Average Balance</p>
                                    <h4 class="my-1">{{ amountNGN((App\Models\Wallet::sum('current_balance')/App\Models\Wallet::where('current_balance', '>', 0)->count())) }}</h4>
                                    <p class="mb-0 font-13"><i class='bx bxs-down-arrow align-middle'></i>12.4% Since last
                                        week</p>
                                </div>
                                <div class="widgets-icons ms-auto"><i class='bx bxs-binoculars'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row2 -->
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h5 class="mb-0">Latest Transactions</h5>
                        </div>
                        <div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
                        </div>
                    </div>
                    <hr />
                    @if (!empty($data))
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>User ID</th>
                                        <th>Amount (₦)</th>
                                        <th>Reference</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $row)
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
                                            <td>{{ amountNGN($row->amount) }}</td>
                                            <td>{{ $row->reference }}</td>
                                            <td>
                                                <div class="d-flex order-actions">
                                                    <a href="{{ route('transaction', $row->id) }}" class="ms-3"><i
                                                            class='bx bxs-show'></i></a>
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

                    @if (!empty($data))
                        {{ $data->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->

@endsection
