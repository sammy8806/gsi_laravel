<?php
/**
 * Created by PhpStorm.
 * User: mgade
 * Date: 30.06.14
 * Time: 04:42
 */

class Script extends Eloquent {

    protected $table = 'scripts';

    protected $fillable = ['name', 'interpreter', 'commands'];

    public function games() {
        return $this->belongsTo('Game');
    }

} 