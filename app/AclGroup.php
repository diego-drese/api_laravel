<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;


class AclGroup extends Model {

    protected $table = 'acl_groups';

    protected $fillable = array(
        'name', 'description'
    );

    public $timestamps = false;



}