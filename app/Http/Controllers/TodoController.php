<?php
//コントローラーとは、ルートから受け取った情報をモデルに処理をお願いする役割と
//モデルから受け取った情報をビューに表示する役割がある 
namespace App\Http\Controllers;
//ここの「use」は以下のファイルを使いますよと宣言している。
use Illuminate\Http\Request;
//ここだったらTodoを使いますよと宣言している。
use App\Todo;
//extendsでControllerクラスを継承している（Controller.php）に記載されている。
use Auth;
class TodoController extends Controller
{
    private $todo;

    public function __construct(Todo $instanceClass)
    {
        //認証していないときㇾダイレクト
        $this->middleware('auth');
        $this->todo = $instanceClass;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd( $this->todo->getByUserId(Auth::id())); コレクション
        $todos = $this->todo->getByUserId(Auth::id());
        //dd($todos);
        return view('todo.index',compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //HTTPリクエストで送られてきた情報を連想配列で取得　生成されたTokenとtitleがキーの入力した値
        $input = $request->all();
        //dd($input);
        //fill()でモデルのプロパティにフォームから送られてきた情報を代入プロパティに代入する　ここでいうモデルはTodoクラスのインスタンス化
        //dd( $this->todo->fill($input));
        $input['user_id'] = Auth::id();
        $this->todo->fill($input)->save();        
        return redirect()->route('todo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //dd($id);
        $todo = $this->todo->find($id);
        //dd($todo);
        //dd(compact('todo'));
        dd(view('todo.edit', compact('todo')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input = $request->all();
        //キーがtitle Token methodキー　PUTのみっつが配列で送られている。
        //dd($input);
        //送られてきたidからレコードを取得してきてfillで$todoのプロパティに代入でアップデート処理を行う。
        $this->todo->find($id)->fill($input)->save();
        return redirect()->route('todo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //deleteは物理削除 findはTodoインスタンスを返しています。
        //dd($this->todo->find($id));
        $this->todo->find($id)->delete();
        return redirect()->route('todo.index');
    }
}
