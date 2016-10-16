<?php namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\AclGroup as EntitieAclGroup;
use Yajra\Datatables\Datatables;

class AclGroup extends BaseController {

    public function index(Request $resquest){
        $id = $resquest->get('id');
        if (is_numeric($id)){
            return Datatables::of(EntitieAclGroup::where('id','=',$id))->make();
        }else{
            return Datatables::of(EntitieAclGroup::query())->make();
        }

    }

    public function add(Request $resquest){
        $ident = $resquest->get('ident');
        $description = $resquest->get('description');
        return response()->json(EntitieAclGroup::add($ident, $description));

    }

    public function edit(Request $resquest){
        $id = $resquest->get('id');
        $ident = $resquest->get('ident');
        $description = $resquest->get('description');
        return response()->json(EntitieAclGroup::edit($id, $ident, $description));
    }

}
