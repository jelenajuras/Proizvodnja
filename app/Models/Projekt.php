<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Projekt extends Model
{
	
	protected $fillable = ['narucitelj_id','investitor_id','name'];
	
	/*
	* The Eloquent narucitelj model name
	* 
	* @var string
	*/
	protected static $naruciteljModel = 'App\Models\Narucitelj'; 	
	
	/*
	* The Eloquent comments model name
	* 
	* @var string
	*/
	protected static $commentsModel = 'App\Models\Comment'; 	
	
	/*
	* Returns the naruditelj relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	
	public function narucitelj()
	{
		return $this->belongsTo(static::$naruciteljModel,'narucitelj_id');
	}
	
	/*
	* Returns the investitor relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	
	public function investitor()
	{
		return $this->belongsTo(static::$naruciteljModel,'investitor_id');
	}
	
	/*
	* Returns the comments relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	
	public function comments()
	{
		return $this->hasMany(static::$commentsModel,'projekt_id')->orderBy('created_at','DESC')->paginate(10);
	}	
	
	/*
	* Save Projekt
	* 
	* @param array $post
	* @return void
	*/
	
	public function saveProjekt($projekt=array())
	{
		return $this->fill($projekt)->save();
	}
	
	/*
	* Update Post
	* 
	* @param array $post
	* @return void
	*/
	
	public function updateProjekt($projekt=array())
	{
		return $this->update($projekt);
	}	