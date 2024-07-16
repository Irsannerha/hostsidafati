<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;

class CheckNama implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('email', $user->email)->first();
        if ($value !== $mahasiswa->nama) {
            $fail($attribute . ' tidak cocok dengan nama user\'s.');
        }
    }
}
