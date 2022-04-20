<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table='posts';
    protected $fileable=['title','content','service_id', 'status_id','user_id'];

    public function service(){
        return $this->belongsTo(Service::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function status(){
        return $this->belongsTo(Status::class);
    }
}
