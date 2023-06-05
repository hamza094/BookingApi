<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ApartmentAvailableRule;
use Illuminate\Support\Facades\Gate;

class StoreBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('bookings-manage');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'apartment_id' => ['required', 'exists:apartments,id',
              new ApartmentAvailableRule()],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'guests_adults' => ['integer'],
            'guests_children' => ['integer'],
        ];
    }
}
