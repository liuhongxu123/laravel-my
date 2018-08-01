<?php

namespace App\V1;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Rider extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $tableName = 'riders';
    protected $fillable = [
        'id','name','mobile','email'
    ];
    protected $hidden = [
        'pwd','desc'
    ];

    public function getJWTIdentifier()
  {
      return $this->getKey();
  }

  /**
   * Return a key value array, containing any custom claims to be added to the JWT.
   *
   * @return array
   */
  public function getJWTCustomClaims()
  {
      return [];
  }
}
