<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    // delete()を物理削除から論理削除に変更
    // SoftDeleteを使うと、deleted_atがNULLでないデータは論理削除済みであるとして自動的にはじく
    use SoftDeletes;

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
