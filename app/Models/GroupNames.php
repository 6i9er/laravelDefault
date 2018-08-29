<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupNames extends Model
{
    protected $table = 'group_permissions';
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name_ar', 'name_en', 'uuid', 'updated_at',  'deleted_at', 'created_at',
    ];

    /**
     * @return all accounts order by id ASC
     */
    public static function getAll(){
        return self::all();
    }

    public static function getAllOrderByIdDesc(){
        return self::orderBy('id' , "DESC")->get();
    }



    public static function getGroupPermissionByUuId($uuId){
        return self::where('uuid' , $uuId)->first();
    }

    public static function updateGroupPermission($uuId , $data){
        return self::where('uuid' , $uuId)->update($data);
    }


    public function permissions(){
        return $this->hasMany('App\Models\Permissions' , 'group_id' );
    }

}
