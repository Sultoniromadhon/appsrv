<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    //

    use HasFactory;

    public static function generateSerial()
    {
        // Contoh sederhana: YYYYMMDD + 01
        $date = now()->format('Ymd');
        // Kamu bisa buat logic yang lebih kompleks sesuai kebutuhan
        return (int)($date . '01');
    }

    public function dnsRecords()
    {
        return $this->hasMany(DnsRecord::class);
    }
}
