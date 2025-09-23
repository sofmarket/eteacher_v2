<template>
    <div class="similar-tutors-container">
        <!-- Section Title -->
        <h2 class="section-title">Similar Tutors</h2>
        
        <!-- Tutors Grid -->
        <div class="tutors-grid">
            <!-- Tutor Card 1 - Steven Ford -->
            <div class="tutor-card">
                <div class="tutor-header">
                    <div class="profile-section">
                        <img src="@/assets/images/user/user-01.jpg" alt="Steven Ford" class="profile-image" />
                        <div class="tutor-info">
                            <h3 class="tutor-name">Steven Ford</h3>
                            <div class="status-icons">
                                <div class="status-icon online">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                    </svg>
                                </div>
                                <img src="@/assets/images/country/country-01.svg" alt="Pakistan" class="country-flag" />
                            </div>
                        </div>
                    </div>
                    <p class="tutor-tagline">Prepare for beta testing</p>
                </div>
                
                <div class="tutor-details">
                    <div class="detail-item">
                        <span class="detail-label">$ 20.00/session</span>
                    </div>
                    <div class="detail-item">
                        <svg class="star-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polygon points="12,2 15.09,8.26 22,9.27 17,14.14 18.18,21.02 12,17.77 5.82,21.02 7,14.14 2,9.27 8.91,8.26 12,2"></polygon>
                        </svg>
                        <span class="rating">4.2 /5.0</span>
                        <span class="review-count">(142 reviews)</span>
                    </div>
                    <div class="detail-item">
                        <svg class="students-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span>2 Active students</span>
                    </div>
                    <div class="detail-item">
                        <svg class="sessions-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="8" y1="6" x2="21" y2="6"></line>
                            <line x1="8" y1="12" x2="21" y2="12"></line>
                            <line x1="8" y1="18" x2="21" y2="18"></line>
                            <line x1="3" y1="6" x2="3.01" y2="6"></line>
                            <line x1="3" y1="12" x2="3.01" y2="12"></line>
                            <line x1="3" y1="18" x2="3.01" y2="18"></line>
                        </svg>
                        <span>2205 Sessions</span>
                    </div>
                    <div class="detail-item">
                        <svg class="language-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                        </svg>
                        <span>English, Afrikaans, Albanian, Amharic</span>
                    </div>
                </div>
                
                <div class="tutor-actions">
                    <button class="action-btn book-btn">
                        Book a session
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                    </button>
                    <div class="action-row">
                        <button class="action-btn message-btn">
                            Send message
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg>
                        </button>
                        <button class="heart-btn">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Tutor Card 2 - Anthony Shao -->
            <div class="tutor-card">
                <div class="tutor-header">
                    <div class="profile-section">
                        <img src="@/assets/images/user/user-01.jpg" alt="Anthony Shao" class="profile-image" />
                        <div class="tutor-info">
                            <h3 class="tutor-name">Anthony Shao</h3>
                            <div class="status-icons">
                                <div class="status-icon online">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                    </svg>
                                </div>
                                <img src="@/assets/images/country/country-01.svg" alt="Angola" class="country-flag" />
                            </div>
                        </div>
                    </div>
                    <p class="tutor-tagline">Inspiring Achievement Through...</p>
                </div>
                
                <div class="tutor-details">
                    <div class="detail-item">
                        <span class="detail-label">$ 40.00/session</span>
                    </div>
                    <div class="detail-item">
                        <svg class="star-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polygon points="12,2 15.09,8.26 22,9.27 17,14.14 18.18,21.02 12,17.77 5.82,21.02 7,14.14 2,9.27 8.91,8.26 12,2"></polygon>
                        </svg>
                        <span class="rating">4.5 /5.0</span>
                        <span class="review-count">(4 reviews)</span>
                    </div>
                    <div class="detail-item">
                        <svg class="students-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span>4 Active students</span>
                    </div>
                    <div class="detail-item">
                        <svg class="sessions-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="8" y1="6" x2="21" y2="6"></line>
                            <line x1="8" y1="12" x2="21" y2="12"></line>
                            <line x1="8" y1="18" x2="21" y2="18"></line>
                            <line x1="3" y1="6" x2="3.01" y2="6"></line>
                            <line x1="3" y1="12" x2="3.01" y2="12"></line>
                            <line x1="3" y1="18" x2="3.01" y2="18"></line>
                        </svg>
                        <span>2213 Sessions</span>
                    </div>
                    <div class="detail-item">
                        <svg class="language-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                        </svg>
                        <span>Albanian, Arabic, Aragonese</span>
                    </div>
                </div>
                
                <div class="tutor-actions">
                    <button class="action-btn book-btn">
                        Book a session
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                    </button>
                    <div class="action-row">
                        <button class="action-btn message-btn">
                            Send message
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg>
                        </button>
                        <button class="heart-btn">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Tutor Card 3 - Antony Clara -->
            <div class="tutor-card">
                <div class="tutor-header">
                    <div class="profile-section">
                        <img src="@/assets/images/user/user-01.jpg" alt="Antony Clara" class="profile-image" />
                        <div class="tutor-info">
                            <h3 class="tutor-name">Antony Clara</h3>
                            <div class="status-icons">
                                <div class="status-icon online">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                    </svg>
                                </div>
                                <img src="@/assets/images/country/country-01.svg" alt="Malta" class="country-flag" />
                            </div>
                        </div>
                    </div>
                    <p class="tutor-tagline">Unlocking Potential Through...</p>
                </div>
                
                <div class="tutor-details">
                    <div class="detail-item">
                        <span class="detail-label">$ 20.00/session</span>
                    </div>
                    <div class="detail-item">
                        <svg class="star-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polygon points="12,2 15.09,8.26 22,9.27 17,14.14 18.18,21.02 12,17.77 5.82,21.02 7,14.14 2,9.27 8.91,8.26 12,2"></polygon>
                        </svg>
                        <span class="rating">5.0 /5.0</span>
                        <span class="review-count">(2 reviews)</span>
                    </div>
                    <div class="detail-item">
                        <svg class="students-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span>3 Active students</span>
                    </div>
                    <div class="detail-item">
                        <svg class="sessions-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="8" y1="6" x2="21" y2="6"></line>
                            <line x1="8" y1="12" x2="21" y2="12"></line>
                            <line x1="8" y1="18" x2="21" y2="18"></line>
                            <line x1="3" y1="6" x2="3.01" y2="6"></line>
                            <line x1="3" y1="12" x2="3.01" y2="12"></line>
                            <line x1="3" y1="18" x2="3.01" y2="18"></line>
                        </svg>
                        <span>1472 Sessions</span>
                    </div>
                    <div class="detail-item">
                        <svg class="language-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                        </svg>
                        <span>Galician, Azerbaijani, Basque</span>
                    </div>
                </div>
                
                <div class="tutor-actions">
                    <button class="action-btn book-btn">
                        Book a session
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                    </button>
                    <div class="action-row">
                        <button class="action-btn message-btn">
                            Send message
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg>
                        </button>
                        <button class="heart-btn">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Tutor Card 4 - Arianne Kearns -->
            <div class="tutor-card">
                <div class="tutor-header">
                    <div class="profile-section">
                        <img src="@/assets/images/user/user-01.jpg" alt="Arianne Kearns" class="profile-image" />
                        <div class="tutor-info">
                            <h3 class="tutor-name">Arianne Kearns</h3>
                            <div class="status-icons">
                                <div class="status-icon online">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                    </svg>
                                </div>
                                <img src="@/assets/images/country/country-01.svg" alt="Portugal" class="country-flag" />
                            </div>
                        </div>
                    </div>
                    <p class="tutor-tagline">Building Confidence Through...</p>
                </div>
                
                <div class="tutor-details">
                    <div class="detail-item">
                        <span class="detail-label">$ 40.00/session</span>
                    </div>
                    <div class="detail-item">
                        <svg class="star-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polygon points="12,2 15.09,8.26 22,9.27 17,14.14 18.18,21.02 12,17.77 5.82,21.02 7,14.14 2,9.27 8.91,8.26 12,2"></polygon>
                        </svg>
                        <span class="rating">4.0 /5.0</span>
                        <span class="review-count">(1 review)</span>
                    </div>
                    <div class="detail-item">
                        <svg class="students-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span>1 Active student</span>
                    </div>
                    <div class="detail-item">
                        <svg class="sessions-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="8" y1="6" x2="21" y2="6"></line>
                            <line x1="8" y1="12" x2="21" y2="12"></line>
                            <line x1="8" y1="18" x2="21" y2="18"></line>
                            <line x1="3" y1="6" x2="3.01" y2="6"></line>
                            <line x1="3" y1="12" x2="3.01" y2="12"></line>
                            <line x1="3" y1="18" x2="3.01" y2="18"></line>
                        </svg>
                        <span>2204 Sessions</span>
                    </div>
                    <div class="detail-item">
                        <svg class="language-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                        </svg>
                        <span>French, Armenian, Asturian</span>
                    </div>
                </div>
                
                <div class="tutor-actions">
                    <button class="action-btn book-btn">
                        Book a session
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                    </button>
                    <div class="action-row">
                        <button class="action-btn message-btn">
                            Send message
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg>
                        </button>
                        <button class="heart-btn">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- View All Tutors Button -->
        <div class="view-all-section">
            <button class="view-all-btn">View All Tutors</button>
        </div>
    </div>
</template>

<script setup>
// Component logic can be added here
</script>

<style scoped>
.similar-tutors-container {
    max-width: 100%;
    margin: 0 auto;
    padding: 20px;
    background: #fafafa;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

.section-title {
    font-size: 28px;
    font-weight: bold;
    color: #000;
    margin: 0 0 30px 0;
    text-align: left;
}

.tutors-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, .5fr));
    gap: 20px;
    margin-bottom: 30px;
}

.view-all-section {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.view-all-btn {
    background: white;
    border: 1px solid #ff6b35;
    border-radius: 6px;
    padding: 12px 24px;
    font-size: 16px;
    color: #ff6b35;
    cursor: pointer;
    transition: all 0.2s;
    font-weight: 500;
}

.view-all-btn:hover {
    background: #ff6b35;
    color: white;
}

.tutor-card {
    background: white;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s, box-shadow 0.2s;
}

.tutor-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
}

.tutor-header {
    margin-bottom: 20px;
}

.profile-section {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 8px;
}

.profile-image {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #f0f0f0;
}

.tutor-info {
    flex: 1;
}

.tutor-name {
    font-size: 18px;
    font-weight: bold;
    color: #000;
    margin: 0 0 4px 0;
}

.status-icons {
    display: flex;
    align-items: center;
    gap: 8px;
}

.status-icon {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.status-icon.online {
    background-color: #4ade80;
    color: white;
}

.country-flag {
    width: 16px;
    height: 12px;
    border-radius: 2px;
    object-fit: cover;
}

.tutor-tagline {
    font-size: 14px;
    color: #666;
    margin: 0;
    font-style: italic;
}

.tutor-details {
    margin-bottom: 20px;
}

.detail-item {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 8px;
    font-size: 14px;
    color: #333;
}

.detail-label {
    font-weight: 600;
    color: #000;
}

.star-icon, .students-icon, .sessions-icon, .language-icon {
    color: #666;
    flex-shrink: 0;
}

.rating {
    font-weight: 600;
    color: #000;
}

.review-count {
    color: #999;
    font-size: 13px;
}

.tutor-actions {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.action-btn {
    background: white;
    border: 1px solid #e0e0e0;
    border-radius: 6px;
    padding: 10px 16px;
    font-size: 14px;
    color: #333;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: all 0.2s;
    width: 100%;
}

.action-btn:hover {
    background: #f8f8f8;
    border-color: #ccc;
}

.action-row {
    display: flex;
    align-items: center;
    gap: 12px;
}

.message-btn {
    flex: 1;
}

.heart-btn {
    background: white;
    border: 1px solid #e0e0e0;
    border-radius: 6px;
    padding: 10px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s;
    color: #666;
}

.heart-btn:hover {
    background: #f8f8f8;
    border-color: #ccc;
    color: #e74c3c;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .tutors-grid {
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    }
}

@media (max-width: 768px) {
    .tutors-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }
    
    .similar-tutors-container {
        padding: 15px;
    }
    
    .section-title {
        font-size: 24px;
    }
    
    .tutor-card {
        padding: 16px;
    }
    
    .profile-image {
        width: 45px;
        height: 45px;
    }
    
    .tutor-name {
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .similar-tutors-container {
        padding: 10px;
    }
    
    .tutor-card {
        padding: 12px;
    }
    
    .action-row {
        flex-direction: column;
        gap: 8px;
    }
    
    .heart-btn {
        align-self: flex-end;
    }
}
</style>