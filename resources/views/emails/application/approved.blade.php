<x-mail::message>
    # Congratulations, {{ $applicantName }}!

    We are absolutely thrilled to inform you that your application for the project **"{{ $jobTitle }}"** has been
    **approved**!

    The team was highly impressed with your profile and believes you are an excellent fit for this exciting opportunity.
    This is a significant step forward in your career journey!

    You can find more details about the project and next steps by clicking the button below. Please ensure you also
    check your dashboard for further instructions or direct communication from the recruiter.

    {{-- Tombol View Project --}}
    <x-mail::button :url="$projectLink">
        View Project Details
    </x-mail::button>

    Please check your dashboard for further instructions or communication from the recruiter.

    Thank you for choosing {{ config('app.name') }} to advance your career.

    Regards,
    <br> {{-- Gunakan <br> untuk baris baru atau dua spasi di akhir baris dan enter untuk Markdown --}}
    The **{{ config('app.name') }}** Team

    <x-mail::subcopy>
        © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
    </x-mail::subcopy>
</x-mail::message>
