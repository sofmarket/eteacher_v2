<template>
    <div class="w-full bg-stone-50 p-5 md:p-15 border-t" id="resume-tab">
        <div class="w-full max-w-7xl mx-auto">
            <!-- Navigation Tabs -->
            <div class="mb-8">
                <div class="flex space-x-4 overflow-x-auto">
                    <button @click="activeTab = 'education'" :class="[
                        'px-4 py-2 md:px-6 md:py-3 rounded-lg font-semibold transition-colors',
                        activeTab === 'education'
                            ? 'bg-stone-200 text-stone-800'
                            : 'text-stone-700 hover:text-stone-900'
                    ]">
                        Education
                    </button>
                    <button @click="activeTab = 'experience'" :class="[
                        'px-4 py-2 md:px-6 md:py-3 rounded-lg font-semibold transition-colors',
                        activeTab === 'experience'
                            ? 'bg-stone-200 text-stone-800'
                            : 'text-stone-700 hover:text-stone-900'
                    ]">
                        Experience
                    </button>
                    <button @click="activeTab = 'certification'" :class="[
                        'px-4 py-2 md:px-6 md:py-3 rounded-lg font-semibold transition-colors',
                        activeTab === 'certification'
                            ? 'bg-stone-200 text-stone-800'
                            : 'text-stone-700 hover:text-stone-900'
                    ]">
                        Certification
                    </button>
                </div>
            </div>

            <!-- Tab Content -->
            <div class="tab-content">
                <!-- Education Tab -->
                <div v-show="activeTab === 'education'">
                    <h1 class="text-3xl text-stone-800 mb-8">Education</h1>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div class="flex" v-for="education in tutor.educations" :key="education.id">
                            <div class="w-32 flex-shrink-0">
                                <p class="text-stone-700 font-medium">{{ getRangeYear(education) }}</p>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-stone-800 mb-1">{{ education.course_title }}</h3>
                                <div class="flex flex-col md:flex-row md:items-center mb-1 gap-2">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-stone-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                                        </svg>
                                        <span class="text-stone-700">{{ education.institute_name }}</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-stone-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-stone-700">{{ education.city }}</span>
                                    </div>
                                </div>
                                <p class="text-stone-500 text-sm mb-2">
                                    {{ education.description }}
                                </p>
                                <a href="#" class="text-stone-700 underline text-sm hover:text-stone-900">Show more</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Experience Tab -->
                <div v-show="activeTab === 'experience'">
                    <h1 class="text-3xl text-stone-800 mb-8">Experience</h1>
                    <div class="grid grid-cols-2 gap-8">
                        <div class="flex" v-for="experience in tutor.experiences" :key="experience.id">
                            <div class="w-32 flex-shrink-0">
                                <p class="text-stone-700 font-medium">{{ getExperienceRangeYear(experience) }}</p>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-stone-800 mb-1">{{ experience.title }}</h3>
                                <div class="flex flex-col md:flex-row md:items-center mb-1 gap-4">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-stone-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-stone-700">{{ experience.company }}</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg fill="#000000" height="15px" width="15px" version="1.1" id="Layer_1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                                            xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M461.913,133.565h-50.087V83.478C411.826,37.448,374.378,0,328.348,0H183.652c-46.03,0-83.478,37.448-83.478,83.478
			v50.087H50.087C22.469,133.565,0,156.034,0,183.652v278.261C0,489.531,22.469,512,50.087,512h411.826
			C489.531,512,512,489.531,512,461.913V183.652C512,156.034,489.531,133.565,461.913,133.565z M133.565,83.478
			c0-27.618,22.469-50.087,50.087-50.087h144.696c27.618,0,50.087,22.469,50.087,50.087v50.087h-33.391V83.478
			c0-9.22-7.475-16.696-16.696-16.696H183.652c-9.22,0-16.696,7.475-16.696,16.696v50.087h-33.391V83.478z M311.652,100.174v33.391
			H200.348v-33.391H311.652z M478.609,461.913c0,9.206-7.49,16.696-16.696,16.696H50.087c-9.206,0-16.696-7.49-16.696-16.696
			v-187.35l150.261,56.592V384c0,9.22,7.475,16.696,16.696,16.696h111.304c9.22,0,16.696-7.475,16.696-16.696v-52.845
			l150.261-56.592V461.913z M294.957,333.913v33.391h-77.913v-33.391H294.957z M217.043,300.522V267.13h77.913v33.391H217.043z
			 M478.609,238.882l-150.261,56.592v-45.039c0-9.22-7.475-16.696-16.696-16.696H200.348c-9.22,0-16.696,7.475-16.696,16.696v45.039
			L33.391,238.882v-55.23c0-9.206,7.49-16.696,16.696-16.696c13.532,0,391.984,0,411.826,0c9.206,0,16.696,7.49,16.696,16.696
			V238.882z" />
                                                </g>
                                            </g>
                                        </svg>
                                        <span class="text-stone-700">{{ experience.employment_type }}</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-stone-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-stone-700">{{ experience.city }}</span>
                                    </div>
                                </div>


                                <p class="text-stone-500 text-sm mb-2">
                                    {{ experience.description }}
                                </p>
                                <a href="#" class="text-stone-700 underline text-sm hover:text-stone-900">Show more</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Certification Tab -->
                <div v-show="activeTab === 'certification'">
                    <h1 class="text-3xl text-stone-800 mb-8">Certification & Awards</h1>
                    <div class="grid grid-cols-2 gap-8">
                        <div class="flex items-start gap-4" v-for="certificate in tutor.certificates"
                            :key="certificate.id">
                            <div class="w-25 flex-shrink-0">
                                <img src="https://amento-bucket-poc-2.s3.amazonaws.com/certificates/certificate-1.png"
                                    alt="" class="w-full h-full object-cover rounded-lg">
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-stone-800 mb-1">{{ certificate.title }}
                                </h3>
                                <div class="flex flex-col md:flex-row md:items-center mb-4 gap-4">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-stone-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                                        </svg>
                                        <span class="text-stone-700">{{ certificate.institute_name }}</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg width="15px" height="15px" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 21H6.2C5.0799 21 4.51984 21 4.09202 20.782C3.71569 20.5903 3.40973 20.2843 3.21799 19.908C3 19.4802 3 18.9201 3 17.8V8.2C3 7.0799 3 6.51984 3.21799 6.09202C3.40973 5.71569 3.71569 5.40973 4.09202 5.21799C4.51984 5 5.0799 5 6.2 5H17.8C18.9201 5 19.4802 5 19.908 5.21799C20.2843 5.40973 20.5903 5.71569 20.782 6.09202C21 6.51984 21 7.0799 21 8.2V10M7 3V5M17 3V5M3 9H21M13.5 13.0001L7 13M10 17.0001L7 17M14 21L16.025 20.595C16.2015 20.5597 16.2898 20.542 16.3721 20.5097C16.4452 20.4811 16.5147 20.4439 16.579 20.399C16.6516 20.3484 16.7152 20.2848 16.8426 20.1574L21 16C21.5523 15.4477 21.5523 14.5523 21 14C20.4477 13.4477 19.5523 13.4477 19 14L14.8426 18.1574C14.7152 18.2848 14.6516 18.3484 14.601 18.421C14.5561 18.4853 14.5189 18.5548 14.4903 18.6279C14.458 18.7102 14.4403 18.7985 14.405 18.975L14 21Z"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        <span class="text-stone-700">{{ certificate.issue_date }}</span>
                                    </div>
                                </div>
                                <p class="text-stone-500 text-sm mb-2">
                                    {{ certificate.description }}
                                </p>
                                <a href="#" class="text-stone-700 underline text-sm hover:text-stone-900">Show more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'
const activeTab = ref('education');
const props = defineProps({
    tutor: {
        type: Object,
        required: true
    }
});

const getRangeYear = (education) => {
    const startDate = new Date(education.start_date);
    const endDate = new Date(education.end_date);
    if (education.ongoing) {
        return `${startDate.getFullYear()} - ${new Date().getFullYear()}`;
    }
    return `${startDate.getFullYear()} - ${endDate.getFullYear()}`;
};

const getExperienceRangeYear = (experience) => {
    const startDate = new Date(experience.start_date);
    const endDate = new Date(experience.end_date);
    if (experience.currently_working) {
        return `${startDate.getFullYear()} - ${new Date().getFullYear()}`;
    }
    return `${startDate.getFullYear()} - ${endDate.getFullYear()}`;
};

const getCertificateYear = (certificate) => {
    const issueDate = new Date(certificate.issue_date);
    return issueDate.getFullYear();
};
</script>