<?php

namespace App\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TimeBetween implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pick_up_time = Carbon::parse($value);
        $pick_up_time = 
        Carbon::createFromTime($pick_up_time->hour,
        $pick_up_time->minute,$pick_up_time->second);

        $earliest_time = Carbon::createFromTimeString("15:00:00");
        $last_time = Carbon::createFromTimeString("23:00:00");
        if(!$pick_up_time->between($earliest_time,$last_time) ) {
            $fail('Please select a time between 3 pm and 11 pm');
        }
    }
}
