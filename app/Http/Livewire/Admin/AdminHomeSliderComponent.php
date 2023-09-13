<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;
use Livewire\WithPagination;
class AdminHomeSliderComponent extends Component
{
    use WithPagination;

    public $deleteId = '';
    protected $paginationTheme = 'bootstrap';

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }


    public function delete()
    {

        $slider=HomeSlider::find($this->deleteId);


        if($slider->image){
            unlink('frontend/assets/images/slider/'.$slider->image);
        }

        $slider->delete();
        session()->flash('message','Slider has been deleted successfully');
    }




    public function render()

    {
        $sliders=HomeSlider::orderBy('created_at','desc')->paginate(7);
        return view('livewire.admin.admin-home-slider-component',['sliders'=>$sliders]);
    }


}
