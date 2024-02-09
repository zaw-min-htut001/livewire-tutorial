<?php

namespace App\Livewire\Student;

use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Livewire\Forms\StoreStudent;

class Create extends Component
{
    use WithFileUploads;

    public StoreStudent $form;

    #[Validate('required')]
    public $class_id;

    public $sections=[];

    public function save()
    {
        $this->validate();

        $this->form->store(class_id: $this->class_id);

        return redirect(route('students.index'))
            ->with('status', 'Student successfully created.');
    }

    public function updatedClassId($value)
    {
        $this->sections = Section::where('class_id', $value)->get();
    }

    public function render()
    {
        return view('livewire.student.create' , [
            'classes' => Classes::all()
        ]);
    }
}
