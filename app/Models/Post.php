<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // このフィールドなら値をまとめて代入していいよという意味（セキュリティ的な問題）
    protected $fillable = [
        'title',
        'body',
    ];

    use HasFactory;

    public function getByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }

    public function getPaginateByLimit(int $limit_count = 10)
    {
        //paginateは内部でget()と同じ動作をしているためget()は不要。
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
