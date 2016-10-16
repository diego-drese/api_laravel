<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;


class AclGroup extends Model {

    protected $table = 'acl_groups';

    protected $fillable = array(
        'name', 'description'
    );

    public $timestamps = false;

    public static function getAll($limit, $offset, $filter){
        $AclGroup = AclGroup::take($limit)->skip($offset)->get();
        return $AclGroup;
    }
    public static function add($ident = null,$description=null){
        $error  = [];
        $retval = ['status' => true,'error'=>''];
        if(!$ident || strlen($ident)<2){
            $error['ident'] = "A permissão de ve conter no minimo 2 caractes ";
        }
        if(!$description || strlen($description)<5){
            $error['description'] = "Preencha a descrição da permissão ";
        }

        if(count($error)){
            $retval['status'] = false;
            $retval['error']  = $error;
            return $retval;
        }

        $insert = self::insert(
            [
                'ident' => $ident,
                'description' => $description,
                'created_at' => date('Y-m-d H>i:s')
            ]
        );

        return $retval;
    }
    public static function edit($id, $ident = null,$description=null){
        $error  = [];
        $retval = ['status' => true,'error'=>''];
        if (!is_numeric($id)){
            $error['id'] = "Para atualizar um grupo, é necessario informar seu id";
        }
        if(!$ident || strlen($ident)<2){
            $error['ident'] = "A permissão de ve conter no minimo 2 caractes ";
        }
        if(!$description || strlen($description)<5){
            $error['description'] = "Preencha a descrição da permissão ";
        }

        if(count($error)){
            $retval['status'] = false;
            $retval['error']  = $error;
            return $retval;
        }

        $insert = self::where('id', $id)
                    ->update([
                        'ident' => $ident,
                        'description'=>$description
                    ]);

        return $retval;
    }

}