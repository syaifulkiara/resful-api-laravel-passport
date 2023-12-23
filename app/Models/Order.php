<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table="T_ORDER_ORI";
    protected $primaryKey="FID";

    protected $fillable = [
            'FID',
            'FLOAD_TIME',
            'FLOAD_DATE',
            'FAJU',
            'FSOURCE_FILE',
            'FLOAD_OP',
            'FTO_NO',
            'FTO_PRIORITY',
            'FTO_PRIORITY_CODE',
            'FCARTON_NR',
            'FTO_ITEM',
            'FARTICLE',
            'FSOURCE_STORAGE_TYPE',
            'FSOURCE_STORAGE_BIN',
            'FCREATION_DATE',
            'FGR_NR',
            'FGR_DATE',
            'FPO_NR',
            'FTARGET_QTY',
            'FACTUAL_QTY',
            'FVARIANCE_QTY',
            'FCOLOR_CODE',
            'FCOLOR_DESC',
            'FDELIVERY',
            'FSTORE_ID',
            'FSTORE',
            'FCONCEPT',
            'FSIZE_CODE',
            'FSIZE_CODE_PTL',
            'FSIZE_DESC',
            'FSSCC',
            'FCONFIRMATION_DATE',
            'FCONFIRMATION_TIME',
            'FSTATUS',
            'FBOX_CODE',
            'FBOX_TYPE',
            'FNIK',
            'FSTATION',
            'FSORTATION_ID',
            'FDONE',
            'FFINISH_TASK',
    ];
}
