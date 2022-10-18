<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolModel extends Model
{
    protected $table='studenttbl';
    protected $primarykey='id';
    protected $filelable=['st_name','st_address','e_mail','mo_num','created_at','updated_at','coures_id'];
}
