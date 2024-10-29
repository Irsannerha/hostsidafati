<?php

namespace Database\Factories;

use App\Models\Prodi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prodi>
 */
class ProdiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Prodi::class;

    public function definition(): array
    {
        return [
            'prodi' => $this->faker->word,
            'email' => $this->faker->safeEmail,
            'kapro' => $this->faker->name,
            'fakultas' => $this->faker->word,
            'akreditasi' => $this->faker->randomElement(['A', 'B', 'C']),
            'prodik' => $this->faker->word,
            'jumlah_mahasiswa' => $this->faker->numberBetween(50, 500),
            'tgl_pendirian' => $this->faker->date(),
            'deskripsi' => $this->faker->paragraph,
            'foto' => 'assets/foto/fake_image.jpg',
            'sk_prodi' => 'assets/sk_prodi/fake_sk.pdf',
        ];
    }
}
