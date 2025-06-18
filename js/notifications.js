// Simple filter functionality
        document.addEventListener('DOMContentLoaded', function() {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const notificationCards = document.querySelectorAll('.notification-card');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    // Remove active class from all buttons
                    filterBtns.forEach(b => b.classList.remove('active'));
                    // Add active class to clicked button
                    this.classList.add('active');

                    const filterText = this.textContent.toLowerCase();

                    notificationCards.forEach(card => {
                        const courseBadge = card.querySelector('.course-badge');
                        const courseBadgeText = courseBadge.textContent.toLowerCase();

                        if (filterText === 'all' || 
                            (filterText === 'bsc courses' && courseBadgeText.includes('bsc')) ||
                            (filterText === 'msc courses' && courseBadgeText.includes('msc')) ||
                            (filterText === 'ba courses' && courseBadgeText.includes('ba')) ||
                            (filterText === 'important' && (courseBadgeText.includes('all courses') || card.querySelector('.notification-icon.important')))) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        });