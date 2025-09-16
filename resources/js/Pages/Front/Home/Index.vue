<template>
  <div class="w-full">

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-slate-100 via-white to-slate-50 pt-50 pb-20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
          <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6">
            Learn with the Best
            <span class="text-blue-600">Tutors</span>
          </h1>
          <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
            Connect with qualified tutors for personalized learning experiences. 
            From academic subjects to professional skills, find your perfect match.
          </p>
          <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg text-lg font-semibold transition-colors">
              Find a Tutor
            </button>
            <button class="border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white px-8 py-3 rounded-lg text-lg font-semibold transition-colors">
              Become a Tutor
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-gradient-to-br from-slate-50 via-white to-slate-100">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
            Why Choose ETeacher?
          </h2>
          <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            We provide the best platform for connecting students with expert tutors
          </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="text-center p-6">
            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
              <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Expert Tutors</h3>
            <p class="text-gray-600">Learn from qualified professionals with years of teaching experience</p>
          </div>
          
          <div class="text-center p-6">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
              <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Flexible Schedule</h3>
            <p class="text-gray-600">Book sessions at your convenience with 24/7 availability</p>
          </div>
          
          <div class="text-center p-6">
            <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
              <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Quality Assured</h3>
            <p class="text-gray-600">All tutors are verified and rated by students for quality assurance</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Subjects Section -->
    <section class="py-20 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
            Popular Subjects
          </h2>
          <p class="text-xl text-gray-600">
            Find tutors for any subject you need help with
          </p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
          <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow text-center">
            <div class="text-2xl mb-2">📚</div>
            <h3 class="font-semibold text-gray-900">Mathematics</h3>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow text-center">
            <div class="text-2xl mb-2">🔬</div>
            <h3 class="font-semibold text-gray-900">Science</h3>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow text-center">
            <div class="text-2xl mb-2">🌍</div>
            <h3 class="font-semibold text-gray-900">Languages</h3>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow text-center">
            <div class="text-2xl mb-2">💻</div>
            <h3 class="font-semibold text-gray-900">Programming</h3>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow text-center">
            <div class="text-2xl mb-2">🎨</div>
            <h3 class="font-semibold text-gray-900">Arts</h3>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow text-center">
            <div class="text-2xl mb-2">💼</div>
            <h3 class="font-semibold text-gray-900">Business</h3>
          </div>
        </div>
      </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 bg-blue-600">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
          <div>
            <div class="text-4xl font-bold text-white mb-2">10,000+</div>
            <div class="text-blue-100">Active Students</div>
          </div>
          <div>
            <div class="text-4xl font-bold text-white mb-2">2,500+</div>
            <div class="text-blue-100">Expert Tutors</div>
          </div>
          <div>
            <div class="text-4xl font-bold text-white mb-2">50+</div>
            <div class="text-blue-100">Subjects</div>
          </div>
          <div>
            <div class="text-4xl font-bold text-white mb-2">98%</div>
            <div class="text-blue-100">Success Rate</div>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
            What Our Students Say
          </h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="bg-gray-50 p-6 rounded-lg">
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
          
          <div class="bg-gray-50 p-6 rounded-lg">
            <div class="flex items-center mb-4">
              <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                <span class="text-green-600 font-semibold">FK</span>
              </div>
              <div class="ml-4">
                <h4 class="font-semibold text-gray-900">Fatima Khalil</h4>
                <p class="text-gray-600 text-sm">Student</p>
              </div>
            </div>
            <p class="text-gray-700">"Flexible scheduling and excellent teaching methods. Highly recommended!"</p>
          </div>
          
          <div class="bg-gray-50 p-6 rounded-lg">
            <div class="flex items-center mb-4">
              <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                <span class="text-purple-600 font-semibold">MA</span>
              </div>
              <div class="ml-4">
                <h4 class="font-semibold text-gray-900">Mohammed Ali</h4>
                <p class="text-gray-600 text-sm">Student</p>
              </div>
            </div>
            <p class="text-gray-700">"Great platform for learning programming. The tutors are patient and knowledgeable."</p>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-blue-600 to-indigo-600">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
          Ready to Start Learning?
        </h2>
        <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
          Join thousands of students who are already learning with expert tutors
        </p>
        <button class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-3 rounded-lg text-lg font-semibold transition-colors">
          Get Started Today
        </button>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
          <div>
            <h3 class="text-2xl font-bold mb-4">ETeacher</h3>
            <p class="text-gray-400">Connecting students with expert tutors for personalized learning experiences.</p>
          </div>
          <div>
            <h4 class="font-semibold mb-4">For Students</h4>
            <ul class="space-y-2 text-gray-400">
              <li><a href="#" class="hover:text-white">Find a Tutor</a></li>
              <li><a href="#" class="hover:text-white">Browse Subjects</a></li>
              <li><a href="#" class="hover:text-white">Pricing</a></li>
            </ul>
          </div>
          <div>
            <h4 class="font-semibold mb-4">For Tutors</h4>
            <ul class="space-y-2 text-gray-400">
              <li><a href="#" class="hover:text-white">Become a Tutor</a></li>
              <li><a href="#" class="hover:text-white">Tutor Resources</a></li>
              <li><a href="#" class="hover:text-white">Earnings</a></li>
            </ul>
          </div>
          <div>
            <h4 class="font-semibold mb-4">Support</h4>
            <ul class="space-y-2 text-gray-400">
              <li><a href="#" class="hover:text-white">Help Center</a></li>
              <li><a href="#" class="hover:text-white">Contact Us</a></li>
              <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
            </ul>
          </div>
        </div>
        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
          <p>&copy; 2024 ETeacher. All rights reserved.</p>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>

</script>