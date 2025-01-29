<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateResume extends Model
{
    protected $fillable = ['resume', 'image'];

    public function candidateable()
    {
        return $this->morphTo();
    }
}
