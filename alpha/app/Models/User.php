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

    protected $fillable = ['USUARIO_NOME',  'USUARIO_EMAIL', 'USUARIO_SENHA', 'USUARIO_CPF'];
    protected $table = "USUARIO";
    protected $primaryKey = "USUARIO_ID";
    public $timestamps = false;

    public function Enderecos(){
        return $this->hasMany(Endereco::class, 'USUARIO_ID','USUARIO_ID');
    }
    public function Carrinho(){
        return $this->hasMany(ProdutoImagem::class, 'USUARIO_ID','USUARIO_ID');
    }
}
