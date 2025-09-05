<div>
    <div class="mx-auto w-full max-w-[75%] p-8 m-8 rounded-lg border-4 border-purple-500 shadow-md shadow-black/50">
       <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-4 text-center">
            Hey! Help Me Build My Public Portfolio
        </h1>
        <p class="font-serif tracking-wide text-gray-800 dark:text-gray-100 text-lg text-center">
            Your honest review means the world to me. I'm curating a 
            public portfolio to showcase real experiences from people 
            I've worked with — for future clients, employers, and 
            collaborators. If I've made a positive impact on your journey, 
            this is your chance to help me shine brighter.
        </p>

        <hr class="mt-4 mb-4 mx-auto" style="border:2px solid rgb(198, 195, 1);border-radius:8px;">

        <!-- Right-aligned div inside your container -->
        {{-- <div class="flex justify-end w-full p-4">
            <button type="button" id="editReview" onclick="showLoading()" class="text-yellow-600 font-serif bg-transparent px-4 py-2 border-2 border-yellow-600 rounded-xl">Edit Review</button>
        </div> --}}

        {{-- User Form Comes here --}}
        <p class="font-serif tracking-wide text-gray-800 dark:text-gray-100 text-lg text-center">
            Be rest assured that your information is safe and secured with us!
        </p>
        <div class="max-w-3xl mx-auto rounded-xl p-8 transition-all duration-300 shadow-[0_10px_25px_-5px_rgba(0,0,0,0.3)]">
            <form wire:submit.live="submitReview" id="submitReview" class="mx-auto text-white border-2 border-gray-400 p-6 rounded-md">
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" wire:model.live="first_name" id="first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " autocomplete="off"/>
                        <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-900 dark:text-gray-100 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-text-white peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">(First name): Smith</label>
                        @error('first_name') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" wire:model.live="last_name" id="last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " autocomplete="off"/>
                        <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-900 dark:text-gray-100 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-text-white peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">(Last name): Alan</label>
                        @error('last_name') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="tel" wire:model.live="phone" id="phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-100 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " autocomplete="off"/>
                        <label for="floating_phone" class="peer-focus:font-medium absolute text-sm text-gray-900 dark:text-gray-100 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-white peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">(Phone number): 09012345678</label>
                        @error('phone') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="email" wire:model.live="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " autocomplete="off"/>
                        <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-900 dark:text-gray-100 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-white peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">(Email address): alan@smith.com</label>
                        @error('email') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" wire:model.live="use_as_referee" id="use_as_referee" class="hidden peer">
                        <label for="use_as_referee" class="w-8 h-8 rounded-full border-4 cursor-pointer transition-colors duration-300 peer-checked:bg-blue-600 peer-checked:border-blue-600"></label>
                        <label for="use_as_referee" class="text-gray-100 select-none">Can I use you as Referee?</label>
                        @error('use_as_referee') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="file" wire:model.live="avatar" id="avatar" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Select Photo"/>
                        <label for="floating_avatar" class="peer-focus:font-medium absolute text-sm text-gray-900 dark:text-gray-100 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-white peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">(Optional): Upload a Photo</label>
                        @error('avatar') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid md:gap-12">
                    <div class="relative z-0 w-full mb-5" wire:ignore>
                        <textarea wire:model.live="review" id="review" cols="30" rows="5" class="block p-2.5 w-full text-lg resize-none text-gray-900 bg-transparent rounded-lg border border-gray-200 focus:outline-none focus:ring-0 focus:border-blue-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder=" "></textarea>
                        <label for="review" class="peer-focus:font-medium absolute text-lg text-gray-900 dark:text-gray-100 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-text-white peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Leave a comment...</label>
                    </div>
                </div>

                <div style="display:flex; justify-content:center; align-items:center; margin:10px auto;">
                    <div class="col-12 spinner-border text-warning" wire:loading wire:target="submitReview" role="status" style="margin: 8px auto!impotant;">
                        <span class="sr-only">Sending...</span>
                    </div>
                </div>

                <div class="relative w-full mb-5 group">
                    <button type="submit" id="submitReviewBtn" class="text-white w-100 mx-auto content-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Submit Review</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Enter Username Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-xl bg-gray-800 dark:bg-gray-800">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Open Review</h5>
                </div>
                <div class="modal-body">
                    <form wire:submit.live="openReview" id="openReview" class="mx-auto text-white border-2 border-gray-400 p-6 rounded-md">
                        <div class="grid md:gap-12">
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" maxlength="60" wire:model="username" id="username" class="block py-2.5 px-0 w-full text-center text-md font-semibold text-gray-900 bg-transparent border-2 rounded-lg border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 peer" placeholder=" " autocomplete="off"/>
                                <label for="floating_username" class="peer-focus:font-medium absolute text-sm text-center text-gray-900 dark:text-gray-100 duration-300 transform -translate-y-6 scale-100 top-2 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-text-white peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email or Phone</label>
                            </div>
                        </div>

                        <div style="display:flex; justify-content:center; align-items:center; margin:10px auto;" hidden>
                            <div class="col-12 spinner-border text-warning" wire:loading wire:target="submitReview" role="status" style="margin: 8px auto!impotant;">
                                <span class="sr-only">Sending...</span>
                            </div>
                        </div>

                        <div class="relative w-full mb-5 group">
                            <button type="submit" class="text-white w-100 mx-auto content-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Submit Review</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Testimonial Modal -->
    <div class="modal fade" id="editReviewModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content rounded-xl bg-gray-800 dark:bg-gray-800">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Update Testimonial</h5>
                </div>
                <div class="modal-body">
                    <form wire:submit.defer="editTestimonial" id="openReview" class="mx-auto text-white border-2 border-gray-400 p-6 rounded-md">
                        <div class="" hidden>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" maxlength="60" wire:model.defer="update_id" id="update_id" class="block py-2.5 px-0 w-full text-center text-md font-semibold text-gray-900 bg-transparent border-2 rounded-lg border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 peer" placeholder=" " autocomplete="off"/>
                                <label for="update_id" class="peer-focus:font-medium absolute text-sm text-center text-gray-900 dark:text-gray-100 duration-300 transform -translate-y-6 scale-100 top-2 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-text-white peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Names</label>
                            </div>
                        </div>

                        <div class="">
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" maxlength="60" wire:model.defer="update_names" id="update_names" class="block py-2.5 px-0 w-full text-center text-md font-semibold text-gray-900 bg-transparent border-2 rounded-lg border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 peer" placeholder=" " autocomplete="off"/>
                                <label for="update_names" class="peer-focus:font-medium absolute text-sm text-center text-gray-900 dark:text-gray-100 duration-300 transform -translate-y-6 scale-100 top-2 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-text-white peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Names</label>
                                @error('update_names') <span class="error text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="">
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" maxlength="60" wire:model.defer="update_phone" id="update_phone" class="block py-2.5 px-0 w-full text-center text-md font-semibold text-gray-900 bg-transparent border-2 rounded-lg border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 peer" placeholder=" " autocomplete="off"/>
                                <label for="update_phone" class="peer-focus:font-medium absolute text-sm text-center text-gray-900 dark:text-gray-100 duration-300 transform -translate-y-6 scale-100 top-2 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-text-white peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone</label>
                                @error('update_phone') <span class="error text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="">
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" maxlength="60" wire:model.defer="update_email" id="update_email" class="block py-2.5 px-0 w-full text-center text-md font-semibold text-gray-900 bg-transparent border-2 rounded-lg border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 peer" placeholder=" " autocomplete="off"/>
                                <label for="update_email" class="peer-focus:font-medium absolute text-sm text-center text-gray-900 dark:text-gray-100 duration-300 transform -translate-y-6 scale-100 top-2 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-text-white peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                                @error('update_email') <span class="error text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="">
                            <div class="relative z-0 w-full mb-5 group">
                                <textarea maxlength="60" wire:model.defer="update_review" id="update_review" cols="30" rows="5" class="block p-2.5 w-full text-lg resize-none text-gray-900 bg-transparent rounded-lg border border-gray-200 focus:outline-none focus:ring-0 focus:border-blue-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder=" "></textarea>
                                <label for="floating_update_review" class="peer-focus:font-medium absolute text-sm text-center text-gray-900 dark:text-gray-100 duration-300 transform -translate-y-6 scale-100 top-2 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-text-white peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Review</label>
                                @error('update_review') <span class="error text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" wire:model.defer="update_use_as_referee" id="update_use_as_referee" class="hidden peer">
                                <label for="update_use_as_referee" class="w-8 h-8 rounded-full border-4 cursor-pointer transition-colors duration-300 peer-checked:bg-blue-600 peer-checked:border-blue-600"></label>
                                <label for="update_use_as_referee" class="text-gray-100 select-none">Can I use you as Referee?</label>
                                @error('update_use_as_referee') <span class="error text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="file" wire:model.defer="update_avatar" id="update_avatar" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Select Photo"/>
                                <label for="floating_update_avatar" class="peer-focus:font-medium absolute text-sm text-gray-900 dark:text-gray-100 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-white peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">(Optional): Upload Photo</label>
                                @error('update_avatar') <span class="error text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div style="display:flex; justify-content:center; align-items:center; margin:10px auto;" hidden>
                            <div class="col-12 spinner-border text-warning" wire:loading wire:target="submitReview" role="status" style="margin: 8px auto!impotant;">
                                <span class="sr-only">Sending...</span>
                            </div>
                        </div>

                        <div class="relative w-full mb-5 group">
                            <button type="submit" class="text-white w-100 mx-auto content-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Update Testimonial</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



</div>

@push('scripts')
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Add Extra Script --}}
    <script>
        // On Submit Reivew Errors
        $('#submitReview').on('submit', function(event) {
            event.preventDefault(); // prevent reload
            var first_name = document.getElementById("first_name").value;
            var last_name = document.getElementById("last_name").value;
            var phone = document.getElementById("phone").value;
            var email = document.getElementById("email").value;
            var review = document.getElementById("review").value;

            const submitReviewBtn = document.getElementById('submitReviewBtn');
            submitReviewBtn.innerText = 'Loading...';

            if(first_name == ""){
                submitReviewBtn.innerText = 'Submit Review';
                document.getElementById("first_name").focus();
                errorReport("First Name");                    
                return false;
            }else if(last_name == ""){
                submitReviewBtn.innerText = 'Submit Review';
                document.getElementById("last_name").focus();
                errorReport("Last Name");
                return false;
            }else if(phone == ""){
                submitReviewBtn.innerText = 'Submit Review';
                document.getElementById("phone").focus();
                errorReport("Phone"); 
                return false;
            }else if(email == ""){
                submitReviewBtn.innerText = 'Submit Review';
                document.getElementById("email").focus();
                errorReport("Email"); 
                return false;
            }else if(review == ""){
                submitReviewBtn.innerText = 'Submit Review';
                document.getElementById("review").focus();
                errorReport("Comment"); 
                return false;
            }
		});

        // On Open Reivew Errors
        $('#openReview').on('submit', function(event) {
            event.preventDefault(); // prevent reload
            var username = document.getElementById("username").value;

            if(username == ""){
                $('#loginModal').modal('hide');
                errorReport("Email or Phone number is required");              
                return false;
            }
		});

        // Show Loading on Click
        function showLoading(){
            $('#loginModal').modal('show');
            const editBtn = document.getElementById('editReview');
            editBtn.innerText = 'Loading...';
            editBtn.disabled = true;

            // Add a timeout
            setTimeout(() => {
                editBtn.innerText = 'Edit Review';
                editBtn.disabled = false;
            }, 2000);
        }

        // Error and Open Modal
        document.addEventListener('livewire:init', () => {
                // On Error
                Livewire.on('testimonialError', (event) => {
                    $('#loginModal').modal('hide');
                    event.forEach(function(element){
                        Swal.fire({
                            title: element.title,
                            text: element.message,
                            icon: element.icon,
                            allowOutsideClick: false,
                            showConfirmButton: true,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $('#loginModal').modal('show');
                            }
                        });
                    });
                });

                // Open Edit Modal
                Livewire.on('openEditModal', (response) => {
                    const testimonial = response.modal;
                    $('#loginModal').modal('hide');

                    /********** Populate the Form *********/
                    document.getElementById('update_id').value = testimonial.id;
                    document.getElementById('update_names').value = testimonial.names;
                    document.getElementById('update_phone').value = testimonial.phone;
                    document.getElementById('update_email').value = testimonial.email;
                    document.getElementById('update_review').value = testimonial.review;
                    /********** Populate the Form *********/

                    $('#editReviewModal').modal('show');
                });

                // Close Modal
                Livewire.on('closeModal', (modalName) => {
                    $('#editReviewModal').modal('hide');
                });
            });
        
    </script>
@endpush

