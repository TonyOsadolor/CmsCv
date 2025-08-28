<?php

namespace App\Livewire\Livewire\V1;

use App\Models\User;
use App\Models\Skill;
use App\Models\Social;
use Livewire\Component;
use App\Models\SideTag;
use App\Models\AboutMe;
use App\Models\Service;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Testimonial;
use App\Mail\ContactMeMail;
use Livewire\Attributes\Validate;
use App\Enums\AppNotificationEnum;
use App\Traits\AppNotificationTrait;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class LandPageComponent extends Component
{
    use AppNotificationTrait;
    /**
     * Submit Contact Me Form
     */
    public string $from_name = '';
    public string $sender_email = '';
    public string $msg_subject = '';
    public string $main_message = '';

    public function submitContactMe()
    {
        $aboutMe = AboutMe::first();
        $data = $this->validate([
            'from_name' => ['required', 'string'],
            'sender_email' => ['required', 'email'],
            'msg_subject' => ['required', 'string'],
            'main_message' => ['required', 'string'],
        ]);

        $mail = [
            'receiver' => $aboutMe,
            'subject' => $data['msg_subject'],
            'names' => $data['from_name'],
            'sender' => $data['sender_email'],
            'message' => $data['main_message'],
        ];

        Mail::to($aboutMe->email)->send(new ContactMeMail($mail));

        $this->reset();
        $msg = 'Message Sent Successfully';
        $this->notify('success', $msg, AppNotificationEnum::SUCCESS);
    }

    /**
     * Get GitHub Public Profile
     */
    private function getGithubPublicProfile()
    {
        $response = Http::get('https://api.github.com/users/'.config('mine.github_username'));

        if ($response->successful()) {
            return json_decode($response->body(), true);
        }

        return false;        
    }

    /**
     * Render HTML Page
     */
    public function render()
    {
        $user = User::first();
        $github = $this->getGithubPublicProfile();
        $aboutMe = AboutMe::where('user_id', $user->id)->first();

        if (!$aboutMe) {
            return view('blank_page');
        }

        $sideTags = SideTag::where('about_me_id', $aboutMe->id)->pluck('name')->implode(', ');
        $testimonials = Testimonial::where('about_me_id', $aboutMe->id)
            ->where('publish', 1)->get();

        return view('livewire.livewire.v1.land-page-component')->with([
            'aboutMe' => $aboutMe,
            'experiences' => Experience::active()->where('about_me_id', $aboutMe->id)->get(),
            'educations' => Education::active()->where('about_me_id', $aboutMe->id)->get(),
            'services' => Service::active()->where('about_me_id', $aboutMe->id)->get(),
            'skills' => Skill::active()->where('about_me_id', $aboutMe->id)->get(),
            'socials' => Social::active()->where('about_me_id', $aboutMe->id)->get(),
            'testimonials' => $testimonials,
            'sideTags' => $sideTags,
            'yearOfExperience' => $aboutMe->experience ?? 4,
            'happyClients' => Testimonial::where('about_me_id', $aboutMe->id)->count(),
            'publicRepos' => isset($github['public_repos']) ? $github['public_repos'] : 38,
        ]);
    }
}
