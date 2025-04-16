<?php
// You can add any PHP logic here if needed in the future
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Triple Planetary Crisis</title>
    <style>
        /* Global Styles */
        :root {
            --primary-blue: #00a2ff;
            --dark-blue: #001c2e;
            --modal-bg: #001c2e;
            --text-white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', Arial, sans-serif;
        }

        body {
            background-color: var(--dark-blue);
            color: var(--text-white);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        .container {
            max-width: 100%;
            margin: 0;
            padding: 4rem;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: linear-gradient(rgba(0, 28, 46, 0.85), rgba(0, 28, 46, 0.85)), url('assets/background.jpg');
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .main-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 4rem;
            flex: 1;
            max-width: 1400px;
            margin: 0 auto;
        }

        .content-left {
            max-width: 65%;
            padding-top: 2rem;
        }

        .title {
            font-size: 4.5rem;
            color: var(--primary-blue);
            margin-bottom: 2rem;
            line-height: 1;
            font-weight: 700;
            letter-spacing: -0.02em;
            text-transform: uppercase;
        }

        .description {
            font-size: 1.25rem;
            margin-bottom: 1rem;
            max-width: 700px;
            line-height: 1.5;
        }

        .description strong {
            color: var(--primary-blue);
            font-weight: 600;
        }

        .sub-description {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            max-width: 700px;
            line-height: 1.5;
            opacity: 0.9;
        }

        /* Button Styles */
        .button-group {
            display: flex;
            gap: 1rem;
            margin-top: 3rem;
        }

        .learn-more, .how-to-help {
            padding: 1rem 2rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1.1rem;
            font-weight: 500;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .learn-more {
            background-color: var(--primary-blue);
            color: white;
        }

        .learn-more:hover {
            background-color: #0088d6;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 162, 255, 0.3);
        }

        .how-to-help {
            background-color: rgba(0, 162, 255, 0.1);
            color: var(--primary-blue);
            border: 2px solid var(--primary-blue);
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .how-to-help:hover {
            background-color: rgba(0, 162, 255, 0.2);
            transform: translateY(-2px);
        }

        .globe-icon {
            width: 24px;
            height: 24px;
            filter: brightness(0) saturate(100%) invert(47%) sepia(98%) saturate(1726%) hue-rotate(176deg) brightness(102%) contrast(105%);
        }

        /* Image Grid Styles */
        .image-grid {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            max-width: 35%;
            margin-top: 2rem;
        }

        .image-card {
            position: relative;
            cursor: pointer;
            overflow: hidden;
            border-radius: 10px;
            aspect-ratio: 16/9;
            height: 180px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .image-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .image-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .image-card:hover img {
            transform: scale(1.1);
        }

        .image-label {
            position: absolute;
            bottom: 2.5rem;
            left: 1.2rem;
            color: white;
            font-size: 1.4rem;
            font-weight: 600;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            transition: transform 0.3s ease;
            z-index: 2;
        }

        .subtitle {
            position: absolute;
            bottom: 1.2rem;
            left: 1.2rem;
            color: var(--primary-blue);
            font-size: 1rem;
            font-weight: 500;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
            transition: transform 0.3s ease;
            z-index: 2;
        }

        .image-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 50%;
            background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
            transition: opacity 0.3s ease;
        }

        .image-card:hover::after {
            opacity: 0.9;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.8);
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal.active {
            opacity: 1;
        }

        .modal-content {
            position: relative;
            background-color: var(--modal-bg);
            margin: 5% auto;
            padding: 3rem;
            width: 90%;
            max-width: 800px;
            border-radius: 15px;
            color: white;
            transform: translateY(-20px);
            opacity: 0;
            transition: all 0.4s ease;
            box-shadow: 0 15px 30px rgba(0,0,0,0.3);
        }

        .modal.active .modal-content {
            transform: translateY(0);
            opacity: 1;
        }

        .close {
            position: absolute;
            right: 1.5rem;
            top: 1.5rem;
            font-size: 2rem;
            cursor: pointer;
            color: white;
            opacity: 0.8;
            transition: all 0.3s ease;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: rgba(255,255,255,0.1);
        }

        .close:hover {
            opacity: 1;
            background-color: rgba(255,255,255,0.2);
            transform: rotate(90deg);
        }

        .modal h2 {
            color: var(--primary-blue);
            margin-bottom: 1.5rem;
            font-size: 2rem;
            font-weight: 600;
        }

        .modal p {
            margin-bottom: 1.2rem;
            line-height: 1.6;
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .modal ul {
            list-style-position: inside;
            margin-bottom: 2rem;
        }

        .modal li {
            margin-bottom: 1rem;
            line-height: 1.5;
            font-size: 1.1rem;
            opacity: 0.9;
            padding-left: 1rem;
            position: relative;
        }

        .modal li::before {
            content: '•';
            color: var(--primary-blue);
            position: absolute;
            left: 0;
            font-weight: bold;
        }

        /* Footer Styles */
        .footer {
            background-color: rgba(0, 162, 255, 0.1);
            color: white;
            text-align: center;
            padding: 1rem;
            width: 100%;
            position: fixed;
            bottom: 0;
            font-size: 1rem;
            letter-spacing: 0.5px;
            backdrop-filter: blur(10px);
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .container {
                padding: 2rem;
            }

            .main-content {
                gap: 2rem;
            }

            .title {
                font-size: 3.5rem;
            }
        }

        @media (max-width: 768px) {
            .main-content {
                flex-direction: column;
            }
            
            .content-left {
                max-width: 100%;
            }
            
            .image-grid {
                max-width: 100%;
                flex-direction: row;
            }
            
            .image-card {
                width: calc(33.33% - 0.5rem);
                height: 150px;
            }
            
            .title {
                font-size: 3rem;
            }

            .button-group {
                flex-direction: column;
            }

            .modal-content {
                margin: 10% auto;
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="main-content" id="main-content">
            <div class="content-left">
                <h1 class="title">THE<br>TRIPLE<br>PLANETARY CRISIS</h1>
                <p class="description">
                    The TPC refers to three interconnected environmental threats caused by human activity: 
                    <strong>Pollution, Climate Change, and Biodiversity Loss</strong>.
                </p>
                <p class="sub-description">
                    These problems might sound overwhelming, but knowledge is power! Keep reading to uncover the causes, impacts, and—most importantly—how YOU can make a difference.
                </p>
                <div class="button-group">
                    <button class="learn-more">Learn more ≫</button>
                    <button class="how-to-help">
                        <img src="assets/globe-icon.png" alt="Globe" class="globe-icon">
                        How to help
                    </button>
                </div>
            </div>

            <div class="image-grid">
                <div class="image-card" data-category="pollution">
                    <img src="assets/pollution1.jpg" alt="Pollution">
                    <div class="image-label">Pollution</div>
                    <div class="subtitle">A toxic legacy</div>
                </div>
                <div class="image-card" data-category="climate">
                    <img src="assets/climate_change1.jpg" alt="Climate Change">
                    <div class="image-label">Climate Change</div>
                    <div class="subtitle">A Warming World</div>
                </div>
                <div class="image-card" data-category="biodiversity">
                    <img src="assets/bioloss1.jpg" alt="Biodiversity Loss">
                    <div class="image-label">Biodiversity Loss</div>
                    <div class="subtitle">A Silent Disaster</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Learn More -->
    <div class="modal" id="learnMoreModal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>What's Really Happening to Our Planet?</h2>
            <p>Imagine waking up to skies thick with smog, oceans choked with plastic, and forests reduced to barren wastelands. This isn't science fiction—it's our reality.</p>
            <p>Pollution, climate change, and biodiversity loss are pushing Earth to its limits. Together, these crises form the Triple Planetary Crisis (TPC)—an urgent environmental challenge that affects everyone, from bustling cities to remote villages.</p>
            <p>But here's the good news: we still have time to act!</p>
        </div>
    </div>

    <!-- Modal for How to Help -->
    <div class="modal" id="howToHelpModal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Ways to Combat the Triple Planetary Crisis</h2>
            <ul>
                <li>Reduce Carbon Footprint: Choose sustainable transportation, energy-efficient appliances, and renewable energy sources</li>
                <li>Conserve Energy: Turn off unused electronics and lights; consider solar panels for your home</li>
                <li>Protect Habitats: Participate in reforestation and conservation projects</li>
                <li>Support Sustainable Practices: Promote eco-friendly farming and fishing</li>
                <li>Minimize Plastic Usage: Opt for reusable items like eco-bags and stainless containers</li>
                <li>Dispose of Waste Responsibly: Recycle, compost, and properly discard hazardous waste</li>
                <li>Back Eco-Friendly Industries: Support businesses and policies that reduce pollution</li>
                <li>Raise Awareness: Share knowledge and advocate for green initiatives</li>
                <li>Engage in Environmental Campaigns: Take action locally or globally</li>
            </ul>
        </div>
    </div>

    <!-- Category Modals -->
    <div class="modal category-modal" id="pollutionModal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>🚨 Causes of Pollution</h2>
            <ul>
                <li>Heavy reliance on fossil fuels for energy and transportation</li>
                <li>Industrial waste dumping and improper waste management</li>
                <li>Excessive plastic use and lack of recycling</li>
            </ul>
            <h2>💥 Impacts of Pollution</h2>
            <ul>
                <li>Human Health: Causes respiratory diseases, water contamination, and other health problems.</li>
                <li>Economic Burden: Pollution-related illnesses increase healthcare costs and reduce productivity.</li>
                <li>Environmental Damage: Toxic substances seep into soil and water, harming wildlife and crops.</li>
            </ul>
        </div>
    </div>

    <div class="modal category-modal" id="climateModal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>🔥 Causes of Climate Change</h2>
            <ul>
                <li>Burning fossil fuels like coal, oil, and gas for energy.</li>
                <li>Deforestation for land and industry.</li>
                <li>Excessive emissions from vehicles, factories, and power plants.</li>
                <li>Unsustainable farming and waste.</li>
            </ul>
            <h2>🌍 Impacts of Climate Change</h2>
            <ul>
                <li>More frequent storms, droughts, and heat waves.</li>
                <li>Rising sea levels threatening coastal communities.</li>
                <li>Disrupted agriculture and food supply.</li>
                <li>Warmer temperatures accelerating the spread of harmful bacteria.</li>
            </ul>
        </div>
    </div>

    <div class="modal category-modal" id="biodiversityModal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>⭕ Causes of Biodiversity Loss</h2>
            <ul>
                <li>Land clearing for mining and energy production.</li>
                <li>Pollution destroying habitats and food sources.</li>
                <li>Overexploitation of natural resources without restoration efforts.</li>
            </ul>
            <h2>🌱 Impacts of Biodiversity Loss</h2>
            <ul>
                <li>Ecosystem Collapse: Loss of essential species weakens food chains and disrupts nature's balance.</li>
                <li>Declining Natural Resources: Fewer fish, plants, and animals for food and medicine.</li>
                <li>Disrupted agriculture and food supply.</li>
                <li>Reduced Climate Resilience: Less biodiversity makes it harder for nature to adapt to climate change.</li>
            </ul>
        </div>
    </div>

    <div class="footer">
        2025 ReGenEarth | Join the movement today!
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get DOM elements
            const learnMoreBtn = document.querySelector('.learn-more');
            const howToHelpBtn = document.querySelector('.how-to-help');
            const imageCards = document.querySelectorAll('.image-card');
            const modals = document.querySelectorAll('.modal');
            const closeButtons = document.querySelectorAll('.close');

            // Modal handling functions
            function openModal(modalId) {
                const modal = document.getElementById(modalId);
                modal.style.display = 'block';
                // Force reflow
                modal.offsetHeight;
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }

            function closeModal(modal) {
                modal.classList.remove('active');
                setTimeout(() => {
                    modal.style.display = 'none';
                    document.body.style.overflow = 'auto';
                }, 300); // Match the transition duration
            }

            // Add hover effects for image cards
            imageCards.forEach(card => {
                const label = card.querySelector('.image-label');
                const subtitle = card.querySelector('.subtitle');
                
                card.addEventListener('mouseenter', () => {
                    label.style.transform = 'translateY(-5px)';
                    subtitle.style.transform = 'translateY(-5px)';
                });
                
                card.addEventListener('mouseleave', () => {
                    label.style.transform = 'translateY(0)';
                    subtitle.style.transform = 'translateY(0)';
                });
            });

            // Event Listeners
            learnMoreBtn.addEventListener('click', () => openModal('learnMoreModal'));
            howToHelpBtn.addEventListener('click', () => openModal('howToHelpModal'));

            // Add click events for image cards
            imageCards.forEach(card => {
                card.addEventListener('click', () => {
                    const category = card.dataset.category;
                    openModal(`${category}Modal`);
                });
            });

            // Close button functionality
            closeButtons.forEach(button => {
                button.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const modal = button.closest('.modal');
                    closeModal(modal);
                });
            });

            // Close modal when clicking outside
            window.addEventListener('click', (e) => {
                modals.forEach(modal => {
                    if (e.target === modal) {
                        closeModal(modal);
                    }
                });
            });

            // Close modal with Escape key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    modals.forEach(modal => {
                        if (modal.style.display === 'block') {
                            closeModal(modal);
                        }
                    });
                }
            });

            // Prevent modal content clicks from closing the modal
            document.querySelectorAll('.modal-content').forEach(content => {
                content.addEventListener('click', (e) => {
                    e.stopPropagation();
                });
            });
        });
    </script>
</body>
</html>
