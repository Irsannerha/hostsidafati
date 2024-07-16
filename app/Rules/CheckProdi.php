<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;

class CheckProdi implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('email', $user->email)->first();

        if (intval($value) !== $mahasiswa->prodi_id) {
            $fail('Program studi tidak cocok dengan program studi user\'s.');
        }
    }
}
