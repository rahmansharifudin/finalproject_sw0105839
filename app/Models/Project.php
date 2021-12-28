<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable=['project_name','start_date','end_date','duration','cost','client','project_stage','project_status','user_id'];
    protected $guarded=['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
