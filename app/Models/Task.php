<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;
class Task extends Model
{
    use HasFactory;

    protected $isApplyDateFormat = true;

    protected $fillable = [
        'title',
        'description',
        'due_date', 
        'user_id'
    ];

    protected function dueDate(): Attribute
    {
        $dateFormat = ($this->isApplyDateFormat) ? 'd-m-Y' : 'Y-m-d';

        return Attribute::make(
            get: fn (string $value) =>  Carbon::parse($value)->format($dateFormat),
        );
    }

    public function setApplyFullNameAccessor($value)
    {
        $this->isApplyDateFormat = $value;
    }

}
