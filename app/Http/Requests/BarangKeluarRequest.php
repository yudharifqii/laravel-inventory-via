<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangKeluarRequest extends FormRequest
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
            'barang' => 'required',
            'jumlah' => 'required|numeric',
            'tanggal_barang_keluar' => 'required',
            'satuan_id' => 'required',
            'keterangan' => 'required'
        ];
    }
}
