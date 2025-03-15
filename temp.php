<div class="main-content p-4">
                    <h4 class="mb-4">Manage Your Availability & Time Slots</h4>
                    
                    <ul class="nav nav-tabs mb-4" id="availabilityTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="calendar-tab" data-bs-toggle="tab" data-bs-target="#calendar" type="button" role="tab" aria-controls="calendar" aria-selected="true">Calendar View</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="bulk-tab" data-bs-toggle="tab" data-bs-target="#bulk" type="button" role="tab" aria-controls="bulk" aria-selected="false">Bulk Management</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="templates-tab" data-bs-toggle="tab" data-bs-target="#templates" type="button" role="tab" aria-controls="templates" aria-selected="false">Time Templates</button>
                        </li>
                    </ul>
                    
                    <div class="tab-content" id="availabilityTabContent">
                        <!-- Calendar View Tab -->
                        <div class="tab-pane fade show active" id="calendar" role="tabpanel" aria-labelledby="calendar-tab">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Select Dates</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="calendar-container" id="availability-calendar"></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-5">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Selected Date: <span id="selected-date-display">None</span></h5>
                                        </div>
                                        <div class="card-body">
                                            <div id="no-date-selected" class="text-center py-4">
                                                <p class="text-muted">Please select a date from the calendar to manage time slots</p>
                                            </div>
                                            
                                            <div id="date-selected-content" style="display: none;">
                                                <div class="mb-3">
                                                    <label class="form-label">Time Slot Duration</label>
                                                    <select class="form-select" id="time-slot-duration">
                                                        <option value="30">30 minutes</option>
                                                        <option value="45">45 minutes</option>
                                                        <option value="60" selected>1 hour</option>
                                                        <option value="90">1.5 hours</option>
                                                        <option value="120">2 hours</option>
                                                        <option value="custom">Custom</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label class="form-label">Working Hours</label>
                                                    <div class="row g-2">
                                                        <div class="col">
                                                            <input type="text" class="form-control" id="start-time" placeholder="Start Time">
                                                        </div>
                                                        <div class="col">
                                                            <input type="text" class="form-control" id="end-time" placeholder="End Time">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label class="form-label">Break Time (Optional)</label>
                                                    <div class="row g-2">
                                                        <div class="col">
                                                            <input type="text" class="form-control" id="break-start" placeholder="Start Time">
                                                        </div>
                                                        <div class="col">
                                                            <input type="text" class="form-control" id="break-end" placeholder="End Time">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label class="form-label">Price per Time Slot (₹)</label>
                                                    <input type="number" class="form-control" id="slot-price" value="500">
                                                </div>
                                                
                                                <button class="btn btn-primary w-100" id="generate-slots">Generate Time Slots</button>
                                                
                                                <div class="mt-4">
                                                    <h6>Generated Time Slots</h6>
                                                    <div class="time-slots-container" id="time-slots-container">
                                                        <!-- Time slots will be generated here -->
                                                    </div>
                                                </div>
                                                
                                                <div class="d-grid gap-2 mt-3">
                                                    <button class="btn btn-success" id="save-time-slots">Save Time Slots</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Bulk Management Tab -->
                        <div class="tab-pane fade" id="bulk" role="tabpanel" aria-labelledby="bulk-tab">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Bulk Date Selection</h5>
                                </div>
                                <div class="card-body">
                                    <div class="date-selection-type">
                                        <div class="btn-group" role="group">
                                            <input type="radio" class="btn-check" name="date-selection-type" id="date-selection-single" autocomplete="off" checked>
                                            <label class="btn btn-outline-primary" for="date-selection-single">Single Dates</label>
                                            
                                            <input type="radio" class="btn-check" name="date-selection-type" id="date-selection-range" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="date-selection-range">Date Range</label>
                                            
                                            <input type="radio" class="btn-check" name="date-selection-type" id="date-selection-weekday" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="date-selection-weekday">Weekdays</label>
                                        </div>
                                    </div>
                                    
                                    <div id="single-dates-container">
                                        <label class="form-label">Select Multiple Dates</label>
                                        <input type="text" class="form-control" id="bulk-dates-picker" placeholder="Click to select dates">
                                    </div>
                                    
                                    <div id="date-range-container" style="display: none;">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Start Date</label>
                                                <input type="text" class="form-control" id="range-start-date" placeholder="Select start date">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">End Date</label>
                                                <input type="text" class="form-control" id="range-end-date" placeholder="Select end date">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div id="weekday-container" style="display: none;">
                                        <label class="form-label">Select Weekdays</label>
                                        <div class="mb-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="weekday-mon" value="1">
                                                <label class="form-check-label" for="weekday-mon">Mon</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="weekday-tue" value="2">
                                                <label class="form-check-label" for="weekday-tue">Tue</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="weekday-wed" value="3">
                                                <label class="form-check-label" for="weekday-wed">Wed</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="weekday-thu" value="4">
                                                <label class="form-check-label" for="weekday-thu">Thu</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="weekday-fri" value="5">
                                                <label class="form-check-label" for="weekday-fri">Fri</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="weekday-sat" value="6">
                                                <label class="form-check-label" for="weekday-sat">Sat</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="weekday-sun" value="0">
                                                <label class="form-check-label" for="weekday-sun">Sun</label>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Start Date</label>
                                                <input type="text" class="form-control" id="range-start-date" placeholder="Select start date">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">End Date</label>
                                                <input type="text" class="form-control" id="range-end-date" placeholder="Select end date">
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label">For the selected dates, apply the following time slots:</label>
                                        </div>
                                    </div>
                                    
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Time Slot Configuration</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label class="form-label">Time Slot Duration</label>
                                                <select class="form-select" id="bulk-time-slot-duration">
                                                    <option value="30">30 minutes</option>
                                                    <option value="45">45 minutes</option>
                                                    <option value="60" selected>1 hour</option>
                                                    <option value="90">1.5 hours</option>
                                                    <option value="120">2 hours</option>
                                                </select>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label class="form-label">Working Hours</label>
                                                <div class="row g-2">
                                                    <div class="col">
                                                        <input type="text" class="form-control" id="bulk-start-time" placeholder="Start Time">
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" class="form-control" id="bulk-end-time" placeholder="End Time">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label class="form-label">Break Time (Optional)</label>
                                                <div class="row g-2">
                                                    <div class="col">
                                                        <input type="text" class="form-control" id="bulk-break-start" placeholder="Start Time">
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" class="form-control" id="bulk-break-end" placeholder="End Time">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label class="form-label">Price per Time Slot (₹)</label>
                                                <input type="number" class="form-control" id="bulk-slot-price" value="500">
                                            </div>
                                            
                                            <div class="selected-dates mb-3">
                                                <h6>Selected Dates</h6>
                                                <div id="selected-dates-list">
                                                    <div class="text-muted">No dates selected yet</div>
                                                </div>
                                            </div>
                                            
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-primary" id="bulk-generate-slots">Generate Time Slots</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card mb-4" id="bulk-preview-card" style="display: none;">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Preview Generated Time Slots</h5>
                                        </div>
                                        <div class="card-body">
                                            <div id="bulk-preview-container">
                                                <!-- Preview of generated time slots will appear here -->
                                            </div>
                                            
                                            <div class="d-grid gap-2 mt-3">
                                                <button class="btn btn-success" id="bulk-save-slots">Save All Time Slots</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Time Templates Tab -->
                                <div class="tab-pane fade" id="templates" role="tabpanel" aria-labelledby="templates-tab">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Create Time Templates</h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="text-muted">Create reusable time templates to quickly apply to multiple dates</p>
                                            
                                            <div class="mb-3">
                                                <label class="form-label">Template Name</label>
                                                <input type="text" class="form-control" id="template-name" placeholder="e.g., Morning Sessions, Evening Classes">
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label class="form-label">Time Slots</label>
                                                <div id="template-time-slots">
                                                    <div class="time-slot-template">
                                                        <input type="text" class="form-control" placeholder="Start Time" style="width: 120px;">
                                                        <span class="mx-2">to</span>
                                                        <input type="text" class="form-control" placeholder="End Time" style="width: 120px;">
                                                        <span class="mx-2">Price:</span>
                                                        <input type="number" class="form-control" placeholder="₹" style="width: 100px;">
                                                        <button class="btn btn-outline-danger ms-2" type="button">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                                <button class="btn btn-outline-primary mt-2" id="add-template-slot">
                                                    <i class="bi bi-plus"></i> Add Time Slot
                                                </button>
                                            </div>
                                            
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-primary" id="save-template">Save Template</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Saved Templates</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row row-cols-1 row-cols-md-2 g-4" id="saved-templates">
                                                <div class="col">
                                                    <div class="card h-100">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Morning Sessions</h5>
                                                            <ul class="list-group list-group-flush">
                                                                <li class="list-group-item">7:00 AM - 8:00 AM (₹500)</li>
                                                                <li class="list-group-item">8:30 AM - 9:30 AM (₹500)</li>
                                                                <li class="list-group-item">10:00 AM - 11:00 AM (₹600)</li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-sm btn-outline-primary">Apply</button>
                                                            <button class="btn btn-sm btn-outline-secondary">Edit</button>
                                                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card h-100">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Evening Classes</h5>
                                                            <ul class="list-group list-group-flush">
                                                                <li class="list-group-item">5:00 PM - 6:00 PM (₹600)</li>
                                                                <li class="list-group-item">6:30 PM - 7:30 PM (₹700)</li>
                                                                <li class="list-group-item">8:00 PM - 9:00 PM (₹700)</li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button class="btn btn-sm btn-outline-primary">Apply</button>
                                                            <button class="btn btn-sm btn-outline-secondary">Edit</button>
                                                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>