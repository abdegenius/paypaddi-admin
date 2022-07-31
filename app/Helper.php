<?php

use App\Models\User;

function amountNGN($value){
    return $value > 0 ? "₦".number_format($value,2,".",",") : "₦0.00";
}

function amountUSD($value){
    return $value > 0 ? "$".number_format($value,2,".",",") : "$0.00";
}

function getUser($id){
    $data = User::where('id',$id)->first(); 
    if($data){
        return $data;
    }
    return "No User";
}
function status($value){
    if(strtoupper($value) == "PENDING"){
        return "<div class='badge rounded-pill text-warning bg-light-warning p-2 text-uppercase px-3'><i class='bx bxs-circle me-1'></i>Pending</div>";
    }
    else if(strtoupper($value) == "FAILED"){
        return "<div class='badge rounded-pill text-danger bg-light-danger p-2 text-uppercase px-3'><i class='bx bxs-circle me-1'></i>Failed</div>";
    }
    else if(strtoupper($value) == "COMPLETED"){
        return "<div class='badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3'><i class='bx bxs-circle me-1'></i>Completed</div>";
    }
}