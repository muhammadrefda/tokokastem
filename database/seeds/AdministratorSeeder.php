<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new User;
        $administrator->name = "Site Administrator";
        $administrator->email = "administrator@tokokastem.test";
        $administrator->roles = json_encode(["ADMIN"]);
        $administrator->password = Hash::make("secret");
        $administrator->save();
        $this->command->info("Admin berhasil diinsert");
    }
}
