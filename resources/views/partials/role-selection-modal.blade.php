<div id="roleSelectionModal"
    class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 p-4 hidden">
    <div class="bg-white rounded-lg shadow-lg p-9 w-full max-w-xl mx-auto text-center relative">
        <h3 class="text-2xl font-sans font-bold text-gray-800 mb-3">Choose Your Role</h3>
        <p class="text-gray-600 mb-6 text-sm">
            Welcome! Please select your role to proceed.
        </p>

        <div id="roleOptions" class="flex space-x-3 mb-5">
            <button type="button" onclick="showRoleForm('seeker')"
                class="flex-1 bg-blue-50 hover:bg-blue-100 text-blue-700 font-semibold py-4 px-3 rounded-md transition-colors duration-200 flex flex-col items-center justify-center border border-blue-200">
                <img src="{{ asset('images/Seeker.png') }}" alt="Seeker"
                    class="mx-auto h-20 w-20 object-contain mb-2">
                <span class="text-base">Seeker</span>
            </button>
            <button type="button" onclick="showRoleForm('recruiter')"
                class="flex-1 bg-blue-50 hover:bg-blue-100 text-blue-700 font-semibold py-4 px-3 rounded-md transition-colors duration-200 flex flex-col items-center justify-center border border-blue-200">
                <img src="{{ asset('images/Recruiter.png') }}" alt="Recruiter"
                    class="mx-auto h-20 w-20 object-contain mb-2">
                <span class="text-base">Recruiter</span>
            </button>
        </div>

        <div id="seekerForm" class="hidden">
            <h4 class="text-lg font-bold text-gray-800 mb-4">Seeker Information</h4>
            <form action="{{ route('set.role') }}" method="POST" class="space-y-3" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="role" value="seeker">

                <input type="text" name="phone" placeholder="Phone Number"
                    class="w-full bg-white rounded-sm border border-gray-300 text-gray-800 py-2 px-3 focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm">

                <textarea name="address" placeholder="Your Address" rows="3"
                    class="w-full bg-white rounded-sm border border-gray-300 text-gray-800 py-2 px-3 focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm resize-y"></textarea>

                <div class="text-left">
                    <label for="profile_picture" class="block text-gray-700 text-sm font-medium mb-1">Profile
                        Picture</label>
                    <input type="file" name="profile_picture" id="profile_picture" accept="image/*"
                        class="w-full text-gray-800 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                </div>

                <textarea name="bio" placeholder="Tell us about yourself (e.g., skills, experience, career goals)" rows="5"
                    class="w-full bg-white rounded-sm border border-gray-300 text-gray-800 py-2 px-3 focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm resize-y"></textarea>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-6 rounded-md transition-colors duration-200 text-sm">
                    Save Information
                </button>
            </form>
            <button type="button" onclick="goBackToRoleSelection()"
                class="mt-3 w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-2 px-6 rounded-md transition-colors duration-200 text-sm">
                Back to Role Selection
            </button>
        </div>

        <div id="recruiterForm" class="hidden">
            <h4 class="text-lg font-bold text-gray-800 mb-4">Recruiter Information</h4>
            <form action="{{ route('set.role') }}" method="POST" class="space-y-3" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="role" value="recruiter">

                <input type="text" name="company_name" placeholder="Company Name"
                    class="w-full bg-white rounded-sm border border-gray-300 text-gray-800 py-2 px-3 focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm"
                    required>

                <input type="url" name="company_website" placeholder="Company Website (e.g., https://example.com)"
                    class="w-full bg-white rounded-sm border border-gray-300 text-gray-800 py-2 px-3 focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm">

                <input type="text" name="company_phone" placeholder="Company Phone Number"
                    class="w-full bg-white rounded-sm border border-gray-300 text-gray-800 py-2 px-3 focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm">

                <textarea name="company_address" placeholder="Company Address" rows="3"
                    class="w-full bg-white rounded-sm border border-gray-300 text-gray-800 py-2 px-3 focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm resize-y"></textarea>

                <div class="text-left">
                    <label for="company_logo" class="block text-gray-700 text-sm font-medium mb-1">Company
                        Logo</label>
                    <input type="file" name="company_logo" id="company_logo" accept="image/*"
                        class="w-full text-gray-800 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-6 rounded-md transition-colors duration-200 text-sm">
                    Save Information
                </button>
            </form>
            <button type="button" onclick="goBackToRoleSelection()"
                class="mt-3 w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-2 px-6 rounded-md transition-colors duration-200 text-sm">
                Back to Role Selection
            </button>
        </div>
    </div>
</div>

<script>
    function showRoleForm(role) {
        document.getElementById('roleOptions').classList.add('hidden');
        document.getElementById('seekerForm').classList.add('hidden');
        document.getElementById('recruiterForm').classList.add('hidden');
        document.getElementById(role + 'Form').classList.remove('hidden');
    }

    function goBackToRoleSelection() {
        document.getElementById('seekerForm').classList.add('hidden');
        document.getElementById('recruiterForm').classList.add('hidden');
        document.getElementById('roleOptions').classList.remove('hidden');
    }
</script>
