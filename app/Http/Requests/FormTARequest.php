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
            'prodi_id' => ['required', new CheckProdi],
            'nama' => ['required', 'min:3', 'max:255', new CheckNama],
            'nim' => ['required', 'numeric', 'digits:9', new CheckNim],
            'keperluan' => 'required',
            'instansi' => 'required|min:3|max:255',
            'alamat_instansi' => 'required|min:3|max:255',
            'tjp' => 'nullable',
            'pelaksanaan' => 'required',
            'waktu_mulai_pelaksanaan' => 'required|date_format:Y-m-d',
            'waktu_akhir_pelaksanaan' => 'required|date_format:Y-m-d',
            'no_hp' => 'required|numeric|digits_between:10,15',
            'email' => ['required', 'email', new CheckEmail],
            'nama_pembimbing_satu' => 'required|min:3|max:255',
            'nama_pembimbing_dua' => 'required|min:3|max:255',
            'judul' => 'required|min:3',
        ];
    }

}