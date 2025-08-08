<x-admin-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-lg mt-6">
        <h2 class="text-2xl font-semibold mb-4">Email Preview</h2>
        <div class="border border-gray-300 rounded p-4 overflow-auto" style="max-height: 80vh;">
            {!! $emailContent !!}
        </div>
        <div class="mt-4">
            <a href="{{ url()->previous() }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Back
            </a>
        </div>
    </div>
</x-admin-layout>
