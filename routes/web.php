<?php

use App\Http\Controllers\SettingController;
use App\Models\Airtime;
use App\Models\BeneficiaryDetail;
use App\Models\Betting;
use App\Models\Cable;
use App\Models\Card;
use App\Models\Data;
use App\Models\Education;
use App\Models\Electricity;
use App\Models\Kyc;
use App\Models\Setting;
use App\Models\Todo;
use App\Models\Transaction;
use App\Models\Transfer;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function() {
    return view("index");
})->name('login');

Route::get('/home', function() {
    return view("index");
})->name('login');

Route::get('/newsletter', function() {
    return view("newsletter");
})->name('newsletter');

Route::get('/notification', function() {
    return view("notification");
})->name('notification');

Route::get('/dashboard', function() {
    $data = Transaction::orderBy('id', 'DESC')->paginate(25);
    return view("dashboard", ['data' => $data]);
})->name('dashboard')->middleware(['auth', 'admin']);

Route::post('/login', function(Request $request) {  
    $credentials = $request->only(['email', 'password']);
    if($check = Auth::attempt($credentials)) { 
        if(Auth::user()->type == 'admin') {
            return redirect()->route('dashboard');
        }
        else{
            Auth::logout();
            return redirect()->back()->withError("Access denied");
        }
    }
    return redirect()->back()->withError("Invalid credentials");
})->name('post.login');

Route::get('/logout', function() {
    Auth::logout();
    return redirect()->route("home")->withError("Account logged out successfully");
})->name('logout')->middleware(['auth', 'admin']);

// Transaction

Route::get('/transactions', function(Request $request) {
    $data = Transaction::orderBy('id', 'DESC')->paginate(25);
    return view("transaction.index", ["data" => $data]);
})->name('transactions')->middleware(['auth', 'admin']);

Route::get('/transaction/{id}', function($id, Request $request) {
    $data = Transaction::findOrFail($id);
    return view("transaction.single", ["data" => $data]);
})->name('transaction')->middleware(['auth', 'admin']);

Route::get('/transaction/delete/{id}', function($id, Request $request) {
    $data = Transaction::findOrFail($id);
    $data->delete();
    return redirect()->route("transactions")->withSuccess("Deleted");
})->name('delete.transaction')->middleware(['auth', 'admin']);

Route::post('/transaction/{id}', function($id, Request $request) {
    $data = Transaction::findOrFail($id);
    $data->type = $request->type;
    $data->amount = $request->amount;
    $data->action = $request->action;
    $data->status = $request->status;
    $data->reference = $request->reference;
    $data->description = $request->description;
    $data->created_at = $request->created_at;
    $data->updated_at = $request->updated_at;
    $data->update();
    return redirect()->back()->withSuccess("Updated");
})->name('edit.transaction')->middleware(['auth', 'admin']);


// Airtime

Route::get('/airtimes', function(Request $request) {
    $data = Airtime::orderBy('id', 'DESC')->paginate(25);
    return view("airtime.index", ["data" => $data]);
})->name('airtimes')->middleware(['auth', 'admin']);

Route::get('/airtime/{id}', function($id, Request $request) {
    $data = Airtime::findOrFail($id);
    return view("airtime.single", ["data" => $data]);
})->name('airtime')->middleware(['auth', 'admin']);

Route::get('/airtime/delete/{id}', function($id, Request $request) {
    $data = Airtime::findOrFail($id);
    $data->delete();
    return redirect()->route("airtimes")->withSuccess("Deleted");
})->name('delete.airtime')->middleware(['auth', 'admin']);

Route::post('/airtime/{id}', function($id, Request $request) {
    $data = Airtime::findOrFail($id);
    $data->name = $request->name;
    $data->logo = $request->logo;
    $data->type = $request->type;
    $data->amount = $request->amount;
    $data->fee = $request->fee;
    $data->total_amount = $request->total_amount;
    $data->biller_code = $request->biller_code;
    $data->status = $request->status;
    $data->request_id = $request->request_id;
    $data->transaction_id = $request->transaction_id;
    $data->description = $request->description;
    $data->created_at = $request->created_at;
    $data->updated_at = $request->updated_at;
    $data->update();
    return redirect()->back()->withSuccess("Updated");
})->name('edit.airtime')->middleware(['auth', 'admin']);


// Data

Route::get('/datas', function(Request $request) {
    $data = Data::orderBy('id', 'DESC')->paginate(25);
    return view("data.index", ["data" => $data]);
})->name('datas')->middleware(['auth', 'admin']);

Route::get('/data/{id}', function($id, Request $request) {
    $data = Data::findOrFail($id);
    return view("data.single", ["data" => $data]);
})->name('data')->middleware(['auth', 'admin']);

Route::get('/data/delete/{id}', function($id, Request $request) {
    $data = Data::findOrFail($id);
    $data->delete();
    return redirect()->route("datas")->withSuccess("Deleted");
})->name('delete.data')->middleware(['auth', 'admin']);

Route::post('/data/{id}', function($id, Request $request) {
    $data = Data::findOrFail($id);
    $data->name = $request->name;
    $data->logo = $request->logo;
    $data->type = $request->type;
    $data->amount = $request->amount;
    $data->fee = $request->fee;
    $data->total_amount = $request->total_amount;
    $data->biller_code = $request->biller_code;
    $data->status = $request->status;
    $data->request_id = $request->request_id;
    $data->transaction_id = $request->transaction_id;
    $data->description = $request->description;
    $data->created_at = $request->created_at;
    $data->updated_at = $request->updated_at;
    $data->update();
    return redirect()->back()->withSuccess("Updated");
})->name('edit.data')->middleware(['auth', 'admin']);


// Betting

Route::get('/bettings', function(Request $request) {
    $data = Betting::orderBy('id', 'DESC')->paginate(25);
    return view("betting.index", ["data" => $data]);
})->name('bettings')->middleware(['auth', 'admin']);

Route::get('/betting/{id}', function($id, Request $request) {
    $data = Betting::findOrFail($id);
    return view("betting.single", ["data" => $data]);
})->name('betting')->middleware(['auth', 'admin']);

Route::get('/betting/delete/{id}', function($id, Request $request) {
    $data = Betting::findOrFail($id);
    $data->delete();
    return redirect()->route("datas")->withSuccess("Deleted");
})->name('delete.betting')->middleware(['auth', 'admin']);

Route::post('/betting/{id}', function($id, Request $request) {
    $data = Betting::findOrFail($id);
    $data->name = $request->name;
    $data->logo = $request->logo;
    $data->type = $request->type;
    $data->amount = $request->amount;
    $data->fee = $request->fee;
    $data->total_amount = $request->total_amount;
    $data->biller_code = $request->biller_code;
    $data->biller_name = $request->biller_name;
    $data->status = $request->status;
    $data->request_id = $request->request_id;
    $data->transaction_id = $request->transaction_id;
    $data->description = $request->description;
    $data->created_at = $request->created_at;
    $data->updated_at = $request->updated_at;
    $data->update();
    return redirect()->back()->withSuccess("Updated");
})->name('edit.betting')->middleware(['auth', 'admin']);


// Eduation

Route::get('/educations', function(Request $request) {
    $data = Education::orderBy('id', 'DESC')->paginate(25);
    return view("education.index", ["data" => $data]);
})->name('educations')->middleware(['auth', 'admin']);

Route::get('/education/{id}', function($id, Request $request) {
    $data = Education::findOrFail($id);
    return view("education.single", ["data" => $data]);
})->name('education')->middleware(['auth', 'admin']);

Route::get('/education/delete/{id}', function($id, Request $request) {
    $data = Education::findOrFail($id);
    $data->delete();
    return redirect()->route("educations")->withSuccess("Deleted");
})->name('delete.education')->middleware(['auth', 'admin']);

Route::post('/education/{id}', function($id, Request $request) {
    $data = Education::findOrFail($id);
    $data->name = $request->name;
    $data->logo = $request->logo;
    $data->type = $request->type;
    $data->amount = $request->amount;
    $data->fee = $request->fee;
    $data->total_amount = $request->total_amount;
    $data->biller_code = $request->biller_code;
    $data->token = $request->token;
    $data->status = $request->status;
    $data->request_id = $request->request_id;
    $data->transaction_id = $request->transaction_id;
    $data->description = $request->description;
    $data->created_at = $request->created_at;
    $data->updated_at = $request->updated_at;
    $data->update();
    return redirect()->back()->withSuccess("Updated");
})->name('edit.education')->middleware(['auth', 'admin']);



// Electricity

Route::get('/electricities', function(Request $request) {
    $data = Electricity::orderBy('id', 'DESC')->paginate(25);
    return view("electricity.index", ["data" => $data]);
})->name('electricities')->middleware(['auth', 'admin']);

Route::get('/electricity/{id}', function($id, Request $request) {
    $data = Electricity::findOrFail($id);
    return view("electricity.single", ["data" => $data]);
})->name('electricity')->middleware(['auth', 'admin']);

Route::get('/electricity/delete/{id}', function($id, Request $request) {
    $data = Electricity::findOrFail($id);
    $data->delete();
    return redirect()->route("electricitys")->withSuccess("Deleted");
})->name('delete.electricity')->middleware(['auth', 'admin']);

Route::post('/electricity/{id}', function($id, Request $request) {
    $data = Electricity::findOrFail($id);
    $data->name = $request->name;
    $data->logo = $request->logo;
    $data->type = $request->type;
    $data->amount = $request->amount;
    $data->fee = $request->fee;
    $data->total_amount = $request->total_amount;
    $data->biller_code = $request->biller_code;
    $data->biller_name = $request->biller_name;
    $data->biller_address = $request->biller_address;
    $data->unit = $request->unit;
    $data->token = $request->token;
    $data->status = $request->status;
    $data->request_id = $request->request_id;
    $data->transaction_id = $request->transaction_id;
    $data->description = $request->description;
    $data->created_at = $request->created_at;
    $data->updated_at = $request->updated_at;
    $data->update();
    return redirect()->back()->withSuccess("Updated");
})->name('edit.electricity')->middleware(['auth', 'admin']);



// Cable

Route::get('/cables', function(Request $request) {
    $data = Cable::orderBy('id', 'DESC')->paginate(25);
    return view("cable.index", ["data" => $data]);
})->name('cables')->middleware(['auth', 'admin']);

Route::get('/cable/{id}', function($id, Request $request) {
    $data = Cable::findOrFail($id);
    return view("cable.single", ["data" => $data]);
})->name('cable')->middleware(['auth', 'admin']);

Route::get('/cable/delete/{id}', function($id, Request $request) {
    $data = Cable::findOrFail($id);
    $data->delete();
    return redirect()->route("cables")->withSuccess("Deleted");
})->name('delete.cable')->middleware(['auth', 'admin']);

Route::post('/cable/{id}', function($id, Request $request) {
    $data = Cable::findOrFail($id);
    $data->name = $request->name;
    $data->logo = $request->logo;
    $data->type = $request->type;
    $data->amount = $request->amount;
    $data->fee = $request->fee;
    $data->total_amount = $request->total_amount;
    $data->biller_code = $request->biller_code;
    $data->biller_name = $request->biller_name;
    $data->status = $request->status;
    $data->request_id = $request->request_id;
    $data->transaction_id = $request->transaction_id;
    $data->description = $request->description;
    $data->created_at = $request->created_at;
    $data->updated_at = $request->updated_at;
    $data->update();
    return redirect()->back()->withSuccess("Updated");
})->name('edit.cable')->middleware(['auth', 'admin']);



// Wallet

Route::get('/wallets', function(Request $request) {
    $data = Wallet::orderBy('id', 'DESC')->paginate(25);
    return view("wallet.index", ["data" => $data]);
})->name('wallets')->middleware(['auth', 'admin']);

Route::get('/wallet/{id}', function($id, Request $request) {
    $data = Wallet::findOrFail($id);
    return view("wallet.single", ["data" => $data]);
})->name('wallet')->middleware(['auth', 'admin']);

Route::get('/wallet/delete/{id}', function($id, Request $request) {
    $data = Wallet::findOrFail($id);
    $data->delete();
    return redirect()->route("wallets")->withSuccess("Deleted");
})->name('delete.wallet')->middleware(['auth', 'admin']);

Route::post('/wallet/{id}', function($id, Request $request) {
    $data = Wallet::findOrFail($id);
    $data->initial_balance = $request->initial_balance;
    $data->current_balance = $request->current_balance;
    $data->book_balance = $request->book_balance;
    $data->update();
    return redirect()->back()->withSuccess("Updated");
})->name('edit.wallet')->middleware(['auth', 'admin']);


// Transfer

Route::get('/transfers', function(Request $request) {
    $data = Transfer::orderBy('id', 'DESC')->paginate(25);
    return view("transfer.index", ["data" => $data]);
})->name('transfers')->middleware(['auth', 'admin']);

Route::get('/transfer/{id}', function($id, Request $request) {
    $data = Transfer::findOrFail($id);
    return view("transfer.single", ["data" => $data]);
})->name('transfer')->middleware(['auth', 'admin']);

Route::get('/transfer/delete/{id}', function($id, Request $request) {
    $data = Transfer::findOrFail($id);
    $data->delete();
    return redirect()->route("transfers")->withSuccess("Deleted");
})->name('delete.transfer')->middleware(['auth', 'admin']);

Route::post('/transfer/{id}', function($id, Request $request) {
    $data = Transfer::findOrFail($id);
    // $data->name = $request->name;
    $data->logo = $request->logo;
    $data->type = $request->type;
    $data->amount = $request->amount;
    $data->fee = $request->fee;
    $data->total_amount = $request->total_amount;
    $data->narration = $request->narration;
    $data->bank_name = $request->bank_name;
    $data->account_name = $request->account_name;
    $data->account_number = $request->account_number;
    $data->bank_code = $request->bank_code;
    $data->status = $request->status;
    $data->request_id = $request->request_id;
    $data->transaction_id = $request->transaction_id;
    $data->session_id = $request->session_id;
    $data->description = $request->description;
    $data->created_at = $request->created_at;
    $data->updated_at = $request->updated_at;
    $data->update();
    return redirect()->back()->withSuccess("Updated");
})->name('edit.transfer')->middleware(['auth', 'admin']);


// Beneficiaries

Route::get('/beneficiaries', function(Request $request) {
    $data = BeneficiaryDetail::orderBy('id', 'DESC')->paginate(25);
    return view("beneficiary.index", ["data" => $data]);
})->name('beneficiaries')->middleware(['auth', 'admin']);

Route::get('/beneficiary/{id}', function($id, Request $request) {
    $data = BeneficiaryDetail::findOrFail($id);
    return view("beneficiary.single", ["data" => $data]);
})->name('beneficiary')->middleware(['auth', 'admin']);

Route::get('/beneficiary/delete/{id}', function($id, Request $request) {
    $data = BeneficiaryDetail::findOrFail($id);
    $data->delete();
    return redirect()->route("beneficiaries")->withSuccess("Deleted");
})->name('delete.beneficiary')->middleware(['auth', 'admin']);

Route::post('/beneficiary/{id}', function($id, Request $request) {
    $data = BeneficiaryDetail::findOrFail($id);
    $data->name = $request->name;
    $data->is_active = $request->is_active;
    $data->logo = $request->logo;
    $data->service = $request->service;
    $data->service_code = $request->service_code;
    $data->service_name = $request->service_name;
    $data->service_number = $request->service_number;
    $data->created_at = $request->created_at;
    $data->updated_at = $request->updated_at;
    $data->update();
    return redirect()->back()->withSuccess("Updated");
})->name('edit.beneficiary')->middleware(['auth', 'admin']);


// Cards

Route::get('/cards', function(Request $request) {
    $data = Card::orderBy('id', 'DESC')->paginate(25);
    return view("card.index", ["data" => $data]);
})->name('cards')->middleware(['auth', 'admin']);

Route::get('/card/{id}', function($id, Request $request) {
    $data = Card::findOrFail($id);
    return view("card.single", ["data" => $data]);
})->name('card')->middleware(['auth', 'admin']);

Route::get('/card/delete/{id}', function($id, Request $request) {
    $data = Card::findOrFail($id);
    $data->delete();
    return redirect()->route("cards")->withSuccess("Deleted");
})->name('delete.card')->middleware(['auth', 'admin']);

Route::post('/card/{id}', function($id, Request $request) {
    $data = Card::findOrFail($id);
    $data->name = $request->name;
    $data->card_id = $request->card_id;
    $data->type = $request->type;
    $data->amount = $request->amount;
    $data->fee = $request->fee;
    $data->total_amount = $request->total_amount;
    $data->currency = $request->currency;
    $data->status = $request->status;
    $data->description = $request->description;
    $data->created_at = $request->created_at;
    $data->updated_at = $request->updated_at;
    $data->update();
    return redirect()->back()->withSuccess("Updated");
})->name('edit.card')->middleware(['auth', 'admin']);


// Users

Route::get('/users', function(Request $request) {
    $data = User::orderBy('id', 'DESC')->paginate(25);
    return view("user.index", ["data" => $data]);
})->name('users')->middleware(['auth', 'admin']);

Route::get('/user/{id}', function($id, Request $request) {
    $data = User::findOrFail($id);
    return view("user.single", ["data" => $data]);
})->name('user')->middleware(['auth', 'admin']);

Route::get('/user/delete/{id}', function($id, Request $request) {
    $data = User::findOrFail($id);
    $data->delete();
    return redirect()->route("users")->withSuccess("Deleted");
})->name('delete.user')->middleware(['auth', 'admin']);

Route::post('/user/{id}', function($id, Request $request) {
    $data = User::findOrFail($id);
    $data->firstname = $request->firstname;
    $data->lastname = $request->lastname;
    $data->middlename = $request->middlename;
    $data->username = $request->username;
    $data->email = $request->email;
    $data->phone = $request->phone;
    $data->gender = $request->gender;
    $data->password = isset($request->password) ? bcrypt($request->password) : $data->password;
    $data->is_active = $request->is_active;
    $data->type = $request->type;
    $data->pin = $request->pin;
    $data->referral_code = $request->referral_code;
    $data->unique_code = $request->unique_code;
    $data->address = $request->address;
    $data->created_at = $request->created_at;
    $data->updated_at = $request->updated_at;
    $data->update();
    return redirect()->back()->withSuccess("Updated");
})->name('edit.user')->middleware(['auth', 'admin']);

// BVNs

Route::get('/bvns', function(Request $request) {
    $data = Kyc::where('level', '1')->orderBy('id', 'DESC')->paginate(25);
    return view("bvn.index", ["data" => $data]);
})->name('bvns')->middleware(['auth', 'admin']);

Route::get('/bvn/{id}', function($id, Request $request) {
    $data = Kyc::findOrFail($id);
    return view("bvn.single", ["data" => $data]);
})->name('bvn')->middleware(['auth', 'admin']);

Route::get('/bvn/delete/{id}', function($id, Request $request) {
    $data = Kyc::findOrFail($id);
    $data->delete();
    return redirect()->route("bvns")->withSuccess("Deleted");
})->name('delete.bvn')->middleware(['auth', 'admin']);

Route::post('/bvn/{id}', function($id, Request $request) {
    $data = Kyc::findOrFail($id);
    $data->status = $request->status;
    $data->value = $request->value;
    $data->level = $request->level;
    $data->created_at = $request->created_at;
    $data->updated_at = $request->updated_at;
    $data->update();
    return redirect()->back()->withSuccess("Updated");
})->name('edit.bvn')->middleware(['auth', 'admin']);


// IDs

Route::get('/ids', function(Request $request) {
    $data = Kyc::where('level', '2')->orderBy('id', 'DESC')->paginate(25);
    return view("id.index", ["data" => $data]);
})->name('ids')->middleware(['auth', 'admin']);

Route::get('/id/{id}', function($id, Request $request) {
    $data = Kyc::findOrFail($id);
    return view("id.single", ["data" => $data]);
})->name('id')->middleware(['auth', 'admin']);

Route::get('/id/delete/{id}', function($id, Request $request) {
    $data = Kyc::findOrFail($id);
    $data->delete();
    return redirect()->route("ids")->withSuccess("Deleted");
})->name('delete.id')->middleware(['auth', 'admin']);

Route::post('/id/{id}', function($id, Request $request) {
    $data = Kyc::findOrFail($id);
    $data->status = $request->status;
    $data->value = $request->value;
    $data->level = $request->level;
    $data->created_at = $request->created_at;
    $data->updated_at = $request->updated_at;
    $data->update();
    return redirect()->back()->withSuccess("Updated");
})->name('edit.id')->middleware(['auth', 'admin']);


// Tood

Route::get('/todos', function(Request $request) {
    $data = Todo::where('user_id', Auth::id())->orderBy('id', 'DESC')->paginate(25);
    return view("todo.index", ["data" => $data]);
})->name('todos')->middleware(['auth', 'admin']);

Route::get('/todo/{id}', function($id, Request $request) {
    $data = Todo::findOrFail($id);
    return view("todo.single", ["data" => $data]);
})->name('todo')->middleware(['auth', 'admin']);

Route::get('/todo/delete/{id}', function($id, Request $request) {
    $data = Todo::findOrFail($id);
    $data->delete();
    return redirect()->route("todos")->withSuccess("Deleted");
})->name('delete.todo')->middleware(['auth', 'admin']);

Route::post('/todo/{id}', function($id, Request $request) {
    $data = Todo::findOrFail($id);
    $data->status = $request->status;
    $data->content = $request->content;
    $data->created_at = $request->created_at;
    $data->updated_at = $request->updated_at;
    $data->update();
    return redirect()->back()->withSuccess("Updated");
})->name('edit.todo')->middleware(['auth', 'admin']);

// Settings

Route::get('/settings', function(Request $request) {
    $data = Setting::findOrFail(1);
    return view("settings.index", ["data" => $data]);
})->name('settings')->middleware(['auth', 'admin']);

Route::post('/settings', [SettingController::class, "update"])->name('post.settings')->middleware(['auth', 'admin']);


