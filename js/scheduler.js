document.addEventListener('DOMContentLoaded', function() {
    // Initialize calendar for single date selection
    const availabilityCalendar = flatpickr("#availability-calendar", {
        inline: true,
        mode: "single",
        minDate: "today",
        dateFormat: "Y-m-d",
        onChange: function(selectedDates, dateStr) {
            document.getElementById('selected-date-display').textContent = dateStr;
            document.getElementById('no-date-selected').style.display = 'none';
            document.getElementById('date-selected-content').style.display = 'block';
        }
    });

    // Add select/deselect all functionality
document.querySelector('.select-all-slots').addEventListener('click', function() {
    document.querySelectorAll('#time-slots-container .time-slot').forEach(slot => {
        slot.classList.add('selected');
    });
});

document.querySelector('.deselect-all-slots').addEventListener('click', function() {
    document.querySelectorAll('#time-slots-container .time-slot').forEach(slot => {
        slot.classList.remove('selected');
    });
});

document.querySelector('.bulk-select-all').addEventListener('click', function() {
    document.querySelectorAll('#bulk-preview-container .time-slot').forEach(slot => {
        slot.classList.add('selected');
    });
});

document.querySelector('.bulk-deselect-all').addEventListener('click', function() {
    document.querySelectorAll('#bulk-preview-container .time-slot').forEach(slot => {
        slot.classList.remove('selected');
    });
});

    
    // Initialize time pickers
    flatpickr("#start-time", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        defaultHour: 9,
        defaultMinute: 0
    });
    
    flatpickr("#end-time", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        defaultHour: 18,
        defaultMinute: 0
    });
    
    flatpickr("#break-start", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        defaultHour: 13,
        defaultMinute: 0
    });
    
    flatpickr("#break-end", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        defaultHour: 14,
        defaultMinute: 0
    });
    
    // Bulk date selection
    flatpickr("#bulk-dates-picker", {
        mode: "multiple",
        minDate: "today",
        dateFormat: "Y-m-d",
        onChange: function(selectedDates, dateStr) {
            updateSelectedDatesList(selectedDates);
        }
    });
    
    flatpickr("#range-start-date", {
        minDate: "today",
        dateFormat: "Y-m-d"
    });
    
    flatpickr("#range-end-date", {
        minDate: "today",
        dateFormat: "Y-m-d"
    });
    
    // Initialize bulk time pickers
    flatpickr("#bulk-start-time", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        defaultHour: 9,
        defaultMinute: 0
    });
    
    flatpickr("#bulk-end-time", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        defaultHour: 18,
        defaultMinute: 0
    });
    
    flatpickr("#bulk-break-start", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        defaultHour: 13,
        defaultMinute: 0
    });
    
    flatpickr("#bulk-break-end", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        defaultHour: 14,
        defaultMinute: 0
    });
    
    // Toggle date selection type
    document.querySelectorAll('input[name="date-selection-type"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const selectedType = this.id;
            
            document.getElementById('single-dates-container').style.display = 
                selectedType === 'date-selection-single' ? 'block' : 'none';
                
            document.getElementById('date-range-container').style.display = 
                selectedType === 'date-selection-range' ? 'block' : 'none';
                
            document.getElementById('weekday-container').style.display = 
                selectedType === 'date-selection-weekday' ? 'block' : 'none';
        });
    });
    
    // Generate time slots button
    document.getElementById('generate-slots').addEventListener('click', function() {
        const duration = parseInt(document.getElementById('time-slot-duration').value);
        const startTime = document.getElementById('start-time').value;
        const endTime = document.getElementById('end-time').value;
        const breakStart = document.getElementById('break-start').value;
        const breakEnd = document.getElementById('break-end').value;
        const price = document.getElementById('slot-price').value;
        
        generateTimeSlots(duration, startTime, endTime, breakStart, breakEnd, price);
    });
    
    // Bulk generate time slots button
    document.getElementById('bulk-generate-slots').addEventListener('click', function() {
        const selectedDates = getSelectedDates();
        if (selectedDates.length === 0) {
            alert('Please select at least one date');
            return;
        }
        
        const duration = parseInt(document.getElementById('bulk-time-slot-duration').value);
        const startTime = document.getElementById('bulk-start-time').value;
        const endTime = document.getElementById('bulk-end-time').value;
        const breakStart = document.getElementById('bulk-break-start').value;
        const breakEnd = document.getElementById('bulk-break-end').value;
        const price = document.getElementById('bulk-slot-price').value;
        
        generateBulkTimeSlots(selectedDates, duration, startTime, endTime, breakStart, breakEnd, price);
    });
    
    // Function to generate time slots
    function generateTimeSlots(duration, startTime, endTime, breakStart, breakEnd, price) {
        const container = document.getElementById('time-slots-container');
        container.innerHTML = '';
        
        const slots = calculateTimeSlots(duration, startTime, endTime, breakStart, breakEnd);
        
        if (slots.length === 0) {
            container.innerHTML = '<div class="text-muted">No time slots could be generated with the given parameters</div>';
            return;
        }
        
        slots.forEach(slot => {
            const slotElement = document.createElement('div');
            slotElement.className = 'time-slot';
            slotElement.textContent = `${slot.start} - ${slot.end}`;
            slotElement.dataset.start = slot.start;
            slotElement.dataset.end = slot.end;
            slotElement.dataset.price = price;
            
            slotElement.addEventListener('click', function() {
                this.classList.toggle('selected');
            });
            
            container.appendChild(slotElement);
        });
    }
    
    // Function to generate bulk time slots
    function generateBulkTimeSlots(dates, duration, startTime, endTime, breakStart, breakEnd, price) {
        const container = document.getElementById('bulk-preview-container');
        container.innerHTML = '';
        
        const slots = calculateTimeSlots(duration, startTime, endTime, breakStart, breakEnd);
        
        if (slots.length === 0) {
            container.innerHTML = '<div class="text-muted">No time slots could be generated with the given parameters</div>';
            return;
        }
        
        dates.forEach(date => {
            const dateContainer = document.createElement('div');
            dateContainer.className = 'mb-4';
            
            const dateHeader = document.createElement('h6');
            dateHeader.textContent = moment(date).format('dddd, MMMM D, YYYY');
            dateContainer.appendChild(dateHeader);
            
            const slotsContainer = document.createElement('div');
            slotsContainer.className = 'mb-2';
            
            slots.forEach(slot => {
                const slotElement = document.createElement('div');
                slotElement.className = 'time-slot';
                slotElement.textContent = `${slot.start} - ${slot.end}`;
                slotElement.dataset.date = date;
                slotElement.dataset.start = slot.start;
                slotElement.dataset.end = slot.end;
                slotElement.dataset.price = price;
                
                slotElement.addEventListener('click', function() {
                    this.classList.toggle('selected');
                });
                
                slotsContainer.appendChild(slotElement);
            });
            
            dateContainer.appendChild(slotsContainer);
            container.appendChild(dateContainer);
        });
        
        document.getElementById('bulk-preview-card').style.display = 'block';
    }
    
    // Helper function to calculate time slots
    function calculateTimeSlots(duration, startTime, endTime, breakStart, breakEnd) {
        const slots = [];
        
        // Convert times to minutes since midnight
        const start = timeToMinutes(startTime);
        const end = timeToMinutes(endTime);
        const breakS = breakStart ? timeToMinutes(breakStart) : null;
        const breakE = breakEnd ? timeToMinutes(breakEnd) : null;
        
        // Generate slots
        for (let time = start; time + duration <= end; time += duration) {
            // Skip slots that overlap with break time
            if (breakS !== null && breakE !== null) {
                if ((time >= breakS && time < breakE) || 
                    (time < breakS && time + duration > breakS)) {
                    // Skip this slot as it overlaps with break
                    continue;
                }
            }
            
            slots.push({
                start: minutesToTime(time),
                end: minutesToTime(time + duration)
            });
        }
        
        return slots;
    }
    
    // Helper function to convert time string to minutes
    function timeToMinutes(timeStr) {
        const [hours, minutes] = timeStr.split(':').map(Number);
        return hours * 60 + minutes;
    }
    
    // Helper function to convert minutes to time string
    function minutesToTime(minutes) {
        const hours = Math.floor(minutes / 60);
        const mins = minutes % 60;
        return `${hours.toString().padStart(2, '0')}:${mins.toString().padStart(2, '0')}`;
    }

    // Function to get selected dates based on selection type
    function getSelectedDates() {
        const selectedType = document.querySelector('input[name="date-selection-type"]:checked').id;
        const dates = [];
        
        if (selectedType === 'date-selection-single') {
            // Get dates from multiple date picker
            const dateStr = document.getElementById('bulk-dates-picker').value;
            if (dateStr) {
                const dateParts = dateStr.split(', ');
                dateParts.forEach(part => {
                    dates.push(part);
                });
            }
        } else if (selectedType === 'date-selection-range') {
            // Get dates from range
            const startDate = document.getElementById('range-start-date').value;
            const endDate = document.getElementById('range-end-date').value;
            
            if (startDate && endDate) {
                let currentDate = new Date(startDate);
                const end = new Date(endDate);
                
                while (currentDate <= end) {
                    dates.push(moment(currentDate).format('YYYY-MM-DD'));
                    currentDate.setDate(currentDate.getDate() + 1);
                }
            }
        } else if (selectedType === 'date-selection-weekday') {
            // Get dates based on weekdays
            const startDate = document.getElementById('range-start-date').value;
            const endDate = document.getElementById('range-end-date').value;
            
            if (startDate && endDate) {
                const selectedWeekdays = [];
                document.querySelectorAll('#weekday-container input[type="checkbox"]:checked').forEach(checkbox => {
                    selectedWeekdays.push(parseInt(checkbox.value));
                });
                
                if (selectedWeekdays.length > 0) {
                    let currentDate = new Date(startDate);
                    const end = new Date(endDate);
                    
                    while (currentDate <= end) {
                        const dayOfWeek = currentDate.getDay(); // 0 = Sunday, 1 = Monday, etc.
                        if (selectedWeekdays.includes(dayOfWeek)) {
                            dates.push(moment(currentDate).format('YYYY-MM-DD'));
                        }
                        currentDate.setDate(currentDate.getDate() + 1);
                    }
                }
            }
        }
        
        return dates;
    }

    function checkDateAvailability(date) {
        return new Promise((resolve, reject) => {
            const token = document.getElementById('trainer_token').value;
            const trainerId = document.getElementById('trainer_id').value;
            
            fetch('controller/availability.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    action: 'get',
                    token: token,
                    trainer_id: trainerId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status) {
                    // Check if the date exists in the availabilities
                    const existingAvailability = data.data.find(item => 
                        item.date === date
                    );
                    
                    resolve(existingAvailability || null);
                } else {
                    resolve(null);
                }
            })
            .catch(error => {
                console.error("Error checking availability:", error);
                resolve(null);
            });
        });
    }
    // Function to update selected dates list
    function updateSelectedDatesList(dates) {
        const container = document.getElementById('selected-dates-list');
        
        if (dates.length === 0) {
            container.innerHTML = '<div class="text-muted">No dates selected yet</div>';
            return;
        }
        
        container.innerHTML = '';
        
        dates.forEach(date => {
            const dateItem = document.createElement('div');
            dateItem.className = 'selected-date-item';
            
            const formattedDate = moment(date).format('ddd, MMM D, YYYY');
            
            dateItem.innerHTML = `
                <span>${formattedDate}</span>
                <button class="btn btn-sm btn-outline-danger remove-date" data-date="${date}">
                    <i class="bi bi-x"></i>
                </button>
            `;
            
            container.appendChild(dateItem);
        });
        
        // Add event listeners to remove buttons
        document.querySelectorAll('.remove-date').forEach(button => {
            button.addEventListener('click', function() {
                const dateToRemove = this.dataset.date;
                const bulkDatePicker = document.getElementById('bulk-dates-picker')._flatpickr;
                
                // Remove the date from the flatpickr instance
                const currentDates = bulkDatePicker.selectedDates;
                const filteredDates = currentDates.filter(d => 
                    moment(d).format('YYYY-MM-DD') !== dateToRemove
                );
                
                bulkDatePicker.setDate(filteredDates);
            });
        });
    }


    // Save time slots button
    document.getElementById('save-time-slots').addEventListener('click', function() {
        const selectedDate = document.getElementById('selected-date-display').textContent;
        const selectedSlots = document.querySelectorAll('#time-slots-container .time-slot.selected');
        
        if (selectedSlots.length === 0) {
            alert('Please select at least one time slot to save');
            return;
        }
        
        // Show loading state
        this.disabled = true;
        this.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...';
        
        // First check if date already has availability
        checkDateAvailability(selectedDate)
            .then(existingAvailability => {
                if (existingAvailability) {
                    // Use existing availability
                    return existingAvailability;
                } else {
                    // Create new availability
                    return createTrainerAvailability(selectedDate);
                }
            })
            .then(availability => {
                // Prepare slots data with seconds in time format
                const slots = [];
                selectedSlots.forEach(slot => {
                    slots.push({
                        start_time: slot.dataset.start + ":00",
                        end_time: slot.dataset.end + ":00",
                        duration_minutes: calculateDuration(slot.dataset.start, slot.dataset.end),
                        price: slot.dataset.price
                    });
                });
                
                // Save time slots
                return saveTimeSlots(availability.id, slots);
            })
            .then(result => {
                alert(`Successfully saved ${selectedSlots.length} time slots for ${selectedDate}`);
                // Mark the date as having slots in the calendar
                markDateWithSlots(selectedDate);
            })
            .catch(error => {
                alert('Error: ' + error);
            })
            .finally(() => {
                // Reset button state
                this.disabled = false;
                this.innerHTML = 'Save Time Slots';
            });
    });

    // Bulk save slots button
    document.getElementById('save-time-slots').addEventListener('click', function() {
        const selectedDate = document.getElementById('selected-date-display').textContent;
        const selectedSlots = document.querySelectorAll('#time-slots-container .time-slot.selected');
        
        if (selectedSlots.length === 0) {
            alert('Please select at least one time slot to save');
            return;
        }
        
        // Show loading state
        this.disabled = true;
        this.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...';
        
        // First check if date already has availability
        checkDateAvailability(selectedDate)
            .then(existingAvailability => {
                if (existingAvailability) {
                    // Use existing availability
                    return existingAvailability;
                } else {
                    // Create new availability
                    return createTrainerAvailability(selectedDate);
                }
            })
            .then(availability => {
                // Prepare slots data with seconds in time format
                const slots = [];
                selectedSlots.forEach(slot => {
                    slots.push({
                        start_time: slot.dataset.start + ":00",
                        end_time: slot.dataset.end + ":00",
                        duration_minutes: calculateDuration(slot.dataset.start, slot.dataset.end),
                        price: slot.dataset.price
                    });
                });
                
                // Save time slots
                return saveTimeSlots(availability.id, slots);
            })
            .then(result => {
                alert(`Successfully saved ${selectedSlots.length} time slots for ${selectedDate}`);
                // Mark the date as having slots in the calendar
                markDateWithSlots(selectedDate);
            })
            .catch(error => {
                alert('Error: ' + error);
            })
            .finally(() => {
                // Reset button state
                this.disabled = false;
                this.innerHTML = 'Save Time Slots';
            });
    });
    
    // Updated bulk save slots button
    document.getElementById('bulk-save-slots').addEventListener('click', function() {
        const selectedSlots = document.querySelectorAll('#bulk-preview-container .time-slot.selected');
        
        if (selectedSlots.length === 0) {
            alert('Please select at least one time slot to save');
            return;
        }
        
        // Show loading state
        this.disabled = true;
        this.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...';
        
        // Group slots by date
        const slotsByDate = {};
        selectedSlots.forEach(slot => {
            const date = slot.dataset.date;
            if (!slotsByDate[date]) {
                slotsByDate[date] = [];
            }
            
            slotsByDate[date].push({
                start_time: slot.dataset.start + ":00",
                end_time: slot.dataset.end + ":00",
                duration_minutes: calculateDuration(slot.dataset.start, slot.dataset.end),
                price: slot.dataset.price
            });
        });
        
        // Process each date sequentially
        const dates = Object.keys(slotsByDate);
        let successCount = 0;
        let failureCount = 0;
        let currentIndex = 0;
        
        const processNextDate = () => {
            if (currentIndex >= dates.length) {
                // All dates processed
                const message = `Successfully saved slots for ${successCount} dates.` + 
                    (failureCount > 0 ? ` Failed for ${failureCount} dates.` : '');
                alert(message);
                this.disabled = false;
                this.innerHTML = 'Save All Time Slots';
                return;
            }
            
            const date = dates[currentIndex];
            const slots = slotsByDate[date];
            
            // Check if date already has availability
            checkDateAvailability(date)
                .then(existingAvailability => {
                    if (existingAvailability) {
                        // Use existing availability
                        return existingAvailability;
                    } else {
                        // Create new availability
                        return createTrainerAvailability(date);
                    }
                })
                .then(availability => {
                    return saveTimeSlots(availability.id, slots);
                })
                .then(() => {
                    // Mark the date as having slots in the calendar
                    markDateWithSlots(date);
                    successCount++;
                })
                .catch(error => {
                    console.error(`Error saving slots for ${date}: ${error}`);
                    failureCount++;
                })
                .finally(() => {
                    // Move to next date regardless of success/failure
                    currentIndex++;
                    processNextDate();
                });
        };
        
        processNextDate();
    });

    // Add event listeners to existing remove slot buttons
    document.querySelectorAll('.remove-slot').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('.time-slot-template').remove();
        });
    });
    function createTrainerAvailability(date) {
        return new Promise((resolve, reject) => {
            console.log("Creating availability for date:", date);
            const tokenElement = document.getElementById('trainer_token');
            const trainerIdElement = document.getElementById('trainer_id');
            
            console.log("Token element:", tokenElement);
            console.log("Trainer ID element:", trainerIdElement);
            
            if (!tokenElement || !trainerIdElement) {
                reject("Required hidden fields not found: trainer_token or trainer_id");
                return;
            }
            
            const token = tokenElement.value;
            const trainerId = trainerIdElement.value;
            
            console.log("Token:", token);
            console.log("Trainer ID:", trainerId);
            
            fetch('controller/availability.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    action: 'create',
                    token: token,
                    trainer_id: trainerId,
                    date: date
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status) {
                    resolve(data.data);
                } else {
                    reject(data.message);
                }
            })
            .catch(error => {
                reject('Network error: ' + error);
            });
        });
    }
    
    function saveTimeSlots(availabilityId, slots) {
        return new Promise((resolve, reject) => {
            console.log("Saving time slots for availability ID:", availabilityId);
            console.log("Slots to save:", slots);
            
            const tokenElement = document.getElementById('trainer_token');
            
            if (!tokenElement) {
                reject("Required hidden field not found: trainer_token");
                return;
            }
            
            const token = tokenElement.value;
            console.log("Token:", token);
            
            fetch('controller/timeslot.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    action: 'create_multiple',
                    token: token,
                    trainer_availability_id: availabilityId,
                    slots: slots
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status) {
                    resolve(data.data);
                } else {
                    reject(data.message);
                }
            })
            .catch(error => {
                reject('Network error: ' + error);
            });
        });
    }
    
    // Helper function to calculate duration in minutes
    function calculateDuration(startTime, endTime) {
        const start = timeToMinutes(startTime);
        const end = timeToMinutes(endTime);
        return end - start;
    }
    
    
    // Function to mark dates with slots in the calendar
    function markDateWithSlots(date) {
        const calendar = document.getElementById('availability-calendar')._flatpickr;
        if (calendar) {
            // Add a custom class to the date
            calendar.config.onDayCreate.push(function(dObj, dStr, fp, dayElem) {
                if (dayElem.dateObj.getTime() === new Date(date).getTime()) {
                    dayElem.classList.add('has-time-slots');
                }
            });
            calendar.redraw();
        }
    }
    
    });
    // API Integration for Time Slots
