<<<<<<< HEAD
class Categoria extends Model
{
    protected $table = 'categorias';
    protected $fillable = ['nome', 'descricao'];
=======
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    protected $fillable = [
        'nome',
        'descricao',
    ];
>>>>>>> 89fbab5 (feat: ajusta rotas, banco de dados sqlite e assets do modulo de categorias)
}