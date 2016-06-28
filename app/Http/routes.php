<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
| 
*/
// Route::group(['middleware' => ['web']], function () {
    
// });

Route::group(['middleware' => ['web']], function () {
    //
});
Route::group(['middleware' => ['api']], function()
{
	Route::get('/',function()
	{
	   return view('welcome');
	});
	Route::post('/data',function(Request $request)
	{	
		$id = $request->input('id');
		$name = $request->input('name');
		$checkid  =(int) DB::table('Tinh')->where('id',$id)->count();
		if($checkid>0){
			return Response::json(array('msg' => 'Error !!'));
		}
		else
		{
			if($name!=null)
			{
				$i = DB::table('Tinh')->insert(
					    ['id' => $id, 'name' => $name]
					);
				if($i>0)
				{
					return Response::json(array('msg' => 'Add successfully update.'));
				}
				else
				{
					return Response::json(array('msg' => 'Error !!'));
				}
			}
			else
			{
				return Response::json(array('msg' => 'Error !!'));
				
			}
		}
	 
	});
});