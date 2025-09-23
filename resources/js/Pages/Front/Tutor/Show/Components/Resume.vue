<template>
    <div class="resume-container">
        <!-- Tabbed Navigation -->
        <div class="tab-navigation">
            <button class="tab-button active" @click="activeTab = 'education'">Education</button>
            <button class="tab-button" @click="activeTab = 'experience'">Experience</button>
            <button class="tab-button" @click="activeTab = 'certification'">Certification & Awards</button>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <h1 class="section-heading">Education</h1>
            
            <!-- Education Grid -->
            <div class="education-grid" v-if="activeTab === 'education'">
                <!-- Education Entry 1 -->
                <div class="education-entry">
                    <div class="entry-content">
                        <div class="date-range">2015 - 2019</div>
                        <div class="degree-title">Bachelor of Computer Science</div>
                        <div class="institution-info">
                            <div class="institution">
                                <svg class="book-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                                </svg>
                                ABC University
                            </div>
                            <div class="location">
                                <svg class="location-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                Cacuaco, Angola
                            </div>
                        </div>
                        <div class="description">
                            Focused on software development and cybersecurity, I build innovative software solutions and...
                        </div>
                        <a href="#" class="show-more-link">Show more</a>
                    </div>
                </div>

                <!-- Education Entry 2 -->
                <div class="education-entry">
                    <div class="entry-content">
                        <div class="date-range">2020 - 2022</div>
                        <div class="degree-title">Master of Information Technology</div>
                        <div class="institution-info">
                            <div class="institution">
                                <svg class="book-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                                </svg>
                                XYZ Institute
                            </div>
                            <div class="location">
                                <svg class="location-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                West End, Anguilla
                            </div>
                        </div>
                        <div class="description">
                            Specialized in advanced IT management and data analysis, I manage complex IT infrastructures and use...
                        </div>
                        <a href="#" class="show-more-link">Show more</a>
                    </div>
                </div>

                <!-- Education Entry 3 -->
                <div class="education-entry">
                    <div class="entry-content">
                        <div class="date-range">2017 - 2018</div>
                        <div class="degree-title">Diploma in Data Analytics</div>
                        <div class="institution-info">
                            <div class="institution">
                                <svg class="book-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                                </svg>
                                Data Academy
                            </div>
                            <div class="location">
                                <svg class="location-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                Montreal, Antarctica
                            </div>
                        </div>
                        <div class="description">
                            Covered data visualization, statistical analysis, and predictive modeling, I transform complex...
                        </div>
                        <a href="#" class="show-more-link">Show more</a>
                    </div>
                </div>

                <!-- Education Entry 4 -->
                <div class="education-entry">
                    <div class="entry-content">
                        <div class="date-range">2022 - 2023</div>
                        <div class="degree-title">Certification in Cloud Computing</div>
                        <div class="institution-info">
                            <div class="institution">
                                <svg class="book-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                                </svg>
                                Cloud Tech Institute
                            </div>
                            <div class="location">
                                <svg class="location-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                Sydney, Antigua and Barbuda
                            </div>
                        </div>
                        <div class="description">
                            Focused on cloud infrastructure, services, and deployment strategies, I design and implement...
                        </div>
                        <a href="#" class="show-more-link">Show more</a>
                    </div>
                </div>
            </div>

            <!-- Experience Tab Content (placeholder) -->
            <div v-if="activeTab === 'experience'" class="tab-content">
                <h1 class="section-heading">Experience</h1>
                <p>Experience content will be displayed here.</p>
            </div>

            <!-- Certification Tab Content (placeholder) -->
            <div v-if="activeTab === 'certification'" class="tab-content">
                <h1 class="section-heading">Certification & Awards</h1>
                <p>Certification and awards content will be displayed here.</p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'

const activeTab = ref('education')
</script>

<style scoped>
.resume-container {
    max-width: 100%;
    margin: 0 auto;
    /* padding: 20px; */
    background: #fafafa;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

/* Tab Navigation */
.tab-navigation {
    display: flex;
    gap: 0;
    margin-bottom: 30px;
    border-bottom: 1px solid #e0e0e0;
}

.tab-button {
    background: none;
    border: none;
    padding: 12px 24px;
    font-size: 16px;
    color: #666;
    cursor: pointer;
    transition: all 0.2s;
    border-bottom: 2px solid transparent;
}

.tab-button:hover {
    color: #333;
}

.tab-button.active {
    color: #333;
    font-weight: 600;
    background-color: #f8f6f0;
    border-bottom: 2px solid #333;
}

/* Main Content */
.main-content {
    background: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.section-heading {
    font-size: 28px;
    font-weight: bold;
    color: #333;
    margin: 0 0 30px 0;
}

/* Education Grid */
.education-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
}

.education-entry {
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    padding: 20px;
    background: white;
    transition: box-shadow 0.2s;
}

.education-entry:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.entry-content {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.date-range {
    font-size: 14px;
    color: #999;
    font-weight: 500;
}

.degree-title {
    font-size: 18px;
    font-weight: bold;
    color: #333;
    line-height: 1.3;
}

.institution-info {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.institution, .location {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    color: #666;
}

.book-icon, .location-icon {
    color: #999;
    flex-shrink: 0;
}

.description {
    font-size: 14px;
    color: #999;
    line-height: 1.5;
    margin: 8px 0;
}

.show-more-link {
    font-size: 14px;
    color: #666;
    text-decoration: underline;
    cursor: pointer;
    align-self: flex-start;
    transition: color 0.2s;
}

.show-more-link:hover {
    color: #333;
}

/* Tab Content */
.tab-content {
    min-height: 200px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #666;
}

/* Responsive Design */
@media (max-width: 768px) {
    .education-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .tab-navigation {
        flex-direction: column;
        gap: 0;
    }
    
    .tab-button {
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .tab-button.active {
        border-bottom: 1px solid #e0e0e0;
        border-left: 3px solid #333;
    }
    
    .main-content {
        padding: 20px;
    }
    
    .section-heading {
        font-size: 24px;
    }
}

@media (max-width: 480px) {
    .resume-container {
        padding: 10px;
    }
    
    .main-content {
        padding: 15px;
    }
    
    .education-entry {
        padding: 15px;
    }
    
    .degree-title {
        font-size: 16px;
    }
}
</style>