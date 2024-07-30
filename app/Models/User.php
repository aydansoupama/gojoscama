<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['code', 'balance'];

    // Utilisez la clé primaire 'id' par défaut
    protected $primaryKey = 'id';

    // Le code est le champ utilisé pour l'authentification
    public function getAuthPassword()
    {
        return $this->code;
    }
}
