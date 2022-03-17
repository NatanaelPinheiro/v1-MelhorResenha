<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;

class ReviewController extends Controller
{
    public function index(){
        $search = request('search');
        if($search){

            $reviews = Review::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        }else{
            $reviews = Review::all();
        }
        
        return view('welcome', [
            'reviews' => $reviews,
            'search' => $search
        ]);
    }

    public function create(){
        return view('review.create');
    }

    public function store(Request $request){

        $review = new Review;
        $review->title = $request->title;
        $review->description = $request->description;
        $review->author = $request->author;
        $review->release = $request->release;

        // IMAGE UPLOAD
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $requestImage->move(public_path('img/reviews'), $imageName);

            $review->image = $imageName;
        }

        $user = auth()->user();
        $review->user_id = $user->id;

        $review->save();

        return redirect('/')->with('msg', 'Resenha adicionada com sucesso');
    }

    public function show($id){
        $review = Review::findOrFail($id);
        $user = auth()->user();

        $hasUserSaved = false;

        if($user){
            $userReviews = $user->reviewsAsParticipant->toArray();

            foreach($userReviews as $userReview){
                if($userReview['id'] == $id){
                    $hasUserSaved = true;
                }
            }
        }
        $reviewOwner = User::where('id', $review->user_id)->first()->toArray();
        
        return view('review.show', [
            'review' => $review,
            'reviewOwner' => $reviewOwner,
            'hasUserSaved' => $hasUserSaved
        ]);
    }

    public function dashboard(){
        $user = auth()->user();
        $reviews = $user->reviews;
        $reviewsAsParticipant = $user->reviewsAsParticipant;

        return view('review.dashboard', [
            'reviews' => $reviews,
            'reviewsAsParticipant' => $reviewsAsParticipant
        ]);
    }

    public function destroy($id){
        Review::findOrFail($id)->delete(); 
        return redirect('/dashboard')->with('msg', 'Resenha excluída com sucesso!');
    }

    public function edit($id){
        $user = auth()->user();
        $review = Review::findOrFail($id);

        if($user->id != $review->user->id){
            return redirect('/dashboard');
        }else{
            return view('review.edit', [
                'review' => $review]);
        }
    }

    public function update(Request $request){
        $data = $request->all();

        // IMAGE UPLOAD
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $requestImage->move(public_path('img/reviews'), $imageName);

            $data['image'] = $imageName;
        }

        Review::findOrFail($request->id)->update($data);
        return redirect('/dashboard')->with('msg', 'Resenha editada com sucesso!');
    }

    public function saveReview($id){
        $user = auth()->user();
        $user->reviewsAsParticipant()->attach($id);
        $review = Review::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'resenha '.$review->title.' salva com sucesso!');
    }

    public function leaveReview($id){
        $user = auth()->user();
        $user->reviewsAsParticipant()->detach($id);
        $review = Review::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'resenha '.$review->title.' removida com sucesso!');
    }



}
