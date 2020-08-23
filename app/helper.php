<?php
use App\Models\Message;
use Illuminate\Database\Eloquent\Builder;
if (!function_exists('unreadCount')) {
	 function unreadCountAll($id){
	 	return Message::all()->where('to_id', $id)->count();

	}
}


/*if (!function_exists('getComoditeNa')) {
	 function getComoditeNa($promo_id){

		$comodes = Comodite::whereDoesntHave('promos', function (Builder $query){
			$query->where('promo_id', 1);
		})->get();

		return $comodes;
	}
}*/