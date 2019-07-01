<?php

namespace App\Master;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class customer extends Authenticatable
{
    use Notifiable;

    protected $table = 'tb_customer';
    protected $guard = 'customer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'email', 'nohp', 'alamat'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

     public function hakAkses($hakakses){

        $arr = explode('|', $hakakses);
        foreach ( $arr as $key) {
            if ($this->hakAkses == $key) {
                return true;
                break;
            }
        }
        return false;
     }
}
