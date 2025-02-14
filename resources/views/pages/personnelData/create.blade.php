@include('components.layouts.header')
@include('components.layouts.sidebar')

<head>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="{{ asset('public/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        console.log(typeof bootstrap);
    </script>
</head>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-12 p-md-0">
                <div class="welcome-text text-center">
                    <h2 class="mb-3">ပြည်ထဲရေးဝန်ကြီးဌာန</h2>
                    <h3>ဝန်ထမ်း၏ ကိုယ်ရေးအချက်အလက်</h3>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="card">
            <div class="card-body">
                <div class="basic-form">
                    <div class="row">
                        <div class="col-xl-12 col-xxl-12">
                            <!-- Tab Navigation -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab"
                                        data-bs-target="#tab1" type="button" role="tab">အခြေခံအချက်အလက် ၁</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2"
                                        type="button" role="tab">အချက်အလက် ၂</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3"
                                        type="button" role="tab">အချက်အလက် ၃</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tab4-tab" data-bs-toggle="tab" data-bs-target="#tab4"
                                        type="button" role="tab">အချက်အလက် ၄</button>
                                </li>
                            </ul>

                            <form action="{{ route('personnel.store') }}" method="POST">
                                @csrf

                                <div class="tab-content mt-3" id="myTabContent">
                                    <!-- Tab 1 -->
                                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                        <div class="mb-3">
                                            <label class="form-label">ကိုယ်ပိုင်အမှတ်</label>
                                            <input type="text" name="personal_id" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">အဆင့်</label>
                                            <input type="text" name="level" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">အမည်</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                        <button type="button" class="btn btn-primary next-tab" data-next="tab2-tab">Next</button>
                                    </div>
                        
                                    <!-- Tab 2 -->
                                    <div class="tab-pane fade" id="tab2" role="tabpanel">
                                        <div class="mb-3">
                                            <label class="form-label">အချက်အလက် ၂</label>
                                            <input type="text" name="tab2_field1" class="form-control">
                                        </div>
                                        <button type="button" class="btn btn-success prev-tab" data-prev="tab1-tab">Previous</button>
                                        <button type="button" class="btn btn-primary next-tab" data-next="tab3-tab">Next</button>
                                    </div>
                        
                                    <!-- Tab 3 -->
                                    <div class="tab-pane fade" id="tab3" role="tabpanel">
                                        <div class="mb-3">
                                            <label class="form-label">အချက်အလက် ၃</label>
                                            <input type="text" name="tab3_field1" class="form-control">
                                        </div>
                                        <button type="button" class="btn btn-success prev-tab" data-prev="tab2-tab">Previous</button>
                                        <button type="button" class="btn btn-primary next-tab" data-next="tab4-tab">Next</button>
                                    </div>

                                    <!-- Tab 3 -->
                                    <div class="tab-pane fade" id="tab4" role="tabpanel">
                                        <div class="mb-3">
                                            <label class="form-label">အချက်အလက် 4</label>
                                            <input type="text" name="tab3_field1" class="form-control">
                                        </div>
                                        <button type="button" class="btn btn-success prev-tab" data-prev="tab3-tab">Previous</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="btn btn-lg btn-secondary p-3" href="{{ route('personnel.index') }}">Back</a>
    </div>
</div>



<script>
   document.addEventListener("DOMContentLoaded", function () {
    function showTab(tabId) {
        let tabButton = document.getElementById(tabId); // Get the tab button
        if (tabButton) {
            let tabInstance = new bootstrap.Tab(tabButton);
            tabInstance.show();

            // Ensure the tab content is shown
            let tabContentId = tabButton.getAttribute("data-bs-target"); // Get the content ID
            document.querySelectorAll(".tab-pane").forEach(tab => tab.classList.remove("show", "active")); // Hide all tabs
            document.querySelector(tabContentId).classList.add("show", "active"); // Show the selected tab
        }
    }

    document.querySelectorAll(".next-tab").forEach(button => {
        button.addEventListener("click", function () {
            showTab(this.getAttribute("data-next"));
        });
    });

    document.querySelectorAll(".prev-tab").forEach(button => {
        button.addEventListener("click", function () {
            showTab(this.getAttribute("data-prev"));
        });
    });
});

    function openFileManager(event, inputId) {
        // Prevent the page from refreshing when the button is clicked
        event.preventDefault();

        // Open the file manager
        var fmWindow = window.open(
            '{{ route('elfinder.popup') }}/' + inputId,
            'FileManager',
            'width=800,height=600'
        );
    }

    window.processSelectedFiles = function(filePaths, inputId) {
        const targetInput = document.getElementById(inputId);
        if (targetInput) {
            const existingValue = targetInput.value;
            const combinedFiles = [...new Set([...existingValue.split(',').map(f => f.trim()), ...filePaths])];

            // Convert the file paths to JSON string
            const jsonValue = JSON.stringify(combinedFiles);

            // Set the value to the input field
            targetInput.value = jsonValue;
        } else {
            console.error(`No input field found with ID: ${inputId}`);
        }
    };


    window.addEventListener('focus', () => {
        const selectedFiles = JSON.parse(localStorage.getItem('selectedFiles'));
        if (selectedFiles && selectedFiles.length > 0) {
            const inputId = 'inputId'; // Replace with your actual input ID
            const targetInput = document.getElementById(inputId);

            if (targetInput) {
                // Combine existing values with newly selected files
                const existingValue = targetInput.value;
                const updatedValue = [...new Set([...
                    selectedFiles
                ])].join(', ');
                targetInput.value = updatedValue;
            } else {
                console.error(`No input field found with ID: ${inputId}`);
            }

            // Clear the selected files from localStorage
            localStorage.removeItem('selectedFiles');
        }
    });
</script>
{{-- <script>
    const fileManagerUrl = "{{ url('public/filemanager/tinyfilemanager.php') }}";
    function openFileManager() {
        window.open(
            fileManagerUrl, // Update with correct path to your file manager
            'FileManager',
            'width=800,height=600'
        );
    }

    function selectFiles(files) {
        // Handle the selected file paths, e.g., by inserting them into the input field
        document.getElementById('fileInput').value = files.join(', ');
    }
</script> --}}

<!--**********************************
            Content body end
        ***********************************-->

@include('components.layouts.footer')
