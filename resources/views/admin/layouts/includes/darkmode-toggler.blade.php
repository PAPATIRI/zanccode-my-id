<label :class="darkMode ? 'bg-primary' : 'bg-stroke'" class="relative m-0 block h-7.5 w-14 rounded-full">
    <input type="checkbox" :value="darkMode" @change="darkMode = !darkMode"
           class="absolute top-0 z-50 m-0 h-full w-full cursor-pointer opacity-0"/>
    <span :class="darkMode && '!right-1 !translate-x-full'" class="absolute left-1 top-1/2 flex h-6 w-6 -translate-y-1/2 translate-x-0 items-center justify-center rounded-full bg-white shadow-switcher duration-75 ease-linear">
        <span class="dark:hidden">
              @include('admin.layouts.includes.svg-lightmode')
        </span>
        <span class="hidden dark:inline-block">
              @include('admin.layouts.includes.svg-darkmode')
        </span>
    </span>
</label>
