<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_name',
        'job_description',
        'company_name',
        'job_type',
        'salary_minimum',
        'salary_maximum',
        'schedule_day',
        'schedule_time',
        'status',
        'location',
        'number_of_vacancies',
        'image',
    ];
}
