<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SolidarityConnect - Nouveau Besoin</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Color Variables based on the provided images */
        :root {
            --color-dark-blue: #1E3A8A; /* Header, left panel, button, text */
            --color-light-gray-bg: #E5E7EB; /* Main page background */
            --color-white: #FFFFFF; /* Form background, button text */
            --color-text-dark: #111827; /* General text color */
            --color-light-blue-input: #BFDBFE; /* Input field background */
            --color-teal: #06B6D4; /* Not directly used for major elements here, but from previous context */
            --color-gray-text: #6B7280; /* Secondary text like descriptions */
            --color-dark-blue-text: #1E3A8A; /* For input text within light blue fields, and labels */
            --color-border-gray: #D1D5DB; /* Light border for dropdown */
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
    text-decoration: none;
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

        .header .logout-link {
            color: var(--color-white);
            font-weight: 500;
            opacity: 0.8;
            transition: opacity 0.3s ease;
        }

        .header .logout-link:hover {
            opacity: 1;
        }

        /* Main Content Wrapper */
        .page-wrapper {
            display: flex;
            flex-grow: 1;
            padding: 30px;
            gap: 30px;
        }

        /* Left Panel (Profile Info) */
        .left-panel {
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
            background-color: var(--color-light-gray-bg); /* Placeholder for avatar */
            border-radius: 50%;
            margin-bottom: 30px;
            border: 4px solid var(--color-white); /* White border around avatar */
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 40px;
            font-weight: 500;
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

        .btn-retour {
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
            margin-top: auto; /* Push to bottom */
        }

        .btn-retour:hover {
            background-color: #f0f0f0;
            color: var(--color-dark-blue);
        }

        /* Main Form Container */
        .form-main-container {
            flex-grow: 1; /* Allow to take available space */
            background-color: var(--color-white);
            color: var(--color-text-dark);
            border-radius: 15px;
            padding: 40px 60px; /* Ample padding */
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            align-items: flex-start; /* Align contents to the left */
        }

        .form-main-container h3 {
            font-size: 28px;
            font-weight: 500;
            margin-bottom: 30px;
            color: var(--color-text-dark);
        }

        .form-main-container .section-title {
            font-size: 24px;
            font-weight: 500;
            margin-bottom: 25px;
            color: var(--color-text-dark);
        }

        /* Form Group Styling (adjusted for separate label and input with placeholder) */
        .input-group { /* Renamed from form-group to avoid confusion with the form-group of the label+input combination */
            margin-bottom: 25px;
            width: 100%; /* Take full width */
        }

        .input-group > label { /* Label that sits above the input field */
            display: block; /* Make label a block element */
            font-size: 18px;
            font-weight: 500;
            color: var(--color-dark-blue-text); /* Color for the labels as seen in image */
            margin-bottom: 15px; /* Space between label and the input box */
        }

        .input-field-box { /* The light blue box containing the input/textarea */
            background-color: var(--color-light-blue-input);
            border-radius: 8px;
            padding: 15px 20px; /* Padding inside the light blue box */
            width: 100%;
            box-sizing: border-box; /* Include padding in width */
            display: flex; /* Helps with alignment if content varies */
            align-items: center;
        }

        .input-field-box input,
        .input-field-box textarea {
            width: 100%; /* Take full width of its container (input-field-box) */
            padding: 0; /* Remove default padding as input-field-box handles it */
            border: none;
            background-color: transparent;
            color: var(--color-dark-blue-text); /* Input text color */
            font-size: 18px;
            outline: none;
            line-height: 1.5;
            resize: vertical; /* Allow textarea to be resized vertically */
        }

        /* Placeholder text color */
        .input-field-box input::placeholder,
        .input-field-box textarea::placeholder {
            color: var(--color-dark-blue-text); /* Placeholder color as in the image */
            opacity: 1; /* Ensure placeholder is visible */
        }

        .input-field-box textarea {
            min-height: 100px; /* Taller for description */
            padding-top: 0; /* Align text to top in textarea */
        }


        /* Status Dropdown */
        .status-dropdown-group {
            width: 250px; /* Fixed width as per image */
            position: relative;
            margin-bottom: 40px; /* Space before button */
        }

        .status-dropdown-group > label { /* Label for the dropdown */
            font-size: 18px;
            font-weight: 500;
            color: var(--color-text-dark);
            margin-bottom: 15px;
            display: block;
        }

        .status-select {
            appearance: none; /* Remove default browser styling */
            -webkit-appearance: none;
            -moz-appearance: none;
            background-color: var(--color-light-blue-input);
            color: var(--color-dark-blue-text);
            padding: 15px 20px;
            border: 1px solid var(--color-border-gray); /* Subtle border for dropdown */
            border-radius: 8px;
            width: 100%;
            font-size: 18px;
            cursor: pointer;
            outline: none;
        }

        .status-select:focus {
            border-color: var(--color-dark-blue);
        }

        .status-dropdown-group::after {
            content: '⌄'; /* Unicode for a down arrow */
            position: absolute;
            right: 20px;
            top: 55%; /* Adjust to center vertically with text */
            transform: translateY(-50%);
            font-size: 20px;
            color: var(--color-dark-blue-text);
            pointer-events: none; /* Allows clicks to pass through to the select */
        }

        /* Publish Button */
        .btn-publish {
            display: inline-block;
            background-color: var(--color-dark-blue); /* Dark blue as in image */
            color: var(--color-white);
            padding: 14px 40px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 500;
            transition: background-color 0.3s ease;
            border: none;
            cursor: pointer;
            align-self: flex-end; /* Push button to the right */
        }

        .btn-publish:hover {
            background-color: #1a3070; /* Slightly darker blue on hover */
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .page-wrapper {
                flex-direction: column;
                align-items: center;
                padding: 20px;
            }

            .left-panel {
                width: 100%;
                max-width: 500px;
                padding: 30px 20px;
            }

            .form-main-container {
                width: 100%; /* Take full width of its parent */
                padding: 30px 40px;
            }
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                padding: 15px 20px;
                align-items: flex-start;
            }
            .header .logout-link {
                margin-top: 10px;
                align-self: flex-end;
            }

            .page-wrapper {
                padding: 15px;
                gap: 20px;
            }

            .left-panel {
                padding: 20px 15px;
            }
            .profile-avatar {
                width: 100px;
                height: 100px;
                margin-bottom: 20px;
                font-size: 35px;
            }
            .profile-info h4 {
                font-size: 16px;
            }
            .profile-info p {
                font-size: 14px;
                margin-bottom: 15px;
            }
            .btn-retour {
                font-size: 16px;
                padding: 12px 30px;
            }

            .form-main-container {
                padding: 25px 25px;
            }
            .form-main-container h3 {
                font-size: 24px;
                margin-bottom: 25px;
            }
            .form-main-container .section-title {
                font-size: 20px;
                margin-bottom: 20px;
            }

            .input-group > label {
                font-size: 16px;
                margin-bottom: 10px;
            }
            .input-field-box {
                padding: 12px 18px;
            }
            .input-field-box input,
            .input-field-box textarea {
                font-size: 16px;
            }
            .input-field-box textarea {
                min-height: 80px;
            }

            .status-dropdown-group {
                width: 200px;
                margin-bottom: 30px;
            }
            .status-dropdown-group > label {
                font-size: 16px;
            }
            .status-select {
                padding: 12px 18px;
                font-size: 16px;
            }
            .status-dropdown-group::after {
                font-size: 18px;
                right: 15px;
            }

            .btn-publish {
                padding: 12px 30px;
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .header .logo {
                font-size: 20px;
            }
            .left-panel {
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
            .btn-retour {
                padding: 10px 25px;
                font-size: 15px;
            }
            .form-main-container {
                padding: 20px 15px;
            }
            .form-main-container h3 {
                font-size: 20px;
            }
            .form-main-container .section-title {
                font-size: 18px;
            }
            .input-group > label {
                font-size: 14px;
                margin-bottom: 8px;
            }
            .input-field-box {
                padding: 10px 15px;
            }
            .input-field-box input,
            .input-field-box textarea {
                font-size: 15px;
            }
            .status-dropdown-group {
                width: 100%; /* Full width on very small screens */
            }
            .btn-publish {
                padding: 10px 25px;
                font-size: 15px;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <a href="#" class="logo">SolidarityConnect</a>
             <form action="{{ route('association.logout') }}" method="POST" class="logout-form">
    @csrf
    <button type="submit" class="logout-link">Déconnexion</button>
</form>
    </header>

    <div class="page-wrapper">
      <div class="left-panel">
          <div class="profile-avatar" style="background-color: {{ $association->color }};">
        @php
            // Récupérer les initiales du nom complet
            $words = explode(' ', $association->nom_complet);
            $initials = '';

            // Prendre la première lettre du premier mot
            if(count($words) > 0) {
                $initials .= strtoupper(substr($words[0], 0, 1));
            }

            // Si il y a un deuxième mot, prendre sa première lettre
            // if(count($words) > 1) {
            //     $initials .= strtoupper(substr($words[1], 0, 1));
            // }

            // // Si pas de deuxième mot, juste garder la première lettre
            // echo $initials;
        @endphp
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
    <a href="{{ route('association.profil') }}" class="btn-retour">Retour</a>
</div>

        <div class="form-main-container">
            <h3>Nouveau besoin</h3>

            <h4 class="section-title">Détails du besoin</h4>
<form action="{{ route('association.besoin.store') }}" method="POST" style="width: 100%;">
    @csrf
    <div class="input-group">
        <label for="titre">Titre</label>
        <div class="input-field-box">
            <input type="text" id="titre" name="titre" placeholder="Ex : Vêtements pour enfants" required>
        </div>
    </div>
    <div class="input-group">
        <label for="description">Description</label>
        <div class="input-field-box">
            <textarea id="description" name="description" placeholder="Ex : Nous avons besoin de ...." required></textarea>
        </div>
    </div>
    <div class="status-dropdown-group">
        <label for="status">Status</label>
        <select id="status" name="status" class="status-select" required>
            <option value="">Sélectionner un statut</option>
            <option value="Urgent">Urgent</option>
            <option value="Normal">Normal</option>
        </select>
    </div>
    <button type="submit" class="btn-publish">Publier le besoin</button>
</form>
        </div>
    </div>
</body>
</html>
