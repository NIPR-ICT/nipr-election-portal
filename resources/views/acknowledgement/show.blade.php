@include('includes.header')

<style>
    /* General styles for screen */
    body {
        font-family: 'Times New Roman', serif;
        color: #333;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 100%;
        padding: 20px;
    }

    h1 {
        font-size: 26pt;
        text-align: center;
        margin-bottom: 18pt;
        font-weight: bold;
    }

    .bg-white {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .text-center {
        text-align: center;
    }

    .font-bold {
        font-weight: bold;
    }

    .grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-top: 15px;
    }

    .grid p {
        line-height: 1.5;
    }

    .grid p strong {
        width: 200px;
        display: inline-block;
        margin-right: 8px;
    }

    .mt-4 {
        margin-top: 20px;
    }

    .mt-6 {
        margin-top: 25px;
    }

    .btn-print {
        background-color: #007BFF;
        color: white;
        padding: 12px 24px;
        font-size: 14pt;
        font-weight: bold;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        text-align: center;
        display: inline-block;
    }

    /* Full width line style with spacing */
    .underline {
        display: block;
        width: 100%;
        border-bottom: 2px solid black;
        margin-top: 8px; /* Space between text and line */
        height: 20px; /* Extra height for better spacing */
    }

    /* Print specific styles */
    @media print {
        @page {
            size: A4;
            margin: 20mm;
        }

        body {
            margin: 0;
            padding: 0;
        }

        /* Hide the print button and header/footer when printing */
        .btn-print, header, #footer {
            display: none;
        }

        /* Adjust container width to A4 size */
        .container {
            width: 210mm;
            max-width: 210mm;
            margin: 0;
            padding: 10mm;
        }

        /* Remove box shadow in print */
        .bg-white {
            box-shadow: none;
        }

        /* Adjust grid and text for printing */
        .grid {
            grid-template-columns: 1fr 1fr;
            gap: 10mm;
            margin-top: 10mm;
        }

        .grid p strong {
            width: auto;
            display: inline-block;
        }

        /* Ensure underline is visible in print */
        .underline {
            border-bottom: 2px solid black !important;
            display: block;
            height: 20px;
        }
    }
</style>

<main class="container mx-auto mt-10 px-6">
    <div class="flex justify-center mt-2">
        <img src="https://portal.niprng.org.ng/adminassets/media/logos/niprlogo.png" alt="Logo" style="width:150px">
    </div>
    <h1>
        NOMINATION FORM
    </h1>

    <div class="bg-white shadow-lg rounded-lg">
        <p class="text-center font-bold">
            TO BE RETURNED IN DUPLICATE NOT LATER THAN AUGUST 9<sup>TH</sup>, 2023.
            FORMS NOT SENT TO OR RECEIVED AT ABUJA NATIONAL SECRETARIAT OF THE INSTITUTE ON THE DATE STATED ABOVE WILL BE COUNTED AS INVALID.
        </p>

        <p class="mt-4">
            I, <strong>{{ $contestant['first_name'] }} {{ $contestant['other_names'] }} {{ $contestant['surname'] }}</strong>,
            HEREBY declare my willingness to stand for election as a
            <strong>COUNCIL MEMBER of the NIGERIAN INSTITUTE OF PUBLIC RELATIONS (NIPR)</strong>
            established by Decree number 16 of 1990 (now an act of parliament).
        </p>

        <div class="grid mt-6">
            <p><strong>Name of Contestant:</strong> {{ $contestant['surname'] }} {{ $contestant['first_name'] }} {{ $contestant['other_names'] }}</p>
            <p><strong>Membership Grade:</strong> {{ $contestant['grade'] }}</p>
            <p><strong>Name of Organisation:</strong> {{ $contestant['organization'] }}</p>
            <p><strong>Date of Admission:</strong> {{ $contestant['year_inducted'] }}</p>
            <p><strong>Present Position:</strong> {{ $contestant['current_position'] }}</p>
            <p><strong>Telephone Number(s):</strong> {{ $contestant['phone'] }}</p>
        </div>

        <div class="mt-4">
            <p><strong>Membership Identification Number:</strong> {{ $contestant['member_id'] }}</p>
            <p><strong>Email Address:</strong> {{ $contestant['email'] }}</p>
            <p><strong>Chapter of Membership:</strong> {{ $contestant['chapter'] }}</p>
            <p><strong>Contact Address of Contestant:</strong> {{ $contestant['contact_address'] }}</p>
        </div>

        <!-- References Section -->
        <div class="mt-6">
            <h2 class="text-center font-bold">References</h2>

            <!-- Reference 1 -->
            <div class="grid mt-4">
                <p><strong>Name of Reference 1:</strong> <br> <span class="underline"></span></p>
                <p><strong>Practice Number:</strong> <br> <span class="underline"></span></p>
                <p><strong>Membership Grade:</strong> <br> <span class="underline"></span></p>
                <p><strong>Membership ID Number:</strong> <br> <span class="underline"></span></p>
                <p><strong>Date:</strong> <br> <span class="underline"></span></p>
                <p><strong>Address:</strong> <br> <span class="underline"></span></p>
                <p><strong>Signature:</strong> <br> <span class="underline"></span></p>
            </div>

            <!-- Reference 2 -->
            <div class="grid mt-4">
                <p><strong>Name of Reference 2:</strong> <br> <span class="underline"></span></p>
                <p><strong>Practice Number:</strong> <br> <span class="underline"></span></p>
                <p><strong>Membership Grade:</strong> <br> <span class="underline"></span></p>
                <p><strong>Membership ID Number:</strong> <br> <span class="underline"></span></p>
                <p><strong>Date:</strong> <br> <span class="underline"></span></p>
                <p><strong>Address:</strong> <br> <span class="underline"></span></p>
                <p><strong>Signature:</strong> <br> <span class="underline"></span></p>
            </div>
        </div>

    </div>

    <div class="flex justify-center mt-6">
        <button onclick="window.print()" class="btn-print">Print Nomination Form</button>
    </div>
</main>

@include('includes.footer')
