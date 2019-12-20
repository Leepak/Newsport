<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Blog;
use Session;
use Mail;
class PagesController extends Controller
{
    public function getIndex(){
        $blog = Blog::orderBy('created_at','desc')->limit(4)->get();
        return view("pages.welcome")->withBlog($blog);
    }
    public function getAbout(){
		return view('pages.about');
    }
    public function getContact(){
        return view("pages.contact");
    }
    public function help(){
        return view("pages.help");
    }
    public function postContact(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
			'subject' => 'min:3',
            'message' => 'min:10']);
            $data = array(
                'email' => $request->email,
                'subject' => $request->subject,
                'bodyMessage' => $request->message
                );
            Mail::send('auth.emails.contact', $data, function($message) use ($data){
                $message->from($data['email']);
                $message->to('Newsports@gmail.com');
                $message->subject($data['subject']);
            });
            Session::flash('success', 'Your Email was Sent!');
            return redirect('/');
       
    }
}
