<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiStepForm extends Model
{
    use HasFactory;
    protected $table="multi_step_form";

    protected $guarded = [];
}
