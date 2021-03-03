<?php
namespace App\Models;

use \Illuminate\Database\Eloquent\Model;

class Pixel extends Model
{
    protected $table = "pixels";
    protected $fillable = ["pixelType", "userId", "occuredOn", "portalId"];
    
    public $timestamps = false;
}