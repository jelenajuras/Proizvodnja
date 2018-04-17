<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['ormar_id','datum','koment_orm','koment_kan','koment_sine','koment_vod','koment_bak','koment_stez','koment_sklOpr','rijeseno1','rijeseno2','rijeseno3','rijeseno4','rijeseno5','rijeseno6','rijeseno7'];
	
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
	* Save Purchase
	* 
	* @param array $purchase
	* @return void
	*/
	
	public function savePurchase($purchase=array())
	{
		return $this->fill($purchase)->save();
	}
	
	/*
	* Update Purchase
	* 
	* @param array $purchase
	* @return void
	*/
	
	public function updatePurchase($purchase=array())
	{
		return $this->update($purchase);
	}	
}
