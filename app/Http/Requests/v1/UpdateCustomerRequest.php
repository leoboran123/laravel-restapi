<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateCustomerRequest extends FormRequest
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
        $method = $this->method();

        if($method == 'PUT'){
            return [
                'name' => ['required'],
                'type' => ['required', Rule::in(['I','B','i','b'])],
                'email' => ['required', 'email'],
                'adress' => ['required'],
                'city' => ['required'],
                'state' => ['required'],
                'postalCode' => ['required'],
    
            ];
        }
        else{
            return [
                'name' => ['required', 'sometimes'],
                'type' => ['required', Rule::in(['I','B','i','b']), 'sometimes'],
                'email' => ['required', 'email', 'sometimes'],
                'adress' => ['required', 'sometimes'],
                'city' => ['required', 'sometimes'],
                'state' => ['required', 'sometimes'],
                'postalCode' => ['required', 'sometimes'],
    
            ];
        }


        
    }

    protected function prepareForValidation(){
        if($this->postalCode){

            $this->merge([
                'postal_code' => $this->postalCode,
            ]);
        }
    }
}
