@extends('layouts.app')

@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Settings</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Settings</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('dashboard') }}"><button type="button" class="btn btn-light">Back</button></a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Manage Settings</h5>
                    <hr />
                    @include('misc.errors')
                    <form method="post" action="{{ route('post.settings') }}">
                        @csrf
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label class="form-label">IDENTITY_API_KEY</label>
                                                <input type="text" class="form-control" name="IDENTITY_API_KEY"
                                                    value="{{ $data->IDENTITY_API_KEY }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">IDENTITY_PARTNER_ID</label>
                                                <input type="text" class="form-control" name="IDENTITY_PARTNER_ID"
                                                    value="{{ $data->IDENTITY_PARTNER_ID }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">MONNIFY_API_KEY</label>
                                                <input type="text" class="form-control" name="MONNIFY_API_KEY"
                                                    value="{{ $data->MONNIFY_API_KEY }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">MONNIFY_SECRET_KEY</label>
                                                <input type="text" class="form-control" name="MONNIFY_SECRET_KEY"
                                                    value="{{ $data->MONNIFY_SECRET_KEY }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">MONNIFY_CONTRACT</label>
                                                <input type="text" class="form-control" name="MONNIFY_CONTRACT"
                                                    value="{{ $data->MONNIFY_CONTRACT }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">MONNIFY_URL</label>
                                                <input type="text" class="form-control" name="MONNIFY_URL"
                                                    value="{{ $data->MONNIFY_URL }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">MONNIFY_URL2</label>
                                                <input type="text" class="form-control" name="MONNIFY_URL2"
                                                    value="{{ $data->MONNIFY_URL2 }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">VTPASS_URL</label>
                                                <input type="text" class="form-control" name="VTPASS_URL"
                                                    value="{{ $data->VTPASS_URL }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">VTPASS_USERNAME</label>
                                                <input type="text" class="form-control" name="VTPASS_USERNAME"
                                                    value="{{ $data->VTPASS_USERNAME }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">VTPASS_PASSWORD</label>
                                                <input type="text" class="form-control" name="VTPASS_PASSWORD"
                                                    value="{{ $data->VTPASS_PASSWORD }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">SAGECLOUD_URL</label>
                                                <input type="text" class="form-control" name="SAGECLOUD_URL"
                                                    value="{{ $data->SAGECLOUD_URL }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">SAGECLOUD_EMAIL</label>
                                                <input type="text" class="form-control" name="SAGECLOUD_EMAIL"
                                                    value="{{ $data->SAGECLOUD_EMAIL }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">SAGECLOUD_PASSWORD</label>
                                                <input type="text" class="form-control" name="SAGECLOUD_PASSWORD"
                                                    value="{{ $data->SAGECLOUD_PASSWORD }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">FLUTTERWAVE_PUBLIC_KEY</label>
                                                <input type="text" class="form-control" name="FLUTTERWAVE_PUBLIC_KEY"
                                                    value="{{ $data->FLUTTERWAVE_PUBLIC_KEY }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">FLUTTERWAVE_SECRET_KEY</label>
                                                <input type="text" class="form-control" name="FLUTTERWAVE_SECRET_KEY"
                                                    value="{{ $data->FLUTTERWAVE_SECRET_KEY }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">FLUTTERWAVE_ENCRYPTION_KEY</label>
                                                <input type="text" class="form-control"
                                                    name="FLUTTERWAVE_ENCRYPTION_KEY"
                                                    value="{{ $data->FLUTTERWAVE_ENCRYPTION_KEY }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">FLUTTERWAVE_ENCRYPTION_KEY</label>
                                                <input type="text" class="form-control"
                                                    name="FLUTTERWAVE_ENCRYPTION_KEY"
                                                    value="{{ $data->FLUTTERWAVE_ENCRYPTION_KEY }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">FLUTTERWAVE_URL</label>
                                                <input type="text" class="form-control" name="FLUTTERWAVE_URL"
                                                    value="{{ $data->FLUTTERWAVE_URL }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">AIRTIME_FEE</label>
                                                <input type="text" class="form-control" name="AIRTIME_FEE"
                                                    value="{{ $data->AIRTIME_FEE }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">DATA_FEE</label>
                                                <input type="text" class="form-control" name="DATA_FEE"
                                                    value="{{ $data->DATA_FEE }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">ELECTRICITY_FEE</label>
                                                <input type="text" class="form-control" name="ELECTRICITY_FEE"
                                                    value="{{ $data->ELECTRICITY_FEE }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">EDUCATION_FEE</label>
                                                <input type="text" class="form-control" name="EDUCATION_FEE"
                                                    value="{{ $data->EDUCATION_FEE }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">BETTING_FEE</label>
                                                <input type="text" class="form-control" name="BETTING_FEE"
                                                    value="{{ $data->BETTING_FEE }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">CABLE_FEE</label>
                                                <input type="text" class="form-control" name="CABLE_FEE"
                                                    value="{{ $data->CABLE_FEE }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">TRANSFER_FEE1</label>
                                                <input type="text" class="form-control" name="TRANSFER_FEE1"
                                                    value="{{ $data->TRANSFER_FEE1 }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">TRANSFER_FEE2</label>
                                                <input type="text" class="form-control" name="TRANSFER_FEE2"
                                                    value="{{ $data->TRANSFER_FEE2 }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">CARD_CREATE_FEE_NAIRA</label>
                                                <input type="text" class="form-control" name="CARD_CREATE_FEE_NAIRA"
                                                    value="{{ $data->CARD_CREATE_FEE_NAIRA }}">
                                            </div>
											<div class="col-12">
                                                <label class="form-label">CARD_CREATE_FEE_DOLLAR</label>
                                                <input type="text" class="form-control" name="CARD_CREATE_FEE_DOLLAR"
                                                    value="{{ $data->CARD_CREATE_FEE_DOLLAR }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">CARD_FUND_FEE_NAIRA</label>
                                                <input type="text" class="form-control" name="CARD_FUND_FEE_NAIRA"
                                                    value="{{ $data->CARD_FUND_FEE_NAIRA }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">CARD_FUND_FEE_DOLLAR</label>
                                                <input type="text" class="form-control" name="CARD_FUND_FEE_DOLLAR"
                                                    value="{{ $data->CARD_FUND_FEE_DOLLAR }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label class="form-label">CARD_WITHDRAW_FEE_NAIRA</label>
                                                <input type="text" class="form-control" name="CARD_WITHDRAW_FEE_NAIRA"
                                                    value="{{ $data->CARD_WITHDRAW_FEE_NAIRA }}">
                                            </div>                                            
                                            <div class="col-12">
                                                <label class="form-label">DOLLAR_RATE_CHARGE</label>
                                                <input type="text" class="form-control" name="DOLLAR_RATE_CHARGE"
                                                    value="{{ $data->DOLLAR_RATE_CHARGE }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">MTN_LOGO</label>
                                                <input type="text" class="form-control" name="MTN_LOGO"
                                                    value="{{ $data->MTN_LOGO }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">AIRTEL_LOGO</label>
                                                <input type="text" class="form-control" name="AIRTEL_LOGO"
                                                    value="{{ $data->AIRTEL_LOGO }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">GLO_LOGO</label>
                                                <input type="text" class="form-control" name="GLO_LOGO"
                                                    value="{{ $data->GLO_LOGO }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">NINEMOBILE_LOGO</label>
                                                <input type="text" class="form-control" name="NINEMOBILE_LOGO"
                                                    value="{{ $data->NINEMOBILE_LOGO }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">SPECTRANET_LOGO</label>
                                                <input type="text" class="form-control" name="SPECTRANET_LOGO"
                                                    value="{{ $data->SPECTRANET_LOGO }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">SMILE_LOGO</label>
                                                <input type="text" class="form-control" name="SMILE_LOGO"
                                                    value="{{ $data->SMILE_LOGO }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">DSTV_LOGO</label>
                                                <input type="text" class="form-control" name="DSTV_LOGO"
                                                    value="{{ $data->DSTV_LOGO }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">GOTV_LOGO</label>
                                                <input type="text" class="form-control" name="GOTV_LOGO"
                                                    value="{{ $data->GOTV_LOGO }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">SHOWMAX_LOGO</label>
                                                <input type="text" class="form-control" name="SHOWMAX_LOGO"
                                                    value="{{ $data->SHOWMAX_LOGO }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">STARTIMES_LOGO</label>
                                                <input type="text" class="form-control" name="STARTIMES_LOGO"
                                                    value="{{ $data->STARTIMES_LOGO }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">WAEC_LOGO</label>
                                                <input type="text" class="form-control" name="WAEC_LOGO"
                                                    value="{{ $data->WAEC_LOGO }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">NECO_LOGO</label>
                                                <input type="text" class="form-control" name="NECO_LOGO"
                                                    value="{{ $data->NECO_LOGO }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">JAMB_LOGO</label>
                                                <input type="text" class="form-control" name="JAMB_LOGO"
                                                    value="{{ $data->JAMB_LOGO }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">KAEDCO_LOGO</label>
                                                <input type="text" class="form-control" name="KAEDCO_LOGO"
                                                    value="{{ $data->KAEDCO_LOGO }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">IKEDC_LOGO</label>
                                                <input type="text" class="form-control" name="IKEDC_LOGO"
                                                    value="{{ $data->IKEDC_LOGO }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">EKEDC_LOGO</label>
                                                <input type="text" class="form-control" name="EKEDC_LOGO"
                                                    value="{{ $data->EKEDC_LOGO }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">AEDC_LOGO</label>
                                                <input type="text" class="form-control" name="AEDC_LOGO"
                                                    value="{{ $data->AEDC_LOGO }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">KEDCO_LOGO</label>
                                                <input type="text" class="form-control" name="KEDCO_LOGO"
                                                    value="{{ $data->KEDCO_LOGO }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">PHED_LOGO</label>
                                                <input type="text" class="form-control" name="PHED_LOGO"
                                                    value="{{ $data->PHED_LOGO }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">JED_LOGO</label>
                                                <input type="text" class="form-control" name="JED_LOGO"
                                                    value="{{ $data->JED_LOGO }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">IBEDC_LOGO</label>
                                                <input type="text" class="form-control" name="IBEDC_LOGO"
                                                    value="{{ $data->IBEDC_LOGO }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">PHCN_LOGO</label>
                                                <input type="text" class="form-control" name="PHCN_LOGO"
                                                    value="{{ $data->PHCN_LOGO }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">REFERRAL_BONUS_AFTER</label>
                                                <input type="text" class="form-control" name="REFERRAL_BONUS_AFTER"
                                                    value="{{ $data->REFERRAL_BONUS_AFTER }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">REFERRAL_BONUS_AMOUNT</label>
                                                <input type="text" class="form-control" name="REFERRAL_BONUS_AMOUNT"
                                                    value="{{ $data->REFERRAL_BONUS_AMOUNT }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">MAX_DAILY_KYC1</label>
                                                <input type="text" class="form-control" name="MAX_DAILY_KYC1"
                                                    value="{{ $data->MAX_DAILY_KYC1 }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">MAX_DAILY_KYC2</label>
                                                <input type="text" class="form-control" name="MAX_DAILY_KYC2"
                                                    value="{{ $data->MAX_DAILY_KYC2 }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">MAX_PER_KYC1</label>
                                                <input type="text" class="form-control" name="MAX_PER_KYC1"
                                                    value="{{ $data->MAX_PER_KYC1 }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">MAX_PER_KYC2</label>
                                                <input type="text" class="form-control" name="MAX_PER_KYC2"
                                                    value="{{ $data->MAX_PER_KYC2 }}">
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
