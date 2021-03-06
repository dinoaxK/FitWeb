<?php

namespace App\Models\User\Role;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class hasPermission extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    protected $table = 'role_permissions';
    protected static $logAttributes = ['*'];
    protected static $logName = 'user_permission';
    protected $fillable = ['role_id', 'permission_id'];

    public function permission()
    {
        return $this->belongsTo(Permission::class,'permission_id','id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
}
