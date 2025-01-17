<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PembelianRequest extends FormRequest
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
            //
            'tanggal' => 'required',
            'nama_barang' => 'required',
            'kategori_id' => 'required',
            'pemasok_id' => 'required',
            'penanggungjawab_id' => 'required',
            'jumlah' => 'required|numeric',
        ];
    }
}
