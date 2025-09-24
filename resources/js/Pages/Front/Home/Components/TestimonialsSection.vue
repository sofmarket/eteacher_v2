<template>
    <section class="py-20 bg-white dark:bg-gray-900 dark:border-t dark:border-gray-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
            What Our Students Say
          </h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="bg-gray-50 p-6 rounded-lg dark:bg-white" v-for="i in 3">
            <div class="flex items-center mb-4">
              <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                <span class="text-blue-600 font-semibold">AS</span>
              </div>
              <div class="ml-4">
                <h4 class="font-semibold text-gray-900">Ahmed Saleh</h4>
                <p class="text-gray-600 text-sm">Student</p>
              </div>
            </div>
            <p class="text-gray-700">"The tutors here are amazing! I improved my math grades significantly in just a few months."</p>
          </div>
          
        </div>
      </div>
    </section>
</template>