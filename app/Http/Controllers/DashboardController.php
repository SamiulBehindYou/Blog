<?php

namespace App\Http\Controllers;

use App\Mail\AuthorActiveMail;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Author;
use App\Models\Blog;
use App\Models\Message;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;

class DashboardController extends Controller
{
    public function dashboard(){
        $blogs = Blog::where('status', 1); // Global

        $total_blog = $blogs->count();
        // Active blog insight carve data ---------------------
        $blog_array = [];
        $loop = $blogs->get();
        $index = -1;
        $day = 0;
        foreach($loop as $blog){
            if($day == $blog->created_at->format('d')){
                $blog_array[$index] += 1;
            }else{
                $index ++;
                $blog_array[$index] = 1;
            }
            $day = $blog->created_at->format('d');
            if($index == 19){ //Ony 20 day data for carve
                break;
            }
        }

        // Total Admin post with percentage ---------------------
        $admin_blogs = Blog::where('author_id', 0)->count();
        //percentage making
        $percentage = ($admin_blogs/$total_blog)*100;
        $percentage = intval($percentage);

        // Last 10 days insights --------------------------------
        $last_ten = [];
        $loop2 = $blogs->get();
        $sl = -1;
        $t_day = 0;
        $ten_day_total = 0;
        foreach($loop2 as $blog){
            if($t_day == $blog->created_at->format('d')){
                $last_ten[$sl] += 1;
                $ten_day_total ++;
            }else{
                $sl ++;
                $last_ten[$sl] = 1;
                $ten_day_total ++;
            }
            $t_day = $blog->created_at->format('d');

            if($sl == 9){ //Ony ten days data need then break loop
                break;
            }
        }


        // Growth --------------------------------------------
        $total_blog;
        // Getting total day
        $total_day = 0;
        $loop3 = $blog->get();
        $i_day = 0;
        foreach($loop3 as $blog){
            if($i_day == $blog->created_at->format('d')){
                continue;
            }else{
                $total_day ++;
            }
            $i_day = $blog->created_at->format('d');
        }
        // Getting total day end
        $half_of_total_day = $total_day/2;
        // Total blog count on first half
        $fh_blog = 0;
        $loop4 = $blogs->get();
        $ii = 0;
        $day = 0;
        foreach($loop4 as $blog){
            if($day == $blog->created_at->format('d')){
                $fh_blog ++;
            }else{
                $ii ++;
                $fh_blog ++;
            }
            $day = $blog->created_at->format('d');
            if($ii == $half_of_total_day){ //Ony 20 day data for carve
                break;
            }
        }
        if($total_blog > $fh_blog){
            $lh_blog = $total_blog - $fh_blog;
        }else{
            $lh_blog = $fh_blog - $total_blog;
        }
        //growth percentage
        $g_per = (($lh_blog - $fh_blog)/$fh_blog)*100;
        $growth = round($g_per, 2);


        // Announcements ------------------------------------
        $announcements = Announcement::orderBy('id', 'DESC')->limit(5)->get();

        // Messsages ------------------------------------
        $messages = Message::orderBy('id', 'DESC')->limit(5)->get();





        return view('admin.dashboard', compact('total_blog', 'admin_blogs', 'percentage', 'blog_array', 'last_ten', 'ten_day_total', 'growth', 'announcements', 'messages'));
    }

    public function admins(){
        $users = User::all();
        return view('admin.profile.admins', compact('users'));
    }

    public function authors(){
        $authors = Author::all();
        return view('admin.authors.authors', compact('authors'));
    }

    public function author_status($id){
        $author = Author::find($id);
        if($author->status == 0){
            $author->status = 1;
            $author->save();
            $subject = 'Congratulations';
            $message = 'Account activated!';
            Mail::to($author->email)->send(new AuthorActiveMail($subject, $message));
        }
        else{
            $author->status = 0;
            $author->save();
        }
        return back()->withSuccess('Author status updated!');
    }
    public function author_delete($id){
        Author::find($id)->delete();
        return back()->withSuccess('Author has been deleted by the admin!');
    }

    public function delete_user($id){
        User::find($id)->delete();

        return back()->withSuccess('User deleted successfully!');
    }

    public function edit_profile(){
        return view('admin.profile.edit_profile');
    }

    public function new_register(){
        return view('admin.auth.register');
    }

    public function admin_register(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect(route('dashboard', absolute: false))->withSuccess('Admin registered successfully!');
    }
}
