
<!-- component -->
{{-- <div
  class="font-regular relative block w-full max-w-screen-md rounded-lg bg-green-500 px-4 py-4  text-base text-white"
  data-dismissible="alert"
  >



  <div class="ml-8 mr-12">
    <h5 class="block font-sans text-xl font-semibold leading-snug tracking-normal text-white antialiased">
      
    </h5>
    <p class="mt-2 block font-sans text-base font-normal leading-relaxed text-white antialiased">
      I don't know what that word means. I'm happy. But success, that goes
      back to what in somebody's eyes success means. For me, success is inner
      peace. That's a good day for me.
    </p>
  </div>

  <div
    data-dismissible-target="alert"
    data-ripple-dark="true"
    class="w-40 text-center text-white border rounded-lg transition-all hover:bg-white hover:text-gray-500  hover:bg-opacity-20"
    > 
    <div role="button" class="rounded-lg p-1">
        OK, cerrar. 
    </div>
  </div>
  
</div> --}}

<div id="alertaTail">
  <div class="max-w-xs {{$respuestaTail['clases'][session('estatus')]}} text-sm text-white rounded-md shadow-lg mb-3 ml-3" role="alert">
    <div class="flex p-4">
      {{ session('mensaje') }}

      <div class="ml-auto" id="btn__close">
        <button type="button" class="inline-flex flex-shrink-0 justify-center items-center h-4 w-4 rounded-md text-white/[.5] hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-800 focus:ring-indigo-500 transition-all text-sm dark:focus:ring-offset-indigo-500 dark:focus:ring-indigo-700">
          <span class="sr-only">Cerrar</span>
          <svg class="w-3.5 h-3.5" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.92524 0.687069C1.126 0.486219 1.39823 0.373377 1.68209 0.373377C1.96597 0.373377 2.2382 0.486219 2.43894 0.687069L8.10514 6.35813L13.7714 0.687069C13.8701 0.584748 13.9882 0.503105 14.1188 0.446962C14.2494 0.39082 14.3899 0.361248 14.5321 0.360026C14.6742 0.358783 14.8151 0.38589 14.9468 0.439762C15.0782 0.493633 15.1977 0.573197 15.2983 0.673783C15.3987 0.774389 15.4784 0.894026 15.5321 1.02568C15.5859 1.15736 15.6131 1.29845 15.6118 1.44071C15.6105 1.58297 15.5809 1.72357 15.5248 1.85428C15.4688 1.98499 15.3872 2.10324 15.2851 2.20206L9.61883 7.87312L15.2851 13.5441C15.4801 13.7462 15.588 14.0168 15.5854 14.2977C15.5831 14.5787 15.4705 14.8474 15.272 15.046C15.0735 15.2449 14.805 15.3574 14.5244 15.3599C14.2437 15.3623 13.9733 15.2543 13.7714 15.0591L8.10514 9.38812L2.43894 15.0591C2.23704 15.2543 1.96663 15.3623 1.68594 15.3599C1.40526 15.3574 1.13677 15.2449 0.938279 15.046C0.739807 14.8474 0.627232 14.5787 0.624791 14.2977C0.62235 14.0168 0.730236 13.7462 0.92524 13.5441L6.59144 7.87312L0.92524 2.20206C0.724562 2.00115 0.611816 1.72867 0.611816 1.44457C0.611816 1.16047 0.724562 0.887983 0.92524 0.687069Z" fill="currentColor"/>
          </svg>
        </button>
      </div>
    </div>
  </div>
</div>
