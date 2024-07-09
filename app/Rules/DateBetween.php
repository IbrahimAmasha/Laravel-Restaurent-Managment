<?php

namespace App\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DateBetween implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // $pickupdate = Carbon::parse($value);
        $lastdate = Carbon::now()->addWeek();

        if (!($value >= now() && $value <= $lastdate)) {
            $fail("Please select a date between now and 1 week later.");
        }
    }
}
