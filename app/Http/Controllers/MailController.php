<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class MailController extends Controller
{
    public function sendmail(){

		$name = "Châu";
		$mail = "cxt22373@eveav.com";
 
    	Mail::send(
    		['text'=>'mail.mail_dangki'],
    		['name'=>$name, 'mail'=>$mail],
    		 function($message) use ($name, $mail){

    			// dd($mail);
		    	$tieude = "Text";

	    		$message->to( $mail, $name)->subject($tieude);
	    		$message->from('tranthang0546555@gmail.com',  'Ban quản lý KTX');
    	});
    }
}
