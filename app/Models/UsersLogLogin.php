<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersLogLogin extends Model
{
    protected $table = 'users_log_logins'; // Verifique se o nome da tabela está correto

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    // Aqui você pode definir os relacionamentos e outras configurações do modelo, se necessário
}
