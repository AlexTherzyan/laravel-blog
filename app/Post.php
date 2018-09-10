<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Static_;


class Post extends Model
{

    use Sluggable;

    const IS_DRAFT = 0;
    const IS_PUBLIC = 1;
    const IS_STANDART = 0;
    const IS_FEATURED = 1;

    protected $fillable = ['title','content', 'date'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    //многие ко многим
    public function tags()
    {
        return $this->belongsToMany(
            Tag::class, // модель с которой связываемся
                'post_tags',            //таблица через которуюю будем связываться
            'post_id',// id этой модели
                            'tag_id'
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


    /**
     * Create post
     * @param $fields
     * @return Post
     */
    public static function add($fields)
    {
        $post = new static;
        $post->fill($fields);
        $post->user_id = 1; // нужно для защиты
        $post->save();

        return $post;
    }

    /**
     * @param $fields
     */
    public function edit($fields)
    {

        $this->fill($fields);
        $this->save();

    }

    /**
     * @param $fields
     * @throws \Exception
     */
    public function remove()
    {
        //удалить картинку поста
        $this->removeImage();
        $this->delete();
    }

    public function uploadImage($image)
    {
        if ($image == null) return;
        //ларавеловские методы
        $this->removeImage();
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads',$filename);
        $this->image = $filename;
        $this->save();
    }

    public function removeImage()
    {
        if ($this->image != null){
            Storage::delete('uploads/' . $this->image); //удаление предыдущей картинки если таковая была
        }

    }

    public function getImage ($value = '')
    {
        if ($this->image == null) return '/img/no-image.png';

        return '/uploads/' . $this->image;
    }

    public function setCategory($id)
    {

        if ($id == null) return;
        $this->category_id = $id;
        $this->save();

    }

    public function setTag( $ids )
    {
        if ($ids == null) return;
        $this->tags()->sync($ids); //
        $this->save();
    }

    public function setDraft()
    {

        $this->status = Post::IS_DRAFT;
        $this->save();
    }

    public function setPublic()
    {

        $this->status = Post::IS_PUBLIC;
        $this->save();
    }



    public function toggleStatus( $value )
    {

        if ($value == null){
            return $this->setDraft();
        }

        return  $this->setPublic();
    }

    public function setFeatured()
    {

        $this->is_featured = Post::IS_FEATURED;
        $this->save();
    }

    public function setStandart()
    {

        $this->is_featured = Post::IS_STANDART;
        $this->save();
    }


    public function toggleFeatured( $value )
    {

        if ($value == null){
            return $this->setStandart();
        }

        return  $this->setFeatured();
    }


    // изменим поле даты в подходящий формат до сохранения
    public function setDateAttribute($value)
    {
        $date = Carbon::createFromFormat('d/m/y', $value)->format('Y-m-d');
        $this->attributes['date'] = $date;
    }


    public function getDateAttribute($value)
    {
        $date = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');
       return $date;
    }

    public function getCategoryTitle()
    {
        if ($this->category != null){
            return $this->category->title;
        }

        return 'Нет категории';
    }

    public function getCategoryID()
    {
        return $this->category != null ? $this->category->id : null;
    }

    public function getTagsTitles()
    {
        if (!$this->tags->isEmpty()){
            return implode(', ', $this->tags->pluck('title')->all());
        }

        return 'Нет тегов';
    }



}










