<?php
namespace App\Http\Controllers;
use App\Jira;
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

    }

    public function autorisation(){
        $data=[
            'title' => 'Autorisation',
            'check' => true

        ];
        return view('autorisation' , $data);
    }

    public function check_autorisation(Request $request){
        $data = $request->all();
        $users = DB::table('users')->get();
        foreach ($users as $user) {
            if ($request->autorisation_email==$user->email && $request->autorisation_password==$user->password){
            return $this->mainform();
            }
        }
        return redirect('/');
    }

    public function registration(){
        $data=[
            'title' => 'Regisrtation',
        ];
        return view('registration' , $data);
    }

    public function mainform(){

        $response_project = JiraSearch::searchProject();
        $response_task = JiraSearch::searchTask();
        $data_project =[
            'projects' => $response_project,
            'type_tasks' => $response_task
        ];
        $response =array();

        $response_1 = JiraSearch::searchUser();
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

        $data = $request->all();
        $customer = new User();
        $customer->fill($data);
        $customer->save();
        return redirect('/');
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
        $users= Jira::createUser(array(
            'name' => $request->user_name,
            'password'=> $request->user_password,
            'emailAddress'=> $request->user_emailAddress,
            'displayName'=> $request->user_displayName,
        ));

        return redirect('/task');
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