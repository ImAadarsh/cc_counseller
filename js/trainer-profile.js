$(document).ready(function() {
    // Load trainer specializations
    loadSpecializations();
    
    // Add specialization
    $('#add-specialization').on('click', function() {
        const specialization = $('#new_specialization').val().trim();
        
        if (specialization === '') {
            alert('Please enter a specialization');
            return;
        }
        
        $.ajax({
            url: 'controller/specialization.php',
            type: 'POST',
            data: {
                action: 'add',
                specialization: specialization
            },
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    // Clear input field
                    $('#new_specialization').val('');
                    
                    // Reload specializations
                    loadSpecializations();
                } else {
                    alert(response.message);
                }
            },
            error: function() {
                alert('An error occurred while adding the specialization');
            }
        });
    });
    
    // Delete profile image
    $('#delete-profile-img').on('click', function() {
        if (confirm('Are you sure you want to delete your profile image?')) {
            // Here you would typically make an API call to delete the image
            // For now, we'll just show an alert
            alert('Profile image deleted');
        }
    });
    
    // Delete hero image
    $('#delete-hero-img').on('click', function() {
        if (confirm('Are you sure you want to delete your hero image?')) {
            // Here you would typically make an API call to delete the image
            // For now, we'll just show an alert
            alert('Hero image deleted');
        }
    });
    
    // Handle specialization deletion (delegated event)
    $(document).on('click', '.delete-specialization', function() {
        const specializationId = $(this).data('id');
        
        if (confirm('Are you sure you want to delete this specialization?')) {
            $.ajax({
                url: 'controller/specialization.php',
                type: 'POST',
                data: {
                    action: 'delete',
                    specialization_id: specializationId
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status) {
                        // Reload specializations
                        loadSpecializations();
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert('An error occurred while deleting the specialization');
                }
            });
        }
    });
    
    // Function to load specializations
    function loadSpecializations() {
        $.ajax({
            url: 'controller/specialization.php',
            type: 'POST',
            data: {
                action: 'get'
            },
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    const specializations = response.data;
                    const container = $('#specializations-container');
                    
                    // Clear container
                    container.empty();
                    
                    if (specializations.length === 0) {
                        $('#no-specializations').show();
                    } else {
                        $('#no-specializations').hide();
                        
                        // Create specialization items
                        specializations.forEach(function(spec) {
                            const item = $('<div class="dash-input-wrapper mb-20">' +
                                '<div class="d-flex justify-content-between align-items-center">' +
                                '<span>' + spec.specialization + '</span>' +
                                '<button type="button" class="delete-specialization btn btn-sm btn-outline-danger" data-id="' + spec.id + '">' +
                                '<i class="bi bi-trash"></i>' +
                                '</button>' +
                                '</div>' +
                                '</div>');
                            
                            container.append(item);
                        });
                    }
                } else {
                    alert(response.message);
                }
            },
            error: function() {
                alert('An error occurred while loading specializations');
            }
        });
    }
});
