<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCredentialsRequest extends FormRequest
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
    // Check if the route is 'usercredentials.login'
    if (request()->routeIs('usercredentials.login')) {
        // Return the validation rules for login
        return [
            'username'     => 'required|string|email|max:255',
            'password'  => 'required|min:8',
        ];
    } 
    // Check if the route is 'usercredentials.store'
    else if (request()->routeIs('usercredentials.store')) {
        // Return the validation rules for store
        return [
            'username'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255',
            'password'  => 'required|min:8|confirmed',
        ];
    } 
    // Check if the route is 'usercredentials.updateUsername'
    else if (request()->routeIs('usercredentials.updateUsername')) {
        // Return the validation rules for update username
        return [
            'username'      => 'required|string|max:255',
        ];
    } 
    // Check if the route is 'usercredentials.updateEmail'
    else if (request()->routeIs('usercredentials.updateEmail')) {
        // Return the validation rules for update email
        return [
            'email'      => 'required|string|email|max:255',
        ];
    } 
    // Check if the route is 'usercredentials.updatePassword'
    else if (request()->routeIs('usercredentials.updatePassword')) {
        // Return the validation rules for update password
        return [
            'password'      => 'required|confirmed|min:8',
        ];
    } 
    // Check if the route is 'usercredentials.updateContact'
    else if (request()->routeIs('usercredentials.updateContact')) {
        // Return the validation rules for update contact
        return [
            'contact_no'      => 'required|confirmed|min:8',
        ];
    } 
    // Return an empty array if none of the conditions are met
    return [];
}
}
