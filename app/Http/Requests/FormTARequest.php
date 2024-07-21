<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CheckNama;
use App\Rules\CheckNim;
use App\Rules\CheckProdi;
use App\Rules\CheckEmail;

class FormTARequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => ['required', 'min:3', 'max:255', new CheckNama],
            'nim' => ['required', 'numeric', 'digits:9', new CheckNim],
            'prodi_id' => ['required', new CheckProdi],
            'no_hp_mhs' => 'required|numeric|digits_between:10,15',
            'email' => ['required', 'email', new CheckEmail],
            'nama_pembimbing_satu' => 'required|min:3|max:255',
            'nama_pembimbing_dua' => 'required|min:3|max:255',
            'alamat_mhs' => 'required|min:3|max:150',
            'judul_ta' => 'required|min:3|max:180',
            'khs' => 'required|mimes:pdf|max:1024',
            'krs' => 'required|mimes:pdf|max:1024',
            'transkrip' => 'required|mimes:pdf|max:1024',
            'nama_instansi_satu' => 'required|min:3|max:255',
            'nama_pimpinan_instansi_satu' => 'required|min:3|max:255',
            'no_hp_instansi_satu' => 'required|numeric|digits_between:10,15',
            'alamat_instansi_satu' => 'required|min:3|max:100',
            'keperluan_satu' => 'required|min:3|max:100',
            'nama_instansi_dua' => 'nullable|min:3|max:255',
            'nama_pimpinan_instansi_dua' => 'nullable|min:3|max:255',
            'no_hp_instansi_dua' => 'nullable|numeric|digits_between:10,15',
            'alamat_instansi_dua' => 'nullable|min:3|max:100',
            'keperluan_dua' => 'nullable|min:3|max:100',
        ];
    }

}
