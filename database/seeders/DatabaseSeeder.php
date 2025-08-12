<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Domain;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();



        $domain = Domain::create([
            'name' => 'koweb.co.kr',
            'ttl' => 86400,
            'soa_serial' => Domain::generateSerial(),
            'soa_ns' => 'ns1.koweb.net.',
            'soa_email' => 'admin.koweb.net.',
        ]);

        $domain->dnsRecords()->createMany([
            ['name' => '@', 'ttl' => 7200, 'type' => 'NS', 'value' => 'ns1.koweb.net.'],
            ['name' => '@', 'ttl' => 7200, 'type' => 'NS', 'value' => 'ns2.koweb.net.'],
            ['name' => '@', 'ttl' => 7200, 'type' => 'A',  'value' => '141.164.43.x'],
            ['name' => 'www', 'ttl' => 7200, 'type' => 'CNAME', 'value' => '@'],
        ]);



        $domain = Domain::create([
            'name' => 'koweb.co.kr',
            'ttl' => 86400,
            'soa_serial' => Domain::generateSerial(),
            'soa_ns' => 'ns1.koweb.net.',
            'soa_email' => 'admin.koweb.net.',
        ]);

        $domain->dnsRecords()->createMany([
            ['name' => '@', 'ttl' => 7200, 'type' => 'NS', 'value' => 'ns1.koweb.net.'],
            ['name' => '@', 'ttl' => 7200, 'type' => 'NS', 'value' => 'ns2.koweb.net.'],
            ['name' => '@', 'ttl' => 7200, 'type' => 'A',  'value' => '141.164.43.x'],
            ['name' => 'www', 'ttl' => 7200, 'type' => 'CNAME', 'value' => '@'],
        ]);
        $domain = Domain::create([
            'name' => 'koweb.net',
            'ttl' => 86400,
            'soa_serial' => Domain::generateSerial(),
            'soa_ns' => 'ns1.koweb.net.',
            'soa_email' => 'admin.koweb.net.',
        ]);

        $domain->dnsRecords()->createMany([
            ['name' => '@', 'ttl' => 7200, 'type' => 'NS', 'value' => 'ns1.koweb.net.'],
            ['name' => '@', 'ttl' => 7200, 'type' => 'NS', 'value' => 'ns2.koweb.net.'],
            ['name' => '@', 'ttl' => 7200, 'type' => 'A',  'value' => '141.164.43.x'],
            ['name' => 'www', 'ttl' => 7200, 'type' => 'CNAME', 'value' => '@'],
        ]);
        $domain = Domain::create([
            'name' => 'koweb.kr',
            'ttl' => 86400,
            'soa_serial' => Domain::generateSerial(),
            'soa_ns' => 'ns1.koweb.net.',
            'soa_email' => 'admin.koweb.net.',
        ]);

        $domain->dnsRecords()->createMany([
            ['name' => '@', 'ttl' => 7200, 'type' => 'NS', 'value' => 'ns1.koweb.net.'],
            ['name' => '@', 'ttl' => 7200, 'type' => 'NS', 'value' => 'ns2.koweb.net.'],
            ['name' => '@', 'ttl' => 7200, 'type' => 'A',  'value' => '141.164.43.x'],
            ['name' => 'www', 'ttl' => 7200, 'type' => 'CNAME', 'value' => '@'],
        ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
