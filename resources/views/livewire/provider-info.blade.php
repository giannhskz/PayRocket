<div>
    <div class="flex justify-between px-28 py-8">
        <div class="flex flex-col ">
            <h1 class="text-lg font-semibold border border-2 border-green-300 bg-green-300 rounded-full p-2 text-center"> Providers
                Subscribed</h1>
            @foreach($subscribedProviders as $subscribedProvider )
                <div class="flex flex-col place-items-end gap-6 pt-4">
                    <div>
                        {{ $subscribedProvider->name }}
                        <button type="button" wire:click="unsubscribe({{ $subscribedProvider->id }})"
                                class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
                            <span
                                class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                Unsubscribe
                            </span>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex flex-col ">
            <h1 class="text-lg font-semibold border border-2 border-red-300 bg-red-200 rounded-full p-2 text-center">
                Available Providers</h1>
            @foreach($availableProviders as $availableProvider )
                <div class="flex flex-col gap-6 pt-4 place-items-end">
                    <div>
                        {{ $availableProvider->name }}
                        <button
                            class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800"
                            type="button" wire:click="subscribe({{ $availableProvider->id }})">
                            <span
                                class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                Subscribe
                            </span>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
