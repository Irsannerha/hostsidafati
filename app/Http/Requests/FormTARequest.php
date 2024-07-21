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
            'keperluan' => ['required'],
            'kode_prodi' => ['required', new CheckProdi],
            'no_hp_mhs' => 'required|numeric|digits_between:10,15',
            'email' => ['required', 'email', new CheckEmail],
            'pembimbing_1' => 'required|min:3|max:255',
            'pembimbing_2' => 'required|min:3|max:255',
            'alamat_mhs' => 'required|min:3|max:150',
            'judul_ta' => 'required|min:3|max:180',
            'file_khs' => 'required|mimes:pdf|max:1024',
            'file_krs' => 'required|mimes:pdf|max:1024',
            'file_transkrip' => 'required|mimes:pdf|max:1024',
            'nama_instansi_1' => 'required|min:3|max:255',
            'jabatan_instansi_1' => 'required|min:3|max:255',
            'no_hp_instansi_1' => 'required|numeric|digits_between:10,15',
            'alamat_instansi_1' => 'required|min:3|max:100',
            'nama_instansi_2' => 'nullable|min:3|max:255',
            'jabatan_instansi_2' => 'nullable|min:3|max:255',
            'no_hp_instansi_2' => 'nullable|numeric|digits_between:10,15',
            'alamat_instansi_2' => 'nullable|min:3|max:100',
        ];
    }

}
