<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;
use App\Models\User;

class VendorShopProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user= User::where('email','vendor@gmail.com')->first();

        $vendor= new Vendor();
        $vendor->banner='uploads/1343.jpg';
        $vendor->shop_name='Vendor Shop';
        $vendor->phone='123212312';
        $vendor->email='vendor@gmail.com';
        $vendor->address='Usa';
        $vendor->description='shop description';
        $vendor->user_id=$user->id;
        $vendor->save();
    }
}
