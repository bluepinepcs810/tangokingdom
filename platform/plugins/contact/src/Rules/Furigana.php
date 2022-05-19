<?php

namespace Botble\Contact\Rules;

use Illuminate\Contracts\Validation\Rule;

class Furigana implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match('%^([ぁ-んァ-ン]|\s)+$%', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('plugins/contact::contact.form.name_kana.validation');
    }
}
