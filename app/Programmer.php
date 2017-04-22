<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
class Programmer extends Model
{
    //
    use Notifiable;
    protected $fillable = [
        'name','second_name','email','specialization','rank',
    ];
}