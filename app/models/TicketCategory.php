<?php
/**
 * Created by PhpStorm.
 * User: mgade
 * Date: 30.06.14
 * Time: 04:42
 */

class TicketCategory extends Eloquent {

    protected $table = 'ticket_categories';

    protected $fillable = ['name', 'short','color'];

    public function Tickets() {
        return $this->hasMany('Ticket');
    }

}