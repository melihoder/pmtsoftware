<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Kaynak extends Model
{
    use HasFactory, Notifiable;
    public static function getKaynak($id=0){

        if($id==0){
            $value=DB::table('kaynaks')->orderBy('kaynak_id', 'asc')->get();
        }else{
            $value=DB::table('kaynaks')->where('kaynak_id', $id)->first();
        }
        return $value;
    }

    public static function insertKaynak($data){
        $value=DB::table('kaynaks')->where('kaynak_adi', $data['kaynak_adi'])->get();
        if($value->count() == 0){
            DB::table('kaynaks')->insert($data);
            return 1;
        }else{
            return 0;
        }
    }

    public static function updateKaynak($id,$miktar){
        DB::table('kaynaks')
            ->where('kaynak_id', $id)
            ->update($miktar);
    }

    public static function deleteKaynak($id){
        DB::table('kaynaks')->where('id', '=', $id)->delete();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'proje_id',
        'kaynak_adi',
        'miktar',
        'birim',
        'aciklama',
        'gorev_id',
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
