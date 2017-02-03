<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  protected $table = 'employees';

  protected $fillable = [
      'first_name',
      'last_name',
      'birth_date',
      'gender',
      'start_date',
      'job_title',
      'current_salary'
    ];

  protected $guarded = [
      'id',
    ];

  public $timestamps = false;


}
