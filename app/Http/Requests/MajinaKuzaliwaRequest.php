<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MajinaKuzaliwaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Update to true to authorize the request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'religion' => 'required|string|max:255',
            'occupation' => 'required|string|max:255',
            'hospital' => 'required|string|max:255',
            'hospital_address' => 'required|string|max:255',
            'birthCategory' => 'required|string|max:255',
            'birthWitness' => 'required|string|max:255',
            'signature' => 'required|file|mimes:jpg,png,pdf|max:2048',
            'date' => 'required|date',
            'witnessName' => $this->birthWitness === 'regular' ? 'required|string|max:255' : 'nullable|string|max:255',
            // Additional fields for the 'regular' witness
            'region' => $this->birthWitness === 'regular' ? 'required|string|max:255' : 'nullable|string|max:255',
            'district' => $this->birthWitness === 'regular' ? 'required|string|max:255' : 'nullable|string|max:255',
            'ward' => $this->birthWitness === 'regular' ? 'required|string|max:255' : 'nullable|string|max:255',
            'village' => $this->birthWitness === 'regular' ? 'required|string|max:255' : 'nullable|string|max:255',
        ];
    }

    /**
     * Get the custom validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Jina linahitajika.',
            'name.string' => 'Jina lazima liwe maandishi.',
            'name.max' => 'Jina lisizidi herufi 255.',
            'address.required' => 'Anwani inahitajika.',
            'religion.required' => 'Dini inahitajika.',
            'occupation.required' => 'Kazi inahitajika.',
            'hospital.required' => 'Hospitali inahitajika.',
            'hospital_address.required' => 'Anwani ya hospitali inahitajika.',
            'birthCategory.required' => 'Aina ya kuzaliwa inahitajika.',
            'birthWitness.required' => 'Shahidi wa kuzaliwa anahitajika.',
            'signature.required' => 'Sahihi inahitajika.',
            'signature.file' => 'Sahihi lazima iwe faili halali.',
            'signature.mimes' => 'Sahihi lazima iwe katika format ya JPG, PNG, au PDF.',
            'signature.max' => 'Sahihi isizidi 2MB.',
            'date.required' => 'Tarehe inahitajika.',
            'date.date' => 'Tarehe lazima iwe halali.',
            'witnessName.required' => 'Weka jina la mtu wa kawaida.',
            'region.required' => 'Mkoa unahitajika.',
            'district.required' => 'Wilaya inahitajika.',
            'ward.required' => 'Kata inahitajika.',
            'village.required' => 'Kijiji kinahitajika.',
        ];
    }
}
