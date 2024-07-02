<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Http\Controllers\Admin\AllRekapController;
use App\Models\Aknalu;
use App\Models\Keluar;
use App\Models\RekapMhs;
use App\Models\UndurDiri;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(ProdiSeeder::class);
        $this->call(ResignSeeder::class);
        $this->call(TaslabSeeder::class);
        $this->call(PejabatSeeder::class);
        // $this->call(DosbelSeeder::class);
        $this->call(AsmikbelSeeder::class);
        $this->call(DoslubiSeeder::class);
        $this->call(DosenSeeder::class);
        $this->call(KegiatanSeeder::class);
        $this->call(PrestasiSeeder::class);
        $this->call(AknaluSeeder::class);
        $this->call(TahunSeeder::class);
        $this->call(AllRekapSeeder::class);
        // $this->call(UndurDiriSeeder::class);
        // $this->call(KeluarSeeder::class);
        // $this->call(WafatSeeder::class);
        // $this->call(LulusSeeder::class);
        // $this->call(MhsAktifSeeder::class);
        // $this->call(MhsTASeeder::class);
        $this->call(FormTASeeder::class);
        $this->call(FormKPSeeder::class);
        $this->call(FormKHSSeeder::class);
        $this->call(FormLegalSeeder::class);
        $this->call(FormSTMSeeder::class);
        $this->call(FormWcrSeeder::class);
        $this->call(FormRekomSeeder::class);
        $this->call(FormBukrimSeeder::class);
}
}