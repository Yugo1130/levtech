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
        'category_id'
    ];

    use HasFactory;

    public function getByLimit(int $limit_count = 5)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }

    public function getPaginateByLimit(int $limit_count = 5)
    {
        //paginateは内部でget()と同じ動作をしているためget()は不要。
        //eagerローディング使用（クエリ回数削減）
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

    // Categoryに対するリレーション
    //「1対多」の関係なので単数系に
    // Postモデルのインスタンスから関連する1つのCategoryモデルのインスタンスを呼び出せる
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
