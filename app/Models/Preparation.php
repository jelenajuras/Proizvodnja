<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preparation extends Model
{
    /**
	* The attributes thet are mass assignable
	*
	* @var array
	*/
	protected $fillable = ['ormar_id','datum','koment_3p','koment_3pOd','koment_komax','koment_perf','koment_od','koment_exp','koment_pr','rijeseno1','rijeseno2','rijeseno3','rijeseno4','rijeseno5','rijeseno6','rijeseno7'];
	
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
	* Save Cabinet
	* 
	* @param array $cabinet
	* @return void
	*/
	
	public function savePreparation($preparation=array())
	{
		return $this->fill($preparation)->save();
	}
	
	/*
	* Update Cabinet
	* 
	* @param array $cabinet
	* @return void
	*/
	
	public function updatePreparation($preparation=array())
	{
		return $this->update($preparation);
	}	
}
