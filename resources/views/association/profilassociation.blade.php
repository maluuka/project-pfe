<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SolidarityConnect - Profil Association</title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
        <style>
            /* Color Variables based on the provided images */
            :root {
                --color-dark-blue: #1E3A8A;
                --color-light-gray-bg: #E5E7EB;
                --color-white: #FFFFFF;
                --color-text-dark: #111827;
                --color-light-blue-input: #BFDBFE;
                --color-teal: #06B6D4;
                --color-blue-tag: #BFDBFE;
                --color-gray-text: #6B7280;
                --color-dark-blue-text: #1E3A8A;
                --color-green: #4CAF50;
            }

            /* General Body & Reset */
            body {
                font-family: 'Roboto', sans-serif;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                background-color: var(--color-light-gray-bg);
                color: var(--color-text-dark);
                min-height: 100vh;
                display: flex;
                flex-direction: column;
            }

            a {
                text-decoration: none;
                color: inherit;
            }

            /* Header */
            .header {
                background-color: var(--color-dark-blue);
                padding: 15px 40px;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                color: var(--color-white);
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .header .logo {
                font-size: 24px;
                font-weight: 700;
                color: var(--color-white);
            }

            /* Main Content Wrapper */
            .profile-page-wrapper {
                display: flex;
                flex-grow: 1;
                padding: 30px;
                gap: 30px;
            }

            /* Left Panel (Profile Info) */
            .profile-left-panel {
                background-color: var(--color-dark-blue);
                width: 280px;
                min-width: 280px;
                border-radius: 15px;
                padding: 40px 20px;
                display: flex;
                flex-direction: column;
                align-items: center;
                color: var(--color-white);
                flex-shrink: 0;
            }

            .profile-avatar {
                width: 120px;
                height: 120px;
                border-radius: 50%;
                margin-bottom: 30px;
                border: 4px solid var(--color-white);
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 40px;
                font-weight: bold;
                color: var(--color-dark-blue);
            }

            .profile-info {
                width: 100%;
                text-align: left;
                margin-bottom: 40px;
            }

            .profile-info h4 {
                font-size: 18px;
                font-weight: 500;
                margin-bottom: 10px;
                color: var(--color-white);
            }

            .profile-info p {
                font-size: 16px;
                margin-bottom: 25px;
                padding-bottom: 5px;
                border-bottom: 1px dashed var(--color-white);
                color: var(--color-white);
            }

            .profile-info p:last-child {
                margin-bottom: 0;
                border-bottom: none;
            }

            .btn-publish-need {
                display: inline-block;
                background-color: var(--color-white);
                color: var(--color-dark-blue);
                padding: 14px 40px;
                border-radius: 8px;
                font-size: 18px;
                font-weight: 500;
                transition: background-color 0.3s ease, color 0.3s ease;
                width: 80%;
                text-align: center;
            }

            .btn-publish-need:hover {
                background-color: #f0f0f0;
            }

            /* Main Content Area */
            .profile-main-content {
                flex-grow: 1;
                display: flex;
                flex-direction: column;
                gap: 40px;
                padding-right: 20px;
            }

            /* Section Styling */
            .section-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
            }

            .section-header h3 {
                font-size: 28px;
                font-weight: 500;
                color: var(--color-text-dark);
                margin: 0;
            }

            .section-header .view-all-link {
                font-size: 16px;
                font-weight: 500;
                color: var(--color-dark-blue-text);
                transition: text-decoration 0.3s ease;
            }

            .section-header .view-all-link:hover {
                text-decoration: underline;
            }

            .cards-container {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 25px;
            }

            /* Card Styling */
            .card {
                background-color: var(--color-white);
                border-radius: 12px;
                padding: 25px;
                box-shadow: 0 4px 15px rgba(0,0,0,0.08);
                display: flex;
                flex-direction: column;
                height: 100%;
            }

            .need-card {
                position: relative;
            }

            .card-header {
                margin-bottom: 15px;
            }

            .card-title {
                font-size: 20px;
                font-weight: 500;
                color: var(--color-text-dark);
                margin: 0;
                word-break: break-word;
            }

            .card-association-name {
                font-size: 16px;
                color: var(--color-gray-text);
                margin-bottom: 15px;
            }

            .card-description {
                font-size: 15px;
                color: var(--color-gray-text);
                line-height: 1.5;
                margin-bottom: 20px;
                word-wrap: break-word;
                overflow-wrap: break-word;
                white-space: pre-line;
                flex-grow: 1;
            }

            .card-footer {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-top: auto;
            }

            .location-info {
                display: flex;
                align-items: center;
                font-size: 15px;
                color: var(--color-gray-text);
            }

            .location-info::before {
                content: '📍';
                margin-right: 5px;
                font-size: 18px;
            }

            .info-tag {
                background-color: var(--color-blue-tag);
                color: var(--color-dark-blue);
                padding: 6px 12px;
                border-radius: 5px;
                font-size: 14px;
                font-weight: 500;
            }

            .info-tag.urgent {
                background-color: #FFEBEE;
                color: #C62828;
            }

            /* Load More Button */
            .load-more-container {
                text-align: center;
                margin-top: 20px;
            }

            .btn-load-more {
                background-color: var(--color-green);
                color: white;
                border: none;
                padding: 12px 24px;
                border-radius: 6px;
                font-size: 16px;
                font-weight: 500;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .btn-load-more:hover {
                background-color: #3e8e41;
            }

            /* Hidden besoins */
            .hidden-besoin {
                display: none;
            }

            /* Logout Form */
            .logout-form {
                display: inline;
                margin: 0;
                padding: 0;
            }
        
            .logout-form button {
                background: none;
                border: none;
                color: var(--color-white);
                font-weight: 500;
                opacity: 0.8;
                transition: opacity 0.3s ease;
                cursor: pointer;
                font-family: 'Roboto', sans-serif;
                font-size: inherit;
                padding: 0;
            }
        
            .logout-form button:hover {
                opacity: 1;
            }
        
            .no-results {
                grid-column: 1 / -1;
                text-align: center;
                padding: 20px;
                color: var(--color-gray-text);
                font-size: 18px;
            }

            /* Success Alert */
            .alert-success {
                position: fixed;
                top: 20px;
                right: 20px;
                padding: 15px;
                background-color: #d4edda;
                color: #155724;
                border-radius: 5px;
                z-index: 1000;
            }

            /* Responsive Design */
            @media (max-width: 1200px) {
                .profile-page-wrapper {
                    flex-direction: column;
                    align-items: center;
                    padding: 20px;
                }

                .profile-left-panel {
                    width: 100%;
                    max-width: 500px;
                    padding: 30px 20px;
                }

                .profile-main-content {
                    width: 100%;
                    padding-right: 0;
                }
            }

            @media (max-width: 768px) {
                .header {
                    flex-direction: column;
                    padding: 15px 20px;
                    align-items: flex-start;
                }
                .logout-form button {
                    margin-top: 10px;
                    align-self: flex-end;
                }

                .profile-page-wrapper {
                    padding: 15px;
                    gap: 20px;
                }

                .profile-left-panel {
                    padding: 20px 15px;
                }
                .profile-avatar {
                    width: 100px;
                    height: 100px;
                    margin-bottom: 20px;
                }
                .profile-info h4 {
                    font-size: 16px;
                }
                .profile-info p {
                    font-size: 14px;
                    margin-bottom: 15px;
                }
                .btn-publish-need {
                    font-size: 16px;
                    padding: 12px 30px;
                }

                .section-header {
                    flex-direction: column;
                    align-items: flex-start;
                    margin-bottom: 15px;
                }
                .section-header h3 {
                    font-size: 24px;
                    margin-bottom: 10px;
                }
                .section-header .view-all-link {
                    font-size: 14px;
                }

                .cards-container {
                    grid-template-columns: 1fr;
                    gap: 20px;
                }

                .card {
                    padding: 20px;
                }
                .card-title {
                    font-size: 18px;
                }
                .info-tag {
                    font-size: 13px;
                    padding: 5px 10px;
                }
                .card-association-name, .card-description, .location-info {
                    font-size: 14px;
                }
                .btn-load-more {
                    padding: 10px 20px;
                    font-size: 15px;
                }
            }

            @media (max-width: 480px) {
                .header .logo {
                    font-size: 20px;
                }
                .profile-left-panel {
                    padding: 15px;
                }
                .profile-avatar {
                    width: 80px;
                    height: 80px;
                    font-size: 30px;
                }
                .profile-info h4 {
                    font-size: 15px;
                }
                .profile-info p {
                    font-size: 13px;
                }
                .btn-publish-need {
                    padding: 10px 25px;
                    font-size: 15px;
                }
                .section-header h3 {
                    font-size: 20px;
                }
            }
        </style>
    </head>
    <body>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(() => {
                document.querySelector('.alert-success').style.display = 'none';
            }, 3000);
        </script>
        @endif
        
        <header class="header">
            <a href="#" class="logo">SolidarityConnect</a>
            <form action="{{ route('association.logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="logout-link">Déconnexion</button>
            </form>
        </header>
    
        <div class="profile-page-wrapper">
            <div class="profile-left-panel">
                <div class="profile-avatar" style="background-color: {{ $association->color }};">
                    {{ $association->initials }}
                </div>
                <div class="profile-info">
                    <h4>Nom Complet :</h4>
                    <p>{{ $association->nom_complet }}</p>
                    <h4>Email :</h4>
                    <p>{{ $association->email }}</p>
                    <h4>Téléphone :</h4>
                    <p>{{ $association->telephone }}</p>
                </div>
                <a href="{{ route('association.besoin.create') }}" class="btn-publish-need">publier un besoin</a>
            </div>
    
            <div class="profile-main-content">
                <section class="urgent-needs-section">
                    <div class="section-header">
                        <h3>Besoins Urgents</h3>
                        <a href="{{ route('association.besoins.index') }}" class="view-all-link">Voir tous les besoins</a>
                    </div>
                    <div class="cards-container" id="besoins-container">
                        @forelse($urgentNeeds as $index => $need)
                            <div class="card need-card @if($index >= 3) hidden-besoin @endif">
                                <div class="card-header">
                                    <h4 class="card-title">{{ $need->titre }}</h4>
                                </div>
                                <p class="card-association-name">{{ $need->association->nom_complet }}</p>
                                <p class="card-description">{{ $need->description }}</p>
                                <div class="card-footer">
                                    <span class="location-info">{{ $need->association->adresse }}</span>
                                    <span class="info-tag @if($need->status == 'Urgent') urgent @endif">{{ $need->status }}</span>
                                </div>
                            </div>
                        @empty
                            <div class="no-results">
                                <p>Aucun besoin urgent trouvé</p>
                            </div>
                        @endforelse
                    </div>
                    
                    @if(count($urgentNeeds) > 3)
                        <div class="load-more-container">
                            <button id="load-more-besoins" class="btn-load-more">
                                Afficher plus
                            </button>
                        </div>
                    @endif
                </section>
        
                <section class="recent-donations-section">
                    <div class="section-header">
                        <h3>Dons Récents</h3>
                        <a href="{{ route('association.dons.index') }}" class="view-all-link">Voir tous les dons</a>
                    </div>
                    <div class="cards-container">
                        @forelse($recentDonations as $donation)
                            <div class="card donation-card">
                                <span class="status-tag">{{ $donation->statut }}</span>
                                <form action="{{ route('association.interesse', $donation->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-interess">m'interesse</button>
                                </form>
                                <div class="card-image-placeholder">
                                    @if($donation->image)
                                        <img src="{{ asset('storage/' . $donation->image) }}" alt="Image du don">
                                    @else
                                        <span>Image du don</span>
                                    @endif
                                </div>
                                <h4 class="card-title">{{ $donation->titre }}</h4>
                                <p class="card-description">{{ $donation->description }}</p>
                                <div class="card-footer">
                                    <span class="location-info">{{ $donation->localisation }}</span>
                                    <span class="info-tag">{{ $donation->type }}</span>
                                </div>
                            </div>
                        @empty
                            <div class="no-results">
                                <p>Aucun don récent trouvé</p>
                            </div>
                        @endforelse
                    </div>
                </section>
            </div>
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loadMoreBtn = document.getElementById('load-more-besoins');
            if (loadMoreBtn) {
                let visibleCount = 3;
                const totalBesoins = {{ count($urgentNeeds) }};
                
                loadMoreBtn.addEventListener('click', function() {
                    // Show next 3 besoins
                    const hiddenCards = document.querySelectorAll('.hidden-besoin');
                    const toShow = Math.min(3, hiddenCards.length);
                    
                    for (let i = 0; i < toShow; i++) {
                        hiddenCards[i].classList.remove('hidden-besoin');
                    }
                    
                    visibleCount += toShow;
                    
                    // Hide button if all are visible
                    if (visibleCount >= totalBesoins) {
                        loadMoreBtn.style.display = 'none';
                    }
                });
            }
            
            // Auto-hide success message after 3 seconds
            const successMessage = document.querySelector('.alert-success');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 3000);
            }
        });
        </script>
    </body>
</html>