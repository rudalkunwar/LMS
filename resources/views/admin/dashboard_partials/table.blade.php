<div class="rounded-lg bg-white shadow-lg p-6 mt-12">
    <!-- Tab Controls -->
    <div class="flex md:space-x-8 border-b border-gray-200 overflow-auto">
        <button
            class="md:text-lg font-medium py-2 px-4 focus:outline-none focus:border-b-2 focus:border-b-blue-500">Approved</button>
        <button
            class="md:text-lg font-medium py-2 px-4 focus:outline-none focus:border-b-2 focus:border-b-blue-500">Pending</button>
        <button
            class="md:text-lg font-medium py-2 px-4 focus:outline-none focus:border-b-2 focus:border-b-blue-500">Cancelled</button>
    </div>

    <!-- Tab Content -->
    <div class="mt-4">
        <!-- Approved Tab -->
        <div class="overflow-y-hidden">
            <!-- Example Table Content for Approved Tab -->
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Title</th>
                        <th class="px-6 py-3">Start Date</th>
                        <th class="px-6 py-3">End Date</th>
                        <th class="px-6 py-3">Details</th>
                        <th class="px-6 py-3">Price</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 2; $i++)
                        <tr class="border-b border-gray-200">
                            <td class="p-6">#484</td>
                            <td class="p-6">
                                <div class="flex justify-center items-center gap-6">
                                    <div class="w-32">
                                        <img src="{{ asset('images/profile.jpg') }}" alt="image"
                                            loading="lazy" width="80" height="70" class="rounded-md">
                                    </div>
                                    <div class="w-72">
                                        Phi Phi Islands Adventure Day Trip with Seaview Lunch by V.
                                        Marine Tour
                                    </div>
                                </div>
                            </td>
                            <td class="p-6">11 April 2023</td>
                            <td class="p-6 ">11 April 2023</td>
                            <td class="p-6">2 People</td>
                            <td class="p-6">$392.89</td>
                            <td class="p-6">
                                <span class="bg-purple-100 text-purple-800 py-2 px-4 rounded-full text-sm">
                                    Approved
                                </span>
                            </td>
                            <td class="px-6">
                                <div class="flex justify-center items-center gap-4">
                                    <a href=""
                                        class="text-blue-500 px-4 py-3 rounded-full text-sm bg-gray-100 hover:bg-gray-300">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <a href=""
                                        class="text-red-500 px-4 py-3 rounded-full text-sm bg-gray-100 hover:bg-gray-300">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>