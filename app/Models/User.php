<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'email',
    'password',
    'username',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function posts()
  {
    return $this->hasMany(Post::class);
  }

  public function likes()
  {
    return $this->hasMany(Like::class);
  }

  //  Stores the user followers
  public function followers()
  {
    return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
  }

  //  Stores the user following
  public function following()
  {
    return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
  }

  //  Check if the current authenticated user is following the user
  public function is_follower(User $user): bool
  {
    return $this->followers->contains($user->id);
  }
}
