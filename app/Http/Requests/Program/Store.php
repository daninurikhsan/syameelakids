<?php

namespace App\Http\Requests\Program;

use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Http\Request;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules =  [
            'name' => 'required',
            'bg_cover' => 'required|mimes:jpg,png,jpeg',
            'short_description' => 'required',
            'description' => 'required',
            'is_package' => 'required',
        ];

        if($this->request->get('is_package') == 1){
            // $i = 0;
            foreach ($this->request->get('price') as $key => $value) {
                // if($this->request->get('total_session'). "[" . $i . "]" == null || $this->request->get('note'). "[" . $i . "]" == null){
                //     // $rules['price.' . $i] = 'required';
                //     $rules['total_session.' . $i] = 'required';
                //     $rules['note.' . $i] = 'required';
                // };
                // $i += 1;
                $rules['price.' . $i] = 'required';
            }
            
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama program wajib diisi.',
            'bg_cover.required' => 'Cover wajib diisi.',
            'short_description.required' => 'Deskripsi singkat wajib diisi.',
            'description.required' => 'Deskripsi lengkap wajib diisi.',
            'is_package.required' => 'Pilihan ini wajib diisi.',
            
        ];
    }
}
