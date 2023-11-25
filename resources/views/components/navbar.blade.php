<nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
    <div class="flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
          <span class="self-center text-2xl font-semibold whitespace-nowrap text-blue-700">Help Desk</span>
      </a>
      <p>Welcome back, <span class="font-semibold">{{ Auth::user()->name }}</span>!</p>
    </div>
</nav>
  