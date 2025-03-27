<?php

namespace App\Models;

use App\Models\Billing\Provider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientCard extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $fillable = [
        'organization_id',
        'client_id',
        'card_type_id',
        'phone_number',
        'transaction_id',
        'expired_at',
        'holder_name',
        'card_number',
        'card_id',
        'card_type',
        'card_cvv_num',
        'merchant',
        'sign',
        'provider_tran_id',
        'amount',
        'is_active',
        'description'
    ];

    public function organization() {
        return $this->belongsTo(Organization::class);
    }

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function providerTran() {
        return $this->belongsTo(Banks::class,'provider_tran_id', 'id');
    }

    public function cardType()
    {
        return $this->belongsTo(PerformerCardType::class, 'card_type_id', 'id');
    }
}
