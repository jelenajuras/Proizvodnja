<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model
{
    protected $fillable = ['brOrmara','projektirao_id','odobrio_id','datum_isporuke','projekt_id','proizvodjac','proizvodjacOpr','naziv','tip','model','velicina','materijal','izvedba','napon','struja','prekidna_moc','sustav_zastite','ip_zastita','ulaz_kabela','oznake','logo','napomena'];
	
	/*
	* The Eloquent project model name
	* 
	* @var string
	*/
	protected static $projectModel = 'App\Models\Project'; 
	
	/*
	* The Eloquent project model name
	* 
	* @var string
	*/
	protected static $userModel = 'App\Models\Users'; 
	
	/*
	* The Eloquent project model name
	* 
	* @var string
	*/
	protected static $preparationModel = 'App\Models\Preparation'; 
	
	/*
	* The Eloquent purchase model name
	* 
	* @var string
	*/
	protected static $purchaseModel = 'App\Models\Purchase'; 
	
	/*
	* The Eloquent purchase model name
	* 
	* @var string
	*/
	protected static $productionModel = 'App\Models\Production'; 
	
	/*
	* Returns the customer relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	
	public function odobrio_user()
	{
		return $this->belongsTo(static::$userModel,'odobrio_id');
	}
	
	/*
	* Returns the customer relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	
	public function projektirao_user()
	{
		return $this->belongsTo(static::$userModel,'projektirao_id');
	}
	
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
	* Returns the customer relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	
	public function preparation()
	{
		return $this->hasOne(static::$preparationModel,'ormar_id');
	}
	
	/*
	* Returns the purchase relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	
	public function purchase()
	{
		return $this->hasOne(static::$purchaseModel,'ormar_id');
	}
	
	/*
	* Returns the production relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	
	public function production()
	{
		return $this->hasOne(static::$productionModel,'ormar_id');
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
