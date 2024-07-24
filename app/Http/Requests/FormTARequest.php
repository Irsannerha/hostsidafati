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
            'no_hp_mhs' => ['required', 'phone:AUTO,ID'],
            'email' => ['required', 'email', new CheckEmail],
            'keperluan' => 'required|min:3|max:255',
            'nama_pembimbing_satu' => 'required|min:3|max:255',
            'nama_pembimbing_dua' => 'required|min:3|max:255',
            'alamat_mhs' => 'required|min:3|max:150',
            'judul_ta' => 'required|min:3|max:180',
            'file_khs' => 'required|mimes:pdf|max:1024',
            'file_krs' => 'required|mimes:pdf|max:1024',
            'file_transkrip' => 'required|mimes:pdf|max:1024',
            'nama_instansi1' => 'required|min:3|max:255',
            'nama_pimpinan_instansi1' => 'required|min:3|max:255',
            'no_hp_instansi1' => ['required', 'phone:AUTO,ID'],
            'alamat_instansi1' => 'required|min:3|max:100',
            'keperluan1' => 'required|min:3|max:100',
            'nama_instansi2' => 'nullable|min:3|max:255',
            'nama_pimpinan_instansi2' => 'nullable|min:3|max:255',
            'no_hp_instansi2' => ['required', 'phone:AUTO,ID'],
            'alamat_instansi2' => 'nullable|min:3|max:100',
            'keperluan2' => 'nullable|min:3|max:100',
        ];
    }

}
