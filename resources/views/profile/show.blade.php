<x-app-layout>
  
    <div class="bg-black grid  grid-cols-5 py-2 text-white fixed z-10 w-full -mt-[70px]">
        <div class="">
          <img src="/icon.png" width="270px"/>
        </div>
        <div class="col-span-3"></div>
        <div class="col-span-1">
            <ul class="flex">
<li class="px-4 text-white   text-[17px] flex mt-5 font-mono"> <a href="http://127.0.0.1:8000">Home</a></li>
<li>@livewire('navigation-menu')</li>
            </ul>
           
            
        </div>
    </div>
    
    
    
       <div>
    

   
    <x-slot name="header ">
        <h2 class="font-semibold text-xl  text-gray-300 leading-tight ">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="pt-[100px]">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
       </div>
</x-app-layout>
