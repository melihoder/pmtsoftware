<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Proje extends Model
{
    use HasFactory, Notifiable;

    public static function getProject($id=0){

        if($id==0){
            $value=DB::table('projes')->orderBy('proje_id', 'asc')->get();
        }else{
            $value=DB::table('projes')->where('proje_id', $id)->first();
        }
        return $value;
    }

    public static function insertProject($data){
        $value=DB::table('projes')->where('proje_adi', $data['proje_adi'])->get();
        if($value->count() == 0){
            DB::table('projes')->insert($data);
            return 1;
        }else{
            return 0;
        }
    }

    public static function updateProject($id,$data){
        DB::table('projes')
            ->where('proje_id', $id)
            ->update($data);
    }

    public static function deleteProject($id){
        DB::table('projes')->where('id', '=', $id)->delete();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'proje_adi',
        'baslangic',
        'bitis',
        'kaynak_id',
        'gorev_id',
        'aciklama',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
