<?php

namespace App\Http;


use App\Models\User;

class SearchController extends Controller
{
    public function search()
    {
       $searchTerm = $this->getInput('search');
           $searchResults = User::search($searchTerm);
                if(empty($searchTerm)){
                    return $this->redirectTo('/?mess=Unesite kriterium za pretragu!!!');
                }
                if($searchResults != null)
                {
                    return $this->view('search-result',compact('searchResults'));

                }else{

                    return $this->redirectTo('/');
                }
            }
}