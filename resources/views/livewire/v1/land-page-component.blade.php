<div>

        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 sticky-lg-top vh-100">
                    <div class="d-flex flex-column h-100 text-center overflow-auto shadow">
                        <img class="w-100 img-fluid mb-4" 
                            src="{{ url('public/'.$aboutMe->photo) }}" 
                            oncontextmenu="return false;" draggable="false" 
                            alt="{{ optional($aboutMe)->othernames }}"
                            style="max-height: 350px;">
                        <h1 class="text-primary mt-2">{{ optional($aboutMe)->othernames }}</h1>
                        <div class="mb-4" style="height: 22px;">
                            <h4 class="typed-text-output d-inline-block text-light"></h4>
                            @if(isset($sideTags))
                            <div class="typed-text d-none">
                                {{ $sideTags }}
                            </div>
                            @endif
                        </div>
                        <div class="d-flex justify-content-center mt-auto mb-3">
                            @if(isset($socials) && count($socials) > 0)
                            @foreach($socials as $social)
                                <a class="btn btn-secondary btn-square mx-1" href="{{ $social->handle }}"><i class="{{ optional($social)->icon }}"></i></a>
                            @endforeach
                            @endif
                        </div>
                        <div class="d-flex align-items-end justify-content-between border-top">
                            <a class="btn w-50 border-end">Download CV</a>
                            <a href="#contact" class="btn w-50 btn-scroll">Contact Me</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <!-- About Start -->
                    <section class="py-5 border-bottom wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="title pb-3 mb-5">About Me</h1>
                        <p>
                            {{ optional($aboutMe)->quote ?? null }}
                        </p>
                        <div class="row mb-4">
                            <div class="col-sm-6 py-1">
                                <span class="fw-medium text-primary">Full Name:</span> 
                                <span style="text-transform:uppercase;">{{ optional($aboutMe)->surname ?? null }}</span>, 
                                {{ optional($aboutMe)->othernames ?? null }}
                            </div>
                            <div class="col-sm-6 py-1">
                                <span class="fw-medium text-primary">Degree:</span> 
                                {{ optional($aboutMe)->degree ?? 'HND' }} ({{ optional($educations)->first()->course ?? null }})
                            </div>
                            <div class="col-sm-6 py-1">
                                <span class="fw-medium text-primary">Experience:</span> 
                                {{ optional($aboutMe)->experience ?? '4' }}+ Years
                            </div>
                            <div class="col-sm-6 py-1">
                                <span class="fw-medium text-primary">Phone:</span> 
                                <a style="color:white;" href="tel:+{{ optional($aboutMe)->call_number }}">
                                    (+234) {{ optional($aboutMe)->phone }}
                                </a>
                            </div>
                            <div class="col-sm-6 py-1">
                                <span class="fw-medium text-primary">Email:</span>
                                <a style="color:white;" href="mailto:{{ optional($aboutMe)->email }}">{{ optional($aboutMe)->email }}</a>
                            </div>
                            <div class="col-sm-6 py-1">
                                <span class="fw-medium text-primary">Core Skill:</span>
                                {{ optional($aboutMe)->core_skills ?? null }}
                            </div>
                            <div class="col-sm-6 py-1">
                                <span class="fw-medium text-primary">Freelance:</span>
                                {{ isset($aboutMe->freelance) ? 'Available' : 'Not Available' }}
                            </div>
                            <div class="col-sm-6 py-1">
                                <span class="fw-medium text-primary">Address:</span> 
                                {{ optional($aboutMe)->address }}, 
                                {{ optional($aboutMe)->state }},
                                {{ optional($aboutMe)->country }}.
                            </div>
                        </div>
                        <div class="row g-4">
                            <div class="col-md-4 col-lg-6 col-xl-4">
                                <div class="d-flex bg-secondary p-4">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">{{ $yearOfExperience }}</h1>
                                    <div class="ps-3">
                                        <p class="mb-0">Years of</p>
                                        <h5 class="mb-0">Experience</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-6 col-xl-4">
                                <div class="d-flex bg-secondary p-4">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">{{ $happyClients }}</h1>
                                    <div class="ps-3">
                                        <p class="mb-0">Happy</p>
                                        <h5 class="mb-0">Clients</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-6 col-xl-4">
                                <div class="d-flex bg-secondary p-4">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">{{$publicRepos}}</h1>
                                    <div class="ps-3">
                                        <p class="mb-0">Github</p>
                                        <h5 class="mb-0">Public Respositories</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- About End -->

                    <!-- Skills Start -->
                    <section class="py-5 border-bottom wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="title pb-3 mb-5">Skills</h1>
                        @if(isset($skills) && count($skills) > 0)
                        @php $chunks = $skills->chunk(4); @endphp
                            <div class="row">
                                <div class="col-sm-6">
                                @if (isset($chunks[0]))
                                    @foreach($chunks[0] as $skill)
                                        <div class="skill mb-4">
                                            <div class="d-flex justify-content-between">
                                                <p class="mb-2">{{ $skill->name }}</p>
                                                <p class="mb-2">{{ $skill->expertise }}%</p>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="{{ $skill->expertise }}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                </div>
                                <div class="col-sm-6">
                                @if (isset($chunks[1]))
                                    @foreach($chunks[1] as $skill)
                                        <div class="skill mb-4">
                                            <div class="d-flex justify-content-between">
                                                <p class="mb-2">{{ $skill->name }}</p>
                                                <p class="mb-2">{{ $skill->expertise }}%</p>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="{{ $skill->expertise }}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                </div>
                            </div>
                        @endif
                    </section>
                    <!-- Skills End -->

                    <!-- Expericence Start -->
                    <section class="py-5 wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="title pb-3 mb-5">Expericence</h1>
                        <div class="border-start border-2 border-light pt-2 ps-5">
                            @if(isset($experiences) && count($experiences) > 0)
                            @foreach($experiences as $experience)
                                <div class="position-relative mb-4">
                                    <span class="bi bi-arrow-right fs-4 text-light position-absolute" style="top: -5px; left: -50px;"></span>
                                    <h5 class="mb-1">{{ optional($experience)->role }}</h5>
                                    <p class="mb-2">{{ optional($experience)->company }}, 
                                        {{ optional($experience)->location }} <b>||</b> 
                                        <small>{{ optional($experience)->start_date->format('F Y') }}</small>

                                        @if(isset($experience->end_date))
                                        <small> - {{ optional($experience)->end_date->format('F Y') }}</small>
                                        @endif
                                    </p>
                                    <p>
                                        ❖ {{ optional($experience)->job_description }}
                                    </p>
                                </div>
                            @endforeach
                            @endif
                        </div>
                    </section>
                    <!-- Expericence End -->

                    <!-- Services Start -->
                    <section class="py-5 border-bottom wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="title pb-3 mb-5">Services</h1>
                        <div class="row g-4">
                            @if(isset($services) && count($services) > 0)
                            @foreach($services as $service)
                                <div class="col-md-6">
                                    <div class="service-item">
                                        <i class="fa fa-2x {{ $service->icon }} mx-auto mb-4"></i>
                                        <h5 class="mb-2">{{ $service->name }}</h5>
                                        <p class="mb-0">
                                            {{ $service->description }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                            @endif
                        </div>
                    </section>
                    <!-- Services End -->

                    <!-- Education Start -->
                    <section class="py-5 wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="title pb-3 mb-5">Educational</h1>
                        <div class="border-start border-2 border-light pt-2 ps-5">
                            @if(isset($educations) && count($educations) > 0)
                            @foreach($educations as $education)
                                <div class="position-relative mb-4">
                                    <span class="bi bi-arrow-right fs-4 text-light position-absolute" style="top: -5px; left: -50px;"></span>
                                    <h5 class="mb-1">
                                        {{ $education->degree_type }}@if($education->type == 'tertiary') of {{ $education->course }} @endif
                                    </h5>
                                    <p class="mb-2"><i class="fas fa-university"></i> 
                                        {{ $education->institute }}, {{ $education->institute_town }} <b>|</b> 
                                        <small>{{ $education->start_date->format('Y') }} - {{ $education->end_date->format('Y') }}</small></p>
                                    <p>
                                        <i class="fas fa-certificate"></i> Equivalent ({{ $education->equivalent }}@if($education->type == 'tertiary') of {{ $education->course }} @endif).
                                    </p>
                                </div>
                            @endforeach
                            @endif
                        </div>
                    </section>
                    <!-- Education End -->

                    <!-- Portfolio Start -->
                    <section class="py-5 border-bottom wow fadeInUp" data-wow-delay="0.1s" hidden>
                        <h1 class="title pb-3 mb-5">Portfolio</h1>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 text-center mb-2">
                                        <ul class="list-inline mb-4" id="portfolio-flters">
                                            <li class="btn btn-secondary active"  data-filter="*"><i class="fa fa-star me-2"></i>All</li>
                                            <li class="btn btn-secondary" data-filter=".first"><i class="fa fa-laptop-code me-2"></i>Design</li>
                                            <li class="btn btn-secondary" data-filter=".second"><i class="fa fa-mobile-alt me-2"></i>Development</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row portfolio-container">
                                    <div class="col-md-6 mb-4 portfolio-item first">
                                        <div class="position-relative overflow-hidden mb-2">
                                            <img class="img-fluid w-100" src="img/portfolio-1.jpg" alt="">
                                            <div class="portfolio-btn d-flex align-items-center justify-content-center">
                                                <a href="img/portfolio-1.jpg" data-lightbox="portfolio">
                                                    <i class="bi bi-plus text-light"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 portfolio-item second">
                                        <div class="position-relative overflow-hidden mb-2">
                                            <img class="img-fluid w-100" src="img/portfolio-2.jpg" alt="">
                                            <div class="portfolio-btn d-flex align-items-center justify-content-center">
                                                <a href="img/portfolio-2.jpg" data-lightbox="portfolio">
                                                    <i class="bi bi-plus text-light"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 portfolio-item first">
                                        <div class="position-relative overflow-hidden mb-2">
                                            <img class="img-fluid w-100" src="img/portfolio-3.jpg" alt="">
                                            <div class="portfolio-btn d-flex align-items-center justify-content-center">
                                                <a href="img/portfolio-3.jpg" data-lightbox="portfolio">
                                                    <i class="bi bi-plus text-light"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 portfolio-item second">
                                        <div class="position-relative overflow-hidden mb-2">
                                            <img class="img-fluid w-100" src="img/portfolio-4.jpg" alt="">
                                            <div class="portfolio-btn d-flex align-items-center justify-content-center">
                                                <a href="img/portfolio-4.jpg" data-lightbox="portfolio">
                                                    <i class="bi bi-plus text-light"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Portfolio End -->

                    <!-- Testimonial Start -->
                    <section class="py-5 border-bottom wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="title pb-3 mb-5">Testimonial</h1>
                        <div class="owl-carousel testimonial-carousel">
                            @if(isset($testimonials) && count($testimonials) > 0)
                            @foreach($testimonials as $testimonial)
                                <div class="text-left">
                                    <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                                    <p class="fs-4 mb-4">
                                        {{ $testimonial->review }}
                                    </p>
                                    <div class="d-flex align-items-center">
                                        <img class="img-fluid" src="{{ $testimonial->default_img }}" style="width: 60px; height: 60px;" oncontextmenu="return false;" draggable="false" alt="{{ optional($testimonial)->default_img }}">
                                        <div class="ps-3">
                                            <p class="text-primary fs-5 mb-1">{{ $testimonial->names }}</p>
                                            <i>{{ $testimonial->occupation }}</i>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @endif
                        </div>
                    </section>
                    <!-- Testimonial End -->

                    <!-- Contact Start -->
                    <section class="py-5 wow fadeInUp" data-wow-delay="0.1s" id="contact">
                        <h1 class="title pb-3 mb-5">Contact Me</h1>
						<p class="mb-4">
                            Thank you for Showing interest in me, kindly drop a message, 
                            I will get in touch with you in no distance time.
                        </p>
                        <form id="contactMe" method="POST" wire:submit="submitContactMe">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 bg-secondary" wire:model="from_name" id="from_name" autocomplete="off" placeholder="Your Name">
                                        <label for="from_name">Your Name</label>
                                        <div>
                                            @error('from_name') <span class="error" style="color:red;">{{ $message }}</span> @enderror 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control border-0 bg-secondary" wire:model="sender_email" id="sender_email" autocomplete="off" placeholder="Your Email">
                                        <label for="sender_email">Your Email</label>
                                        <div>
                                            @error('sender_email') <span class="error" style="color:red;">{{ $message }}</span> @enderror 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 bg-secondary" wire:model="msg_subject" autocomplete="off" id="msg_subject" placeholder="Subject">
                                        <label for="msg_subject">Subject</label>
                                        <div>
                                            @error('msg_subject') <span class="error" style="color:red;">{{ $message }}</span> @enderror 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0 bg-secondary" placeholder="Leave a message here" wire:model="main_message" id="main_message" style="height: 200px"></textarea>
                                        <label for="main_message">Message</label>
                                        <div>
                                            @error('main_message') <span class="error" style="color:red;">{{ $message }}</span> @enderror 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 spinner-border text-warning" wire:loading role="status" style="margin: 8px auto;">
                                      <span class="sr-only">Sending...</span>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </section>
                    <!-- Contact End -->

                    <!-- Footer Start -->
                    <section class="wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-secondary text-light text-center p-5">
                            <div class="d-flex justify-content-center mb-4">
                                @if(isset($socials) && count($socials) > 0)
                                @foreach($socials as $social)
                                    <a class="btn btn-dark btn-square mx-1" href="{{ $social->handle }}"><i class="{{ optional($social)->icon }}"></i></a>
                                @endforeach
                                @endif
                            </div>
							
							<p class="m-0">Anthony Osadolor <?php echo date('Y'); ?> &copy; All Rights Reserved.</p>
                        </div>
                    </section>
                    <!-- Footer End -->
                </div>
            </div>
        </div>

</div>
