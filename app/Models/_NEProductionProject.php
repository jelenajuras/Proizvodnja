<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductionProject extends Model
{
    /**
	* The attributes thet are mass assignable
	*
	* @var array
	*/
	protected $fillable = ['id','projekt_id','investitor_id','naziv','user_id'];
	
	/*
	* The Eloquent comments model name
	* 
	* @var string
	*/
	protected static $projectModel = 'App\Models\Project'; 	
	
	/*
	* Returns the users relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	
	/*
	* The Eloquent user model name
	* 
	* @var string
	*/
	protected static $userModel = 'App\Models\Users'; 	
	
	/*
	* Returns the users relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	
	public function user()
	{
		return $this->belongsTo(static::$userModel,'user_id');
	}
	
	/*
	* Returns the users relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	
	public function project()
	{
		return $this->belongsTo(static::$projectModel,'projekt_id');
	}
	
	/*
	* Save ProductionProject
	* 
	* @param array $production_project
	* @return void
	*/
	
	public function saveProductionProject($production_project=array())
	{
		return $this->fill($production_project)->save();
	}
	
	/*
	* Update ProductionProject
	* 
	* @param array $production_project
	* @return void
	*/
	
	public function updateProductionProject($production_project=array())
	{
		return $this->update($production_project);
	}	
}
