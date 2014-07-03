<?php

/**
 * Created by PhpStorm.
 * User: mgade
 * Date: 30.06.14
 * Time: 04:42
 */
class Ticket extends Eloquent {

   protected $table = 'tickets';

   protected $fillable = ['priority', 'title', 'text', 'status'];


   public function issuer() {
      return $this->belongsTo('User');
   }

   public function responder() {
      return $this->belongsTo('User');
   }

   public function parent() {
      return $this->belongsTo('Ticket');
   }

   public function category() {
      return $this->belongsTo('TicketCategory');
   }

   public function tickets() {
      return $this->hasMany('Ticket');
   }
}