@php
use Illuminate\Support\Facades\Cache;

$profile_photo = Cache::remember('user_profile_photo_' . auth()->user()->id, 10 * 60, function () {
    if (auth()->check()) {
        return DB::table('userdetails')
            ->where('user_id', auth()->user()->id)
            ->value('profile_photo'); // Use `value` to fetch a single column value
    }
    return null;
});
@endphp

<style>
    .preview-section {
        position: relative;
        margin-top: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .img-thumbnail, .video-thumbnail {
        max-width: 100px;
        max-height: 100px;
    }

    .preview-section button {
        position: relative;
        top: -10px;
        right: -10px;
    }
</style>

<div class="post_modal modal" id="postmodal">
    <div class="container">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <div class="d-flex align-items-center gap-2">
                        <img class="user_img" src="{{ $profile_photo ? asset('storage/' . $profile_photo) : '/assets/images/drishti_img.png' }}" alt="user_img" />
                        <div class="user_name_post proxima_nova_font">
                            <strong class="mb-0 user_name">{{ optional(auth()->user())->username ? ucfirst(auth()->user()->username) : '-' }}</strong> <img class="caret_down_img" src="/assets/images/caret_down.svg">
                            <p class="text-xs mb-0" style="color: #535353;font-weight: 600;font-size: 11px;"> Post to All
                            </p>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal Body -->
                <form id="add_posts_form" action="{{ route('post.create_post') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <textarea class="form-control" name="content" rows="4" placeholder="What do you want to talk about?"></textarea>

                        {{-- <!-- Image Preview Section -->
                        <div id="image-preview-section" class="preview-section d-none">
                            <img id="image-preview" src="#" alt="Image Preview" class="img-thumbnail">
                            <button type="button" id="remove-image" class="btn btn-danger btn-sm">×</button>
                        </div>
                        <!-- Video Preview Section -->
                        <div id="video-preview-section" class="preview-section d-none">
                            <video id="video-preview" controls class="video-thumbnail"></video>
                            <button type="button" id="remove-video" class="btn btn-danger btn-sm">×</button>
                        </div> --}}

                        {{-- <div id="preview-section" class="d-none">
                            <img id="image-preview" class="img-thumbnail d-none" />
                            <video id="video-preview" class="video-thumbnail d-none" controls></video>
                            <button type="button" id="remove-media" class="btn btn-danger btn-sm">×</button>
                        </div> --}}
                        <div id="preview-section" class="d-none">
                            <div id="media-preview-container"></div>
                            <button type="button" id="remove-all-media" class="btn btn-danger btn-sm d-none">Remove All</button>
                        </div>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer d-flex justify-content-end">
                        <div class="action-icons">
                            <button class="post_modal_img_btn ai_search_btn">
                                Rewrite with AI
                            <button type="button" id="media-btn" class="post_modal_img_btn">
                                <img class="post_modal_icon_img" src="/assets/images/post_image_gallery.svg">
                            </button>
                            {{-- <button type="button" id="video" class="post_modal_img_btn">
                                <img class="post_modal_icon_img" src="/assets/images/post_image_gallery.svg">
                            </button> --}}
                            <button id="event" type="button" class="post_modal_img_btn">
                                <img class="post_modal_icon_img" src="/assets/images/post_calendar.svg">
                            </button>
                            <button id="poll" type="button" class="post_modal_img_btn">
                                <img class="post_modal_icon_img" src="/assets/images/post_square_pole.svg">
                            </button>
                            <button type="button" class="post_modal_img_btn">
                                <img class="post_modal_icon_img" src="/assets/images/post_document2.svg">
                            </button>
                            <button type="button" class="post_modal_img_btn">
                                <img class="post_modal_icon_img" src="/assets/images/post_suitcase.svg">
                            </button>
                        </div>
                        <button type="submit" class="ai_search_btn post_modal_btn">Post</button>
                    </div>
                    <!-- Hidden Inputs -->
                    {{-- <input type="file" name="image" id="image-input" accept="image/*" style="display: none;">
                    <input type="file" name="video" id="video-input" accept="video/*" style="display: none;"> --}}
                    <input type="file" name="media[]" id="media-input" accept="image/*,video/*" multiple style="display: none;">
                </form>
            </div>
        </div>
    </div>
</div>

@section("custom-script")
    <script>
        document.getElementById('media-btn').addEventListener('click', () => {
            document.getElementById('media-input').click();
        });

        // document.getElementById('video').addEventListener('click', () => {
        //     document.getElementById('video-input').click();
        // });

        // // Handle Image Preview
        // document.getElementById('image-input').addEventListener('change', function () {
        //     const file = this.files[0];
        //     if (file) {
        //         const reader = new FileReader();
        //         reader.onload = function (e) {
        //             const imagePreview = document.getElementById('image-preview');
        //             imagePreview.src = e.target.result;
        //             document.getElementById('image-preview-section').classList.remove('d-none');
        //         };
        //         reader.readAsDataURL(file);
        //     }
        // });

        // // Handle Video Preview
        // document.getElementById('video-input').addEventListener('change', function () {
        //     const file = this.files[0];
        //     if (file) {
        //         const videoPreview = document.getElementById('video-preview');
        //         videoPreview.src = URL.createObjectURL(file);
        //         document.getElementById('video-preview-section').classList.remove('d-none');
        //     }
        // });


        // document.getElementById('media-input').addEventListener('change', function () {
        //     const file = this.files[0];
            
        //     if (file) {
        //         const fileType = file.type.split('/')[0]; // Get the type (image or video)
        //         const previewSection = document.getElementById('preview-section');
        //         const imagePreview = document.getElementById('image-preview');
        //         const videoPreview = document.getElementById('video-preview');
        //         const removeButton = document.getElementById('remove-media');

        //         // Hide both previews initially
        //         imagePreview.classList.add('d-none');
        //         videoPreview.classList.add('d-none');
                
        //         // Check if the file is an image or a video
        //         if (fileType === 'image') {
        //             const reader = new FileReader();
        //             reader.onload = function (e) {
        //                 imagePreview.src = e.target.result;
        //                 imagePreview.classList.remove('d-none');
        //                 previewSection.classList.remove('d-none');
        //             };
        //             reader.readAsDataURL(file);
        //         } else if (fileType === 'video') {
        //             videoPreview.src = URL.createObjectURL(file);
        //             videoPreview.classList.remove('d-none');
        //             previewSection.classList.remove('d-none');
        //         }

        //         // Add event listener to remove the preview and clear the file input
        //         removeButton.addEventListener('click', function () {
        //             document.getElementById('media-input').value = ''; // Clear input
        //             previewSection.classList.add('d-none'); // Hide preview section
        //         });
        //     }
        // });


        document.getElementById('media-input').addEventListener('change', function () {
            const files = Array.from(this.files); // Convert FileList to Array
            const previewSection = document.getElementById('preview-section');
            const previewContainer = document.getElementById('media-preview-container');
            const removeAllButton = document.getElementById('remove-all-media');

            // Clear the preview container for fresh uploads
            previewContainer.innerHTML = '';
            previewSection.classList.remove('d-none');
            removeAllButton.classList.remove('d-none');

            files.forEach((file, index) => {
                const fileType = file.type.split('/')[0]; // Get the type (image or video)
                const previewElement = document.createElement('div');
                previewElement.className = 'preview-item';

                if (fileType === 'image') {
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.className = 'img-thumbnail';
                    img.style.maxWidth = '100px';
                    img.style.margin = '5px';
                    previewElement.appendChild(img);
                } else if (fileType === 'video') {
                    const video = document.createElement('video');
                    video.src = URL.createObjectURL(file);
                    video.className = 'video-thumbnail';
                    video.style.maxWidth = '100px';
                    video.style.margin = '5px';
                    video.controls = true;
                    previewElement.appendChild(video);
                }

                // Add a remove button for individual items
                const removeButton = document.createElement('button');
                removeButton.className = 'btn btn-sm btn-danger';
                removeButton.textContent = '×';
                removeButton.style.marginLeft = '5px';
                removeButton.onclick = function () {
                    // Remove the preview element
                    previewElement.remove();
                    // Remove the file from the input's FileList
                    const updatedFiles = Array.from(document.getElementById('media-input').files).filter((_, i) => i !== index);
                    const dataTransfer = new DataTransfer();
                    updatedFiles.forEach((file) => dataTransfer.items.add(file));
                    document.getElementById('media-input').files = dataTransfer.files;

                    // Hide the preview section if no files remain
                    if (!updatedFiles.length) {
                        previewSection.classList.add('d-none');
                        removeAllButton.classList.add('d-none');
                    }
                };
                previewElement.appendChild(removeButton);

                previewContainer.appendChild(previewElement);
            });

            // Add functionality to remove all files
            removeAllButton.addEventListener('click', () => {
                document.getElementById('media-input').value = ''; // Clear input
                previewContainer.innerHTML = ''; // Clear all previews
                previewSection.classList.add('d-none'); // Hide preview section
                removeAllButton.classList.add('d-none'); // Hide remove all button
            });
        });



        // // Remove Image
        // document.getElementById('remove-image').addEventListener('click', () => {
        //     document.getElementById('image-preview').src = '#';
        //     document.getElementById('image-preview-section').classList.add('d-none');
        //     document.getElementById('image-input').value = ''; // Clear file input
        // });

        // // Remove Video
        // document.getElementById('remove-video').addEventListener('click', () => {
        //     document.getElementById('video-preview').src = '';
        //     document.getElementById('video-preview-section').classList.add('d-none');
        //     document.getElementById('video-input').value = ''; // Clear file input
        // });

        // document.getElementById('event').addEventListener('click', function() {
        //     const button = this;
        //     const form = button.closest('form'); // Assuming the button is inside a form

        //     // Check if the button already has the event-add class
        //     if (button.classList.contains('event-add')) {
        //         // Remove the event-add class
        //         button.classList.remove('event-add');

        //         // Remove the hidden input
        //         const hiddenInput = form.querySelector('input[name="event"]');
        //         if (hiddenInput) {
        //             hiddenInput.remove();
        //         }
        //     } else {


        //         let poll_btn = document.getElementById('poll');

        //         // Remove the event-add class
        //         poll_btn.classList.remove('poll-add');

        //         // Remove the hidden input
        //         const hidden_poll_Input = form.querySelector('input[name="poll"]');
        //         if (hidden_poll_Input) {
        //             hidden_poll_Input.remove();
        //         }


        //         // Add the event-add class
        //         button.classList.add('event-add');

        //         // Add the hidden input
        //         const hiddenInput = document.createElement('input');
        //         hiddenInput.type = 'hidden';
        //         hiddenInput.name = 'event';
        //         hiddenInput.value = '1';

        //         form.appendChild(hiddenInput);
        //     }
        // });


        // document.getElementById('poll').addEventListener('click', function() {
        //     const button = this;
        //     const form = button.closest('form'); // Assuming the button is inside a form

        //     // Check if the button already has the event-add class
        //     if (button.classList.contains('poll-add')) {
        //         // Remove the event-add class
        //         button.classList.remove('poll-add');

        //         // Remove the hidden input
        //         const hidden_poll_Input = form.querySelector('input[name="poll"]');
        //         if (hidden_poll_Input) {
        //             hidden_poll_Input.remove();
        //         }
        //     } else {

        //         let event_btn = document.getElementById('event');

        //         // Remove the event-add class
        //         event_btn.classList.remove('event-add');

        //         // Remove the hidden input
        //         const hidden_event_Input = form.querySelector('input[name="event"]');
        //         if (hidden_event_Input) {
        //             hidden_event_Input.remove();
        //         }


        //         // Add the event-add class
        //         button.classList.add('poll-add');

        //         // Add the hidden input
        //         const hiddenInput = document.createElement('input');
        //         hiddenInput.type = 'hidden';
        //         hiddenInput.name = 'poll';
        //         hiddenInput.value = '1';

        //         form.appendChild(hiddenInput);
        //     }
        // });


        document.getElementById('event').addEventListener('click', function () {
            handleButtonClick(this, 'event', 'poll');
        });

        document.getElementById('poll').addEventListener('click', function () {
            handleButtonClick(this, 'poll', 'event');
        });

        function handleButtonClick(button, currentName, otherName) {
            const form = button.closest('form'); // Assuming the button is inside a form
            const otherButton = document.getElementById(otherName);

            // Toggle the current button's class and input
            toggleClassAndInput(button, currentName, form);

            // Ensure the other button's class and input are cleared
            clearClassAndInput(otherButton, otherName, form);
        }

        function toggleClassAndInput(button, name, form) {
            if (button.classList.contains(`${name}-add`)) {
                // Remove class and hidden input
                button.classList.remove(`${name}-add`);
                removeHiddenInput(name, form);
            } else {
                // Add class and hidden input
                button.classList.add(`${name}-add`);
                addHiddenInput(name, form);
            }
        }

        function clearClassAndInput(button, name, form) {
            if (button.classList.contains(`${name}-add`)) {
                button.classList.remove(`${name}-add`);
                removeHiddenInput(name, form);
            }
        }

        function addHiddenInput(name, form) {
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = name;
            hiddenInput.value = '1';
            form.appendChild(hiddenInput);
        }

        function removeHiddenInput(name, form) {
            const hiddenInput = form.querySelector(`input[name="${name}"]`);
            if (hiddenInput) {
                hiddenInput.remove();
            }
        }


        $(document).ready(function() {
            initValidate('#add_posts_form');
        });

        $("#add_posts_form").submit(function(e) {
            var form = $(this);
            ajaxSubmit(e, form, responseHandler);
        });

        var responseHandler = function(response) {
            location.reload();
        }

    </script>
@endsection