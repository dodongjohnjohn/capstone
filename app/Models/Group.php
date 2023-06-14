<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['group_name', 'leader_id', 'leader_name'];

    public function groupMembers()
    {
        return $this->hasMany(GroupMember::class);
    }
}
