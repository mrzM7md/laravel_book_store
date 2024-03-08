<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'password', 'administration_level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    ############################################################## STRART RELATIONSHIP ##############################################################
    public function books()
    {
        return $this->hasMany(Books::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function booksInCart()
    {
        return $this->belongsToMany(Book::class)->withPivot(['number_of_copies', 'bought'])->wherePivot('bought', False);
    }

    public function ratedpurches()
    {
        return $this->belongsToMany(Book::class)->withPivot(['bought'])->wherePivot('bought', true);
    }

    ############################################################## END RELATIONSHIP ##############################################################


    public function isAdmin()
    {
        return $this->administration_level == $this->admin() ? true : false;
    }

    public function isSuperAdmin()
    {
        return $this->administration_level == $this->superAdmin() ? true : false;
    }

    public function isUser()
    {
        return $this->administration_level == $this->user() ? true : false;
    }
    public function superAdmin(){
        return 0;
    }
    public function admin(){
        return 1;
    }

    public function user(){
        return 2;
    }

    public function isRatedThisBook(Book $book) // is this user arleady rated this book ?
    {
        return $this->ratings->where('book_id', $book->id)->isNotEmpty();
    }

    public function bookRating(Book $book) // if this user already rated this book, get the rating !!
    {
        return $this->isRatedThisBook($book) ? $this->ratings->where('book_id', $book->id)->first() : NULL;
    }



}
