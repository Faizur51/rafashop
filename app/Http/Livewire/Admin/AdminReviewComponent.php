<?php

namespace App\Http\Livewire\Admin;

use App\Models\Review;
use Livewire\Component;
use Livewire\WithPagination;

class AdminReviewComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        $reviews=Review::orderBy('id','desc')->paginate(5);

        return view('livewire.admin.admin-review-component',['reviews'=>$reviews]);
    }
}
