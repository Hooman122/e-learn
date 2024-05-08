<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRecord extends Model
{
    use HasFactory;
    protected $table = 'user_records';

    protected $fillable = ['name', 'game', 'age', 'score'];
}
