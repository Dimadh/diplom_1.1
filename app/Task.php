<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Task extends Model
{
    //
    use Notifiable;
    protected $fillable = [
        'project','summary','description','issue_type',
    ];
}