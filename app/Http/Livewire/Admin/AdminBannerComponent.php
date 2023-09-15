<?php

namespace App\Http\Livewire\Admin;

use App\Models\Banner;
use Livewire\Component;
use Livewire\WithPagination;
class AdminBannerComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $deleteId = '';

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        $banner = Banner::find($this->deleteId);

        if($banner->image){
            unlink('frontend/assets/images/banner/'.$banner->image);
        }
        $banner->delete();
        session()->flash('message', 'Banner has been deleted successfully');

    }





    public function render()
    {
        $banners=Banner::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.admin.admin-banner-component',['banners'=>$banners]);
    }
}
