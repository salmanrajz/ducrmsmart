<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lead_sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name','customer_number','email','emirate_id','gender','nationality','address','emirate','plans','emirate_expiry','dob','status','saler_id','saler_name','lead_date','lead_type','lead_no', 'language','reff_id', 'additional_docs_name','front_id','back_id', 'additional_docs_photo', 'work_order_num','du_lead_no', 'emirate_id_count','activation_screenshot', 'process_screenshot','omid','shipment', 'alternative_number', '4g_id', '4g_account', 'fourjee_id', 'fourjee_account','channel_partner','shared_with','contract_id','billing_cycle','account_id'
    ];
}
