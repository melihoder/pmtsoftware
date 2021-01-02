<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Gorev extends Model
{
    use HasFactory, Notifiable;
    public static function getGorev($id=0){

        if($id==0){
            $value=DB::table('gorevs')->orderBy('gorev_id', 'asc')->get();
        }else{
            $value=DB::table('gorevs')->where('gorev_id', $id)->first();
        }
        return $value;
    }

    public static function insertGorev($data){
        $value=DB::table('gorevs')->where('gorev_adi', $data['gorev_adi'])->get();
        if($value->count() == 0){
            DB::table('gorevs')->insert($data);
            return 1;
        }else{
            return 0;
        }
    }

    public static function updateGorev($id,$data){
        DB::table('gorevs')
            ->where('gorev_id', $id)
            ->update($data);
    }

    public static function deleteGorev($id){
        DB::table('gorevs')->where('id', '=', $id)->delete();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $appends = ["open"];

    public function getOpenAttribute()
    {
        return true;
    }

    protected $fillable = [
        'gorev_adi',
        'proje_id',
        'baslangic',
        'bitis',
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
