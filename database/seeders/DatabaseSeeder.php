<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Admin Glow Salon',
            'email' => 'admin@glowsalon.test',
            'password' => Hash::make('password123'),
            'is_admin' => true,
        ]);

        $customer = Customer::create([
            'name' => 'Nina Dewi',
            'email' => 'nina@customer.test',
            'phone' => '081234567890',
            'address' => 'Jl. Merpati No. 21, Jakarta',
        ]);

        $service = Service::create([
            'name' => 'Hair Treatment',
            'description' => 'Perawatan rambut lengkap dengan masker dan blow dry.',
            'price' => 250000,
            'duration' => '90 menit',
        ]);

        $booking = Booking::create([
            'customer_id' => $customer->id,
            'service_id' => $service->id,
            'user_id' => $admin->id,
            'booking_date' => now()->addDays(3)->toDateString(),
            'booking_time' => '14:00',
            'status' => 'pending',
            'notes' => 'Booking untuk perawatan akhir pekan.',
            'total' => $service->price,
        ]);

        Payment::create([
            'booking_id' => $booking->id,
            'customer_id' => $customer->id,
            'amount' => $service->price,
            'payment_method' => 'Transfer Bank',
            'status' => 'pending',
            'paid_at' => now()->addDays(2),
        ]);
    }
}
