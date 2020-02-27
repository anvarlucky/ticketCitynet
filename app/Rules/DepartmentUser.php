<?php

namespace App\Rules;

use App\Models\v1\Inspector\Verification;
use Illuminate\Contracts\Validation\Rule;

class CheckOpenVerification implements Rule
{
    /
     * Create a new rule instance
     *
     * @return void
     */
    public function __construct()
    {

    }

    /
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Verification::where(['id' => $value, 'status' => Verification::STATUS_OPEN])->first()?true:false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Verification is closed';
    }
}