<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model
{
    protected $fillable = ['id','projekt_id','proizvodjac','naziv','tip','model','velicina','materijal','izvedba','napon','struja','prekidna_moc','sustav_zastite','ip_zastita'];
	
	/*
	* The Eloquent project model name
	* 
	* @var string
	*/
	protected static $projectModel = 'App\Models\ProductionProject'; 
	
	/*
	* Returns the customer relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	
	public function projekt()
	{
		return $this->belongsTo(static::$projectModel,'projekt_id');
	}
	
	/*
	* Save Cabinet
	* 
	* @param array $cabinet
	* @return void
	*/
	
	public function saveCabinet($cabinet=array())
	{
		return $this->fill($cabinet)->save();
	}
	
	/*
	* Update Cabinet
	* 
	* @param array $cabinet
	* @return void
	*/
	
	public function updateCabinet($cabinet=array())
	{
		return $this->update($cabinet);
	}
}
