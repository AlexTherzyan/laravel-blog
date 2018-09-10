<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    use Sluggable;

    protected $fillable = ['title']; // указываем какие данные сохраняются в таблице

    //многие ко многим
    public function posts()
    {
        return $this->belongsToMany(
            Post::class, // модель с которой связываемся
            'post_tags',            //таблица через которуюю будем связываться
            'tag_id',// id этой модели
            'post_id'
        );
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


}
