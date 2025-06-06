@include('components.layouts.header')
@include('components.layouts.sidebar')

<head>
    <style>
        /* Hide everything except the content to print */
        @media print {
            body * {
                visibility: hidden;
            }

            #print-section,
            #print-section * {
                visibility: visible;
            }

            #print-section {
                position: absolute;
                top: 1;
                left: 1;
                width: 100%;
            }
        }
    </style>
</head>

<div class="content-body">
    <div class="container-fluid" id="print-section">
        <div class="row page-titles mx-0">
            <div class="col-sm-12 p-md-0">
                <div class="welcome-text text-center">
                    <h2 class="font-weight-bold"> ပြည်ထဲရေးဝန်ကြီးဌာန၊ {{$caseFiles->fileName}} </h2>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body text-dark text-wrap text-lg" style="background-color: #b6ddf1">
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            ဖိုင်အမှတ် −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseFiles->fileNumber }} </strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            ဘီရိုအမှတ် −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseFiles->cabinetName }} </strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            ဌာနစိတ်အမည် −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseFiles->subDeptName }} </strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            ဖိုင်အမည် −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseFiles->fileName }} </strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <p style="font-size: 1.2rem">
                            ဖိုင်ဖွင့်သည့်နေ့ရက် −
                        </p>
                    </div>
                    <div class="col-7">
                        <p style="font-size: 1.2rem">
                            <strong> {{ $caseFiles->fileOpenDate }} </strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between mb-5">
            <a href="{{ route('caseFile.index') }}" class="btn btn-primary btn-lg">Back to List</a>
            <button onclick="exportAndPrint()" class="btn btn-success btn-lg">ExportAndPrint</button>
        </div>
    </div>
</div>

<script>
    function exportAndPrint() {
        const content = document.getElementById('print-section').innerHTML;
        const originalContent = document.body.innerHTML;

        // Replace the body content with the section to print
        document.body.innerHTML = content;

        // Trigger the browser's print dialog
        window.print();

        // Restore the original content
        document.body.innerHTML = originalContent;

        // Reinitialize JavaScript after restoring content (if necessary)
        window.location.reload(); // Ensure the page reloads for functionality
    }
</script>
@include('components.layouts.footer')
