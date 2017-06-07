<?php
namespace App\Http\Controllers;
use App\Jira;
use App\JiraProgrammer;
use App\JiraSearch;
use App\Programmer;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

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

        $response_project = JiraSearch::searchProject();
        $data_project =[
            'projects' => $response_project
        ];

        $response =array();
        $response_1 = JiraSearch::searchUser();
        //dd($response_1);
        $d = null;
        foreach ($response_1 as $key => $val)
            if($key%2 == 0) {
                $d = new \stdClass();
                {
                };
                $d->displayName = $val;
            }else {
                $d->email = $val;
                array_push($response, $d);
            }

        //dd($response);
        $data_Res = [
            'users' => $response
        ];

        $tasks = Task::select(['id','project','summary','description'])->get();
        return view('mainform' , $data_project , $data_Res)->with(['tasks'=> $tasks]);
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
        /*$customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = $request->password;
        $customer->remember_token = $request->remember_token;*/
        $data = $request->all();
        $customer = new User();
        $customer->fill($data);
        $customer->save();
        return redirect('/');
    }

    /*public  function storer(Request $request)
    {
        $data = $request->all();
        $programmer = new Programmer();
        $programmer ->fill($data);
        $programmer ->save();
        return redirect('/' );
    }*/

    public function storers(Request $request){
        $data = $request->all();
        $task = new Task();
        $task ->fill($data);
        $task ->save();
        return redirect('/autorisation');
    }

    public function addProgrammer(Request $request){

        if ($request->isMethod('post')) {
           foreach ($request->dev as $devs ) {
                $programmer = new Programmer();
                $programmer->name = $devs["name"];
                $programmer->email = $devs["email"];
                $programmer->save();
           }
        }
        return response()->json(['response' => "1"]);
    }

    public  function send(Request $request){
        $data = $request->all();
        //dd($data);
        for ($i = 1; $i <= (count($data)-2)/2 ;$i++) {
            //$bol_for_stop = true;
            while(!isset($data["select_task" . $i])){
                //if($i >= (count($data)-2)/2)
                    //$bol_for_stop = false;
                    //break;
                $i++;
            }
            //if($bol_for_stop){
                //break;
            //}
                $projects = DB::table('tasks')->where('id', $data["select_task" . $i])->get();
                $projects_name = $projects[0]->project;
                $projects_summary = $projects[0]->summary;
                $projects_description = $projects[0]->description;
                $projects_issue = $data["name" . $i];
                $issue = Jira::createTask(array(
                    'project' => array(
                        'key' => $projects_name
                    ),
                    'summary' => $projects_summary,
                    'description' => $projects_description,
                    'issuetype' => array(
                        'name' => $projects_issue
                    )
                ));
            }
        return redirect('/task');
    }

    public function createAndsend(Request $request){
        $data = $request->all();
        $issue = Jira::createTask( array(
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
        Jira::updateTask( $request->update_project, array(
            'summary'     => $request->update_summary,
            'description' => $request->update_description,
            'issuetype'   => array(
            'name' => $request->update_name
            )
        ));
        return redirect('/task');
    }

    public function createUser(Request $request)
    {
        $data = $request->all();
        //dd($data);
        $users= Jira::createUser(array(
            'name' => $request->user_name,
            'password'=> $request->user_password,
            'emailAddress'=> $request->user_emailAddress,
            'displayName'=> $request->user_displayName,
            'applicationKeys' => array(
                "jira-core"
            )
        ));
        dd($users);
        return redirect('/task');
    }
    /*public function search(){
        $response = JiraProgrammer::search();
        $data_Res =[
            'users' => $response
        ];

        $response_project = JiraSearch::search();
        $data_project =[
            'projects' => $response_project
        ];

        $tasks = Task::select(['id','project','summary','description'])->get();
        return view ('mainform' , $data_Res, $data_project )->with(['tasks'=> $tasks]);
    }*/

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