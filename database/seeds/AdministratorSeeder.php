<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User;
        $administrator->username = "Administrator";
        $administrator->roles = json_encode(["ADMIN"]);
        $administrator->address = "Ciputat";
        $administrator->avatar = "belumada.png";
        $administrator->name = "Site Administrator";
        $administrator->email = "admin@tokobuku.test";
        $administrator->password = \Hash::make("admin");

        $administrator->save();
        $this->command->info("User Admin Berhasil diinsert");

    }
}
