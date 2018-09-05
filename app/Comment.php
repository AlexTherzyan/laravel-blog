<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Comment extends Model
{

    use Sluggable;

    const DISALLOW_COMMENT = 0;
    const ALLOW_COMMENT = 1;

    public function post()
    {
        return $this->hasOne(Post::class);
    }

    public function author()
    {
        return $this->hasOne(User::class);
    }


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }



    public function allow()
    {
        $this->status = Comment::ALLOW_COMMENT;
        $this->save;
    }

    public function disAllow()
    {
        $this->status = Comment::DISALLOW_COMMENT;
        $this->save;
    }

    public function toggleStatus( )
    {

        if ($this->status == 0){
            return $this->allow();
        }

        return  $this->disAllow();
    }

    public function remove( )
    {

        $this->delete();
    }

}
