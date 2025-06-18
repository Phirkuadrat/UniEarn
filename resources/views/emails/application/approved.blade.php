<x-mail::message>
    # Congratulations, {{ $applicantName }}!

    We are thrilled to inform you that your application for the project **"{{ $jobTitle }}"** has been approved!

    The team was very impressed with your profile and we believe you are a great fit for this opportunity.

    You can view the project details by clicking the button below:

    <x-mail::button :url="$projectLink">
        View Project
    </x-mail::button>

    Please check your dashboard for further instructions or communication from the recruiter.

    Thank you for your interest in {{ config('app.name') }}.

    Regards,
    The {{ config('app.name') }} Team
</x-mail::message>
