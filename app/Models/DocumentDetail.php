<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Outgoing;


class DocumentDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'document_code',
        'type',
        'origin',
        'subject',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function documentTracking(){
        return $this->hasOne(DocumentTracking::class);
    }

    public function outGoing(){
        return $this->hasOne(Outgoing::class);
    }

    public function receivedHistory(){
        return $this->hasOne(ReceivedHistory::class);
    }

    public function documentTrace(){
        return $this->hasMany(DocumentTrace::class);
    }

}
