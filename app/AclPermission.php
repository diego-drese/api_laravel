<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class AclPermission extends Model {

    protected $table = 'acl_permissions';

    protected $fillable = array(
        'ident', 'description'
    );

   public static function isPermition($id_user,$permition){
       return Self::where('ident', '=', $permition )
           ->join('acl_group_permissions', function ($join) {
               $join->on('acl_group_permissions.permission_id', '=', 'acl_permissions.id');
           })->join('acl_user_groups', function ($join) use($id_user) {
               $join->on('acl_user_groups.group_id', '=', 'acl_group_permissions.group_id')
                   ->where('acl_user_groups.user_id', '=', $id_user);
           })
           ->select()
           ->first();
   }
}