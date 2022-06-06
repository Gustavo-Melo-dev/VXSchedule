<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContact extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'phone' => 'required|min:11',
            'cep' => 'required|min:3',
            'city' => 'required|min:3',
            'uf' => 'required|min:',
            'ibge' => 'required|min:3',
        ];
    }

    public function message(){
        return [
            'first_name.required' => 'É obrigatório o preenchimento do nome.',
            'last_name.required' => 'É obrigatório o preenchimento do sobrenome.',
            'phone.required' => 'É obrigatório o preenchimento do número de telefone.',
            'cep.required' => 'É obrigatório o preenchimento do CEP.',
            'city.required' => 'É obrigatório o preenchimento da cidade.',
            'uf.required' => 'É obrigatório o preenchimento do estado.',
            'ibge.required' => 'É obrigatório o preenchimento do IBGE.',
        ];
    }
}
