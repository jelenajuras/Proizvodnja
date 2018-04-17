<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Production extends Model
{
   /**
	* The attributes thet are mass assignable
	*
	* @var array
	*/
	protected $fillable = ['ormar_id','datum','koment_mp','koment_orm','koment_vod','koment_ozn','koment_slMp','koment_OznMp','koment_ozic','koment_dok','koment_isp','rijeseno1','rijeseno2','rijeseno3','rijeseno4','rijeseno5','rijeseno6','rijeseno7','rijeseno8','rijeseno9'];
	
	/*
	* The Eloquent cabinet model names
	* 
	* @var string
	*/
	protected static $cabinetModel = 'App\Models\Cabinet';
	
	/*
	* Returns the cabinet relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	
	public function cabinet()
	{
		return $this->belongsTo(static::$cabinetModel,'ormar_id');
	}
	
	/*
	* Save Production
	* 
	* @param array $production
	* @return void
	*/
	
	public function saveProduction($production=array())
	{
		return $this->fill($production)->save();
	}
	
	/*
	* Update Production
	* 
	* @param array $production
	* @return void
	*/
	
	public function updateProduction($production=array())
	{
		return $this->update($production);
	}	
}
