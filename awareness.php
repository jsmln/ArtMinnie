<?php
// You can add any PHP logic here if needed in the future
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Triple Planetary Crisis</title>
    <!-- Add Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Add Garet font -->
    <style>
        @font-face {
            font-family: 'Garet';
            src: url('assets/fonts/Garet-Book.woff2') format('woff2'),
                 url('assets/fonts/Garet-Book.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'Garet';
            src: url('assets/fonts/Garet-Heavy.woff2') format('woff2'),
                 url('assets/fonts/Garet-Heavy.woff') format('woff');
            font-weight: 700;
            font-style: normal;
        }

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
        }

        body {
            background-color: var(--dark-blue);
            color: var(--text-white);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            transition: background-image 0.5s ease-in-out;
            background-image: url('assets/tripleplanetary1.jpg');
            font-family: 'Montserrat', Arial, sans-serif;
        }

        .container {
            max-width: 100%;
            margin: 0;
            padding: 4rem;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: linear-gradient(rgba(0, 28, 46, 0.85), rgba(0, 28, 46, 0.85));
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
            height: calc(100vh - 8rem);
            position: relative;
        }

        .content-left {
            max-width: 65%;
            padding-top: 2rem;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .content-wrapper {
            flex: 1;
            opacity: 1;
            transition: opacity 0.5s ease-in-out;
            position: relative;
        }

        .content-wrapper.fade-out {
            opacity: 0;
        }

        .main-title {
            font-family: 'Garet', sans-serif;
            color: var(--primary-blue);
            margin-bottom: 2rem;
            line-height: 1;
            font-weight: 700;
            letter-spacing: -0.02em;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .main-title .small-text {
            font-size: 27px;
            display: block;
        }

        .main-title .large-text {
            font-size: 48.8px;
            display: block;
        }

        .main-description {
            font-family: 'Montserrat', Arial, sans-serif;
            font-size: 1.25rem;
            margin-bottom: 1rem;
            max-width: 700px;
            line-height: 1.6;
            transition: all 0.3s ease;
        }

        .main-description strong {
            color: var(--text-white);
            font-weight: 600;
        }

        .sub-description {
            font-family: 'Montserrat', Arial, sans-serif;
            font-size: 1.1rem;
            margin-bottom: 2rem;
            max-width: 700px;
            line-height: 1.5;
            opacity: 0.9;
        }

        /* Button Styles */
        .button-group {
            position: absolute;
            bottom: 4rem;
            left: 0;
            display: flex;
            gap: 1rem;
        }

        .learn-more, .how-to-help {
            font-family: 'Montserrat', Arial, sans-serif;
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
            font-family: 'Garet', sans-serif;
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
            font-family: 'Montserrat', Arial, sans-serif;
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

        /* Modal Styles Update */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.75);
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal.active {
            opacity: 1;
        }

        .modal-content {
            position: relative;
            background: linear-gradient(135deg, #0f2d54 0%, #0c4d50 100%);
            margin: 10vh auto;
            padding: 2.5rem;
            width: 90%;
            max-width: 800px;
            border-radius: 20px;
            color: white;
            transform: translateY(-20px);
            opacity: 0;
            transition: all 0.4s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .modal.active .modal-content {
            transform: translateY(0);
            opacity: 1;
        }

        .modal-content h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 2rem;
            color: white;
            margin-bottom: 1.8rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .modal-content h2 img {
            width: 24px;
            height: 24px;
        }

        .modal-content p {
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            color: white;
        }

        .modal-content strong {
            color: white;
            font-weight: 600;
        }

        .modal-content ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .modal-content li {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.15rem;
            margin-bottom: 1.2rem;
            line-height: 1.5;
            color: white;
            display: flex;
            align-items: flex-start;
        }

        .modal-content li strong {
            color: white;
            font-weight: 600;
            margin-right: 0.5rem;
            min-width: fit-content;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.5rem;
            color: white;
            margin: 2rem 0 1.2rem;
            font-weight: 600;
        }

        .close {
            position: absolute;
            right: 1.2rem;
            top: 1.2rem;
            width: 32px;
            height: 32px;
            background: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            transition: all 0.3s ease;
        }

        .close:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: rotate(90deg);
        }

        /* Footer Styles */
        .footer {
            font-family: 'Montserrat', Arial, sans-serif;
            background: linear-gradient(90deg, #0f2d54 0%, #0c4d50 100%);
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
        @media (min-width: 1600px) {
            .container {
                padding: 6rem;
            }

            .main-content {
                max-width: 1800px;
                height: calc(100vh - 12rem);
            }

            .image-card {
                height: 220px;
            }
        }

        @media (max-height: 800px) {
            .container {
                padding: 2rem;
            }

            .main-content {
                height: calc(100vh - 4rem);
            }

            .button-group {
                bottom: 2rem;
            }
        }

        @media (max-width: 1200px) {
            .container {
                padding: 2rem;
            }

            .main-content {
                gap: 2rem;
            }

            .main-title {
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
            
            .main-title {
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
                <div class="content-wrapper" id="mainContent">
                    <h1 class="main-title">
                        <span class="small-text">THE</span>
                        <span class="large-text">TRIPLE<br>PLANETARY CRISIS</span>
                    </h1>
                    <p class="main-description">
                        The TPC refers to three <strong>interconnected environmental threats</strong> caused by human activity: <strong>Pollution, Climate Change, and Biodiversity Loss</strong>.
                </p>
                <p class="sub-description">
                        These problems might sound overwhelming, but knowledge is power! Keep reading to uncover the causes, impacts, and—most importantly—<strong>how YOU can make a difference</strong>.
                    </p>
                </div>

                <!-- Pollution Content -->
                <div class="content-wrapper" id="pollutionContent" style="display: none;">
                    <h1 class="main-title">
                        <span class="large-text">Pollution</span>
                    </h1>
                    <p class="main-description">
                        Pollution exists in many forms—air, water, soil, and plastic waste. Factories, vehicles, and improper waste disposal introduce harmful chemicals into our surroundings. Burning fossil fuels (coal, oil, gas) releases pollutants that poison the air we breathe and disrupt ecosystems.
                    </p>
                </div>

                <!-- Climate Change Content -->
                <div class="content-wrapper" id="climateContent" style="display: none;">
                    <h1 class="main-title">
                        <span class="large-text">Climate Change</span>
                    </h1>
                    <p class="main-description">
                        Climate change results from <strong>greenhouse gases</strong>—mainly from burning fossil fuels—which trap heat in the atmosphere, leading to a warming Earth, rising sea levels, and extreme weather patterns.
                    </p>
                </div>

                <!-- Biodiversity Loss Content -->
                <div class="content-wrapper" id="biodiversityContent" style="display: none;">
                    <h1 class="main-title">
                        <span class="large-text">Biodiversity Loss</span>
                    </h1>
                    <p class="main-description">
                        Nature thrives on balance, but human activities disrupt ecosystems, leading to the <strong>loss of plant and animal species at alarming rates</strong>. Deforestation and pollution force countless species to <strong>struggle for survival</strong>.
                    </p>
                </div>

                <div class="button-group">
                    <button class="learn-more">Learn more ≫</button>
                    <button class="how-to-help">
                        <img src="assets/globe-icon.jpg" alt="Globe" class="globe-icon">
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

    <!-- Learn More Modal -->
    <div class="modal" id="learnMoreModal">
        <div class="modal-content">
            <button class="close">×</button>
            <h2>What's Really Happening to Our Planet?</h2>
            <p>Imagine waking up to skies thick with smog, oceans choked with plastic, and forests reduced to barren wastelands. <strong>This isn't science fiction—it's our reality.</strong></p>
            <p>Pollution, climate change, and biodiversity loss are pushing Earth to its limits. Together, these crises form the <strong>Triple Planetary Crisis (TPC)</strong>—an urgent environmental challenge that affects everyone, from bustling cities to remote villages.</p>
            <p>But here's the good news: <strong>we still have time to act!</strong></p>
        </div>
    </div>

    <!-- Pollution Modal -->
    <div class="modal" id="pollutionModal">
        <div class="modal-content">
            <button class="close">×</button>
            <h2>🚨 Causes of Pollution</h2>
            <ul>
                <li>Heavy reliance on fossil fuels for energy and transportation</li>
                <li>Industrial waste dumping and improper waste management</li>
                <li>Excessive plastic use and lack of recycling</li>
            </ul>
            <div class="section-title">💥 Impacts of Pollution</div>
            <ul>
                <li>Human Health: Causes respiratory diseases, water contamination, and other health problems.</li>
                <li>Economic Burden: Pollution-related illnesses increase healthcare costs and reduce productivity.</li>
                <li>Environmental Damage: Toxic substances seep into soil and water, harming wildlife and crops.</li>
            </ul>
        </div>
    </div>

    <!-- Climate Change Modal -->
    <div class="modal" id="climateModal">
        <div class="modal-content">
            <button class="close">×</button>
            <h2>🔥 Causes of Climate Change</h2>
            <ul>
                <li>Burning fossil fuels like coal, oil, and gas for energy.</li>
                <li>Deforestation for land and industry.</li>
                <li>Excessive emissions from vehicles, factories, and power plants.</li>
                <li>Unsustainable farming and waste.</li>
            </ul>
            <div class="section-title">🌍 Impacts of Climate Change</div>
            <ul>
                <li>More frequent storms, droughts, and heat waves.</li>
                <li>Rising sea levels threatening coastal communities.</li>
                <li>Disrupted agriculture and food supply.</li>
                <li>Warmer temperatures accelerating the spread of harmful bacteria.</li>
            </ul>
        </div>
    </div>

    <!-- Biodiversity Loss Modal -->
    <div class="modal" id="biodiversityModal">
        <div class="modal-content">
            <button class="close">×</button>
            <h2>⭕ Causes of Biodiversity Loss</h2>
            <ul>
                <li>Land clearing for mining and energy production.</li>
                <li>Pollution destroying habitats and food sources.</li>
                <li>Overexploitation of natural resources without restoration efforts.</li>
            </ul>
            <div class="section-title">🌱 Impacts of Biodiversity Loss</div>
            <ul>
                <li>Ecosystem Collapse: Loss of essential species weakens food chains and disrupts nature's balance.</li>
                <li>Declining Natural Resources: Fewer fish, plants, and animals for food and medicine.</li>
                <li>Disrupted agriculture and food supply.</li>
                <li>Reduced Climate Resilience: Less biodiversity makes it harder for nature to adapt to climate change.</li>
            </ul>
        </div>
    </div>

    <!-- How to Help Modal -->
    <div class="modal" id="howToHelpModal">
        <div class="modal-content">
            <button class="close">×</button>
            <h2>Ways to Combat the Triple Planetary Crisis</h2>
            <ul>
                <li><strong>Reduce Carbon Footprint:</strong> Choose sustainable transportation, energy-efficient appliances, and renewable energy sources</li>
                <li><strong>Conserve Energy:</strong> Turn off unused electronics and lights; consider solar panels for your home</li>
                <li><strong>Protect Habitats:</strong> Participate in reforestation and conservation projects</li>
                <li><strong>Support Sustainable Practices:</strong> Promote eco-friendly farming and fishing</li>
                <li><strong>Minimize Plastic Usage:</strong> Opt for reusable items like eco-bags and stainless containers</li>
                <li><strong>Dispose of Waste Responsibly:</strong> Recycle, compost, and properly discard hazardous waste</li>
                <li><strong>Back Eco-Friendly Industries:</strong> Support businesses and policies that reduce pollution</li>
                <li><strong>Raise Awareness:</strong> Share knowledge and advocate for green initiatives</li>
                <li><strong>Engage in Environmental Campaigns:</strong> Take action locally or globally</li>
            </ul>
        </div>
    </div>

    <div class="footer">
        2025 ReGenEarth | Join the movement today!
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageCards = document.querySelectorAll('.image-card');
            const mainContent = document.getElementById('mainContent');
            const pollutionContent = document.getElementById('pollutionContent');
            const climateContent = document.getElementById('climateContent');
            const biodiversityContent = document.getElementById('biodiversityContent');
            const learnMoreBtn = document.querySelector('.learn-more');
            const howToHelpBtn = document.querySelector('.how-to-help');
            const learnMoreModal = document.getElementById('learnMoreModal');
            const howToHelpModal = document.getElementById('howToHelpModal');
            const body = document.querySelector('body');

            let currentSection = 'main';

            async function updateContent(section) {
                // Add fade out effect
                const currentContent = document.querySelector('.content-wrapper[style="display: block"]');
                if (currentContent) {
                    currentContent.classList.add('fade-out');
                    await new Promise(resolve => setTimeout(resolve, 500));
                }

                // Hide all content first
                document.querySelectorAll('.content-wrapper').forEach(content => {
                    content.style.display = 'none';
                    content.classList.remove('fade-out');
                });

                // Show selected content with fade in
                let targetContent;
                if (section === 'main') {
                    targetContent = mainContent;
                    body.style.backgroundImage = "url('assets/tripleplanetary1.jpg')";
                } else if (section === 'pollution') {
                    targetContent = pollutionContent;
                    body.style.backgroundImage = "url('assets/pollution1.jpg')";
                } else if (section === 'climate') {
                    targetContent = climateContent;
                    body.style.backgroundImage = "url('assets/climate_change1.jpg')";
                } else if (section === 'biodiversity') {
                    targetContent = biodiversityContent;
                    body.style.backgroundImage = "url('assets/bioloss1.jpg')";
                }

                if (targetContent) {
                    targetContent.style.display = 'block';
                    await new Promise(resolve => setTimeout(resolve, 50));
                    targetContent.classList.remove('fade-out');
                }

                currentSection = section;
            }

            function attachCloseHandlers() {
                document.querySelectorAll('.close').forEach(closeBtn => {
                    closeBtn.addEventListener('click', () => {
                        const modal = closeBtn.closest('.modal');
                modal.classList.remove('active');
                setTimeout(() => {
                    modal.style.display = 'none';
                        }, 300);
                    });
                });
            }

            function showLearnMoreContent() {
                const modalContent = learnMoreModal.querySelector('.modal-content');
                
                // Clear existing content
                modalContent.innerHTML = '<button class="close">×</button>';

                if (currentSection === 'main') {
                    modalContent.innerHTML += `
                        <h2>What's Really Happening to Our Planet?</h2>
                        <p>Imagine waking up to skies thick with smog, oceans choked with plastic, and forests reduced to barren wastelands. <strong>This isn't science fiction—it's our reality.</strong></p>
                        <p>Pollution, climate change, and biodiversity loss are pushing Earth to its limits. Together, these crises form the <strong>Triple Planetary Crisis (TPC)</strong>—an urgent environmental challenge that affects everyone, from bustling cities to remote villages.</p>
                        <p>But here's the good news: <strong>we still have time to act!</strong></p>
                    `;
                } else if (currentSection === 'pollution') {
                    modalContent.innerHTML += `
                        <h2>🚨 Causes of Pollution</h2>
                        <ul>
                            <li>Heavy reliance on fossil fuels for energy and transportation</li>
                            <li>Industrial waste dumping and improper waste management</li>
                            <li>Excessive plastic use and lack of recycling</li>
                        </ul>
                        <div class="section-title">💥 Impacts of Pollution</div>
                        <ul>
                            <li>Human Health: Causes respiratory diseases, water contamination, and other health problems.</li>
                            <li>Economic Burden: Pollution-related illnesses increase healthcare costs and reduce productivity.</li>
                            <li>Environmental Damage: Toxic substances seep into soil and water, harming wildlife and crops.</li>
                        </ul>
                    `;
                } else if (currentSection === 'climate') {
                    modalContent.innerHTML += `
                        <h2>🔥 Causes of Climate Change</h2>
                        <ul>
                            <li>Burning fossil fuels like coal, oil, and gas for energy.</li>
                            <li>Deforestation for land and industry.</li>
                            <li>Excessive emissions from vehicles, factories, and power plants.</li>
                            <li>Unsustainable farming and waste.</li>
                        </ul>
                        <div class="section-title">🌍 Impacts of Climate Change</div>
                        <ul>
                            <li>More frequent storms, droughts, and heat waves.</li>
                            <li>Rising sea levels threatening coastal communities.</li>
                            <li>Disrupted agriculture and food supply.</li>
                            <li>Warmer temperatures accelerating the spread of harmful bacteria.</li>
                        </ul>
                    `;
                } else if (currentSection === 'biodiversity') {
                    modalContent.innerHTML += `
                        <h2>⭕ Causes of Biodiversity Loss</h2>
                        <ul>
                            <li>Land clearing for mining and energy production.</li>
                            <li>Pollution destroying habitats and food sources.</li>
                            <li>Overexploitation of natural resources without restoration efforts.</li>
                        </ul>
                        <div class="section-title">🌱 Impacts of Biodiversity Loss</div>
                        <ul>
                            <li>Ecosystem Collapse: Loss of essential species weakens food chains and disrupts nature's balance.</li>
                            <li>Declining Natural Resources: Fewer fish, plants, and animals for food and medicine.</li>
                            <li>Disrupted agriculture and food supply.</li>
                            <li>Reduced Climate Resilience: Less biodiversity makes it harder for nature to adapt to climate change.</li>
                        </ul>
                    `;
                }
                
                // Reattach close button handlers after updating content
                attachCloseHandlers();
            }

            imageCards.forEach(card => {
                card.addEventListener('click', () => {
                    const category = card.dataset.category;
                    if (currentSection === category) {
                        updateContent('main');
                    } else {
                        updateContent(category);
                    }
                });
            });

            // Learn More button click handler
            learnMoreBtn.addEventListener('click', () => {
                showLearnMoreContent();
                learnMoreModal.style.display = 'block';
                setTimeout(() => learnMoreModal.classList.add('active'), 10);
            });

            // How to Help button click handler
            howToHelpBtn.addEventListener('click', () => {
                howToHelpModal.style.display = 'block';
                setTimeout(() => howToHelpModal.classList.add('active'), 10);
            });

            // Initial attachment of close handlers
            attachCloseHandlers();

            // Click outside modal to close
            window.addEventListener('click', (e) => {
                if (e.target.classList.contains('modal')) {
                    e.target.classList.remove('active');
                    setTimeout(() => {
                        e.target.style.display = 'none';
                    }, 300);
                }
            });

            // Initialize with main content
            updateContent('main');
        });
    </script>
</body>
</html>
