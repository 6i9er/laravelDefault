<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permissions extends Model
{
    protected $table = 'permissions';
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'group_id', 'name_en', 'name_ar', 'permission_name', 'uuid' , 'updated_at',  'deleted_at', 'created_at',
    ];

    /**
     * @return all accounts order by id ASC
     */
    public static function getAll(){
        return self::with("groupPermission")->all();
    }



    public static function getAllOrderByIdDesc(){
        return self::orderBy('id' , "DESC")->with("groupPermission")->get();
    }

    public static function getPermissionByPermissionName($permissionName = '' , $uuid = 0){
        $data = Permissions::where("permission_name" , $permissionName);
        if($uuid != 0){
            $data = $data->where("uuid" , "!=" , $uuid);
        }
        return $data->first();
    }


    public static function getPermissionByUuId($uuId){
        return self::where('uuid' , $uuId)->first();
    }

    public static function updatePermission($uuId , $data){
        return self::where('uuid' , $uuId)->update($data);
    }


    public function groupPermission(){
        return $this->belongsTo('App\Models\GroupNames' , 'group_id' );
    }
}
