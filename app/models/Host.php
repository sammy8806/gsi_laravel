<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

/**
 * Created by PhpStorm.
 * User: steven
 * Date: 28.06.14
 * Time: 03:48
 */

class Host extends Eloquent {

   use SoftDeletingTrait;

   protected $table = 'hosts';

   protected $fillable = ['technical_data', 'static_ip', 'agent_settings'];

   public function ips() {
      return $this->hasMany('Ip');
   }

}