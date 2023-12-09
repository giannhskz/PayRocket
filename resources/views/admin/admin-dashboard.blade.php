@php
    $providers = \App\Models\Provider::all();
@endphp
<x-app-layout>
    @if(isset($admin))
        <div class="flex justify-between p-2">
            <div class="shrink-0 flex justify-center">
                <img src="{{ asset('logoPay.png') }}" alt="logo" class="block h-28 w-38">
            </div>
            <h1 class="text-center text-lg pr-24 pt-12 font-semibold">Welcome Admin</h1>
            <form method="POST" action="{{ route('admin.logout') }}" class="">
                @csrf
                <div class="border border-gray-400 rounded-lg hover:border-none  bg-gray-300 px-2 ">
                    <button type="submit">Log Out</button>
                </div>
            </form>
        </div>
        <div class="flex flex-col place-items-center gap-20 mt-20">
            <div class="border border-2 border-indigo-400 p-8 rounded-lg">
                <form method="POST" action="{{ route('admin.add-provider') }}" class="flex flex-col">
                    @csrf
                    <div class="text-center font-semibold">Add Provider</div>
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" required>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                    <button type="submit"
                            class="mt-3 py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        Add Provider
                    </button>
                </form>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($providers as $provider)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $provider->name }}</th>
                            <td class="px-6 py-4  text-gray-700 whitespace-nowrap dark:text-white">{{ $provider->email }}</td>
                            <td class="px-6 py-4 text-right">
                                <form method="POST"
                                      action="{{ route('admin.delete.provider', ['provider' => $provider->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="relative text-red-700 bo"
                                            type="submit"
                                            onclick="return confirm('Are you sure you want to delete this provider?')">
                                        <svg fill="#9e142d" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                             viewBox="0 0 408.483 408.483" xml:space="preserve" stroke="#9e142d"><g
                                                id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                               stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M87.748,388.784c0.461,11.01,9.521,19.699,20.539,19.699h191.911c11.018,0,20.078-8.689,20.539-19.699l13.705-289.316 H74.043L87.748,388.784z M247.655,171.329c0-4.61,3.738-8.349,8.35-8.349h13.355c4.609,0,8.35,3.738,8.35,8.349v165.293 c0,4.611-3.738,8.349-8.35,8.349h-13.355c-4.61,0-8.35-3.736-8.35-8.349V171.329z M189.216,171.329 c0-4.61,3.738-8.349,8.349-8.349h13.355c4.609,0,8.349,3.738,8.349,8.349v165.293c0,4.611-3.737,8.349-8.349,8.349h-13.355 c-4.61,0-8.349-3.736-8.349-8.349V171.329L189.216,171.329z M130.775,171.329c0-4.61,3.738-8.349,8.349-8.349h13.356 c4.61,0,8.349,3.738,8.349,8.349v165.293c0,4.611-3.738,8.349-8.349,8.349h-13.356c-4.61,0-8.349-3.736-8.349-8.349V171.329z"></path>
                                                        <path
                                                            d="M343.567,21.043h-88.535V4.305c0-2.377-1.927-4.305-4.305-4.305h-92.971c-2.377,0-4.304,1.928-4.304,4.305v16.737H64.916 c-7.125,0-12.9,5.776-12.9,12.901V74.47h304.451V33.944C356.467,26.819,350.692,21.043,343.567,21.043z"></path>
                                                    </g>
                                                </g>
                                            </g></svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if(session('success'))
                <div class="alert alert-success text-green-600" id="success-message">
                    {{ session('success') }}
                </div>
                <script>
                    setTimeout(function () {
                        document.getElementById('success-message').style.display = 'none';
                    }, 5000); // Hide the message after 5 seconds (5000 milliseconds)
                </script>
            @endif
        </div>
    @endif

</x-app-layout>
