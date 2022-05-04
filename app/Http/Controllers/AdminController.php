<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Manga;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(function ($request, $next) {
            if(!Auth::user()->isadmin){
                return redirect()->route('home');
            }
            return $next($request);
        });
    }
    public function index(Request $request)
    {
        $mangas = Manga::get();
        $users = User::get();
        return view('admin.index', ["mangas" => $mangas, "users" => $users]);
    }
    public function mangacreate(Manga $manga)
    {
        return view('admin.mangacreate', ["manga" => $manga]);
    }
    public function episodecreate()
    {
        $mangas = Manga::get();
        $episode = null;
        return view('admin.episodecreate', ["episode" => $episode, "mangas" => $mangas]);
    }
    public function manga(Request $request)
    {
        $mangas = Manga::get();
        $search = $request->search ?? null;
        if($search){
            $mangas = Manga::query()->where('name', 'like', "%$request->search%")->paginate(10);
        }else{
            $mangas = Manga::get();
        }
        return view('admin.manga', ["mangas" => $mangas, "search" => $search ]);
    }
    public function user()
    {
        $users = User::get();
        return view('admin.users', ["users" => $users ]);
    }
    
    public function mangadelete(Manga $manga)
    {
        $manga->delete();
        return back();
    }
    public function episode_delete(Chapter $chapter)
    {
        $chapter->delete();
        return back();
    }
    public function mangacreate_post(Request $request)
    {
        $this->validate($request, [
            'name' => "required|max:255",
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        $imagePath = $request->existedImage ?? null;
        if ($request->image) {
            $imageName = time() . $request->image->getClientOriginalName();
            $request->image->move(public_path('images/thumbnails'), $imageName);
            if($imagePath){
                File::delete(public_path($imagePath));
            }
            $imagePath = "/images/thumbnails/" . $imageName;
        }
        $manga = Manga::find($request->id);
        if($manga){
            $request->name !== $manga->name && $manga->name = $request->name;
            $request->description !== $manga->description &&  $manga->description = $request->description;
            $request->author !== $manga->author &&  $manga->author = $request->author;
            $request->released !== $manga->released &&  $manga->released = $request->released;
            $request->genres !== $manga->genres &&  $manga->genres = $request->genres;
            $request->type !== $manga->type && $manga->type = $request->type;
            $request->status !== $manga->status &&  $manga->status = $request->status;
            $imagePath !== $manga->image && $manga->image = $imagePath;
            $manga->update();
            return redirect()->route("admin");
        }
        Manga::create([
            'name' => $request->name,
            'description' => $request->description,
            'author' => $request->released_year,
            'genres' => $request->genres,
            'released' => $request->country,
            'type' => $request->type,
            'status' => $request->version,
            'image' => $imagePath,
        ]);
        return redirect()->route("admin");
    }
    public function episodecreate_post(Request $request)
    {
        $this->validate($request, [
            'manga' => "required",
            'episode_name' => 'required',
            'images' => "required"
        ]);
        $imageArray = $request->existedImage ?? [];
        if ($request->images) {
            foreach ($request->images as $key => $image) {
                $imageName = time() . $image->getClientOriginalName();
                $path = 'images/'.$request->manga."/".$request->episode_name."/";
                $image->move(public_path($path), $imageName);
                $imagePath = $path . $imageName;
                array_push($imageArray, $imagePath);
            }
        }
        $chapter = Chapter::find($request->id);
        if($chapter){
            $request->manga !== $chapter->manga && $chapter->manga = $request->manga;
            $request->episode_id !== $chapter->episode_id &&  $chapter->episode_id = $request->episode_id;
            $chapter->images = $imageArray;
            $chapter->update();
            return redirect()->route("admin");
        }

        Chapter::create([
            'manga_id' => $request->manga,
            'episode_name' => $request->episode_name,
            'images' => json_encode($imageArray)
        ]);
        return redirect()->route("admin");
    }

    public function makeAdmin(User $user){
        if( !$user->isadmin){
            $user->isadmin = true;
        }else{
            $user->isadmin = false;
        }
        $user->save();
        return back();
    }

    public function episode(){
        $episodes = Chapter::get();
        return view("admin.episode", ["episodes" => $episodes]);
    }
}
