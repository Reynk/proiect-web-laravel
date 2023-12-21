<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // The table associated with the model.
    protected $table = 'orders';

    // Primary key of the table
    protected $primaryKey = 'order_id';

    // Indicates if the model should be timestamped. 
    // Set to false because timestamps are not present in the provided schema.
    public $timestamps = false;

    // The attributes that are mass assignable.
    protected $fillable = [
        'username',
        'event_title',
        'event_id',
        'price',
        'size',
    ];

    // If you have relationships to define, for example with an Event or User, you can define them here.

    // Assuming there is a relationship between Order and User based on the username
    public function user()
    {
        // This assumes that your User model uses 'username' as the primary key.
        // If 'username' is not the primary key, additional arguments will need to be passed to the belongsTo method.
        return $this->belongsTo(User::class, 'username', 'username');
    }

    // Assuming there is a relationship between Order and Event based on the event_id
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }
}