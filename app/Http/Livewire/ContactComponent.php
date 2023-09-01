<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactComponent extends Component
{

    public $name;
    public $email;
    public $phone;
    public $subject;
    public $message;


public function updated($fields){
    $this->validateOnly($fields,[
        'name'=>'required',
        'email'=>'required',
        'phone'=>'required',
        'subject'=>'required',
        'message'=>'required',
    ]);
}
    public function sendMessage(){
        $this->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);

        $contact=new Contact();
        $contact->name=$this->name;
        $contact->email=$this->email;
        $contact->phone=$this->phone;
        $contact->subject=$this->subject;
        $contact->message=$this->message;
        $contact->save();
        //noty()->addSuccess('Your message has been store successfully.');
        
        noty()
            ->progressBar(false)
            ->layout('bottomRight')
            ->addInfo('The message has been sent successfully.');

        $this->reset();
    }


    public function render()
    {
        return view('livewire.contact-component');
    }
}
