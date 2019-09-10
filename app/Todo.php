<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Todo extends Model
{
    //
    protected $fillable = [
        'title',
        'user_id'
    ];
//保存が可能になった　ユーザーに紐づいたデータの取得の記述も完了
    public function getByUserId($id)
    {//user_idが渡してきたidのものを取得　最終的な結果をget()で取得　メソッドチェーンでつなぐ
        return $this->where('user_id', $id)->get();
    }
}
