<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    //------admin or not
    const IS_NORMAL_USER = 0;
    const IS_ADMIN = 1;
    //------banned or not
    const IS_ACTIVE = 0;
    const IS_BAN = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function posts()
    {
        return $this->hasMany(Post::class); //1 пользователь может иметь много статей
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public static function add($fields)
    {
        $user = new static;
        $user->fill($fields);
        $user->password = bcrypt($fields['password']);
        $user->save();

        return $user;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->password = bcrypt($fields['password']);
        $this->save();
    }

    public function remove()
    {
        $this->delete();
    }


    public function uploadAvatar($image)
    {
        if ($image == null) return;
        //ларавеловские методы
        if ($this->avatar != null){
            Storage::delete('uploads/' . $this->avatar); //удаление предыдущей картинки если таковая была
        }

        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads',$filename);
        $this->avatar = $filename;
        $this->save();

    }

    public function getAvatar ()
    {
        if ($this->avatar == null) return '/img/no-image.png';

        return '/uploads/' . $this->avatar;
    }

//******************************ADMIN
    public function makeAdmin ()
    {
        $this->is_admin = User::IS_ADMIN ;
        $this->save();
    }

    public function makeNormalUser ()
    {
        $this->is_admin = User::IS_NORMAL_USER;
        $this->save();
    }


    public function toggleAdmin( $value )
    {

        if ($value == null){
            return $this->makeNormalUser();
        }

        return  $this->makeAdmin();
    }


//***************************BANNED
    public function ban ()
    {
        $this->is_admin = User::IS_BAN;
        $this->save();
    }

    public function unban ()
    {
        $this->is_admin = User::IS_ACTIVE;
        $this->save();
    }


    public function toggleBan( $value )
    {

        if ($value == null){
            return $this->unban();
        }

        return  $this->ban();
    }

}







