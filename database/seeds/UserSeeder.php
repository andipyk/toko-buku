<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   

        foreach (range(0,100) as $i) {
            $nama1 = Str::random(8);
            $nama2 = Str::random(10);

            $user = new \App\User;
            $user->username = $nama1;
            $user->roles = json_encode(["CUSTOMER"]);
            $user->address = "Surga";
            $user->avatar = "avatars/Q9XbS2C2mUMKqVxE7CQYGQaUNcnmObESyQDwz83s.png";
            $user->name = $nama1." ".$nama2;
            $user->email = $nama1."@tokobuku.test";
            $user->password = \Hash::make("123456");

            $user->save();
        }

        $this->command->info("User User Berhasil diinsert");
    }
}