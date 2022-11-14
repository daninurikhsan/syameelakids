<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramSession extends Model
{
    protected $table = 'program_session';
    protected $guarded = ['id'];

    
    public function program(): HasOne{
        return $this->belongsTo(Program::class);
    }
}
