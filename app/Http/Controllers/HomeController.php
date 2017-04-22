<?php
namespace App\Http\Controllers;
use App\Jira;
use App\JiraProgrammer;
use App\Programmer;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Add',
        ];
        return view('index' , $data );
    }

    public function autorisation(){
        $data=[
            'title' => 'Autorisation',
        ];
        return view('autorisation' , $data);
    }

    public function registration(){
        $data=[
            'title' => 'Regisrtation',
        ];
        return view('registration' , $data);
    }

    public function mainform(){
        $data=[
            'title' => 'Task'
        ];
        $tasks = Task::select(['id','project','summary','description'])->get();
        return view('mainform' , $data)->with(['tasks'=> $tasks]);;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($data);
        /*      $customer->name = $request->name;
                $customer->email = $request->email;
                $customer->password = $request->password;
                $customer->remember_token = $request->remember_token;*/
        $data = $request->all();
        $customer = new User();
        $customer->fill($data);
        $customer->save();
        return redirect('/autorisation');
    }

    public  function storer(Request $request)
    {
        $data = $request->all();
        $programmer = new Programmer();
        $programmer ->fill($data);
        $programmer ->save();
        return redirect('/' );
    }

    public function storers(Request $request){
        $data = $request->all();
        $task = new Task();
        $task ->fill($data);
        $task ->save();
        return redirect('/');
    }

    public  function send(Request $request){
        $data = $request->all();
        $issue = Jira::create( array(
            'project'     => array(
                'key' => $request->project
            ),
            'summary'     => $request->summary,
            'description' => $request->description ,
            'issuetype'   => array(
                'name' => $request->name
            )
        ) );
        dd($issue);
        return redirect('/task');
    }

    public function createAndsend(Request $request){
        $data = $request->all();
        $issue = Jira::create( array(
            'project'     => array(
                'key' => $request->create_project
            ),
            'summary'     => $request->create_summary,
            'description' => $request->create_description,
            'issuetype'   => array(
                'name' => $request->create_name
            )
        ) );
        return redirect('/task');
    }

    public function updatetask(Request $request){
        Jira::update( $request->update_project, array(
            'summary'     => $request->update_summary,
            'description' => $request->update_description,
            'issuetype'   => array(
            'name' => $request->update_name
            )
        ));
        return redirect('/task');
    }

    public function search(){
        /*$response = JiraProgrammer::search( 'project = YourProject AND
                                        labels = somelabel' );*/
        $response = JiraProgrammer::search( 'key = dima AND 
                                        username = Dima AND
                                        emailAddress = hanzha@mail.ru' );
        return redirect ('/task');
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
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}