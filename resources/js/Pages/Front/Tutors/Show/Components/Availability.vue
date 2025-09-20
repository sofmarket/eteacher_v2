<template>
    <div class="booking-session-container">
        <!-- Header Section -->
        <div class="header-section">
            <h1 class="main-title">Book a session</h1>
            <button class="request-session-btn">Request a Session</button>
        </div>

        <!-- Date Selection Controls -->
        <div class="date-controls">
            <div class="date-buttons">
                <button class="today-btn">Today</button>
                <button class="date-range-btn">
                    September 14 - September 20 2025
                    <svg class="calendar-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Timezone and Filter Controls -->
        <div class="controls-section">
            <div class="timezone-controls">
                <select class="timezone-dropdown">
                    <option value="Africa/Casablanca">Africa/Casablanca</option>
                </select>
                <div class="info-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 16v-4"></path>
                        <path d="M12 8h.01"></path>
                    </svg>
                </div>
                <svg class="dropdown-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="6,9 12,15 18,9"></polyline>
                </svg>
                <div class="filter-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polygon points="22,3 2,3 10,12.46 10,19 14,21 14,12.46 22,3"></polygon>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Weekly Calendar View -->
        <div class="calendar-section">
            <div class="week-navigation">
                <button class="nav-arrow prev-week">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="15,18 9,12 15,6"></polyline>
                    </svg>
                </button>
                
                <div class="week-days">
                    <div class="day-item">
                        <div class="day-date">14 Sep / Sun</div>
                        <button class="session-btn">No sessions</button>
                    </div>
                    <div class="day-item">
                        <div class="day-date">15 Sep / Mon</div>
                        <button class="session-btn">No sessions</button>
                    </div>
                    <div class="day-item">
                        <div class="day-date">16 Sep / Tue</div>
                        <button class="session-btn">No sessions</button>
                    </div>
                    <div class="day-item">
                        <div class="day-date">17 Sep / Wed</div>
                        <button class="session-btn">No sessions</button>
                    </div>
                    <div class="day-item">
                        <div class="day-date">18 Sep / Thu</div>
                        <button class="session-btn">No sessions</button>
                    </div>
                    <div class="day-item">
                        <div class="day-date">19 Sep / Fri</div>
                        <button class="session-btn">No sessions</button>
                    </div>
                    <div class="day-item selected">
                        <div class="day-date">20 Sep / Sat</div>
                        <button class="session-btn">No sessions</button>
                    </div>
                </div>

                <button class="nav-arrow next-week">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9,18 15,12 9,6"></polyline>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
// Component logic can be added here
</script>

<style scoped>
.booking-session-container {
    max-width: 100%;
    margin: 0 auto;
    padding: 20px;
    background: white;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

/* Header Section */
.header-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.main-title {
    font-size: 24px;
    font-weight: bold;
    color: #000;
    margin: 0;
}

.request-session-btn {
    background-color: #ff6b35;
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 6px;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.2s;
}

.request-session-btn:hover {
    background-color: #e55a2b;
}

/* Date Controls */
.date-controls {
    margin-bottom: 20px;
}

.date-buttons {
    display: flex;
    gap: 12px;
}

.today-btn, .date-range-btn {
    background-color: #f5f5f5;
    border: none;
    padding: 10px 16px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 14px;
    color: #333;
    display: flex;
    align-items: center;
    gap: 8px;
}

.date-range-btn {
    padding: 10px 20px;
}

.calendar-icon {
    color: #666;
}

/* Controls Section */
.controls-section {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 20px;
}

.timezone-controls {
    display: flex;
    align-items: center;
    gap: 8px;
}

.timezone-dropdown {
    background-color: #f5f5f5;
    border: none;
    padding: 8px 12px;
    border-radius: 6px;
    font-size: 14px;
    color: #333;
    cursor: pointer;
}

.info-icon, .dropdown-arrow, .filter-icon {
    color: #666;
    cursor: pointer;
}

/* Calendar Section */
.calendar-section {
    margin-top: 20px;
}

.week-navigation {
    display: flex;
    align-items: center;
    gap: 16px;
}

.nav-arrow {
    background: none;
    border: none;
    cursor: pointer;
    color: #666;
    padding: 8px;
    border-radius: 4px;
    transition: background-color 0.2s;
}

.nav-arrow:hover {
    background-color: #f5f5f5;
}

.week-days {
    display: flex;
    gap: 12px;
    flex: 1;
}

.day-item {
    flex: 1;
    text-align: center;
}

.day-item.selected {
    background-color: #f8f6f0;
    border-radius: 8px;
    padding: 8px;
}

.day-date {
    font-size: 12px;
    color: #333;
    margin-bottom: 8px;
    font-weight: 500;
}

.session-btn {
    background-color: #f8f6f0;
    border: none;
    padding: 8px 12px;
    border-radius: 6px;
    font-size: 12px;
    color: #666;
    cursor: pointer;
    width: 100%;
    transition: background-color 0.2s;
}

.session-btn:hover {
    background-color: #f0ede4;
}

/* Responsive Design */
@media (max-width: 768px) {
    .header-section {
        flex-direction: column;
        gap: 16px;
        align-items: flex-start;
    }
    
    .week-days {
        flex-direction: column;
        gap: 8px;
    }
    
    .day-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px;
        background-color: #f8f8f8;
        border-radius: 6px;
    }
    
    .session-btn {
        width: auto;
        min-width: 100px;
    }
}
</style>