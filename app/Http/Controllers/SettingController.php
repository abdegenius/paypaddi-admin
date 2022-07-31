<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function update(Request $request)
    {
        $settings = Setting::findOrFail(1);
        $settings->IDENTITY_API_KEY = $request->IDENTITY_API_KEY;
        $settings->IDENTITY_PARTNER_ID = $request->IDENTITY_PARTNER_ID;
        $settings->MONNIFY_API_KEY = $request->MONNIFY_API_KEY;
        $settings->MONNIFY_SECRET_KEY = $request->MONNIFY_SECRET_KEY;
        $settings->MONNIFY_CONTRACT = $request->MONNIFY_CONTRACT;
        $settings->MONNIFY_URL = $request->MONNIFY_URL;
        $settings->MONNIFY_URL2 = $request->MONNIFY_URL2;
        $settings->VTPASS_URL = $request->VTPASS_URL;
        $settings->VTPASS_USERNAME = $request->VTPASS_USERNAME;
        $settings->VTPASS_PASSWORD = $request->VTPASS_PASSWORD;
        $settings->SAGECLOUD_URL = $request->SAGECLOUD_URL;
        $settings->SAGECLOUD_EMAIL = $request->SAGECLOUD_EMAIL;
        $settings->SAGECLOUD_PASSWORD = $request->SAGECLOUD_PASSWORD;
        $settings->FLUTTERWAVE_PUBLIC_KEY = $request->FLUTTERWAVE_PUBLIC_KEY;
        $settings->FLUTTERWAVE_SECRET_KEY = $request->FLUTTERWAVE_SECRET_KEY;
        $settings->FLUTTERWAVE_ENCRYPTION_KEY = $request->FLUTTERWAVE_ENCRYPTION_KEY;
        $settings->FLUTTERWAVE_URL = $request->FLUTTERWAVE_URL;
        $settings->AIRTIME_FEE = $request->AIRTIME_FEE;
        $settings->DATA_FEE = $request->DATA_FEE;
        $settings->ELECTRICITY_FEE = $request->ELECTRICITY_FEE;
        $settings->EDUCATION_FEE = $request->EDUCATION_FEE;
        $settings->CABLE_FEE = $request->CABLE_FEE;
        $settings->BETTING_FEE = $request->BETTING_FEE;
        $settings->TRANSFER_FEE1 = $request->TRANSFER_FEE1;
        $settings->TRANSFER_FEE2 = $request->TRANSFER_FEE2;
        $settings->TRANSFER_FEE1_LIMIT = $request->TRANSFER_FEE1_LIMIT;
        $settings->CARD_CREATE_FEE_NAIRA = $request->CARD_CREATE_FEE_NAIRA;
        $settings->CARD_CREATE_FEE_DOLLAR = $request->CARD_CREATE_FEE_DOLLAR;
        $settings->CARD_FUND_FEE_NAIRA = $request->CARD_FUND_FEE_NAIRA;
        $settings->CARD_FUND_FEE_DOLLAR = $request->CARD_FUND_FEE_DOLLAR;
        $settings->CARD_WITHDRAW_FEE_NAIRA = $request->CARD_WITHDRAW_FEE_NAIRA;
        $settings->DOLLAR_RATE_CHARGE = $request->DOLLAR_RATE_CHARGE;
        $settings->MTN_LOGO = $request->MTN_LOGO;
        $settings->AIRTEL_LOGO = $request->AIRTEL_LOGO;
        $settings->GLO_LOGO = $request->GLO_LOGO;
        $settings->NINEMOBILE_LOGO = $request->NINEMOBILE_LOGO;
        $settings->SMILE_LOGO = $request->SMILE_LOGO;
        $settings->SPECTRANET_LOGO = $request->SPECTRANET_LOGO;
        $settings->DSTV_LOGO = $request->DSTV_LOGO;
        $settings->GOTV_LOGO = $request->GOTV_LOGO;
        $settings->STARTIMES_LOGO = $request->STARTIMES_LOGO;
        $settings->WAEC_LOGO = $request->WAEC_LOGO;
        $settings->NECO_LOGO = $request->NECO_LOGO;
        $settings->JAMB_LOGO = $request->JAMB_LOGO;
        $settings->SHOWMAX_LOGO = $request->SHOWMAX_LOGO;
        $settings->KAEDCO_LOGO = $request->KAEDCO_LOGO;
        $settings->IKEDC_LOGO = $request->IKEDC_LOGO;
        $settings->EKEDC_LOGO = $request->EKEDC_LOGO;
        $settings->AEDC_LOGO = $request->AEDC_LOGO;
        $settings->KEDCO_LOGO = $request->KEDCO_LOGO;
        $settings->PHED_LOGO = $request->PHED_LOGO;
        $settings->JED_LOGO = $request->JED_LOGO;
        $settings->IBEDC_LOGO = $request->IBEDC_LOGO;
        $settings->PHCN_LOGO = $request->PHCN_LOGO;
        $settings->REFERRAL_BONUS_AFTER = $request->REFERRAL_BONUS_AFTER;
        $settings->REFERRAL_BONUS_AMOUNT = $request->REFERRAL_BONUS_AMOUNT;
        $settings->MAX_DAILY_KYC1 = $request->MAX_DAILY_KYC1;
        $settings->MAX_PER_KYC1 = $request->MAX_PER_KYC1;
        $settings->MAX_DAILY_KYC2 = $request->MAX_DAILY_KYC2;
        $settings->MAX_PER_KYC2 = $request->MAX_PER_KYC2;
        $settings->update();
        return redirect()->back()->withSuccess("Setting updated successfully");
    }
}
