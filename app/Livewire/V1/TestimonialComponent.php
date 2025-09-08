<?php

namespace App\Livewire\V1;

use Livewire\Component;
use App\Models\AboutMe;
use App\Models\Testimonial;
use Livewire\WithFileUploads;
use App\Enums\AppNotificationEnum;
use App\Traits\AppNotificationTrait;

class TestimonialComponent extends Component
{
    use AppNotificationTrait;
    use WithFileUploads;

    /**
     * Submit Contact Me Form
     */
    public string $last_name = '';
    public string $first_name = '';
    public string $email = '';
    public string $phone = '';
    public string $occupation = '';
    public string $review = '';
    public bool $use_as_referee;
    public $avatar;

    public function submitReview(): void
    {
        $data = $this->validate([
            'last_name' => ['required', 'string'],
            'first_name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'occupation' => ['required', 'string'],
            'review' => ['required', 'string'],
            'use_as_referee' => ['nullable', 'boolean'],
            'avatar' => ['nullable', 'mimes:jpg,png,jpeg', 'max:150'],
        ]);

        $testimonial = Testimonial::where('phone', $data['phone'])
            ->orWhere('email', $data['email'])->first();
        
        if ($testimonial) {

            if (isset($this->avatar) && $this->avatar != null) {
                $photo = $this->handleUploadPhoto($data['avatar']);
            }            

            $testimonial->update([
                'names' => $data['first_name'] ." ". $data['last_name'],
                'phone' => $data['phone'],
                'occupation' => $data['occupation'],
                'review' => $data['review'],
                'is_refree' => $data['use_as_referee'] ? $data['use_as_referee'] : false,
                'photo' => $data['avatar'] ? $photo : $testimonial->photo,
            ]);

            $this->reset();
            $msg = 'Review Updated Successfully';
            $this->notify('success', $msg, AppNotificationEnum::SUCCESS);
            return;
        } else {

            if (isset($this->avatar) && $this->avatar != null) {
                $photo = $this->handleUploadPhoto($data['avatar']);
            }

            Testimonial::create([
                'about_me_id' => AboutMe::first()->id,
                'names' => $data['first_name'] ." ". $data['last_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'occupation' => $data['occupation'],
                'review' => $data['review'],
                'is_refree' => $data['use_as_referee'] ? $data['use_as_referee'] : false,
                'photo' => $data['avatar'] ? $photo : null,
            ]);
            
            $this->reset();
            $msg = 'Review saved Successfully';
            $this->notify('success', $msg, AppNotificationEnum::SUCCESS);
            return;

        }
    }

    /**
     * Open Review
     */
    public string $username = '';
    public function openReview(): void
    {
        $data = $this->validate([
            'username' => ['required', 'string']
        ]);

        $testimonial = Testimonial::where('phone', $data['username'])
            ->orWhere('email', $data['username'])->first();

        if (!$testimonial) {
            $event = [
                'title' => "404, Not Found!",
                'message' => 'Sorry, no testimonial found!',
                'icon' => 'warning',
                'status' => 'error',
            ];
            $this->dispatch('testimonialError', $event);
        }

        $this->dispatch('openEditModal', modal: $testimonial);
    }

    /**
     * Edit Testimonial
     */
    public string $update_id = '';
    public string $update_names = '';
    public string $update_phone = '';
    public string $update_email = '';
    public string $update_review = '';
    public bool $update_use_as_referee;
    public $update_avatar;
    public function editTestimonial()
    {
        // $this->dispatch('closeModal');

        $data = $this->validate([
            'update_id' => ['nullable', 'integer'],
            'update_names' => ['nullable', 'string'],
            'update_phone' => ['nullable', 'string'],
            'update_email' => ['nullable', 'email'],
            'update_review' => ['nullable', 'update_review'],
            'use_as_referee' => ['nullable', 'boolean'],
            'avatar' => ['nullable', 'mimes:jpg,png,jpeg', 'max:150'],
        ]);

        // $testimonial = Testimonial::find($data['update_id']);

        dd($data);
    }

    /**
     * Handle Upload Photo
     */
    private function handleUploadPhoto($avatar): string
    {
        $monthYear = date('M')."_".date('Y');
        $fileName = str(str_replace(' ', '_', $monthYear."_".time().'_'.$this->avatar->getClientOriginalName()));
        
        $file = $avatar->storeAs(path: 'assets/img', options: 'public', name: $fileName);

        $cleanPath = str_replace('assets/img/', '', $file);

        return $cleanPath;

    }

    /**
     * Render View
     */
    public function render()
    {
        return view('livewire.v1.testimonial-component');
    }
}
