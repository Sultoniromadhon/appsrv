<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DnsRecord extends Model
{
    //

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

}
