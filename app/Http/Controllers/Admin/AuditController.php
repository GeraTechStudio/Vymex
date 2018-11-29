<?php

namespace App\Http\Controllers\Admin;

use App\AuditAskType;
use App\AuditAsk;
use App\AuditAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\FrontEnd\ViewController;

class AuditController extends ViewController
{
    /*Show all articles of blog*/
    public function getAuditList(){
    	return view(Config('page-settings.Folder'). '.admin.audit.audit-list')->with([
    		'sidebar' => $this->getSidebarAdmin(),
    		'cap' => $this->getСapAdmin(),
    		'audit_asks' => AuditAsk::all(),
    		'audit_answers' => AuditAnswer::all(),
    		'ask_types' => AuditAskType::all(),
    	]);
    }

     public function createAskAudit(Request $request){
     	$answer_array = [];
     	$audit_ask = new AuditAsk;
     	if(strlen($request->audit_ask_name) < 500){
     		$audit_ask->text_ask = $request->audit_ask_name;
     	}else{
     		return Response::json(['access'=>'denied', 'error_code' => 'a22']);
     	}

     	if($request->audit_ask_type != -1){
     		$audit_ask->id_ask_type = $request->audit_ask_type;
     	}else{
     		return Response::json(['access'=>'denied', 'error_code' => 'a22']);
     	}
     	$audit_ask->save();
     	if(!empty($request->answer_array)){
     		foreach ($request->answer_array as $key => $value) {
     			$audit_answer = new AuditAnswer;
     			$audit_answer->id_ask = $audit_ask->id;
     			$audit_answer->text_answer = $value;
     			$audit_answer->value_answer = $key;
     			$audit_answer->save();
     			array_push($answer_array, $audit_answer);
     		}
     	}else{
     		$audit_ask->delete();
     		return Response::json(['access'=>'denied', 'error_code' => 'a22']);
     	}


    	return Response::json(['access'=>'allow', 'success_code' => 'a9', 'request' => $request, 'answer_array' => $answer_array]);
    }
}
