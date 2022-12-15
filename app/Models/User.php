<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'email',
        'password',
        'balance',
    ];

    public function compras()
    {
        return $this->hasMany(Compra::class);
    }
    public function getCompras()
    {
        return $this->compras;
    }
    public function setCompras($compras)
    {
        $this->compras = $compras;
    }
    public function getId()
    {
        return $this->attributes['id'];
    }
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    public function getName()
    {
        return $this->attributes['nombre'];
    }
    public function setName($name)
    {
        $this->attributes['nombre'] = $name;
    }
    public function getEmail()
    {
        return $this->attributes['email'];
    }
    public function setEmail($email)
    {
        $this->attributes['email'] = $email;
    }
    public function getPassword()
    {
        return $this->attributes['password'];
    }
    public function setPassword($password)
    {
        $this->attributes['password'] = $password;
    }
    public function getRole()
    {
        return $this->attributes['rol'];
    }
    public function setRole($role)
    {
        $this->attributes['rol'] = $role;
    }
    public function getBalance()
    {
        return $this->attributes['balance'];
    }
    public function setBalance($balance)
    {
        $this->attributes['balance'] = $balance;
    }
    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }
    public function setCreatedAt($createdAt)
    {
        $this->attributes['created_at'] = $createdAt;
    }
    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }
    public function setUpdatedAt($updatedAt)
    {
        $this->attributes['updated_at'] = $updatedAt;
    }









    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
